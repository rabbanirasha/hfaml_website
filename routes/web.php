<?php

use Illuminate\Support\Facades\Route;

Route::livewire('/', 'home')->name('home');
Route::livewire('/about-us', 'about_us')->name('about');
Route::livewire('/our-services', 'our_services')->name('services');
