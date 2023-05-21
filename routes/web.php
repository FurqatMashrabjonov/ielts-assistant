<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/webhook', function (){
    $bot = \DefStudio\Telegraph\Models\TelegraphBot::query()->first();
    echo $bot->registerWebhook()->send();
});

Route::get('/audio', function (){
    $file= public_path('Cambridge2Test2.mp3');
    $headers = array(
        'Content-Type: audio/mpeg',
    );
    return Response::download($file, 'filename.pdf', $headers);
});

Route::get('/s', function (){
    $filename = 'temp-image.mp3';
    $tempImage = tempnam(sys_get_temp_dir(), $filename);
    copy('https://api.telegram.org/file/bot5973511124:AAFr9ncceHvcEoJhgmX_CbcqS2oR5JYfC3A/music/file_2.mp3', $tempImage);

    return response()->download($tempImage, $filename);
});
