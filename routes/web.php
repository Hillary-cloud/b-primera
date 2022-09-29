<?php

use Illuminate\Support\Facades\Route;
use App\Http\Livewire\HomeComponent;
use App\Http\Livewire\PhotoComponent;
use App\Http\Livewire\HeaderSearchComponent;
use App\Http\Livewire\Admin\AdminHomeComponent;
use App\Http\Livewire\Admin\AdminCategoryComponent;
use App\Http\Livewire\Admin\AddCategoryComponent;
use App\Http\Livewire\Admin\EditCategoryComponent;
use App\Http\Livewire\Admin\AdminPhotoComponent;
use App\Http\Livewire\Admin\AddPhotoComponent;
// use App\Http\Livewire\Admin\ViewPhotoComponent;
use App\Http\Livewire\Admin\EditPhotoComponent;
use App\Http\Controllers\ViewController;
use App\Http\Controllers\ViewPhotoDetailsController;
use App\Http\Livewire\Admin\SliderComponent;
use App\Http\Livewire\Admin\AddSliderComponent;

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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::middleware('auth')->group(function () {
    // category
    Route::get('/admin/dashboard', AdminHomeComponent::class)->name('admin.dashboard');
    Route::get('/admin/categories', AdminCategoryComponent::class)->name('admin.categories');
    Route::get('/admin/category/add', AddCategoryComponent::class)->name('admin.add-category');
    Route::get('/admin/category/{category_slug}', EditCategoryComponent::class)->name('admin.edit-category');
   

    // photo
    Route::get('/admin/photos', AdminPhotoComponent::class)->name('admin.photos');
    Route::get('/admin/photo/add', AddPhotoComponent::class)->name('admin.add-photo');
    // Route::get('/admin/photo/{slug}', ViewPhotoComponent::class)->name('admin.view-photo');
    Route::get('/admin/photo/edit/{photo_slug}', EditPhotoComponent::class)->name('admin.edit-photo');
    Route::get('/admin/photo/{slug}', [ViewController::class, 'viewPhoto'])->name('admin.view-photo');

    // slide
    Route::get('/admin/slide', SliderComponent::class)->name('admin.slides');
    Route::get('/admin/slide/add', AddSliderComponent::class)->name('admin.add-slide');
});


Route::get('/', HomeComponent::class)->name('/');
Route::get('/photos', PhotoComponent::class)->name('photo');
// Route::get('/photos', HeaderSearchComponent::class)->name('searched-photos');

Route::get('/photo/{slug}', [ViewPhotoDetailsController::class, 'viewPhotoDetails'])->name('view-photo-details');

Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
