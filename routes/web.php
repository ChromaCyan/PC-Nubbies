<?php
use App\Http\Controllers\Admin\AdminAuthController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\AdminBarController;
use App\Http\Controllers\Admin\AdminDashboardController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\BrandController;
use App\Http\Controllers\Admin\UserManagementController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\User\CartController;
use App\Http\Controllers\User\CheckoutController;
use App\Http\Controllers\User\DashboardController;
use App\Http\Controllers\User\ProductController as UserProductController;
use App\Http\Controllers\User\ProductListController;
use App\Http\Controllers\User\ProductViewController;
use App\Http\Controllers\User\UserController;
use App\Http\Controllers\User\GuideController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

//GROUP 7 I-Tech
//This basically what i've learned while watching that guy's series - Josh Brian

//User Routes (When logged in, goes to dashboard/Options for profile from default laravel breeze)
Route::get('/', [UserController::class,'index'])->name('home');
Route::get('/dashboard',[DashboardController::class,'index'])->middleware(['auth', 'verified'])->name('dashboard');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

//Payment Routes (Click checkout on Cart/Fills up information and paid on stripe website/Cancel order)
    Route::prefix('checkout')->controller(CheckoutController::class)->group((function()  {
        Route::post('order','store')->name('checkout.store');
        Route::get('success','success')->name('checkout.success');
        Route::get('cancel','cancel')->name('checkout.cancel');
    }));
  
});

//Add to Cart (Display Cart/Store on Cart/Cart updates when you do something on quantity/Remove from cart)
Route::prefix('cart')->controller(CartController::class)->group(function () {
    Route::get('view','view')->name('cart.view');
    Route::post('store/{product}','store')->name('cart.store');
    Route::patch('update/{product}','update')->name('cart.update');
    Route::delete('delete/{product}','delete')->name('cart.delete');
});

//Product filter (Does work but not on admin) (Search the Product by Price range/Brand/Category)
Route::prefix('products')->controller(ProductListController::class)->group(function ()  {
    Route::get('/','index')->name('products.index');
    Route::get('/{id}', [ProductViewController::class, 'show'])->name('products.show');

    
});

//Admin Routes (Show Login Form/Login/Logout)
Route::group(['prefix' => 'admin'], function () {
    Route::get('login', [AdminAuthController::class, 'showLoginForm'])->name('admin.login');
    Route::post('login', [AdminAuthController::class, 'login'])->name('admin.login.post');
    Route::post('logout', [AdminAuthController::class, 'logout'])->name('logout');
});


Route::middleware(['auth', 'admin'])->prefix('admin')->group(function () {
    Route::get('/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');

    //Admin Sales Report BarChart testing
    Route::get('/sales', [AdminBarController::class, 'index'])->name('admin.barchart');

    //Admin Order List
    //Route::get('/orders' [AdminOrderController::class, 'index'])->name('admin.orders');

    // Category Routes
    Route::get('/categories', [CategoryController::class, 'index'])->name('admin.categories.index');
    Route::post('/categories/store', [CategoryController::class, 'store'])->name('admin.categories.store');
    Route::put('/categories/update/{id}', [CategoryController::class, 'update'])->name('admin.categories.update');
    Route::delete('/categories/destroy/{id}', [CategoryController::class, 'destroy'])->name('admin.categories.destroy');

    // Brand Routes
    Route::get('/brands', [BrandController::class, 'index'])->name('admin.brands.index');
    Route::post('/brands/store', [BrandController::class, 'store'])->name('admin.brands.store');
    Route::put('/brands/update/{id}', [BrandController::class, 'update'])->name('admin.brands.update');
    Route::delete('/brands/destroy/{id}', [BrandController::class, 'destroy'])->name('admin.brands.destroy');

    
    //User Routes (Manage User/Add/Delete/Edit/Check Profile//Search user)
    Route::get('/users', [UserManagementController::class, 'index'])->name('admin.users.index');
    Route::get('/users/create', [UserManagementController::class, 'create'])->name('admin.users.create');
    Route::post('/users/store', [UserManagementController::class, 'store'])->name('users.store');
    Route::get('/admin/users/search', [UserManagementController::class, 'search'])->name('admin.users.search');
    Route::get('/users/{user}/edit', [UserManagementController::class, 'edit'])->name('admin.users.edit');
    Route::put('/users/{user}/update', [UserManagementController::class, 'update'])->name('admin.users.update');
    Route::delete('/users/destroy/{id}', [UserManagementController::class, 'destroy'])->name('admin.users.destroy');

 //Products Routes (Store Products from admin/Update/Add image;Delete image/Delete Product)
    Route::get('/products', [ProductController::class, 'index'])->name('admin.products.index');
    Route::post('/products/store',[ProductController::class,'store'])->name('admin.products.store');
    Route::get('/products/search', [ProductController::class, 'search'])->name('admin.products.search');
    Route::put('/products/update/{id}', [ProductController::class, 'update'])->name('admin.products.update');
    Route::delete('/products/image/{id}',[ProductController::class,'deleteImage'])->name('admin.products.image.delete');
    Route::delete('/products/destroy/{id}', [ProductController::class, 'destroy'])->name('admin.products.destroy');
});




//Guide Routes
Route::get('/guides', [GuideController::class, 'index'])->name('guide');
Route::get('/casual', [GuideController::class, 'casual'])->name('casual');
Route::get('/gamer', [GuideController::class, 'gamer'])->name('gamer');
Route::get('/work', [GuideController::class, 'work'])->name('work');

require __DIR__ . '/auth.php';