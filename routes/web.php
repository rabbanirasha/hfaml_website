<?php

use Illuminate\Support\Facades\Route;

Route::livewire('/', 'home')->name('home');
Route::livewire('/about-us', 'about_us')->name('about');
Route::livewire('/our-services', 'our_services')->name('services');
Route::livewire('/signup', 'signup')->name('signup');
Route::livewire('/login', 'login')->name('login');
Route::livewire('/contact-us', 'contact_us')->name('contact');
