<?php

use App\Channel;
use App\Events\MessageSent;

Route::get('/', function () {
    $channels = Channel::orderBy('name')->get();

    return view('welcome', compact('channels'));
});

Route::get('/channels/{channel}/messages', function (App\Channel $channel) {
    if (!request()->wantsJson()) {
        abort(404);
    }

    $messages = App\Message::where('channel_id', $channel->id)->get();

    return $messages;
});

Route::post('/channels/{channel}/messages', function (App\Channel $channel) {
    $message = Message::forceCreate([
        'channel_id' => $channel->id,
        'author_username' => request('username'),
        'message' => request('message'),
    ]);

    return $message;
});


Route::post('/channels/{channel}/messages', function (App\Channel $channel) {
    $message = Message::forceCreate([
        'channel_id' => $channel->id,
        'author_username' => request('username'),
        'message' => request('message'),
    ]);

    // Dispatch an event. Will be broadcasted over Redis.
    event(new MessageSent($channel->name, $message));

    return $message;
});

