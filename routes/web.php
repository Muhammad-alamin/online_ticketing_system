<?php

use App\Http\Controllers\ProfileController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

Route::middleware('auth')->group(function () {
    Route::get('admin/dashboard', [App\Http\Controllers\Admin\DashboardController::class,'index'])->name('admin.dashboard');

    //admin Profile Information
    Route::get('admin/view-profile',[App\Http\Controllers\Admin\DashboardController::class,'viewProfile'])->name('admin.view.profile');
    Route::get('admin/view-profile-image',[App\Http\Controllers\Admin\DashboardController::class,'viewProfileImage'])->name('profile.image.upload');
    Route::get('admin/profile-info/edit/{id}',[App\Http\Controllers\Admin\DashboardController::class,'editProInfo'])->name('profile.information.edit');
    Route::put('admin/profile-info/update/{id}',[App\Http\Controllers\Admin\DashboardController::class,'updateProInfo'])->name('profile.information.update');
    Route::put('admin/profile-image/store',[App\Http\Controllers\Admin\DashboardController::class,'proImageStore'])->name('profile.image.store');

    //Cache clear
    Route::post('admin/cache-clear',[App\Http\Controllers\Admin\CacheController::class,'cacheclear'])->name('admin.cacheClear');

    //category

        Route::get('admin/category/create',[App\Http\Controllers\Admin\CategoryController::class,'create'])->name('admin.category.create');
        Route::get('admin/category/index',[App\Http\Controllers\Admin\CategoryController::class,'index'])->name('admin.category.index');
        Route::post('admin/category/store',[App\Http\Controllers\Admin\CategoryController::class,'store'])->name('admin.category.store');
        Route::get('admin/category/edit/{id}',[App\Http\Controllers\Admin\CategoryController::class,'edit'])->name('admin.category.edit');
        Route::post('admin/category/update/{id}',[App\Http\Controllers\Admin\CategoryController::class,'update'])->name('admin.category.update');
        Route::get('admin/category/delete/{id}',[App\Http\Controllers\Admin\CategoryController::class,'delete'])->name('admin.category.delete');

        //parent-sub-Category
        Route::get('create/admin/parent-sub-category/',[App\Http\Controllers\Admin\ParentSubcategoryController::class,'view'])->name('admin.parent-sub-category');
        Route::get('admin/parent-sub-category/list',[App\Http\Controllers\Admin\ParentSubcategoryController::class,'index'])->name('admin.parent-sub-category.list');
        Route::post('store/admin/parent-sub-category/',[App\Http\Controllers\Admin\ParentSubcategoryController::class,'store'])->name('admin.parent-sub-category.store');
        Route::get('edit/admin/parent-sub-category/{id}',[App\Http\Controllers\Admin\ParentSubcategoryController::class,'edit'])->name('admin.parent-sub-category.edit');
        Route::post('update/admin/parent-sub-category/{id}',[App\Http\Controllers\Admin\ParentSubcategoryController::class,'update'])->name('admin.parent-sub-category.update');
        Route::get('delete/admin/parent-sub-category/{id}',[App\Http\Controllers\Admin\ParentSubcategoryController::class,'delete'])->name('admin.parent-sub-category.delete');

                //child-sub-Category
                Route::get('create/admin/child-sub-category/',[App\Http\Controllers\Admin\ChildSubcategoryController::class,'view'])->name('admin.child-sub-category');
                Route::get('admin/child-sub-category/list',[App\Http\Controllers\Admin\ChildSubcategoryController::class,'index'])->name('admin.child-sub-category.list');
                Route::post('store/admin/child-sub-category/',[App\Http\Controllers\Admin\ChildSubcategoryController::class,'store'])->name('admin.child-sub-category.store');
                Route::get('edit/admin/child-sub-category/{id}',[App\Http\Controllers\Admin\ChildSubcategoryController::class,'edit'])->name('admin.child-sub-category.edit');
                Route::post('update/admin/child-sub-category/{id}',[App\Http\Controllers\Admin\ChildSubcategoryController::class,'update'])->name('admin.child-sub-category.update');
                Route::get('delete/admin/child-sub-category/{id}',[App\Http\Controllers\Admin\ChildSubcategoryController::class,'delete'])->name('admin.child-sub-category.delete');

            //ajax parent category data fetch
            Route::get('/get/parent_sub_cat-list/{id}',[App\Http\Controllers\Admin\ChildSubcategoryController::class,'getSubCat']);

            //ajax child category data fetch
            Route::get('/get/child_sub_cat-list/{id}',[App\Http\Controllers\Admin\ChildSubcategoryController::class,'getChildSubCat']);


        //events

        Route::get('admin/event/create',[App\Http\Controllers\Admin\EventController::class,'create'])->name('admin.event.create');
        Route::get('admin/event/index',[App\Http\Controllers\Admin\EventController::class,'index'])->name('admin.event.index');
        Route::post('admin/event/store',[App\Http\Controllers\Admin\EventController::class,'store'])->name('admin.event.store');
        Route::get('admin/event/edit/{id}',[App\Http\Controllers\Admin\EventController::class,'edit'])->name('admin.event.edit');
        Route::get('/admin/duplicate/event/{id}',[App\Http\Controllers\Admin\EventController::class,'replicate'])->name('admin.replicate.event');
        Route::post('admin/event/update/{id}',[App\Http\Controllers\Admin\EventController::class,'update'])->name('admin.event.update');
        Route::get('admin/event/delete/{id}',[App\Http\Controllers\Admin\EventController::class,'delete'])->name('admin.event.delete');

        //section
        Route::match(['get','post'], '/admin/add/section/{id}',[App\Http\Controllers\Admin\SectionController::class,'addSection'])->name('admin.add.section');
        Route::get('/admin/delete/section/{id}',[App\Http\Controllers\Admin\SectionController::class,'deleteSection'])->name('admin.delete.section');
        Route::get('/admin/edit/section/{id}',[App\Http\Controllers\Admin\SectionController::class,'editSection'])->name('admin.edit.section');
        Route::put('/admin/update/section/{id}',[App\Http\Controllers\Admin\SectionController::class,'update'])->name('admin.update.section');

        //block
        Route::match(['get','post'], '/admin/add/block/{id}',[App\Http\Controllers\Admin\BlockController::class,'addBlock'])->name('admin.add.block');
        Route::get('/admin/delete/block/{id}',[App\Http\Controllers\Admin\BlockController::class,'deleteBlock'])->name('admin.delete.block');
        Route::get('/admin/edit/block/{id}',[App\Http\Controllers\Admin\BlockController::class,'editBlock'])->name('admin.edit.block');
        Route::put('/admin/update/block/{id}',[App\Http\Controllers\Admin\BlockController::class,'update'])->name('admin.update.block');



});


//seller route

Route::middleware('auth')->group(function () {
    Route::get('sell/ticket',[App\Http\Controllers\Seller\TicketController::class,'index'])->name('sellTicket');
    Route::get("/sell/search",[App\Http\Controllers\Seller\TicketController::class,'search']);
    Route::get("/add/ticket/{id}",[App\Http\Controllers\Seller\TicketController::class,'addTicket'])->name('addTicket');

    Route::post("ticket/store",[App\Http\Controllers\Seller\TicketController::class,'store'])->name('ticket.store');

    //ajax child category data fetch
    Route::get('/seller/get/child_sub_cat-list/{id}',[App\Http\Controllers\Seller\TicketController::class,'getChildSubCat']);

});

//front route
Route::get('/',[App\Http\Controllers\Front\HomeController::class,'index'])->name('Home');

//search ticket & ticketlist
Route::get("/ticket/search",[App\Http\Controllers\Front\TicketController::class,'search']);
Route::get("/list/ticket/{id}",[App\Http\Controllers\Front\TicketController::class,'ticketList'])->name('listTicket');
