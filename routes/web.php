<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
/**
 * home
 *  */
Route::get('/',[
    'uses'=>'\social\Http\Controllers\HomeController@index',
    'as'=>'home'
]);
Route::get('/alert',function(){
    return redirect()->route('home')->with('info','you signed in');
});
/* authentication*/
Route::get('/signup',[
    'uses'=>'\social\Http\Controllers\AuthController@getSignup',
    'as'=>'auth.signup',
    'middleware'=>['guest']
 ] );
 Route::post('/signup',[
    'uses'=>'\social\Http\Controllers\AuthController@postSignup',
    'middleware'=>['guest']
 ] );
 Route::get('/signin',[
'uses'=>'\social\Http\Controllers\AuthController@getSignin',
'as'=>'auth.signin',
'middleware'=>['guest']
 ]);
Route::post('/signin',[
'uses'=>'\social\Http\Controllers\AuthController@postSignin'
]);
Route::get('/signout',[
    'uses'=>'\social\Http\Controllers\AuthController@getSignout',
    'as'=>'auth.signout',

]);

Route::get('/search',[
    'uses'=>'\social\Http\Controllers\SearchController@getResults',
    'as'=>'search.results',

]);
Route::get('/user/{username}',[
    'uses'=>'\social\Http\Controllers\ProfileController@getProfile',
    'as'=>'profile.index',
]);
Route::get('/update',[
    'uses'=>'\social\Http\Controllers\ProfileController@getEdit',
    'as'=>'profile.edit',
    'middleware'=>['auth']
     ]);
    Route::post('/update',[
    'uses'=>'\social\Http\Controllers\ProfileController@postEdit',
    'as'=>'profile.post',
    'middleware'=>['auth']
    ]);


Route::get('/friends',[
        'uses'=>'\social\Http\Controllers\FriendController@getindex',
        'as'=>'friends.index',

        'middleware'=>['auth']
]);
Route::get('/friends/add/{username}',[
    'uses'=>'\social\Http\Controllers\FriendController@getAdd',
    'as'=>'friends.add',

    'middleware'=>['auth']
]);
Route::get('/friends/accept/{username}',[
    'uses'=>'\social\Http\Controllers\FriendController@getAccept',
    'as'=>'friends.accept',

    'middleware'=>['auth']
]);

Route::post('/friends/delete/{username}',[
    'uses'=>'\social\Http\Controllers\FriendController@postDelete',
    'as'=>'friend.delete',

    'middleware'=>['auth']
]);
Route::post('/status',[
    'uses'=>'\social\Http\Controllers\StatusController@postStatus',
    'as'=>'status.post',

    'middleware'=>['auth']
]);

Route::post('/status/{statusId}/reply',[
    'uses'=>'\social\Http\Controllers\StatusController@postReply',
    'as'=>'status.reply',

    'middleware'=>['auth']
]);
Route::get('/status/{statusId}/like',[
        'uses'=>'\social\Http\Controllers\StatusController@getLike',
        'as'=>'status.like',
        'middleware'=>['auth']

]);
Route::get('/messages',[
    'uses'=>'\social\Http\Controllers\MessageController@index',
    'as'=>'messages.index',
    'middleware'=>['auth']

]);
Route::get('/messages/{username}',[
    'uses'=>'\social\Http\Controllers\MessageController@getConversation',
    'as'=>'message.conversation',
]);

Route::post('/message/{username}',[
    'uses'=>'\social\Http\Controllers\MessageController@postMessage',
    'as'=>'message.post',

    'middleware'=>['auth']
]);

Route::post('/message/{messageId}/reply/{receiver_id}',[
    'uses'=>'\social\Http\Controllers\MessageController@replyMessage',
    'as'=>'message.reply',
    'middleware'=>['auth']
    ]);
//dsa routes
    Route::get('/messages',function(){
        return view('dsa.messages');
    })->name('messages');

    Route::get('/profile',function(){
        return view('dsa.profile');
    })->name('profiles');



    Route::get('/messages',[
        'uses'=>'\social\Http\Controllers\MessageController@index',
        'as'=>'zac.index',
        'middleware'=>['auth']

    ]);

    Route::post('/message/{username}',[
        'uses'=>'\social\Http\Controllers\MessageController@postMessage',
        'as'=>'message.poste',

        'middleware'=>['auth']
    ]);

    Route::post('/upload',[
        'uses'=>'\social\Http\Controllers\NotesController@postNotes',
        'as'=>'notes.post',

        'middleware'=>['auth']
    ]);

    Route::get('/academics',[
        'uses'=>'\social\Http\Controllers\NotesController@index',
        'as'=>'academics',
        'middleware'=>['auth']

    ]);


    // Route::get('/search',[
    //     'uses'=>'\social\Http\Controllers\SearchController@getResults',
    //     'as'=>'results',
    
    // ]);
