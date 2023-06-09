<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\SubCategoryController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\HomeController;
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


Route::controller(HomeController::class)->group(function (){
    Route::get('/', 'Index')->name('Home');
});

Route::controller(ClientController::class)->group(function (){
    Route::get('/allproduct', 'CategoryPage')->name('category');
    Route::get('/product-details/{id}/{slug}', 'SingleProduct')->name('singleproduct');
    Route::get('/new-release', 'NewRelease')->name('newrelease');
    Route::get('/men/all-product','MenProduct')->name('men-product');
    Route::get('/men/clothing','MenClothing')->name('men-clothing');
    Route::get('/men/shoes','MenShoes')->name('men-shoes');
    Route::get('/men/accessories','MenAccessories')->name('men-accessories');
    Route::get('/women/all-product','WomenProduct')->name('women-product');
    Route::get('/women/clothing','WomenClothing')->name('women-clothing');
    Route::get('/women/shoes','WomenShoes')->name('women-shoes');
    Route::get('/women/accessories','WomenAccessories')->name('women-accessories');
    Route::get('/kid/all-product','KidProduct')->name('kid-product');
    Route::get('/kid/clothing','KidClothing')->name('kid-clothing');
    Route::get('/kid/shoes','KidShoes')->name('kdi-shoes');
    Route::get('/kid/accessories','KidAccessories')->name('kid-accessories');

});

Route::middleware(['auth', 'role:user|admin',])->group(function (){
    Route::controller(ClientController::class)->group(function (){
        Route::get('/add-to-cart', 'AddToCart')->name('addtocart');
        Route::post('/add-product-to-cart', 'AddProductToCart')->name('addproducttocart');
        Route::get('/checkout', 'Checkout')->name('checkout');
        Route::get('/shipping-address', 'Shipping')->name('shipping');
        Route::post('/add-shipping-address', 'AddShippingAddress')->name('addshippingaddress');
        Route::post('/place-order', 'PlaceOrder')->name('placeorder');

        Route::get('/user-profile', 'UserProfile')->name('userprofile');
        Route::get('/todays-deal', 'TodayDeal')->name('todaydeal');
        Route::get('/custom-service', 'CustomerService')->name('customservice');
        Route::get('/user-profile/pending-orders','PendingOrders')->name('pendingorders');
        Route::get('/user-profile/history','History')->name('history');
        Route::get('/remove-cart-item/{id}', 'RemoveCartItem')->name('removecartitem');
        Route::post('/logout','Logout')->name('logout');

    });

});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'role:user'])->name('dashboard');

Route::middleware(['auth','role:admin'])->group(function (){
    Route::controller(DashboardController::class)->group(function (){
        Route::get('/admin/dashboard', 'Index')->name('admindashboard');
    });
    Route::controller(CategoryController::class)->group(function (){
        Route::get('/admin/all-category', 'Index')->name('allcategory');
        Route::get('/admin/add-category', 'AddCategory')->name('addcategory');
        Route::post('/admin/store-category','StoreCategory')->name('storecategory');
        Route::get('/admin/edit-category/{id}', 'EditCategory')->name('editcategory');
        Route::get('/admin/delete-category/{id}', 'DeleteCategory')->name('deletecategory');
        Route::post('/admin/update-category','UpdateCategory')->name('updatecategory');
    });
    Route::controller(SubCategoryController::class)->group(function (){
        Route::get('/admin/all-subcategory', 'Index')->name('allsubcategory');
        Route::get('/admin/add-subcategory', 'AddSubCategory')->name('addsubcategory');
        Route::post('/admin/store-subcategory','StoreSubCategory')->name('storesubcategory');
        Route::get('/admin/edit-subcategory/{id}', 'EditSubCat')->name('editsubcat');
        Route::get('/admin/delete-subcategory/{id}', 'DeleteSubCat')->name('deletesubcat');
        Route::post('/admin/update-subcategory','UpdateSubCat')->name('updatesubcat');

    });
    Route::controller(ProductController::class)->group(function (){
        Route::get('/admin/all-products', 'Index')->name('allproducts');
        Route::get('/admin/add-product', 'AddProduct')->name('addproduct');
        Route::post('/admin/store-product','StoreProduct')->name('storeproduct');
        Route::get('/admin/edit-product-img/{id}', 'EditProductImg')->name('editproductimg');
        Route::post('/admin/update-product-img','UpdateProductImg')->name('updateproductimg');
        Route::get('/admin/edit-product/{id}','EditProduct')->name('editproduct');
        Route::post('/admin/update-product','UpdateProduct')->name('updateproduct');
        Route::get('/admin/delete-product{id}x', 'DeleteProduct')->name('deleteproduct');

    });
    Route::controller(OrderController::class)->group(function (){
        Route::get('/admin/pending-order', 'Index')->name('pendingorder');
        Route::get('/admin/completed-order', 'Completed')->name('completed');
        Route::get('/admin/approve-order/{id}', 'ApproveOrder')->name('approve-order');
    });
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
