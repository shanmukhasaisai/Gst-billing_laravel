<?php

use App\Http\Controllers\AppController;
use App\Http\Controllers\GstBillController;
use App\Http\Controllers\PartyController;
use App\Http\Controllers\VendorInvoice;
use Illuminate\Support\Facades\Route;


// index page 
Route::get('/',[AppController::class, 'index']);

// party routes 
Route::get('/add-party',[PartyController::class, 'addParty'])->name('add-party');
Route::post('/create-party',[PartyController::class, 'createParty'])->name('create-party');
Route::get('/manage-parties',[PartyController::class, 'manageParties'])->name('manage-parties');
Route::get('/edit-party/{id}',[PartyController::class, 'editParty'])->name('edit-party');
Route::put('/update-party/{id}',[PartyController::class, 'updateParty'])->name('update-party');
Route::delete('/delete-party/{party}',[PartyController::class, 'deleteParty'])->name('delete-party');

//GST bill routes
Route::get('/add-gst-bill',[GstBillController::class,'addGstBill'])->name('add-gst-bill');
Route::get('/manage-gst-bills',[GstBillController::class,'manageGstBills'])->name('manage-gst-bills');
Route::get('/print-gst-bill/{id}',[GstBillController::class,'printGstBill'])->name('print-gst-bill');
Route::post('/create-gst-bill',[GstBillController::class,'createGstBill'])->name('create-gst-bill');


//gst delete route
Route::get('/delete/{table}{id}',[AppController::class,'delete'])->name('delete');

Route::resource('vendor-invoice',VendorInvoice::class);