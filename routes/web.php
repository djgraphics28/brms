<?php

use App\Livewire\Home;
use App\Livewire\Documents;
use App\Livewire\Announcement;
use App\Livewire\BarangayOfficials;
use App\Livewire\ContactUs;
use Illuminate\Support\Facades\Route;
use App\Livewire\Post\Show as PostShow;

Route::get('/', Home::class)->name('home');
Route::get('/announcement', Announcement::class)->name('announcement');
Route::get('/contactus', ContactUs::class)->name('contactus');
Route::get('/article/{post:slug}', PostShow::class)->name('post.show');

Route::get('/barangay-officials', BarangayOfficials::class)->name('barangay-officials');
Route::get('/documents', Documents::class)->name('documents');

