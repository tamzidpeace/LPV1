<?php

use Illuminate\Support\Facades\Broadcast;

/*
|--------------------------------------------------------------------------
| Broadcast Channels
|--------------------------------------------------------------------------
|
| Here you may register all of the event broadcasting channels that your
| application supports. The given channel authorization callbacks are
| used to check if an authenticated user can listen to the channel.
|
*/

Broadcast::channel('App.User.{id}', function ($user, $id) {
    return (int) $user->id === (int) $id;
});

<<<<<<< HEAD

Broadcast::channel('test', function ( $data) {
    return 1;
});
=======
Broadcast::channel('chat', function ($user) {
    return Auth::check();
  });
>>>>>>> 7576a391f8c4f4bf2c100ff118a657d2650faf2d
