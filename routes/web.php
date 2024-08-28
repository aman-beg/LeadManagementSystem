<?php

use App\Livewire\EditLead;
use App\Livewire\LeadList;
use App\Livewire\LeadManager;
use Illuminate\Support\Facades\Route;

Route::get('/edit-lead/{id}', EditLead::class)->name('edit-lead');
Route::get('/lead-form', LeadManager::class)->name('lead-form');
Route::get('/',LeadList::class)->name('leads-list');