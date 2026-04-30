
<?php

use App\Http\Controllers\Admin\SocialLinkController;
use App\Http\Controllers\ProfileController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;



// Main site pages
Route::get('/', function () {
    return Inertia::render('Site/Home');
})->name('home');
Route::get('/about', function () {
    return Inertia::render('Site/AboutUs');
})->name('about');
Route::get('/human-resources', function () {
    return Inertia::render('Site/HumanResources');
})->name('human-resources');
Route::get('/programmes', function () {
    return Inertia::render('Site/Programmes');
})->name('programmes');
Route::get('/publication', function () {
    return Inertia::render('Site/Publication');
})->name('publication');
Route::get('/notice-board', function () {
    return Inertia::render('Site/NoticeBoard');
})->name('notice-board');
Route::get('/gallery', function () {
    return Inertia::render('Site/Gallery');
})->name('gallery');
Route::get('/contact', function () {
    return Inertia::render('Site/Contact');
})->name('contact');
Route::get('/events-and-news', function () {
    return Inertia::render('Site/EventsAndNews');
})->name('events-and-news');

// Homepage section pages (Vue only)
Route::get('/latest-news', function () {
    return Inertia::render('LatestNews');
})->name('latest-news');
Route::get('/success-stories', function () {
    return Inertia::render('SuccessStories');
})->name('success-stories');
Route::get('/about-us-section', function () {
    return Inertia::render('AboutUsSection');
})->name('about-us-section');
Route::get('/important-links', function () {
    return Inertia::render('ImportantLinksPage');
})->name('important-links');
Route::get('/contact-info', function () {
    return Inertia::render('ContactInfoPage');
})->name('contact-info');

Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Admin: Social Links management
    Route::prefix('admin')->name('admin.')->group(function () {
        Route::resource('social-links', SocialLinkController::class);
        // Admin: Dashboard
        Route::get('dashboard', function () {
            return Inertia::render('Admin/Dashboard');
        })->name('dashboard');
        // Admin: Users
        Route::get('users', function () {
            return Inertia::render('Admin/Users');
        })->name('users');
        // Admin: Profile
        Route::get('profile', function () {
            return Inertia::render('Admin/Profile');
        })->name('profile');
        // Admin: Roles
        Route::get('roles', function () {
            return Inertia::render('Admin/Roles');
        })->name('roles');
        // Admin: Settings
        Route::get('settings', [\App\Http\Controllers\Admin\SettingsController::class, 'index'])->name('settings');
        // Admin: Activity Logs
        Route::get('logs', function () {
            return Inertia::render('Admin/Logs');
        })->name('logs');
        // Admin: Support
        Route::get('support', function () {
            return Inertia::render('Admin/Support');
        })->name('support');
    });
});

require __DIR__.'/auth.php';
