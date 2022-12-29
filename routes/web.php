<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\web\HomeController;
use App\Http\Controllers\web\ExpensesController;
use App\Http\Controllers\web\CustomerController;
use App\Http\Controllers\web\MenuController;
use App\Http\Controllers\web\OrderController;
use App\Http\Controllers\web\InvoiceController;
use App\Http\Controllers\web\SubscriptionController;
use App\Http\Controllers\web\PaymentController;
use App\Http\Controllers\web\ReportController;
use App\Http\Controllers\web\VendorController;
use App\Http\Controllers\web\AuthController;
use App\Models\Customers;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [HomeController::class, 'index']);
Route::get('/ca', [HomeController::class, 'ca']);
Route::get('/addfield', [HomeController::class, 'addfield']);
Route::get('/expense', [ExpensesController::class, 'index']);
Route::post('/expensesstore', [ExpensesController::class, 'expensesstore']);
Route::post('/expenses_search_details', [ExpensesController::class, 'expenses_search_details']);
Route::post('/updateexpenses', [ExpensesController::class, 'updateexpenses']);
Route::get('/edit_expenses/id={expenses_id}', [ExpensesController::class, 'editexpenses']);
Route::get('/add_expenses', [ExpensesController::class, 'add_expenses']);
Route::post('/vendor_payment', [ExpensesController::class, 'vendor_payment']);
Route::post('/destroy_expenses', [ExpensesController::class, 'destroy_expenses']);

Route::get('/customer', [CustomerController::class, 'index']);


Route::get('/about', function () {
    // return view('welcome');
    echo "jbj";
});
Route::get('/edit_customer/id={customer_id}', [CustomerController::class, 'edit_customer']);
Route::get('/add_customer', [CustomerController::class, 'add_customer']);
Route::post('/addcustomerstore', [CustomerController::class, 'addcustomerstore']);
Route::post('/destroy_customer',[CustomerController::class,'destroy_customer']);
Route::post('/updatecustomer',[CustomerController::class,'updatecustomer']);
Route::get('/customer_list_ajax', [CustomerController::class, 'customer_list_ajax']);



Route::get('/menu', [MenuController::class, 'index']);
Route::get('/menu2', [MenuController::class, 'menu']);
Route::get('/breakfast', [MenuController::class, 'breakfast']);
Route::get('/lunch', [MenuController::class, 'lunch']);
Route::get('/dinner', [MenuController::class, 'dinner']);
Route::get('/snacks', [MenuController::class, 'snacks']);

Route::get('/add_menu', [MenuController::class, 'add_menu']);
Route::get('/add_menu2', [MenuController::class, 'add_menu2']);
Route::post('/fetch_menu',[MenuController::class,'fetch_menu']);
route::post('/fetchvariants',[MenuController::class,'fetchvariants']);
route::post('/add_menulist',[MenuController::class,'add_menulist']);
Route::post('/fetch_menu_data',[MenuController::class,'fetch_menu_data']);
Route::post('/fetch_menu_lunch',[MenuController::class,'fetch_menu_lunch']);
Route::post('/fetchlunchvariants',[MenuController::class,'fetchlunchvariants']);
Route::post('/fetchdinnervariants',[MenuController::class,'fetchdinnervariants']);
Route::post('/fetch_menu_dinner',[MenuController::class,'fetch_menu_dinner']);
Route::post('/storemenu', [MenuController::class, 'storemenu']);
Route::get('/view_payment',[MenuController::class,'view_payment']);
// route::get('edit_menu/{menu_id}',[MenuController::class,'edit_menus'])->name('menuedit');
Route::get('edit_menu/menu_id={menu_id}',[MenuController::class,'edit_menus']);
Route::post('/update_menu',[MenuController::class,'update_menu'])->name('update.menu');
Route::post('/update_breakfast',[MenuController::class,'update_breakfast'])->name('update.breakfast');
Route::post('/update_lunch',[MenuController::class,'update_lunch'])->name('update.lunch');
Route::post('/update_dinner',[MenuController::class,'update_dinner'])->name('update.dinner');
Route::post('/update_snacks',[MenuController::class,'update_snacks'])->name('update.snacks');
Route::post('/destroy_menu',[MenuController::class,'destroy_menu']);
Route::post('/change_status',[MenuController::class,'change_status']);



