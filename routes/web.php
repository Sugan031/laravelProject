<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
 */
use App\Http\Controllers\RegisterController;
use Illuminate\Support\Facades\Route;

// Route::get('/login', [CommController::class,'index']);
// Route::post('/login', [CommController::class,'login'])->name('login');
// Route::get("/",[ProductController::class,"index"]);
    Route::get("/register", function () {
        return view("register");
    });
    Route::get("/", [RegisterController::class, "index"]);
    Route::post("login", [RegisterController::class, "login"]);
    Route::post("/register", [RegisterController::class, "register"]);
    Route::get("home", [RegisterController::class, "show"])->name("home");

    Route::prefix("home")->group(function () {
    Route::get("/{id}", [RegisterController::class, "show"]);
    Route::put("/{id}/edit", [RegisterController::class, "update"]);
    Route::get("/del/{id}", [RegisterController::class, "update"]);
    });



    Route::get("month/{num}",function($num){
        if($num==1){
            return "JAN";
        }
        elseif($num== 2){
            return "FEB";
        }
        elseif($num== 3){
            return "MAR";
        }
    })->middleware('month');
// Route::get("/home/{id}",[RegisterController::class,"edit"]);
// Route::put("/home/{id}/edit", [RegisterController::class, "update"]);
// Route::put("/home/{id}/edit",[RegisterController::class,"update"]);
// Route::get("/home/del/{id}",[RegisterController::class,"delete"]);

// Route::get('/test', function () {
//     return config('app.env');
// });

// // Route::get('/student/{id}/{name}', function ($id,$name) {
// //     return "Student name is {$name} and his id is {$id}";
// // })->where(["id"=>'[0-9]+',"name"=>'[a-z]+']);
// Route::get('/student/{id}/{name}', function ($id,$name) {
//     return "Student name is {$name} and his id is {$id}";
// })->whereNumber("id")->whereAlpha("name");

// Route::get('/category/{category}', function ($category) {
//     return "Student category is {$category}";
// })->whereIn("category",["cricket","football","basketball"]);

// Route::get("/about-us",[HomeController::class,"aboutus"]);

// //naming route
// Route::get("/data/share/king", function () {
//     return "Hello world";
// })->name("run");

// //grouping routes
// Route::group(['prefix'=> 'admin'], function () {
//     Route ::get('/user/{id}', function ($id) {
//         return "user id is {$id}";
//     });
//     Route::get("/settings", function () {
//         return "I am one of the group routes";
//     });
// });

// // Route::prefix("admin")->group(function () {
// // });

// //checking blade file
// Route::get("/check",function(){
//     return view("check");
// });
