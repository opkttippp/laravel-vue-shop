<?php

use App\Http\Controllers\Admin\CategController;
use App\Http\Controllers\Admin\ManufacturController;
use App\Http\Controllers\Admin\ProdController;
use App\Http\Controllers\Admin\RevController;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Auth\SocialAuthController;
use App\Http\Controllers\Admin\IndexController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\VerificationController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\ManufactursController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\UserAdminController;
use App\Http\Controllers\UserController;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController;

//-------------------------email confirm-------------------------------------

//Route::get('/email/verify', function () {
//    return Auth::user()->hasVerifiedEmail()
//        ?
//        redirect()->intended(RouteServiceProvider::HOME)
//        :
//        view('auth.verify');
//})->middleware('auth')->name('verification.notice');

//Route::post('/email/notification-verification', function () {
//    Auth::user()->SendEmailVerificationNotification();
//    return back()->with('message', 'Verification link send!');
//})->middleware(['auth', 'signed'])->name('verification.resend');

//Route::get('email/resend', [VerificationController::class,'resend']);

//--------------------------------Admin Users---------------------------------
Route::group(
    [
        'prefix' => '/admin/users',
        'middleware' => ['role:admin|manager', 'web'],
        'controller' => UserAdminController::class
    ],
    function () {
        Route::get('/', 'index')->name('admin.users.index')->middleware(
            'can:show'
        );
        Route::get('/update/{user}', 'edit')->name('admin.users.edit')
            ->middleware('can:edit');
        Route::put('/update/{user}', 'update')->name('admin.users.update')
            ->middleware('can:edit');
        Route::get('/delete/{user}', 'destroy')->name('admin.users.delete')
            ->middleware('can:delete');
    }
);

//--------------------------------Admin Roles----------------------------------
Route::group(
    [
        'prefix' => '/admin/roles',
        'middleware' => ['role:admin|manager', 'web'],
        'controller' => RoleController::class
    ],
    function () {
        Route::get('/', 'index')->name('admin.roles.index')->middleware(
            'can:show'
        );
        Route::get('/create', 'create')->name('admin.roles.create')->middleware(
            'can:add'
        );
        Route::post('/create', 'store')->name('admin.roles.store')->middleware(
            'can:add'
        );
        Route::get('/update/{id}', 'edit')->name('admin.roles.edit')
            ->middleware('can:edit');
        Route::put('/update/{id}', 'update')->name('admin.roles.update')
            ->middleware('can:edit');
        Route::get('/delete/{id}', 'destroy')->middleware('can:delete');
    }
);
//---------------------------------Admin Order --------------------------------
Route::group(
    [
        'prefix' => 'admin/order',
        'middleware' => ['role:admin|manager', 'web'],
        'controller' => OrderController::class
    ],
    function () {
        Route::get('/', 'index')->name('admin.orders.index');
        Route::get('/{order}', 'show')->name('admin.orders.view');
        Route::get('/delete/{order}', 'destroy')->name('admin.orders.delete');
    }
);

//--------------------------------Admin Category-------------------------------
Route::group(
    [
        'prefix' => 'admin/category',
        'middleware' => ['role:admin|manager', 'web'],
        'controller' => CategController::class
    ],
    function () {
        Route::get('/', 'index')->name('admin.category.index');
        Route::get('create', 'create')->name('admin.category.create');
        Route::post('create', 'store')->name('admin.category.store');
        Route::get('edit/{category}', 'edit')->name('admin.category.edit');
        Route::put('edit/{category}', 'update')->name('admin.category.update');
        Route::get('delete/{category}', 'delete')->name(
            'admin.category.delete'
        );
        Route::get('drop/{id}', 'destroy')->name('admin.category.destroy');
        Route::get('restore/{id}', 'restore')->name('admin.category.restore');
    }
);

