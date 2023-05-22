<?php

namespace App\Core\Telegraph;

use App\Core\Telegraph\Inline\AnswerInlineQueryCachedAudio;
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

        $this->reply('The bot is currently under development. It will soon come to serve you with its magical functions');

//        $this->chat->message("Prepare for <b>IELTS</b> with us")
//            ->replyKeyboard(KeyboardService::mainMarkup())->send();

        $chat_user = From::query()->where('chat_id', $this->chat->chat_id)->first();
        if (!isset($chat_user)) {
            From::query()->create([
                'chat_id' => $this->chat->chat_id,
                'user' => $this->message->from()->toArray()
            ]);
    }

    }

    public function help(){
        $this->chat->forwardMessage('778912691', '427')->send();
    }

    public function handleInlineQuery(InlineQuery $inlineQuery): void
    {
        $query = ucfirst($inlineQuery->query()); //string
        $cams = Cambridge::query()
            ->where('key', 'LIKE', "%$query%")
            ->orWhere('name', 'LIKE', "%$query%")
            ->limit(50)
            ->get();

        $data = [];

        foreach ($cams as $cam) {
            $caption = $cam->name . PHP_EOL . PHP_EOL . '@ieltswithbot';
            $data[] = AnswerInlineQueryCachedAudio::make($cam->id, $cam->audio_file_id, $cam->name)->caption($caption);
        }
        $this->bot->answerInlineQuery($inlineQuery->id(), $data)->send();
    }

    public function audio(){
        $cam_id = $this->data->get('cambridge_id');
        \Log::debug($cam_id);
    }

}
