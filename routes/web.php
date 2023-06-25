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

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

// Route::middleware('auth')->group(function () {
//     Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//     Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//     Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
// });

require __DIR__.'/auth.php';

Route::middleware(['auth', 'admin'])->group(function () {
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



        //Venue

        Route::get('admin/venue/create',[App\Http\Controllers\Admin\VenueController::class,'create'])->name('admin.venue.create');
        Route::get('admin/venue/index',[App\Http\Controllers\Admin\VenueController::class,'index'])->name('admin.venue.index');
        Route::post('admin/venue/store',[App\Http\Controllers\Admin\VenueController::class,'store'])->name('admin.venue.store');
        Route::get('admin/venue/edit/{id}',[App\Http\Controllers\Admin\VenueController::class,'edit'])->name('admin.venue.edit');
        Route::post('admin/venue/update/{id}',[App\Http\Controllers\Admin\VenueController::class,'update'])->name('admin.venue.update');
        Route::get('admin/venue/delete/{id}',[App\Http\Controllers\Admin\VenueController::class,'delete'])->name('admin.venue.delete');


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

        //admin commission
        Route::get('admin/commission/list',[App\Http\Controllers\Admin\CommissionController::class,'index'])->name('admin.commission.listing');
        Route::post('admin/commission/store',[App\Http\Controllers\Admin\CommissionController::class,'store'])->name('admin.commission.store');
        Route::post('admin/commission/update/{id}',[App\Http\Controllers\Admin\CommissionController::class,'update'])->name('admin.commission.update');

        //Withdraw
        Route::get('admin/withdraw',[App\Http\Controllers\Admin\WithdrawController::class,'index'])->name('withdraw.index');
        Route::get('admin/payout/{id}',[App\Http\Controllers\Admin\WithdrawController::class,'pay'])->name('admin.payout');
        Route::post('admin/payout/store',[App\Http\Controllers\Admin\WithdrawController::class,'store'])->name('admin.withdraw.store');
        Route::get('admin/successful-payment/list',[App\Http\Controllers\Admin\WithdrawController::class,'successfulPaymentList'])->name('admin.successfulPayment.list');
        Route::get('admin/successful-payment/details/{id}',[App\Http\Controllers\Admin\WithdrawController::class,'successfulPaymentDetails'])->name('admin.successfulPayment.details');


    //ticket listing
    Route::get('admin/ticket-listing/list',[App\Http\Controllers\Admin\ListingController::class,'index'])->name('admin.ticket.listing');
    Route::get('admin/ticket-listing/details/{id}',[App\Http\Controllers\Admin\ListingController::class,'details'])->name('admin.listing.details');
    Route::get('admin/ticket-listing/edit/{id}',[App\Http\Controllers\Admin\ListingController::class,'edit'])->name('admin.listing.edit');
    Route::post('admin/ticket-listing/update/{id}',[App\Http\Controllers\Admin\ListingController::class,'update'])->name('admin.listing.update');
    Route::get('admin/ticket-listing/delete/{id}',[App\Http\Controllers\Admin\ListingController::class,'delete'])->name('admin.listing.delete');

        //orders
        Route::get('admin/order/list',[App\Http\Controllers\Admin\OrderController::class,'index'])->name('admin.order.listing');
        Route::get('admin/order/details/{id}',[App\Http\Controllers\Admin\OrderController::class,'details'])->name('admin.order.details');
        Route::get('admin/order/edit/{id}',[App\Http\Controllers\Admin\OrderController::class,'edit'])->name('admin.order.edit');
        Route::post('admin/order/update/{id}',[App\Http\Controllers\Admin\OrderController::class,'update'])->name('admin.order.update');
        Route::get('admin/order/delete/{id}',[App\Http\Controllers\Admin\OrderController::class,'delete'])->name('admin.order.delete');

        //users
        Route::get('admin/user/list',[App\Http\Controllers\Admin\UserController::class,'index'])->name('admin.user.listing');
        Route::get('admin/user/details/{id}',[App\Http\Controllers\Admin\UserController::class,'details'])->name('admin.user.details');

});


//seller route

