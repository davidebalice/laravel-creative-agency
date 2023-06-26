<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Home\HomepageController;
use App\Http\Controllers\Home\HomeSliderController;
use App\Http\Controllers\Home\AboutController;
use App\Http\Controllers\Home\PortfolioController;
use App\Http\Controllers\Home\ServiceController;
use App\Http\Controllers\Home\BlogCategoryController;
use App\Http\Controllers\Home\BlogController;
use App\Http\Controllers\Home\FooterController;
use App\Http\Controllers\Home\ContactController;

Route::get('/', function () {
    return view('frontend.index');
})->name('index');

Route::get('/dashboard', function () {
    return view('admin.index');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware(['auth'])->group(function (){
    Route::controller(AdminController::class)->group(function(){
        Route::get('/admin/logout', 'destroy')->name('admin.logout');
        Route::get('/admin/profile', 'Profile')->name('admin.profile');
        Route::get('/edit/profile', 'EditProfile')->name('edit.profile');
        Route::group(['middleware' => ['demo_mode']], function () {
            Route::post('/store/profile', 'StoreProfile')->name('store.profile');
            Route::get('/change/password', 'ChangePassword')->name('change.password');
            Route::post('/update/password', 'UpdatePassword')->name('update.password');
        });
    });
});

Route::controller(HomeSliderController::class)->group(function(){
    Route::get('/home/slide', 'HomeSlider')->name('home.slide');
    Route::group(['middleware' => ['demo_mode']], function () {
     Route::post('/update/slider', 'UpdateSlider')->name('update.slider');
    });
});

Route::controller(AboutController::class)->group(function(){
    Route::get('/about/page', 'AboutPage')->name('about.page');
    Route::post('/update/about', 'UpdateAbout')->name('update.about');
    Route::get('/about', 'HomeAbout')->name('home.about');
    Route::get('/about/multi/image', 'AboutMultiImage')->name('about.multi.image');
    Route::post('/store/multi/image', 'StoreMultiImage')->name('store.multi.image');
    Route::get('/all/multi/image', 'AllMultiImage')->name('all.multi.image');
    Route::get('/edit/multi/image/{id}', 'EditMultiImage')->name('edit.multi.image');
    Route::get('/delete/multi/image/{id}', 'DeleteMultiImage')->name('delete.multi.image');
    Route::post('/update/multi/image', 'UpdateMultiImage')->name('update.multi.image');
});

Route::controller(PortfolioController::class)->group(function(){
    Route::get('/admin/portfolio', 'AdminPortfolio')->name('admin.portfolio');
    Route::get('/portfolio/add', 'AddPortfolio')->name('portfolio.add');
    Route::post('/portfolio/store', 'StorePortfolio')->name('portfolio.store');
    Route::get('/portfolio/edit/{id}', 'EditPortfolio')->name('portfolio.edit');
    Route::get('/portfolio/delete/{id}', 'DeletePortfolio')->name('portfolio.delete');
    Route::post('/portfolio/update', 'UpdatePortfolio')->name('portfolio.update');
    Route::get('/portfolio/details/{id}', 'PortfolioDetails')->name('portfolio.details');
    Route::get('/portfolio', 'Portfolio')->name('portfolio');
});

Route::controller(ServiceController::class)->group(function(){
    Route::get('/admin/services', 'AdminServices')->name('admin.services');
    Route::get('/services/add', 'AddService')->name('services.add');
    Route::post('/services/store', 'StoreService')->name('services.store');
    Route::get('/services/edit/{id}', 'EditService')->name('services.edit');
    Route::get('/services/delete/{id}', 'DeleteService')->name('services.delete');
    Route::post('/services/update', 'UpdateService')->name('services.update');
    Route::get('/services/details/{id}', 'ServiceDetails')->name('services.details');
});

Route::controller(BlogCategoryController::class)->group(function(){
    Route::get('/blog/category', 'BlogCategory')->name('blog.category');
    Route::get('/add/blog/category', 'AddBlogCategory')->name('blog.category.add');
    Route::post('/store/blog/category', 'StoreBlogCategory')->name('store.blog.category.store');
    Route::get('/edit/blog/category/{id}', 'EditBlogCategory')->name('blog.category.edit');
    Route::get('/delete/blog/category/{id}', 'DeleteBlogCategory')->name('blog.category.delete');
    Route::post('/update/blog/category/{id}', 'UpdateBlogCategory')->name('blog.category.update');
});

Route::controller(BlogController::class)->group(function(){
    Route::get('/admin/blog', 'Blog')->name('admin.blog');
    Route::get('/blog/add', 'AddBlog')->name('blog.add');
    Route::post('/blog/store', 'StoreBlog')->name('blog.store');
    Route::get('/blog/edit/{id}', 'EditBlog')->name('blog.edit');
    Route::get('/blog/delete/{id}', 'DeleteBlog')->name('blog.delete');
    Route::post('/blog/update/', 'UpdateBlog')->name('blog.update');
    Route::get('/blog/details/{id}', 'BlogDetails')->name('blog.details');
    Route::get('/blog/category/{id}', 'CategoryBlog')->name('category.post');
    Route::get('/blog', 'HomeBlog')->name('blog');
});

Route::controller(FooterController::class)->group(function(){
    Route::get('/admin/footer', 'FooterSetup')->name('footer');
    Route::post('/update/footer/', 'UpdateFooter')->name('update.footer');
});

Route::controller(ContactController::class)->group(function(){
    Route::get('/admin/contact/', 'AdminContact')->name('admin.contact');
    Route::get('/contact', 'Contact')->name('contact');
    Route::post('/store/message', 'StoreMessage')->name('store.message');
    Route::get('/contact/message', 'ContactMessage')->name('contact.message');
    Route::get('/delete/message/{id}', 'DeleteMessage')->name('delete.message');
});

require __DIR__.'/auth.php';