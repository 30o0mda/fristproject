<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ExampleController;
enum section:string {
    case phone='phone';
    case email='email';
    case address='address';
    case password='password';
}

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

// Route::get('/', function () {
//     return 'welcome';
// });

Route::view('/', 'welcome');

// if i want use some controller in my route
route::controller(ExampleController::class)->group(function () {
    Route::get('my/data', 'my_data');
});


route::get('example', [ExampleController::class, 'my_data']);

route::get('section/{section}', function (section $section) {
    return $section->value;
});



// CRUD OPERATION
//example => index, create, store, show, edit, update, destroy
//example/{id} => (R=>read) index GET  |name:example.index
//example => (c=>create)  GET  |name:example.create
//example => (c=>create)  post  |name:example.store
//example/{id}/edit => (u=>update)  GET  |name:example.edit
//example/{id} => (u=>update)  put method  |name:example.update
//example/{id} => (d=>delete)  delete method  |name:example.destroy
Route::resource('example', ExampleController::class);
route::delete('example/force/delete/{example}', [ExampleController::class, 'forcedelete'])->name('example.forcedelete');
route::post('example/force/restore/{example}', [ExampleController::class, 'restore'])->name('example.restore');


