<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

//-----------------использование базы данных без модели----------------------
use Illuminate\Support\Facades\DB;

//---------------------------------------------------------------------------

class PostController extends Controller
{
    public function show()
    {
        //-----------------использование базы данных без модели-----------------
        /*        $posts = DB::table('reviews')->where('id', '>', 2)->get();
                        $posts = DB::table('reviews')->where('id', '>', 2)->select(
                            'name', 'review'
                        )->get();
                        $posts = DB::table('reviews')->where('id', '>', 1)->where('id', '<', 5)
                            ->get();
                        $posts = DB::table('reviews')->where('id', 10)->orwhere(
                            function ($query) {
                                $query
                                    ->where('id', '>=', 1)
                                    ->where('id', '<=', 5);
                            }
                        )->get();
                        $posts = DB::table('reviews')->where('id', 1)->value('email');
                        $id = DB::table('reviews')->insertGetId([
                            'name' => 'Kila',
                            'subject' => 'hellowen',
                            'review' => 'aaasssfff',
                            'email' => 'adc@org'
                        ]);
                DB::table('reviews')->where('name','Kila')->delete();
                $posts = DB::table('reviews')->oldest('updated_at')->get();
                return view('posts.show', ['posts' => $posts]);*/
        //----------------вставка и удаление------------------------------------
        /*      $post = new Post();
                $post->where('id', '>', '4')->delete(); либо Post::destroy(3);
                $post->name = 'ttt';
                $post->subject = 'subject';
                $post->review = 'review';
                $post->email = 'email';
                $post->save();
        или
                $post = Post::create([
                $post->name = 'ttt';
                $post->subject = 'subject';
                $post->review = 'review';
                $post->email = 'email';
        ]);
        */
        //----------------изменение---------------------------------------------
        /*        $posts = Post::find(4);
                $posts->name = 'aaaddcc123';
                $posts->save();
                $posts = Post::all();*/
        //----связь в таблицах отношение 1 к 1 ---------------------------------
        /*        прописываем в первой модели связь с моделью thumbnail
                public function thumbnail()
            {
                return $this->hasOne(Thumbnail::class);
            }
                $post = Post::find( 4)->update(['name' => 'Nameeee']);
                */
        //----связь в таблицах отношение 1 ко многим----------------------------
//        return $this->hasMany(Post::class);
        //----связь в таблицах отношение многие ко многим-----------------------
        /*        class Post extends Model
                {
                    public function categories()
                    {
                        return $this->belongsToMany(Category::class);
                    }
                }
                class Category extends Model
                {
                    public function posts()
                    {
                        return $this->belongsToMany(Post::class);
                    }
                }
                class CategoryController extends Controller
                {
                    public function show()
                    {
                        $category = Category::find(1);
                        dump($category->posts);
                    }
                }*/
        $posts = Post::get();
        return view('posts.show', ['posts' => $posts]);
    }
}
