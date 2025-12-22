<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategorieController;
use App\Models\Plat;
use App\Models\Categorie;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\ContactController;

Route::get('/', function () {
    return view('components.accueil');
})->name('accueil');
Route::get('/apropos', function () {
    return view('components.about');
})->name('about');

Route::get('/menu/{slug?}', function ($slug = null) {
    $categories = Categorie::all();

    if ($slug) {
        $categorie = Categorie::where('slug', $slug)->firstOrFail();
        $plats = Plat::where('categorie_id', $categorie->id)->get();
    } else {
        $plats = Plat::all();
    }

    return view('components.menu', compact('categories', 'plats', 'slug'));
})->name('menu');
Route::get('/reservation', function () {
    return view('components.reservation');
})->name('reservation');
Route::post('/reservation', [ReservationController::class, 'store'])->name('reservation.store');
Route::get('/contact', function () {
    return view('components.contact');
})->name('contact');
Route::post('/contact', [ContactController::class, 'send'])
    ->name('contact.send');



