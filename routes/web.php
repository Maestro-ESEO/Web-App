<?php

use App\Http\Controllers\CommentController;
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


use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\TaskController;


Route::get("/login", [AuthController::class, "show_login"])->name("auth.login");
Route::get("/register", [AuthController::class, "show_register"])->name("auth.register");

Route::post("/login", [AuthController::class, "login"])->name("auth.login");
Route::post("/register", [AuthController::class, "register"])->name("auth.register");
Route::post("/logout", [AuthController::class, "logout"])->name("auth.logout");

Route::get("/profile/edit", [UserController::class, "edit"])->name("profile.edit")->middleware("auth");
Route::post("/profile", [UserController::class, "update"])->name("profile.update")->middleware("auth");

Route::get("/task/{id}", [TaskController::class, "show"])->name("task")->middleware("auth");
Route::post('/task/{id}/update-status/{status}', [TaskController::class, 'updateStatus'])->name('update.status')->middleware("auth");

Route::post('/task/{id}/addComment',[CommentController::class,'store'])->name('comment.store')->middleware('auth');

Route::redirect("/", "/dashboard");
Route::get("/dashboard", [DashboardController::class, "show"])->name("dashboard")->middleware("auth");
Route::get("/profile", [UserController::class, "show"])->name("profile")->middleware("auth");
Route::get("/project/{id}", [ProjectController::class, "show"])->name("project")->middleware("auth");

Route::fallback(function () {
    return redirect("/");
});
