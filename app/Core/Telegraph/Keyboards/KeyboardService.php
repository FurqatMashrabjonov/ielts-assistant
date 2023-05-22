<?php

namespace App\Core\Telegraph\Keyboards;

use DefStudio\Telegraph\Keyboard\Button;
use DefStudio\Telegraph\Keyboard\Keyboard;
use DefStudio\Telegraph\Keyboard\ReplyButton;
use DefStudio\Telegraph\Keyboard\ReplyKeyboard;

class KeyboardService
{


    public static function mainInline()
    {
        return Keyboard::make()->row([
            Button::make('Speaking')->webApp('https://glacial-chamber-78137.herokuapp.com'),
            Button::make('Listening')->webApp('https://glacial-chamber-78137.herokuapp.com')
        ])
            ->row([
                Button::make('Writing')->webApp('https://glacial-chamber-78137.herokuapp.com'),
                Button::make('Reading')->webApp('https://glacial-chamber-78137.herokuapp.com')
            ]);
    }

    public static function mainMarkup()
    {
        return ReplyKeyboard::make()->row([
            ReplyButton::make('foo')->requestLocation(),
            ReplyButton::make('bar')->requestQuiz(),
        ])->row([
            ReplyButton::make('baz')->webApp(config('app.url' ) . '/admin'),
        ]);
    }

}
