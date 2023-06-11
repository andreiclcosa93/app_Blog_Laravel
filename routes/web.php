<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Home\HomeSliderController;
use App\Http\Controllers\Home\AboutController;
use App\Http\Controllers\Home\PortfolioController;
use App\Http\Controllers\Home\BlogCategoryController;
use App\Http\Controllers\Home\BlogController;
use App\Http\Controllers\Home\FooterController;
use App\Http\Controllers\Home\ContactController;
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

Route::get('/', function () {
    return view('frontend.index');
});


Route::get('/dashboard', function () {
    return view('admin.index');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


// admin all route
Route::middleware('auth', 'verified')->group(function () {
    // BUTTON LOGOUT
    Route::get('/admin/logout', [AdminController::class, 'destroy'])->name('admin.logout');

    // button profile from top-bar
    Route::get('/admin/profile', [AdminController::class, 'Profile'])->name('admin.profile');

    //edit profile
    Route::get('/edit/profile', [AdminController::class, 'EditProfile'])->name('edit.profile');


    //update image from profile edit
    Route::post('/store/profile', [AdminController::class, 'StoreProfile'])->name('store.profile');

    //show view change password
    Route::get('/change/password', [AdminController::class, 'ChangePassword'])->name('change.password');

    //update password
    Route::post('/update/password', [AdminController::class, 'UpdatePassword'])->name('update.password');
});


//HOME SLIDER ALL ROUTE
Route::middleware('auth', 'verified')->group(function () {

    // home slide header 1
    Route::get('/home/slide', [HomeSliderController::class, 'HomeSlider'])->name('home.slide');

    // UPDATE SLIDE
    Route::post('/update/slide', [HomeSliderController::class, 'UpdateSlider'])->name('update.slider');

});


//ABOUT PAGE
Route::controller(AboutController::class)->group(function () {

    //about page all routs
    Route::get('/about/page', 'AboutPage')->name('about.page');

    //update date from abput
    Route::post('/update/about', 'UpdateAbout')->name('update.about');

     //about from topbar
     Route::get('/about', 'HomeAbout')->name('home.about');

    //  VIEW SECTION MULTI-IMAGE
      Route::get('/about/multi/image', 'AboutMultiImage')->name('about.multi.image');

       //function upload MULTI-IMAGE
       Route::post('/store/multi/image', 'StoreMultiImage')->name('store.multi.image');

    //  ALL MULTI-IMAGE
    Route::get('/all/multi/image', 'AllMultiImage')->name('all.multi.image');


     // show view edit MULTI-IMAGE
     Route::get('/edit/multi/image/{id}', 'EditMultiImage')->name('edit.multi.image');


      // UPDATE MULTI-IMAGE
      Route::post('/update/multi/image', 'UpdateMultiImage')->name('update.multi.image');


       // delete MULTI-IMAGE
       Route::get('/delete/multi/image/{id}', 'DeleteMultiImage')->name('delete.multi.image');

});


//portfolio PAGE
Route::controller(PortfolioController::class)->group(function () {

    // navbar access
    Route::get('/portfolio', 'HomePortfolio')->name('home.portfolio');

    // view blade portfolio
    Route::get('/all/portfolio', 'AllPortfolio')->name('all.portfolio');

    // view blade add portfolio
    Route::get('/add/portfolio', 'AddPortfolio')->name('add.portfolio');

    // insert data portfolio
    Route::post('/store/portfolio', 'StorePortfolio')->name('store.portfolio');

    // show view portf edit
    Route::get('/edit/portfolio/{id}', 'EditPortfolio')->name('edit.portfolio');

    // update portf
    Route::post('/update/portfolio', 'UpdatePortfolio')->name('update.portfolio');

    // delete portf
    Route::get('/delete/portfolio/{id}', 'DeletePortfolio')->name('delete.portfolio');

     // h4 href
     Route::get('/portfolio/details/{id}', 'PortfolioDetails')->name('portfolio.details');

});


//blog-category
Route::controller(BlogCategoryController::class)->group(function () {

    // view blag main
    Route::get('/all/blog/category', 'AllBlogCategory')->name('all.blog.category');

    // view add blog
    Route::get('/add/blog/category', 'AddBlogCategory')->name('add.blog.category');

    // insert data blog cat
    Route::post('/store/blog/category', 'StoreBlogCategory')->name('store.blog.category');

     // view edit  blog categ
     Route::get('/edit/blog/category/{id}', 'EditBlogCategory')->name('edit.blog.category');

     // update  blog categ
    Route::post('/update/blog/category/{id}', 'UpdateBlogCategory')->name('update.blog.category');

    // delete blog categ
    Route::get('/delete/blog/category/{id}', 'DeleteBlogCategory')->name('delete.blog.category');

});


//blog
Route::controller(BlogController::class)->group(function () {

    // view blag main
    Route::get('/all/blog', 'AllBlog')->name('all.blog');

      // view add blag
      Route::get('/add/blog', 'AddBlog')->name('add.blog');

    // insert blog
    Route::post('/store/blog', 'StoreBlog')->name('store.blog');

      // view blade edit blog
      Route::get('/edit/blog/{id}', 'EditBlog')->name('edit.blog');

       // update  blog
    Route::post('/update/blog', 'UpdateBlog')->name('update.blog');

    // delete blog categ
    Route::get('/delete/blog/{id}', 'DeleteBlog')->name('delete.blog');

    // blog details
    Route::get('/blog/details/{id}', 'BlogDetails')->name('blog.details');

     // blog category
     Route::get('/category/blog/{id}', 'CategoryBlog')->name('category.blog');

       //blog nav bar front
       Route::get('/blog', 'HomeBlog')->name('home.blog');

});


//footer
Route::controller(FooterController::class)->group(function () {

      // view footer
      Route::get('/footer/setup', 'FooterSetup')->name('footer.setup');

       // update footer
       Route::post('/update/footer', 'UpdateFooter')->name('update.footer');

});


//contact
Route::controller(ContactController::class)->group(function () {

    // view contact - frontend
    Route::get('/contact', 'Contact')->name('contact.me');

    // send message - contact
    Route::post('/store/message', 'StoreMessage')->name('store.message');

     // view contact - admin
     Route::get('/contact/message', 'ContactMessage')->name('contact.message');

     // delete contact - admin
     Route::get('/delete/message/{id}', 'DeleteMessage')->name('delete.message');

});

require __DIR__.'/auth.php';
