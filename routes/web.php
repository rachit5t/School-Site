<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', "App\Http\Controllers\homePage@index"
);



Route::get("/teacher", "App\Http\Controllers\\teacherController@index");
Route::get("/teacher/{filterKey}", "App\Http\Controllers\\teacherController@applyFilters");

Route::get("/notice", function(){
    return view('notice');
});



//Table Pages
Route::get("/slider", 'App\Http\Controllers\addSlider@index'
);
Route::get("/noticeManager", "App\Http\Controllers\addNotice@index");
Route::get("/infrastractureManager","App\Http\Controllers\addServices@index");
Route::get("/userManager","App\Http\Controllers\addUser@index");
Route::get("/teacherManager","App\Http\Controllers\addTeacher@index");
Route::get("/scheduleManager","App\Http\Controllers\addSchedule@index");
Route::post("/addSchedule/editForm","App\Http\Controllers\addSchedule@editForm");

// End of table pages


Route::get("/services","App\Http\Controllers\servicesFrontEnd@index");

Route::get("/classSchedule", "App\Http\Controllers\scheduleView@index");

Route::get("/photoGallery", function(){
    return view("photoGallery");
});



Route::get("/imageGallery", function(){
    return view("imageGallery");
});

//Status changer routes
Route::get("/noticeManager/{id}/status", 'App\Http\Controllers\addNotice@statusChanger');
Route::get("/slider/{id}/status", 'App\Http\Controllers\addSlider@statusChanger');
Route::get("/infrastractureManager/{id}/status", 'App\Http\Controllers\addServices@statusChanger');
Route::get("/userManager/{id}/status", 'App\Http\Controllers\addUser@statusChanger');
Route::get("/teacherManager/{id}/status", 'App\Http\Controllers\addTeacher@statusChanger');
// End of status changer


//View only route
Route::get("/addNotice/{id}/view", 'App\Http\Controllers\addNotice@viewer');
Route::get("/addSlider/{id}/view", 'App\Http\Controllers\addSlider@viewer');
Route::get("/infrastractureManager/{id}/view", 'App\Http\Controllers\addServices@viewer');
Route::get("/userManager/{id}/view", 'App\Http\Controllers\addUser@viewer');
Route::get("/teacherManager/{id}/view", 'App\Http\Controllers\addTeacher@viewer');
//End of view only route


// Normal Crud routes
Route::resource("/addNotice",'App\Http\Controllers\addNotice');
Route::resource("/addSlider", "App\Http\Controllers\addSlider"
);
Route::resource("/addServices", "App\Http\Controllers\addServices");
Route::resource("/addUser", "App\Http\Controllers\addUser");
Route::resource("/panel", "App\Http\Controllers\addDashboard");
Route::resource("/addTeacher", "App\Http\Controllers\addTeacher");
Route::resource("/addPosition", "App\Http\Controllers\addPosition");
Route::resource("/addSchedule", "App\Http\Controllers\addSchedule");
//end Crud






Auth::routes(['register' => false]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