//--------------------------------Admin Products-------------------------------
Route::group(
    [
        'prefix' => 'admin/product',
        'middleware' => ['role:admin|manager', 'web'],
        'controller' => ProdController::class
    ],
    function () {
        Route::get('/', 'index')->name('admin.products.index');
        Route::get('create', 'create')->name('admin.products.create');
        Route::post('create', 'store')->name('admin.products.store');
        Route::get('edit/{product}', 'edit')->name('admin.products.edit');
        Route::put('edit/{product}', 'update')->name('admin.products.update');
        Route::get('delete/{product}', 'delete')->name('admin.products.delete');
        Route::get('drop/{id}', 'destroy')->name('admin.products.destroy');
        Route::get('restore/{id}', 'restore')->name('admin.products.restore');
    }
);

//---------------------------------Admin Manufactors----------------------------
Route::group(
    [
        'prefix' => 'admin/manufactur',
        'middleware' => ['role:admin|manager', 'web'],
        'controller' => ManufacturController::class
    ],
    function () {
        Route::get('/', 'index')->name('admin.manufactur.index');
        Route::get('create', 'create')->name('admin.manufactur.create');
        Route::post('create', 'store')->name('admin.manufactur.store');
        Route::get('edit/{manufactur}', 'edit')->name('admin.manufactur.edit');
        Route::put('edit/{manufactur}', 'update')->name(
            'admin.manufactur.update'
        );
        Route::get('delete/{manufactur}', 'delete')->name(
            'admin.manufactur.delete'
        );
        Route::get('drop/{id}', 'destroy')->name('admin.manufactur.destroy');
        Route::get('restore/{id}', 'restore')->name('admin.manufactur.restore');
    }
);

//---------------------------------Admin Reviews----------------------------
Route::group(
    [
        'prefix' => 'admin/reviews',
        'middleware' => ['role:admin|manager', 'web'],
        'controller' => RevController::class
    ],
    function () {
        Route::get('/', 'index')->name('admin.reviews.index');
        Route::get('/show/{review}', 'showReview')->name('admin.reviews.show');

        Route::get('/edit', 'reviewOneUpdate')->name('reviewOneUpdate')
            ->middleware('can:edit post');
        Route::post('/{id}/update', 'reviewUpdate')->name('reviewUpdate')
            ->middleware('can:edit post');

        Route::get('/delete/{review}', 'reviewDelete')->name(
            'admin.reviews.delete'
        );
    }
);
//---------------------------------Admin-LTE-----------------------------

Route::post('/login', [LoginController::class, 'login'])->name('login');

Route::group(
    [
        'middleware' => ['role:admin|manager'],
    ],
    function () {
        Route::get('/admin', function () {
            return redirect('/admin/panel');
        });
        Route::get('/admin/panel', [IndexController::class, 'index']);
        Route::get('/admin/logout', [LoginController::class, 'logout']);
    }
);

//--------------------------------404--------------------------------------
Route::fallback(function () {
    echo "<img src='images/404-desktop-not-found.jpg'>";
});
//--------------------------------VueFront--------------------------------------

Route::get('{any}', function () {
    return view('home');
})->where('any', '.*');

//---------------------------------------------------------------------------


Route::prefix('/ttt')->group(function () {
    Route::get(
        '/{name}/{id}',
        [\App\Http\Controllers\PostCotroller::class, 'index']
    );
});


Route::get('/test/{id}', function ($id) {
    $mysql = [
        1 => [
            'id' => 1,
            'name' => 'Ivak',
            'username' => 'Olememko',
            'age' => 46,

        ],
        2 => [
            'id' => 2,
            'name' => 'Ivak2',
            'username' => 'Olememko2',
            'age' => 48,

        ]
    ];


    $connection = new PDO(
        'mysql:host=mysql;dbname=Laravel_db',
        'tttolll',
        'tttolll'
    );
//    $getAll = $connection->query(
//        "SELECT my.name, my2.email FROM my left JOIN my2 ON my.name = my2.name WHERE my.name = 'Lena'"
//    );
//    $user = $users->fetchAll(PDO::FETCH_ASSOC);

    $update = "UPDATE my SET name = :name WHERE id = :id";

    $getAll = "SELECT * FROM my JOIN my2";

    $getId = "SELECT * FROM my WHERE id = :id";


    class Database
    {
        private $db;

        public function __construct(PDO $db)
        {
            $this->db = $db;
        }

        public function updataId($sql, $id, $name)
        {
            $state = $this->db->prepare($sql);
            $state->bindParam('id', $id);
            $state->bindParam('name', $name);
            $state->execute();
        }

        public function getAll($sql)
        {
            $state = $this->db->query($sql);
            return $state->fetchAll(PDO::FETCH_ASSOC);
        }

        public function getId($id, $sql)
        {
            $state = $this->db->prepare($sql);
            $state->bindParam('id', $id);
            $state->execute();
            return $state->fetchAll(PDO::FETCH_ASSOC);
        }
    }

//    $data = new Database($connection);
//    $data->updataId($update, 2, 'Hero!!');
//    echo "<pre>";
//    print_r($data->getId(1, $getId));

//    $request = $_SERVER['REQUEST_URI'];
//    echo($request);
//    echo "<pre>";
//    echo($_SERVER['PHP_SELF']);
//    echo "<pre>";
//    echo('$_REQUEST -');
//    print_r($_REQUEST);
//});
});
//------------------------------------------------------------------------
Route::get('/logout', [LoginController::class, 'logout']);

