<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LifeCycleTestController extends Controller
{
    public function showserviceContainerTest()
    {
        app()->bind('lifeCycleTest', function(){
            return 'ライフサイクルテスト';
        });

        $test = app()->make('lifeCycleTest');

        //サービスコンテナなしのパターン
        // $message = new Message();
        // $sample = new sample($message);
        // $sample->run();

        //サービスコンテナapp()を使うパターン
        app()->bind('sample', sample::class);
        $sample = app()->make('sample');
        $sample->run();


        dd($test, app());
    }
}

class sample 
{
    public $message;
    public function __construct(Message $message) {
        $this->message = $message;

    }
    public function run() {
        $this->message->send();
    }

}

class Message 
{

    public function send() {
        echo 'メッセージ表示';
    }
}

