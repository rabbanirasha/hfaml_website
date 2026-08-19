<?php

use Illuminate\Support\Facades\Route;

Route::livewire('/', 'home')->name('home');
Route::livewire('/about-us', 'about_us')->name('about');
Route::livewire('/our-services', 'our_services')->name('services');
Route::livewire('/our-funds', 'our_funds')->name('funds');
Route::livewire('/our-schemes', 'our_schemes')->name('schemes');
Route::livewire('/reports', 'reports')->name('reports');
Route::livewire('/downloads', 'downloads')->name('downloads');
Route::livewire('/signup', 'signup')->name('signup');
Route::livewire('/login', 'login')->name('login');
Route::livewire('/contact-us', 'contact_us')->name('contact');
Route::livewire('/mutual-fund/{fund_code}', 'view_fund')->name('view_fund');
Route::livewire('/news', 'news')->name('news');
Route::livewire('/news/{news_id}', 'view_news')->name('view_news');
Route::livewire('/web-admin', 'web_admin')->name('admin');
