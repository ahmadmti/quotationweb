<?php

use App\Http\Controllers\CountController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\quotationController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\PDFController;
use App\Http\Controllers\SupplierFeedbackController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
*/

Route::get('/', function () {
    return redirect('login');
});
Route::middleware(['auth:sanctum', 'verified'])->group(function () {
    Route::get('/dashboard',[CountController::class,'countRows'])->name('dashboard');
});


// ---------------------------------------------------------
// ---------------------------------------------------------
// ---------------------------------------------------------
// Customers Routes Start from here
// Add Customers
Route::get('/addCustomer',[CustomerController::class,'create']);
// Post Customer Data
Route::post('/postCustomerData',[CustomerController::class,'store']);
// View Customers Detail
Route::get('/customer',[CustomerController::class,'show']);
// Edit Customer Detail
Route::get('edit_customer/{id}',[CustomerController::class,'edit']);
// update Customer Detail
Route::put('edit_customer/{id}',[CustomerController::class,'update']);
// customer detail
Route::get('customer_detail/{id}',[CustomerController::class,'customerDetail']);
// delete Customer
Route::get('customer-delete/{id}',[CustomerController::class,'destroy']);



// ---------------------------------------------------------
// ---------------------------------------------------------
// ---------------------------------------------------------
// Supplier Routes Start from here
// Add Suppliers
Route::get('/add_supplier',[SupplierController::class,'create']);
// Post Supplier Data
Route::post('/postSupplierData',[SupplierController::class,'store']);
// view All Suppliers
Route::get('/supplier',[SupplierController::class,'show']);
// Edit Supplier
Route::get('edit_supplier/{id}',[SupplierController::class,'edit']);
// Edit Supplier
Route::get('supplier_detail/{id}',[SupplierController::class,'supplierDetail']);
// Update Supplier
Route::put('edit_supplier/{id}',[SupplierController::class,'update']);
// Delete Supplier
Route::get('delete/{id}',[SupplierController::class,'destroy']);



// ---------------------------------------------------------
// ---------------------------------------------------------
// ---------------------------------------------------------
// Quotations Routes Start from here
Route::get('add_quots', [quotationController::class,'index']);
// Get customer Data1
Route::post('get-customer-data',[quotationController::class,'getCustomer']);
// Get customer Data2
Route::post('get-customer-name',[quotationController::class,'getCustomerName']);
// Delete Product
Route::post('delete_product',[ProductController::class,'deleteProduct']);
// Product Route
Route::post('product',[ProductController::class,'store']);
// view Quotations
Route::get('quotation',[quotationController::class,'show']);
// View Quotation Detail
Route::get('view-quot-detail/{id}',[quotationController::class,'view']);
// Edit Quotation
Route::get('editquotation/{id}',[quotationController::class,'edit']);
// Update Quotation
Route::put('editquotation/{id}',[ProductController::class,'update']);
// // Delete Quotation
Route::get('quotoation-delete/{id}',[quotationController::class,'destroy']);



// ---------------------------------------------------------
// ---------------------------------------------------------
// ---------------------------------------------------------
// Countries-States-Cities Routes for Supplier Start from here
Route::get('country-state-city',[SupplierController::class,'create']);
Route::post('get-states-by-country',[SupplierController::class,'getState']);
Route::post('get-cities-by-state',[SupplierController::class,'getCity']);
// Countries-States-Cities Routes End here



// Send quotation to supplier
Route::post('send-email-pdf', [PDFController::class,'generatePDF']);
// Send Supplier Feedback
Route::get('send-feedback-pdf/{id}', [PDFController::class,'sendFeedbackInPDF']);
// add Supplier feedback
Route::get('supplier_feedback/{id}',[SupplierFeedbackController::class,'feedback']);
// post feedback
Route::post('supplier_feedback/{id}',[SupplierFeedbackController::class,'storeFeedback']);
// customer feedback page
Route::get('pdf',[SupplierFeedbackController::class,'getFeedbackData']);
// view feedback through customer
Route::get('feedback/{id}',[CustomerController::class,'viewForEmail']);
// Edit Feedback
Route::get('delete_feedback/{id}',[SupplierFeedbackController::class,'deleteFeedback']);
// ready feedback for email
Route::get('readyPDF/{id}',[CustomerController::class,'readyForEmail']);
