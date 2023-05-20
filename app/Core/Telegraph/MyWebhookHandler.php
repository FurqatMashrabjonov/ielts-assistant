<?php

namespace App\Core\Telegraph;

use App\Core\Telegraph\Keyboards\KeyboardService;
use DefStudio\Telegraph\DTO\InlineQuery;
use DefStudio\Telegraph\DTO\InlineQueryResultArticle;
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
   }

    public function handleInlineQuery(InlineQuery $inlineQuery): void
    {
        $query = $inlineQuery->query(); //string

        DB::table('cambridges')->where('key', 'like', '%%')->get();


        $this->bot->answerInlineQuery($inlineQuery->id(), [
            InlineQueryResultArticle::make(rand(1000, 9999), 'Salom', 'hello world'),
            InlineQueryResultArticle::make(rand(1000, 9999), 'Salom', 'hello world'),
            InlineQueryResultArticle::make(rand(1000, 9999), 'Salom', 'hello world'),
            InlineQueryResultArticle::make(rand(1000, 9999), 'Salom', 'hello world'),
            InlineQueryResultArticle::make(rand(1000, 9999), 'Salom', 'hello world'),
            InlineQueryResultArticle::make(rand(1000, 9999), 'Salom', 'hello world'),

        ])->send();
    }


}
