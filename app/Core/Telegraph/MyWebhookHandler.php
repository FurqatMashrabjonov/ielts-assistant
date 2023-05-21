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
//        $this->chat->document('CQACAgIAAxkBAAO9ZGo8p78o1SCa99LqKKTQ86P47ooAAmQ2AAIPNVlLUPvNwcJEJN8vBA')->keyboard(
//            Keyboard::make()->buttons([
//                Button::make('Delete')->action('delete')->param('id', '42'),
//            ])
//        )->send();

        if (!is_null($this->message->audio())) {
            $this->reply(
                $this->message->audio()->id() . '

                ' .
                $this->message->audio()->filename()
            );
        }
//        $res = $this->chat->document('https://api.telegram.org/file/bot5973511124:AAFr9ncceHvcEoJhgmX_CbcqS2oR5JYfC3A/music/file_2.mp3');
//        \Log::debug(json_encode($res->toArray()));
    }


    public function handleAudio(Audio $audio)
    {
        $id = $audio->id();
        $res = \Telegraph::getFileInfo($id);
        \Log::debug(json_encode($audio->toArray()));
    }


    //COMMAND HANDLERS
    public function start($parameters): void
    {


//        $this->chat->message("Prepare for <b>IELTS</b> with us")
//            ->replyKeyboard(KeyboardService::mainMarkup())->send();
//
//        $chat_user = From::query()->where('chat_id', $this->chat->chat_id)->first();
//        if (!isset($chat_user)) {
//            From::query()->create([
//                'chat_id' => $this->chat->chat_id,
//                'user' => $this->message->from()->toArray()
//            ]);
//        }

    }

    public function handleInlineQuery(InlineQuery $inlineQuery): void
    {
//        $query = ucfirst($inlineQuery->query()); //string
//        \Log::debug($query);
//        $cams = Cambridge::query()
//            ->where('key', 'LIKE', "%$query%")
//            ->orWhere('name', 'LIKE', "%$query%")
//            ->limit(50)
//            ->get();
//
//        \Log::info('data', $cams->toArray());
//
//        $data = [];

//        foreach ($cams as $cam) {
//            $data[] = InlineQueryResultArticle::make($cam->id, $cam->name, $cam->audio_path);
//        }


//        $this->bot->answerInlineQuery($inlineQuery->id(), $data)->send();


        $cam = Cambridge::query()->where('key', 'Cam 2 2')->first();
        $this->bot->answerInlineQuery($inlineQuery->id(), [

//            InlineQueryResultAudio::make($cam->id, 'https://ieltstrainingonline.com/wp-content/uploads/2021/07/Cam15-Test2-Part1.m4a?_=1', 'Qondayee'),
            InlineQueryResultAudio::make($cam->id . 'sda', 'https://api.telegram.org/bot5973511124:AAFr9ncceHvcEoJhgmX_CbcqS2oR5JYfC3A/getFile?file_id=CQACAgIAAxkBAAOrZGoswycZPBJoQfsZfzQWjKLcznUAAmsvAAIPNVFLx2yJxXPp1RgvBA', 'heroku')->caption('heoku'),
        ])->send();
    }


}
