<?php

namespace App\Core\Telegraph;

use App\Core\Telegraph\Keyboards\KeyboardService;
use App\Filament\Resources\CambridgeResource;
use App\Models\Cambridge;
use App\Models\From;
use App\Observers\TelegraphChat;
use DefStudio\Telegraph\DTO\Audio;
use DefStudio\Telegraph\DTO\InlineQuery;
use DefStudio\Telegraph\DTO\InlineQueryResultArticle;
use DefStudio\Telegraph\DTO\InlineQueryResultAudio;
use DefStudio\Telegraph\Facades\Telegraph;
use DefStudio\Telegraph\Handlers\WebhookHandler;
use DefStudio\Telegraph\Keyboard\Button;
use DefStudio\Telegraph\Keyboard\Keyboard;
use DefStudio\Telegraph\Keyboard\ReplyButton;
use DefStudio\Telegraph\Keyboard\ReplyKeyboard;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Stringable;

class MyWebhookHandler extends WebhookHandler
{


    public function handleChatMessage(Stringable $text): void
    {

    }

    //COMMAND HANDLERS
    public function start($parameters): void
    {
        $this->chat->message("Prepare for <b>IELTS</b> with us")
            ->replyKeyboard(KeyboardService::mainMarkup())->send();

        $chat_user = From::query()->where('chat_id', $this->chat->chat_id)->first();
        if (!isset($chat_user)) {
            From::query()->create([
                'chat_id' => $this->chat->chat_id,
                'user' => $this->message->from()->toArray()
            ]);
        }

    }

    public function handleInlineQuery(InlineQuery $inlineQuery): void
    {
        $query = ucfirst($inlineQuery->query()); //string
        \Log::debug($query);
        $cams = Cambridge::query()
            ->where('key', 'LIKE', "%$query%")
            ->orWhere('name', 'LIKE', "%$query%")
            ->limit(50)
            ->get();

        \Log::info('data', $cams->toArray());

        $data = [];

        foreach ($cams as $cam) {
            $text = $cam->name . PHP_EOL . PHP_EOL . '@ieltswithbot';
            $data[] = InlineQueryResultArticle::make($cam->id, $cam->name, $text)->keyboard(
                Keyboard::make()->row([
                    Button::make('Audio')->action('only_audio')->param('cambridge_id', $cam->id),
                    Button::make('Audio + PDF')->action('audio_plus_pdf')->param('ds', '3'),
                ])
            );
        }
        $this->bot->answerInlineQuery($inlineQuery->id(), $data)->send();
    }

}
