<?php

use Illuminate\Support\Facades\Route;

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

            //PATERN ROUTE
Route::pattern("id", "\d+");

            //Front PRIKAZ
Route::get("/", "FrontendController@index");
Route::get("/gallery", "FrontendController@gallery");
Route::get("/blog", "FrontendController@blog");
Route::get("/contact", "FrontendController@contact");
Route::get("/about", "FrontendController@about");
Route::get("/login", "FrontendController@login")->middleware(["isLoggedIn"]);
Route::get("/register", "FrontendController@register")->middleware(["isLoggedIn"]);
            //End Front PRIKAZ

            //Auth LOGIKA
Route::post("/doLogin", "AuthController@login");
Route::post("/doRegister", "AuthController@register");
Route::get("/logout", "AuthController@logout")->middleware(["notLoggedIn"]);
            //End Auth LOGIKA

            //Gallery LOGIKA
Route::get("/sort", "GalleryController@getGallery");
Route::get("/paginationGallery", "GalleryController@getPagination");
Route::post("/insertPost", "GalleryController@insertPost");

            //Contact LOGIKA
Route::post("/insertContactMessage", "ContactController@insertContactMessage");

            //Blog Logika
Route::get("/blogToShow", "BlogController@getBlog");
Route::get("/paginationBlog", "BlogController@getPagination");
Route::post("/insertBlog", "BlogController@insertBlog");

            //ADMIN Rute
Route::prefix("/admin")->middleware(["notLoggedIn", "admin"])->group(function() {
    Route::get("/", "AdminController@index");
    Route::get("/tablesPostsAdmin", "AdminController@tablesPosts");
    Route::get("/tablesUsersAdmin", "AdminController@tablesUsers");
    Route::get("/mailBoxAdmin", "AdminController@tablesContact");
    Route::get("/actionsAdmin", "AdminController@getActionsLog");
    Route::get("/formPostInsert", "AdminController@formPostInsert");
    Route::get("/formUserInsert", "AdminController@formUserInsert");
    Route::get("/updateUser/{id}", "AdminController@updateFormUser");
    Route::get("/updatePost/{id}", "AdminController@updateFormPost");
    Route::get("/updateBlog/{id}", "AdminController@updateFormBlog");
    Route::post("/doUpdate", "AdminController@updateUser");
    Route::post("/doUpdatePost", "AdminController@updatePost");
    Route::post("/doUpdateBlog", "AdminController@updateBlog");
    Route::post("/insertCategory", "AdminController@insertCategory");

                    //DELETE
    Route::delete("/deleteUser/{id}", "AdminController@deleteUser");
    Route::delete("/deletePost/{id}", "AdminController@deletePost");
    Route::delete("/deleteBlog/{id}", "AdminController@deleteBlog");
    Route::delete("/deleteCategory/{id}", "AdminController@deleteCategory");
    Route::delete("/deleteMessage/{id}", "AdminController@deleteMessage");
});


