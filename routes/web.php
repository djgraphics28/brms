<?php

use App\Livewire\Home;
use App\Livewire\Documents;
use App\Livewire\BarangayOfficials;
use Illuminate\Support\Facades\Route;
use App\Livewire\Post\Show as PostShow;

Route::get('/', Home::class)->name('home');
Route::get('/article/{post:slug}', PostShow::class)->name('post.show');

Route::get('/barangay-officials', BarangayOfficials::class)->name('barangay-officials');
Route::get('/documents', Documents::class)->name('documents');

