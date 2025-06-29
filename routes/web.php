<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\BlogCategoryController;
use App\Http\Controllers\CampaignController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\MetricController;
use App\Http\Controllers\PartnerController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SliderController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\SocialController;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\VolunteerController;
use App\Models\Blog;
use App\Models\BlogCategory;
use App\Models\Contact;
use App\Models\Event;
use App\Models\Metric;
use App\Models\Service;
use App\Models\Volunteer;

Route::get('/', [FrontendController::class, 'index'])->name('index');

Route::get('/dashboard', [HomeController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
Route::post('volunteer-application', [FrontendController::class, 'volunteerApplication'])->name('volunteer.application');

Route::middleware('auth')->group(function () {
    Route::resources([
       
        'slider' => SliderController::class,
        'about' => AboutController::class,
        'partner' => PartnerController::class,
        'campaign' => CampaignController::class,
        'metric' => MetricController::class,
        'event' => EventController::class,
        'blogCategory' =>BlogCategoryController::class,
        'blog' => BlogController::class,
        'gallery' => GalleryController::class,
        'contact' => ContactController::class,
        'social' => SocialController::class,
        'service' => ServiceController::class,
        'volunteer' => VolunteerController::class,
       
    ]);

});

require __DIR__.'/auth.php';
