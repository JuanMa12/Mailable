<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/
use Illuminate\Mail\Message;
use Illuminate\Support\Facades\Mail;

Route::get('/', function () {
    return view('welcome');
});

Route::get('welcome',function(){

    /*Mail::send('emails.welcome',['name'=> 'Prueba'],function(Message $message){
        $message->to('correo@hotmail.com', 'Developer')
            ->subject('Welcome');
    });*/
    Mail::to('correo@gmail.com' , 'Client')
         ->cc('sevetucorreo@gmail.com')
         ->bcc('nosevetucorreo@gmail.com')
         ->send(new \App\Mail\WelcomeMail('NameClient')
    );

    $user =new \App\User([
        'name' => 'Developer',
        'email' => 'developer@gmail.com'
    ]);

    Mail::to($user->email , $user->name)
        ->cc('sevetucorreo@gmail.com')
        ->bcc('nosevetucorreo@gmail.com')
        ->send(new \App\Mail\WelcomeMail($user)
        );
});