Route::get('/order', [OrderController::class, 'index']);
Route::get('/order_details/id={order_id}', [OrderController::class, 'order_details']);
Route::get('/add_order', [OrderController::class, 'add_order']);
Route::get('/order_list', [OrderController::class, 'order_list']);
Route::get('/order_list2', [OrderController::class, 'order_list2']);
Route::get('/menuorder', [OrderController::class, 'menuorder']);
Route::get('/storeorder', [OrderController::class, 'storeorder']);
Route::post('/store_details_order', [OrderController::class, 'store_details_order']);
Route::post('/storeplaceorder', [OrderController::class, 'storeplaceorder']);
Route::post('/storecustomer', [OrderController::class, 'storecustomer']);
route::post('/fetch_customer',[OrderController::class,'fetch_customer']);
route::post('/fetch_customer2',[OrderController::class,'fetch_customer2']);
Route::post('/list_order', [OrderController::class, 'list_order']);
Route::post('/destroy_order',[OrderController::class,'destroy_order']);
Route::post('/destroy_po',[OrderController::class,'destroy_po']);
Route::post('/check_request',[OrderController::class,'check_request']);
Route::post('/insertordersubmit',[OrderController::class,'insertordersubmit']);
Route::post('/fetchorderprice',[OrderController::class,'fetchorderprice']);
Route::post('/order_payment',[OrderController::class,'order_payment']);  
Route::post('/order_status',[OrderController::class,'order_status']);  
Route::post('/order_active_payment',[OrderController::class,'order_active_payment']);  
Route::get('/order_list_ajax', [OrderController::class, 'fetch_ajaxorderlist']);


Route::get('/snack_order', [OrderController::class, 'snack_order']);
Route::get('/snacks_order', [OrderController::class, 'snacks_order']);
Route::post('/add_snacks', [OrderController::class, 'add_snacks']);


Route::get('/payment', [PaymentController::class, 'index']);
Route::get('/payment_data', [PaymentController::class, 'payment_data']);
Route::get('/exam_manage_ajax', [PaymentController::class, 'fetch_ajaxdata']);
Route::post('/get_payment', [PaymentController::class, 'get_payment']);
Route::post('/get_paymentdata', [PaymentController::class, 'get_paymentdata']);
Route::post('/paymentstore', [PaymentController::class, 'paymentstore']);
Route::get('/bank', [PaymentController::class, 'bank']);
Route::get('/add_bank', [PaymentController::class, 'add_bank']);
Route::get('/edit_bank', [PaymentController::class, 'edit_bank']);
Route::get('/cash', [PaymentController::class, 'cash']);
Route::get('/add_cash', [PaymentController::class, 'add_cash']);
Route::post('/storecash', [PaymentController::class, 'storecash']);
Route::get('/add_payment', [PaymentController::class, 'add_payment']);
Route::post('/updatepayment', [PaymentController::class, 'updatepayment']);
Route::get('/edit_payment/id={payment_id}', [PaymentController::class, 'edit_payment']);
Route::post('/destroy_payment',[PaymentController::class,'destroy_payment']);

Route::get('/subsciption', [SubscriptionController::class, 'index']);
Route::get('/add_subsciption', [SubscriptionController::class, 'add_subsciption']);


Route::get('/report', [ReportController::class, 'index']);
Route::get('/sales', [ReportController::class, 'sales']);
Route::get('/menu_report', [ReportController::class, 'menu_report']);
Route::get('/report_list_ajax', [ReportController::class, 'fetch_ajaxreportlist']);
Route::get('/salesreport_list_ajax', [ReportController::class, 'fetch_salesreportlist']);


Route::get('/invoice', [InvoiceController::class, 'index']);
Route::get('/date', [InvoiceController::class, 'date']);
Route::get('/invoice_details', [InvoiceController::class, 'invoicedetails']);

Route::get('/vendor_list', [VendorController::class, 'index']);
Route::get('/addvendor', [VendorController::class, 'addvendor']);
Route::get('/edit_vendor/id={vendor_id}', [VendorController::class, 'edit_vendor']);
// Route::post('/addcustomerstore', [CustomerController::class, 'addcustomerstore']);
Route::post('/addvendorstore', [VendorController::class, 'addVendorstore']);
Route::post('/updatevendor', [VendorController::class, 'updatevendor']);
Route::post('/add_commission', [VendorController::class, 'add_commission']);
Route::get('/vendor_list_ajax', [VendorController::class, 'vendor_list_ajax']);
Route::get('/vendor_commission_ajax', [VendorController::class, 'vendor_commission_ajax']);
Route::get('/vendor_commission', [VendorController::class, 'vendor_commission']);
Route::post('/destroy_vendor',[VendorController::class,'destroy_vendor']);

// Route::get('/about', function () {
//     // return view('welcome');
//     echo "jbj";
// });

Route::get('login', [AuthController::class, 'index'])->name('login');
Route::get('logout', [AuthController::class, 'logout'])->name('logout');
Route::post('post-login', [AuthController::class, 'postLogin'])->name('login.post'); 
Route::get('registration', [AuthController::class, 'registration'])->name('register');
Route::post('post-registration', [AuthController::class, 'postRegistration'])->name('register.post'); 
Route::get('dashboard', [AuthController::class, 'dashboard']); 

