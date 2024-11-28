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
use App\Http\Controllers\Home\PageBannerController;
use App\Http\Controllers\LangController;

Route::get('/lang/{lang}', [LangController::class, 'change'])->name('changeLang');

Route::controller(HomepageController::class)->group(function(){
    Route::get('/', 'Homepage')->name('index');
});

Route::middleware(['auth', 'verified'])->group(function (){
    Route::controller(AdminController::class)->group(function(){
        Route::get('/dashboard', 'Dashboard')->name('dashboard');
        Route::get('/admin/logout', 'Destroy')->name('admin.logout');
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
    Route::get('/about', 'HomeAbout')->name('home.about');
    Route::get('/add/gallery', 'Add')->name('add.gallery');
    Route::get('/gallery', 'Gallery')->name('gallery');
    Route::get('/edit/gallery/{id}', 'Edit')->name('edit.gallery');
    Route::group(['middleware' => ['demo_mode']], function () {
        Route::post('/update/about', 'UpdateAbout')->name('update.about');
        Route::post('/store/gallery', 'Store')->name('store.gallery');
        Route::get('/delete/gallery/{id}', 'Delete')->name('delete.gallery');
        Route::post('/update/gallery', 'Update')->name('update.gallery');
    });
});

Route::controller(PortfolioController::class)->group(function(){
    Route::get('/admin/portfolio', 'AdminPortfolio')->name('admin.portfolio');
    Route::get('/portfolio/add', 'AddPortfolio')->name('portfolio.add');
    Route::get('/portfolio/edit/{id}', 'EditPortfolio')->name('portfolio.edit');
    Route::get('/portfolio/details/{id}', 'PortfolioDetails')->name('portfolio.details');
    Route::get('/portfolio', 'Portfolio')->name('portfolio');

    Route::group(['middleware' => ['demo_mode']], function () {
        Route::post('/portfolio/store', 'StorePortfolio')->name('portfolio.store');
        Route::post('/portfolio/update', 'UpdatePortfolio')->name('portfolio.update');
        Route::post('/active/portfolio/{id}', 'ActivePortfolio')->name('portfolio.active');
        Route::get('/portfolio/delete/{id}', 'DeletePortfolio')->name('portfolio.delete');
        Route::get('/admin/portfolio/sort/{action}/{id}', 'Sort')->name('admin.portfolio.sort'); 
    });

});

Route::controller(ServiceController::class)->group(function(){
    Route::get('/admin/services', 'AdminServices')->name('admin.services');
    Route::get('/services/add', 'AddService')->name('services.add');
    Route::get('/services/edit/{id}', 'EditService')->name('services.edit');
    Route::get('/services/details/{id}', 'ServiceDetails')->name('services.details');

    Route::group(['middleware' => ['demo_mode']], function () {
        Route::post('/services/store', 'StoreService')->name('services.store');
        Route::post('/services/update', 'UpdateService')->name('services.update');       
        Route::get('/admin/service/sort/{action}/{id}', 'Sort')->name('admin.service.sort'); 
        Route::post('/active/service/{id}', 'ActiveService')->name('services.active');
        Route::get('/services/delete/{id}', 'DeleteService')->name('services.delete');
    });
});

Route::controller(BlogCategoryController::class)->group(function(){
    Route::get('/admin/blog/category', 'BlogCategory')->name('admin.blog.category');
    Route::get('/add/blog/category', 'AddBlogCategory')->name('blog.category.add');
    Route::get('/edit/blog/category/{id}', 'EditBlogCategory')->name('blog.category.edit');
    
    Route::group(['middleware' => ['demo_mode']], function () {
        Route::post('/store/blog/category', 'StoreBlogCategory')->name('blog.category.store');
        Route::post('/update/blog/category/{id}', 'UpdateBlogCategory')->name('blog.category.update');
        Route::get('/delete/blog/category/{id}', 'DeleteBlogCategory')->name('blog.category.delete');
        Route::post('/active/blogcategory/{id}', 'ActiveBlogCategory')->name('blog.category.active');
        Route::get('/admin/blogcategory/sort/{action}/{id}', 'Sort')->name('admin.blogcategory.sort'); 
    });
});

Route::controller(BlogController::class)->group(function(){
    Route::get('/admin/blog', 'Blog')->name('admin.blog');
    Route::get('/admin/blog/search', 'BlogSearch')->name('admin.blog.search');
    Route::get('/blog/add', 'AddBlog')->name('blog.add');
    Route::get('/blog/edit/{id}', 'EditBlog')->name('blog.edit');
    Route::get('/blog/details/{id}', 'BlogDetails')->name('blog.details');
    Route::get('/blog/category/{id}', 'CategoryBlog')->name('category.post');
    Route::get('/blog', 'HomeBlog')->name('blog');

    Route::group(['middleware' => ['demo_mode']], function () {
        Route::post('/blog/store', 'StoreBlog')->name('blog.store');
        Route::post('/blog/update/', 'UpdateBlog')->name('blog.update');
        Route::get('/blog/delete/{id}', 'DeleteBlog')->name('blog.delete');
        Route::post('/active/blog/{id}', 'ActiveBlog')->name('blog.active');
    });
});

Route::controller(FooterController::class)->group(function(){
    Route::get('/admin/footer', 'FooterSetup')->name('footer');

    Route::group(['middleware' => ['demo_mode']], function () {
        Route::post('/update/footer/', 'UpdateFooter')->name('update.footer');
    });
});

Route::controller(PageBannerController::class)->group(function(){
    Route::get('/admin/pagebanner', 'PageBanner')->name('page.banner');
    
    Route::group(['middleware' => ['demo_mode']], function () {
        Route::post('/update/pagebanner/', 'UpdatePageBanner')->name('update.page.banner');
    });
});

Route::controller(ContactController::class)->group(function(){
    Route::get('/admin/contact/', 'AdminContact')->name('admin.contact');
    Route::get('/contact', 'Contact')->name('contact');
    Route::get('/contact/message', 'ContactMessage')->name('contact.message');
   
    Route::group(['middleware' => ['demo_mode']], function () {
        Route::post('/store/message', 'StoreMessage')->name('store.message');
        Route::get('/delete/message/{id}', 'DeleteMessage')->name('delete.message');
    });
});

require __DIR__.'/auth.php';