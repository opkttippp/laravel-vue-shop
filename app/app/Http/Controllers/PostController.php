<?php

namespace App\Http\Controllers;

use App\Http\Requests\ValidRequest;
use Cookie;
use Illuminate\Http\Request;
use App\Models\Post;
//-----------------использование базы данных без модели----------------------
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;

//---------------------------------------------------------------------------

class PostController extends Controller
{
    public function show(Request $request)
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

        if ($request->isMethod('post')) {
            $post = new Post();
            $post->name = $request->input('name');
            $post->subject = $request->input('subject');
            $post->review = $request->input('review');
            $post->email = $request->input('email');
            $post->save();

            $posts = Post::paginate(3);
            $a = $request->fullUrl();
            return view('posts.show', compact('posts', 'a'));
        }
//        return view('posts.form');

//        ----------------сессия---------------------------
        /*        $request->session()->put('name', 'kila');
                $request->session()->put('id', '4');

        //        ---------положить в сессию--------------------
                $request->session()->put('name', 'kira');

        //        ---------получение данных сессии--------------------
                $get = $request->session()->get('name');

        //        ---------удаление все данных сессии--------------------
                $request->session()->flush();

        //        ---------удаление переменной сессии--------------------
                $request->session()->forget('name');

        //        ---------получение всех данных сессии--------------------
                $data = $request->session()->all();

        //        ---------проверка существования сессии--------------------
                $request->session()->has('key');
                $request->session()->exists('key');

        //        ---------создание массива--------------------
                $request->session()->put('arr', ['a', 'b', 'c']);

        //        ---------добавление в массив--------------------
                $request->session()->push('arr', 'd');*/
//        ---------глобальная функция--------------------
        /*        session(['key' => 'value']);
                $value = session('key');*/

        $get = $request->session()->get('name');
    }

    public function show1()
    {
//        echo 11111;
//        return redirect('post/show2');
//        return redirect()->action([MainController::class, 'reviewOne'], ['id' => 4]);
//        return redirect()->route('show2', ['id' => 2]);
//        return redirect()->route('show2');
        return response('text', 200)->cookie('count', 1, 10);
    }

    public function show2(Request $request, $count = 0)
    {
//        return new Response('страница не найдена', '404');
//        return response('Hello World', 200)
//            ->header('Content-Type', 'text/plain')
//            ->header('X-Header-One', 'value')
//            ->header('X-Header-Two', 'value');
//        echo 22222;
//        echo "<br>";
//        echo $id;
//        return response()->view('posts.form')
//            ->header('Content-Type', 'text/plain');
//        $count = $request->cookie('count') + 1;
//        return response($count, 200)->cookie('count', $count, 10);
//        dump($value);

        //    --------------------cookie---------------------------
        //    ----------------------установка----------------------
        //      return response($count, 200)->cookie('count', 5, 10);
        //    ----------------------получение----------------------
        //      $count = $request->cookie('count');
        //    ----------------------добавление в очередь-----------
        //      Cookie::queue('name', 'value', 10);
        //      return response('test');
        //    ---------------передача------------------

        $request->session()->put('sess', 'kila');
//        echo $request->session()->get('sess');
//        echo "<br>";

        return response('text', 200)
//            ->view('posts.form')
            ->cookie('name', 'value', 10)
            ->header('Content-Type', 'text/html');
    }
}
