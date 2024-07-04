<?php

use App\Models\Category;
use App\Models\MdCitizenship;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CrudController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LocaleController;
use App\Http\Controllers\MdGenderController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\MdMinistryController;
use App\Http\Controllers\AdminMemberController;
use App\Http\Controllers\MdBloodTypeController;
use App\Http\Controllers\MdEducationController;
use App\Http\Controllers\MdProfessionController;
use App\Http\Controllers\AdminCategoryController;
use App\Http\Controllers\DashboardPostController;
use App\Http\Controllers\MdCitizenshipController;
use App\Http\Controllers\MdSpiritualGiftController;
use App\Http\Controllers\MdFamilyRelationController;
use App\Http\Controllers\MdAdministrativeDivisionController;

Route::get('/', function () {
    return view('home',[
        "title" => "Home",
        "active"=> "home",
    ]);
});

Route::get('/locale/{lang}',[LocaleController::class,'setLocale']);

Route::get('/about', function () {
    return view('about',[
        "title" => "About",
        "name" => "Gehasi Davidy",
        "email" => "dvdsilalahi@yahoo.com",
        "image" => "davidy_silalahi2.png",
        "active"=> "about",
    ]);
});

Route::get('/posts', [PostController::class, 'index']);
Route::get('/posts/{post:slug}', [PostController::class,'show']);
Route::get('/categories', function(){
    return view('categories',[
        'title'=> 'Categories',
        "active"=> "categories",
        "categories"=> Category::all()
    ]);
});

Route::get("/login", [LoginController::class,"index"])->name('login')->middleware('guest');

Route::post("/login", [LoginController::class,"authenticate"]);

Route::post("/logout", [LoginController::class,"logout"]);

Route::get("/register", [RegisterController::class,"index"])->middleware('guest');

Route::post("/register", [RegisterController::class,"store"]);

Route::get("/dashboard", function(){
    return view('dashboard.index');
})->middleware('auth');

Route::get("dashboard/posts/checkSlug", [DashboardPostController::class,"checkSlug"])->middleware('auth');

Route::resource('/dashboard/posts', DashboardPostController::class)->middleware('auth');

Route::resource('/dashboard/categories', AdminCategoryController::class)->except('show')->middleware('admin');

Route::get('/admin/post-categories', [AdminCategoryController::class, 'list'])->middleware('admin');

Route::resource('/dashboard/members', AdminMemberController::class)->middleware('admin')->middleware('auth');

Route::get('/admin/member-list', [AdminMemberController::class, 'list']);

Route::get('/dashboard/family/{member:uuid}', [AdminMemberController::class, "family"])->middleware('admin')->middleware('auth');

Route::post('/dashboard/members/{member:uuid}/archive', [AdminMemberController::class, "archive"])->middleware('admin')->middleware('auth');

Route::get('/', [CrudController::class, 'index']);

#Route::resource('todo', CrudController::class);

Route::post('/admin/admindivs',[MdAdministrativeDivisionController::class, 'store']);

Route::get('/admin/table-admindivs',[MdAdministrativeDivisionController::class, 'table']);

Route::get('/admin/select-admindivs',[MdAdministrativeDivisionController::class, 'select']);

Route::post('/admin/citizenships',[MdCitizenshipController::class, 'store']);

Route::get('/admin/table-citizenships',[MdCitizenshipController::class, 'table']);

Route::get('/admin/select-citizenships',[MdCitizenshipController::class, 'select']);

Route::post('/admin/bloodtypes',[MdBloodTypeController::class, 'store']);

Route::get('/admin/table-bloodtypes',[MdBloodTypeController::class, 'table']);

Route::get('/admin/select-bloodtypes',[MdBloodTypeController::class, 'select']);

Route::post('/admin/educations',[MdEducationController::class, 'store']);

Route::get('/admin/table-educations',[MdEducationController::class, 'table']);

Route::get('/admin/select-educations',[MdEducationController::class, 'select']);

Route::post('/admin/famrelations',[MdFamilyRelationController::class, 'store']);

Route::get('/admin/table-famrelations',[MdFamilyRelationController::class, 'table']);

Route::get('/admin/select-famrelations',[MdFamilyRelationController::class, 'select']);

Route::post('/admin/genders',[MdGenderController::class, 'store']);

Route::get('/admin/table-genders',[MdGenderController::class, 'table']);

Route::get('/admin/select-genders',[MdGenderController::class, 'select']);

Route::post('/admin/professions',[MdProfessionController::class, 'store']);

Route::get('/admin/table-professions',[MdProfessionController::class, 'table']);

Route::get('/admin/select-professions',[MdProfessionController::class, 'select']);

Route::post('/admin/ministries',[MdMinistryController::class, 'store']);

Route::get('/admin/table-ministries',[MdMinistryController::class, 'table']);

Route::get('/admin/select-ministries',[MdMinistryController::class, 'select']);

Route::post('/admin/spiritualgifts',[MdSpiritualGiftController::class, 'store']);

Route::get('/admin/table-spiritualgifts',[MdSpiritualGiftController::class, 'table']);

Route::get('/admin/select-spiritualgifts',[MdSpiritualGiftController::class, 'select']);

/*,
Route::get('/categories/{category:slug}', function(Category $category) {
    return view('posts', [
        "title" => "Post By Category: ".$category->name,
        "active"=> "categories",
        "posts" => $category->posts->load('category','author')
    ]);
});

Route::get('/authors/{author:username}', function(User $author) {
    return view('posts', [
        "title" => "Post By Author:".$author->name,
        "active"=> "authors",
        "posts" => $author->posts->load('category','author')
    ]);
});
*/

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
