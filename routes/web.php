<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\SubscriberController;
use App\Http\Controllers\Admin\LoyaltyPointController;
use App\Http\Controllers\LoyaltyController;
use App\Http\Controllers\Admin\RewardController;
use App\Http\Controllers\Admin\RedemptionController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\AdminController;
use Illuminate\Support\Facades\Auth;

// -----------------------
// Public Frontend Routes
// -----------------------

Route::get('/', function() {
    $articles = App\Models\Article::latest()->take(3)->get();
    return view('welcome', compact('articles'));
})->name('welcome');

Route::get('/about', function () {
    return view('about');
})->name('about');

Route::get('/services', function () {
    return view('services');
})->name('services');

Route::get('/contact', function () {
    return view('contact');
})->name('contact');

Route::get('/blog', [ArticleController::class, 'index'])->name('blog');
Route::get('/blog/{id}', [ArticleController::class, 'show'])->name('blog.show');


// -----------------------
// Authenticated User Routes
// -----------------------
Route::middleware(['auth'])->group(function () {

    // Profile
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Loyalty dashboard
    Route::get('/loyalty', [LoyaltyController::class, 'index'])->name('loyalty.index');


    Route::post('/loyalty/add', [LoyaltyController::class, 'addPoints'])->name('loyalty.add');

    // Redeem
    Route::get('/redeem/{id}', [RedemptionController::class, 'redeem'])->name('redeem');
    Route::get('/redeem-history', [RedemptionController::class, 'history'])->name('redeem.history');

    // Rewards
    Route::get('/rewards', [RewardController::class, 'index'])->name('rewards.index');
    Route::get('/rewards/{reward}', [RewardController::class, 'show'])->name('rewards.show');
});



// -----------------------
// Admin Routes
// -----------------------
Route::prefix('admin')->middleware(['auth', 'admin'])->name('admin.')->group(function () {

    // Dashboard
    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('dashboard');

    // Users Management
    Route::resource('users', UserController::class);

    // Rewards Management
    Route::resource('rewards', RewardController::class);

    // Redemptions Management
    Route::resource('redemptions', RedemptionController::class);

    // Approve / Reject Redemption
    Route::post('redemptions/{id}/approve', [AdminController::class, 'approve'])->name('redemptions.approve');
    Route::post('redemptions/{id}/reject', [AdminController::class, 'reject'])->name('redemptions.reject');

    // Articles Management
    Route::resource('articles', ArticleController::class);

    // Subscribers Management
    // Route::resource('subscribers', SubscriberController::class);

    // Loyalty Points Management
    Route::resource('loyalty-points', LoyaltyPointController::class);
});

Route::prefix('admin')->middleware(['auth', 'admin'])->group(function () {
    Route::get('users', [App\Http\Controllers\Admin\UserController::class, 'index'])->name('admin.users.index');
    Route::get('users/{user}/edit', [App\Http\Controllers\Admin\UserController::class, 'edit'])->name('admin.users.edit');
    Route::put('users/{user}', [App\Http\Controllers\Admin\UserController::class, 'update'])->name('admin.users.update');
    Route::delete('users/{user}', [App\Http\Controllers\Admin\UserController::class, 'destroy'])->name('admin.users.destroy');
});


require __DIR__.'/auth.php';
