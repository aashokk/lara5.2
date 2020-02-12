<?php
use Illuminate\Support\Facades\DB;
use App\Post;
/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/insert', function(){ 
    DB::insert("insert into posts(post_title, post_desc) values (?,?)", ['laravel test post title1', 'laravel test post desc1'] );
});

Route::get('/find', function(){
    $posts = Post::find(2);
    echo '<pre>';
    print_r($posts);
    echo '</pre>';
});

Route::get('/read', function(){
    $posts = Post::all();
    echo '<pre>';
    print_r($posts);
    echo '</pre>';
});

Route::get('/findwhere', function(){
    $posts = Post::where('id',1)->orderBy('id', 'desc')->take(1)->get();
    echo '<pre>';
    return  ($posts);
    echo '</pre>';
});

Route::get('/findmore', function(){
    $posts = Post::findOrFail(1);
    return $posts;
});

Route::get('/basicinsert', function(){

    $post = new Post;

    $post->post_title = "New larabel post1";
    $post->post_desc = "New laravel desc1";
    $post->save();
});

Route::get('/findupdate', function(){

    $post = Post::find(3);

    $post->post_title = "New larabel post1";
    $post->post_desc = "New laravel desc1";
    $post->save();
});

Route::get('create', function(){
    Post::create(['post_title' => 'ttttttttt', 'post_desc' => 'dddddddd']);
});

Route::get('update', function(){
    Post::where('id', 3)->update(['post_title' => 'test titleeee', 'post_desc' => 'ttttttest desc']);
});

Route::get('delete', function(){
    Post::destroy('4');
});

Route::get('delete2', function(){
    $post = Post::find(3);
    $post->delete();
});

Route::get('softdelete', function(){
    Post::find(7)->delete();
});

Route::get('readsoftdelete', function(){
    $post = Post::onlyTrashed()->get();
    return $post;
});

Route::get('restoredelete', function(){
    Post::onlyTrashed()->restore();
});

Route::get('forcedeletetrash', function(){
    Post::onlyTrashed()->forceDelete();
});


Route::get('user_registration', 'User@register');

Route::post('create_user', 'User@create_user');

Route::get('user_login', function(){
    return view('user.login');
});

Route::post('user_login', 'User@user_login');

Route::get('user_dashboard', function(){
    return view('user.dashboard');
});

Route::get('user_logout', function(){
    Session::flush();
    if(empty(Session::get('username'))){
        return redirect('user_login');
    }
});

Route::get('user_list', 'User@user_list');

Route::get('user_update/{id}', 'User@user_update');

Route::patch('user/{user}/update',  ['as' => 'user.update', 'uses' => 'User@update_user']);

Route::get('user/{user}/delete',  ['as' => 'user.delete', 'uses' => 'User@delete_user']);

