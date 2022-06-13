<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\HomeAdminController;
use App\Http\Controllers\CategoryController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now store something great!
|
*/

// Route::get('/posts/show', function () {
//     return view('site.show');
// });

Auth::routes();


Route::get('/admins',[HomeAdminController::class, 'index'])->name('admins')->middleware('admin');
Route::get('/admins/create', [App\Http\Controllers\PostController::class, 'create'])->name('admins.store');
Route::post('/admins/store', [App\Http\Controllers\PostController::class, 'store'])->name('admins.store');


//__post route__//
Route::get('/admins/posts', [App\Http\Controllers\PostController::class, 'index'])->name('posts.index');
Route::get('/admins/posts/create', [App\Http\Controllers\PostController::class, 'create'])->name('posts.create');
Route::post('/admins/posts/store', [App\Http\Controllers\PostController::class, 'store'])->name('posts.store');
Route::get('/admins/posts/{post}/edit', [App\Http\Controllers\PostController::class, 'edit'])->name('posts.edit');
 Route::patch('/admins/posts/{post}/update', [App\Http\Controllers\PostController::class, 'update'])->name('posts.update');
 Route::get('/admins/posts/{post}/approve', [App\Http\Controllers\PostController::class, 'approves'])->name('posts.approve');
Route::delete('/admins/posts/{id}/destroy', [App\Http\Controllers\PostController::class, 'destroy'])->name('posts.destroy');
Route::get('/admins/profile', [App\Http\Controllers\PostController::class, 'profile'])->name('profile.index');
Route::get('/admins/profile/create', [App\Http\Controllers\PostController::class, 'profilecreate'])->name('profile.create');
Route::post('/admins/profile/store', [App\Http\Controllers\PostController::class, 'profilestore'])->name('profile.update');

//__category route__//
Route::get('/admins/category', [App\Http\Controllers\CategoryController::class, 'index'])->name('category.index');
Route::get('/admins/category/create', [App\Http\Controllers\CategoryController::class, 'create'])->name('category.create');
Route::post('/admins/category/store', [App\Http\Controllers\CategoryController::class, 'store'])->name('category.store');
Route::get('/admins/category/{category}/edit', [App\Http\Controllers\CategoryController::class, 'edit'])->name('category.edit');
Route::patch('/admins/category/{category}/update', [App\Http\Controllers\CategoryController::class, 'update'])->name('category.update');
Route::delete('/admins/category/{category}/destroy', [App\Http\Controllers\CategoryController::class, 'destroy'])->name('category.destroy');
//__tags route__//
Route::get('/admins/tags', [App\Http\Controllers\TagController::class, 'index'])->name('tags.index');
Route::get('/admins/tags/create', [App\Http\Controllers\TagController::class, 'create'])->name('tags.create');
Route::post('/admins/tags/store', [App\Http\Controllers\TagController::class, 'store'])->name('tags.store');
Route::get('/admins/tags/{tag}/edit', [App\Http\Controllers\TagController::class, 'edit'])->name('tags.edit');
Route::patch('/admins/tags/{tag}/update', [App\Http\Controllers\TagController::class, 'update'])->name('tags.update');
Route::delete('/admins/tags/{tag}/destroy', [App\Http\Controllers\TagController::class, 'destroy'])->name('tags.destroy');


//__Page route__//
Route::get('/', [App\Http\Controllers\PageController::class, 'index'])->name('page.index');
Route::get('/posts/{post}', [App\Http\Controllers\PageController::class, 'show'])->name('page.show');

//__comment route__//
// Route::get('/admins/tags', [App\Http\Controllers\TagController::class, 'index'])->name('tags.index');
// Route::get('/posts/comment/{}/create', [App\Http\Controllers\CommentController::class, 'create'])->name('comment.create');
Route::post('/posts/comment{post}//store', [App\Http\Controllers\CommentController::class, 'store'])->name('comments.store');
Route::get('/posts/like{post}//store', [App\Http\Controllers\LikeController::class, 'store'])->name('likes.store');
Route::get('/comments{comment}/liked',[App\Http\Controllers\CommentController::class, 'likecommentstore'])->name('commentlike.stores');
Route::get('/posts/{category}/category', [App\Http\Controllers\PageController::class, 'categoryshow'])->name('posts.category');
// Route::patch('/admins/tags/{tag}/update', [App\Http\Controllers\TagController::class, 'update'])->name('tags.update');
// Route::delete('/admins/tags/{tag}/destroy', [App\Http\Controllers\TagController::class, 'destroy'])->name('tags.destroy');

//__user_post route__//
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/users/posts', [App\Http\Controllers\HomeController::class, 'postindex'])->name('userposts.index');
Route::get('/users/posts/create', [App\Http\Controllers\HomeController::class, 'create'])->name('userposts.create');
Route::post('/users/posts/store', [App\Http\Controllers\HomeController::class, 'store'])->name('userposts.store');
Route::get('/users/posts/{post}/edit', [App\Http\Controllers\HomeController::class, 'edit'])->name('userposts.edit');
 Route::patch('/users/posts/{post}/update', [App\Http\Controllers\HomeController::class, 'update'])->name('userposts.update');
Route::delete('/users/posts/{id}/destroy', [App\Http\Controllers\HomeController::class, 'destroy'])->name('userposts.destroy');
Route::get('/home/profile', [App\Http\Controllers\HomeController::class, 'profile'])->name('profile.index');
Route::get('/home/profile/create', [App\Http\Controllers\HomeController::class, 'profilecreate'])->name('profile.create');
Route::post('/home/profile/store', [App\Http\Controllers\HomeController::class, 'profilestore'])->name('profile.update');