Route::middleware('auth')->group(function () {
    Route::get('sell/ticket',[App\Http\Controllers\Seller\TicketController::class,'index'])->name('sellTicket');
    Route::get("/sell/search",[App\Http\Controllers\Seller\TicketController::class,'search']);
    Route::get("/add/ticket/{id}",[App\Http\Controllers\Seller\TicketController::class,'addTicket'])->name('addTicket');

    Route::post("ticket/store",[App\Http\Controllers\Seller\TicketController::class,'store'])->name('ticket.store');

    //ajax child category data fetch
    Route::get('/seller/get/child_sub_cat-list/{id}',[App\Http\Controllers\Seller\TicketController::class,'getChildSubCat']);

    //orders route
    Route::get('sellers/orders',[App\Http\Controllers\Seller\OrderController::class,'index'])->name('seller.orders');
    Route::get('sellers/orders/details/{id}',[App\Http\Controllers\Seller\OrderController::class,'details'])->name('seller.order.details');
    Route::get('/download-images/{id}',[App\Http\Controllers\Seller\OrderController::class,'downloadImages'])->name('download.images');

        //sales route
        Route::get('sellers/sales',[App\Http\Controllers\Seller\SalesController::class,'index'])->name('seller.sales');
        Route::get('sellers/sales/details/{id}',[App\Http\Controllers\Seller\SalesController::class,'details'])->name('seller.sales.details');

            //Account route
            Route::get('user/details',[App\Http\Controllers\Seller\UserController::class,'details'])->name('user.details');
            Route::post('user/details/{id}',[App\Http\Controllers\Seller\UserController::class,'update'])->name('user.details.update');

    //ticket listing
    Route::get('sellers/ticket-listing/list',[App\Http\Controllers\Seller\ListingController::class,'index'])->name('seller.ticket.listing');
    Route::get('sellers/ticket-listing/details/{id}',[App\Http\Controllers\Seller\ListingController::class,'details'])->name('seller.listing.details');
    Route::get('sellers/ticket-listing/edit/{id}',[App\Http\Controllers\Seller\ListingController::class,'edit'])->name('seller.listing.edit');
    Route::post('sellers/ticket-listing/update/{id}',[App\Http\Controllers\Seller\ListingController::class,'update'])->name('seller.listing.update');
    Route::get('sellers/ticket-listing/delete/{id}',[App\Http\Controllers\Seller\ListingController::class,'delete'])->name('seller.listing.delete');


    //withdraw
    Route::get('pay-out/info',[App\Http\Controllers\Seller\WithdrawController::class,'info'])->name('seller.payout.info');
    Route::post('bank_info/store',[App\Http\Controllers\Seller\WithdrawController::class,'store'])->name('bank_info.store');
    Route::get('bank_info/edit/{id}',[App\Http\Controllers\Seller\WithdrawController::class,'edit'])->name('bank_info.edit');
    Route::post('bank_info/update/{id}',[App\Http\Controllers\Seller\WithdrawController::class,'update'])->name('bank_info.update');
    Route::get('withdraw/create',[App\Http\Controllers\Seller\WithdrawController::class,'withdrawCreate'])->name('seller.withdrawl.create');
    Route::post('withdraw/store',[App\Http\Controllers\Seller\WithdrawController::class,'withdrawRequestStore'])->name('withdraw.request.store');
    Route::get('withdraw',[App\Http\Controllers\Seller\WithdrawController::class,'withdrawIndex'])->name('seller.withdrawl.index');
    Route::get('withdraw/edit/{id}',[App\Http\Controllers\Seller\WithdrawController::class,'withdrawEdit'])->name('seller.withdrawl.edit');
    Route::post('withdraw/update/{id}',[App\Http\Controllers\Seller\WithdrawController::class,'withdrawUpdate'])->name('seller.withdrawl.update');
    Route::get('withdraw/details/{id}',[App\Http\Controllers\Seller\WithdrawController::class,'withdrawDetails'])->name('seller.withdrawl.details');

});

//front route
Route::get('/',[App\Http\Controllers\Front\HomeController::class,'index'])->name('Home');

//search ticket & ticketlist
Route::get("/ticket/search",[App\Http\Controllers\Front\TicketController::class,'search']);
Route::get("/list/ticket/{id}",[App\Http\Controllers\Front\TicketController::class,'ticketList'])->name('listTicket');

// //mouse hover event
Route::get('/api/images/{imageId}',[App\Http\Controllers\Front\TicketController::class,'hover']);
Route::get('/event/images/{imageId}',[App\Http\Controllers\Front\TicketController::class,'section_hover']);

//order-details
Route::get("/order/details/{id}",[App\Http\Controllers\Front\OrderController::class,'orderDetails'])->name('order_details');

//order-review
Route::get("/order/review/{id}",[App\Http\Controllers\Front\OrderController::class,'orderReview'])->name('order_review');

//checkout
Route::post("checkout",[App\Http\Controllers\Front\OrderController::class,'checkout'])->name('checkout');

//success route
Route::get('success/{order}',[App\Http\Controllers\Front\OrderController::class,'success'])->name('success');
Route::get('cancel',[App\Http\Controllers\Front\OrderController::class,'cancel'])->name('cancel');