Route::group(
    ['controller' => MainController::class, 'middleware' => 'web'],
    function () {
        Route::get('/', [MainController::class, 'home'])->name('home');
        Route::get('/greeting', [MainController::class, 'green'])->name(
            'green'
        );
    }
);

Route::group(
    ['prefix' => 'review', 'controller' => MainController::class],
    function () {
        Route::get('/', 'review')->name('review')->middleware('auth');
        Route::get('/add', 'reviewAdd')->name('reviewAdd')->middleware('auth');
        Route::post('/check', 'check')->name('check');
        Route::get('/{id}', 'reviewOne')->name('reviewOne');
        Route::get('/{id}/update', 'reviewOneUpdate')->name('reviewOneUpdate')
            ->middleware('can:edit post');
        Route::post('/{id}/update', 'reviewUpdate')->name('reviewUpdate')
            ->middleware('can:edit post');
        Route::get('/{id}/delete', 'reviewOneDelete')->name('reviewOneDelete');
    }
);


//-------------------------авторизация через соцсети-------------------------
Route::group(['middleware' => ['web']], function () {
    Route::get(
        'api/redirect/{service}',
        [SocialAuthController::class, 'redirectToProvider']
    );
    Route::get(
        'api/callback/{service}',
        [SocialAuthController::class, 'handleProviderCallback']
    );
});
//Route::get('auth/github', [GitHubController::class, 'gitRedirect']);
//Route::get('auth/github/callback', [GitHubController::class, 'gitCallback']);

//---------------------------------Route-------------------------------------
Route::resource('/product', ProductController::class);

Route::get(
    '/product/{product}/character',
    [ProductController::class, 'character']
)->name('product.character');

Route::get('/product/search/name', [ProductController::class, 'search'])->name(
    'product.search'
);
Route::get('/manufactur', [ManufactursController::class, 'index'])->name(
    'manufactur.index'
);

Route::resource('/category', CategoryController::class);

Route::get('/catalog/show', [CategoryController::class, 'catalog'])->name(
    'catalog.show'
);
Route::get('/catalog', [CategoryController::class, 'catalog'])->name(
    'catalog.index'
);
//---------------------------------Cart backend-------------------------------
//Route::group(
//    ['prefix' => '/cart', 'controller' => CartController::class],
//    function () {
//        Route::get('/', 'index')->name('cart.index');
//        Route::get('/add/{productId}', 'add')->name('cart.add');
//        Route::patch('/update', 'update')->name('cart.update');
//        Route::get('/drop{productId}', 'drop')->name('cart.drop');
//
//        Route::get('/destroy', 'destroy')->name('cart.destroy');
//        Route::get('/checkout', 'checkout')->name('cart.checkout');
//        Route::get('/success/{orderId}', 'success')->name('cart.success');
//    }
//);

//});
//---------------------------------UserOwner----------------------------------
Route::get('/user/{user}', [UserController::class, 'index'])->name(
    'user.index'
);
Route::put('/user/{user}', [UserController::class, 'update'])->name(
    'user.update'
);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])
    ->name('home');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])
    ->name('home');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])
    ->name('home');

//Auth::routes();
