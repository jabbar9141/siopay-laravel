<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AgentController;
use App\Http\Controllers\AnouncementController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CityController;
use App\Http\Controllers\CountryController;
use App\Http\Controllers\DispatcherController;
use App\Http\Controllers\EUFundsTransferRatesController;
use App\Http\Controllers\EUFundTransferOrderController;
use App\Http\Controllers\IntlFundsTransferRatesController;
use App\Http\Controllers\LocationController;
use App\Http\Controllers\OrderBatchController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\ShippingRateController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\IntlFundTransferOrderController;
use App\Http\Controllers\StateController;
use App\Http\Controllers\TransactionLimitsController;
use App\Http\Controllers\UserFundsController;
use App\Http\Controllers\UserLoginLogController;
use App\Http\Controllers\WalkInCustomerController;
use App\Http\Controllers\WalkInCustomerOrder;
use App\Models\EUFundTransferOrder;
use App\Models\IntlFundTransferOrder;
use App\Models\Order;
use App\Models\UserFunds;
use App\Models\WalkInCustomer;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Artisan;

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

Route::get('/', [HomeController::class, 'landing'])->name('landing');

Route::get('/set-language/{locale}', function ($locale) {
    app()->setLocale($locale);
    session()->put('locale', $locale);
    return redirect()->back();
})->name('set-lang');

Route::resource('my-wallet', UserFundsController::class)->middleware(['auth']);

Route::get('/payment_page', function () {
    return view('payment');
})->name('payment_page');

Route::get('/shipping_page', function () {
    return view('shipping_page');
})->name('shipping_page');

Route::get('/tup_up_page', function () {
    return view('prepaid');
})->name('tup_up_page');

Route::get('/pick_up_point_page', function () {
    return view('pickup_point');
})->name('pick_up_point_page');

Route::get('/spdi_page', function () {
    return view('spdi_page');
})->name('spdi_page');

Route::get('/pec_page', function () {
    return view('pec_page');
})->name('pec_page');

Route::get('/roadside_page', function () {
    return view('roadside_page');
})->name('roadside_page');

Route::get('/ticket_resale_page', function () {
    return view('ticket_page');
})->name('ticket_resale_page');

Route::get('/gas_page', function () {
    return view('gas_page');
})->name('gas_page');

Route::get('/contact', function () {
    return view('contact');
})->name('contact');

Route::get('/who_we_are', function () {
    return view('who_we_are');
})->name('who_we_are');

Route::get('/order_guide', function () {
    return view('order_guide');
})->name('order_guide');

Route::get('/how_to_pack', function () {
    return view('how_to_pack');
})->name('how_to_pack');

Route::get('/how_to_measure', function () {
    return view('how_to_measure');
})->name('how_to_measure');

Route::get('/prohibited_goods', function () {
    return view('prohibited_goods');
})->name('prohibited_goods');

Route::get('migration', function () {
    // Artisan::call('migrate', [
    //     '--path' => 'database/migrations/2024_09_21_065822_create_anouncements_table.php'
    // ]);
    // Artisan::call('migrate', [
    //     '--path' => 'database/migrations/2024_09_22_041847_create_countries_table.php'
    // ]);

    // Artisan::call('migrate', [
    //     '--path' => 'database/migrations/2024_09_22_041832_create_states_table.php'
    // ]);

    // Artisan::call('migrate', [
    //     '--path' => 'database/migrations/2024_09_22_041818_create_cities_table.php'
    // ]);
    // Artisan::call('migrate', [
    //     '--path' => 'database/migrations/2024_09_22_041533_create_agents_table.php'
    // ]);
    // Artisan::call('db:seed', [
    //     '--class' => 'CountryTableSeeder'
    // ]);

    // User Management
    // Artisan::call('migrate', [
    //     '--path' => 'database/migrations/2024_09_22_070055_update_enum_values_to_users_table.php'
    // ]);
    //  Artisan::call('migrate', [
    //     '--path' => 'database/migrations/2024_09_26_183052_add_user_unique_id_to_users_table.php'
    // ]);
    // Artisan::call('migrate', [
    //     '--path' => 'database/migrations/2024_09_30_142436_create_services_table.php'
    // ]);

    return 'Successfully created';
});


Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->middleware(['auth'])->name('home');


// Announcements routes
Route::get('/announcement/index', [AnouncementController::class, 'index'])->name('announcement.index');
Route::get('/announcement/remove/{id}', [AnouncementController::class, 'remove'])->name('announcement.remove');
Route::post('/announcement/store', [AnouncementController::class, 'store'])->name('announcement.store');

//Country ,City , State
Route::post('ajax-get-cities/{stateId}', [CityController::class, 'getCities'])->name('ajax-get-cities');
Route::post('ajax-get-country-cities/{countryId}', [CityController::class, 'getCountryCities'])->name('ajax-get-country-cities');
Route::post('ajax-get-country-state/{countryId}', [CityController::class, 'getCountryState'])->name('ajax-get-country-state');
Route::post('ajax-get-states/{countryId}', [StateController::class, 'getStates'])->name('ajax-get-states');
Route::get('ajax-get-countries/', [CountryController::class, 'getCountries'])->name('ajax-get-countries');

// Agent Routes
Route::resource('agents', AgentController::class)->middleware(['auth']);
// Route::get('agent/accept', [AgentController::class, 'accept'])->name('agent.accept')->middleware(['auth']);
// Route::get('agent/accept-search', [AgentController::class, 'accept_search'])->name('agent.accept.search')->middleware(['auth']);
Route::get('agentSetting', [AgentController::class, 'settings'])->name('agent.profile')->middleware(['auth']);
Route::get('editAgentSitting/{id}', [AgentController::class, 'editAgentSitting'])->name('agent.editSitting')->middleware(['auth']);

// Admin and auth routes
Route::get('admin/settings', [AdminController::class, 'admin_settings'])->name('admin.settings')->middleware(['auth']);
Route::post('updatePassword/{id?}', [AuthController::class, 'updatePassword'])->name('updatePassword')->middleware(['auth']);
// All Users Routes
Route::get('createUser', [AdminController::class, 'createUser'])->name('createUser')->middleware(['auth']);
Route::post('storeUser', [AdminController::class, 'storeUser'])->name('storeUser')->middleware(['auth']);
Route::get('editUser/{id}', [AdminController::class, 'editUser'])->name('editUser')->middleware(['auth']);
Route::post('updateUser/{id}', [AdminController::class, 'updateUser'])->name('updateUser')->middleware(['auth']);
Route::get('requiredDocumentRequestEmail/{id}', [AdminController::class, 'requiredDocumentRequestEmail'])->name('requiredDocumentRequestEmail')->middleware(['auth']);

Route::get('allUsers', [AdminController::class, 'allUsers'])->name('allUsers')->middleware(['auth']);
Route::get('allUsersList', [AdminController::class, 'allUsersList'])->name('allUsersList')->middleware(['auth']);
Route::get('allAgentList', [AdminController::class, 'allAgentList'])->name('allAgentList')->middleware(['auth']);
Route::get('allKycManagerList', [AdminController::class, 'allKycManagerList'])->name('allKycManagerList')->middleware(['auth']);
Route::get('allAccountManagerList', [AdminController::class, 'allAccountManagerList'])->name('allAccountManagerList')->middleware(['auth']);
Route::get('allMobileUserList', [AdminController::class, 'allMobileUserList'])->name('allMobileUserList')->middleware(['auth']);

Route::get('allWalkInCusList', [WalkInCustomerController::class, 'allWalkInCusList'])->name('allWalkInCusList')->middleware(['auth']);

//User Management Routes
Route::get('unblockUser', [AdminController::class, 'unblockUser'])->name('unblockUser')->middleware(['auth']);
Route::get('blockUser', [AdminController::class, 'blockUser'])->name('blockUser')->middleware(['auth']);
Route::post('assignKycManager/{user_id}', [AdminController::class, 'assignKycManager'])->name('assignKycManager')->middleware(['auth']);
Route::post('assignAccountManager/{user_id}', [AdminController::class, 'assignAccountManager'])->name('assignAccountManager')->middleware(['auth']);
Route::post('uploadProfileImage/{user_id}', [AdminController::class, 'uploadProfileImage'])->name('uploadProfileImage')->middleware(['auth']);

// Old
Route::get('/dashboard/profile', [HomeController::class, 'profile'])->middleware(['auth'])->name('profile');
Route::get('/dashboard/airtime', [HomeController::class, 'airtime'])->middleware(['auth'])->name('airtime');
Route::get('/dashboard/internet', [HomeController::class, 'internet'])->middleware(['auth'])->name('internet');
Route::get('/dashboard/cable', [HomeController::class, 'cable'])->middleware(['auth'])->name('cable');

//Money Transfer
Route::get('/dashboard/utilities/electricity', [HomeController::class, 'electricity'])->middleware(['auth'])->name('electricity');
Route::get('/dashboard/utilities/gas', [HomeController::class, 'gas'])->middleware(['auth'])->name('gas');

Route::get('admin/settings', [AdminController::class, 'admin_settings'])->name('admin.settings')->middleware(['auth']);
Route::resource('locations', LocationController::class)->middleware(['auth']);
Route::get('locationList', [LocationController::class, 'locationList'])->name('locationList')->middleware(['auth']);

Route::resource('shipping_rates', ShippingRateController::class)->middleware(['auth']);
Route::get('shippingRatesList', [ShippingRateController::class, 'shippingRatesList'])->name('shippingRatesList')->middleware(['auth']);


Route::resource('eu_fund_rates', EUFundsTransferRatesController::class)->middleware(['auth']);
Route::get('EUFundsTransferRatesList', [EUFundsTransferRatesController::class, 'EUFundsTransferRatesList'])->name('EUFundsTransferRatesList')->middleware(['auth']);


Route::resource('intl_funds_rate', IntlFundsTransferRatesController::class)->middleware(['auth']);
Route::get('IntlFundsTransferRatesList', [IntlFundsTransferRatesController::class, 'IntlFundsTransferRatesList'])->name('IntlFundsTransferRatesList')->middleware(['auth']);

Route::resource('orders', OrderController::class)->middleware(['auth']);
Route::get('/locations-search', [LocationController::class, 'search'])->name('locations.search');
Route::get('/rates-fetch', [ShippingRateController::class, 'rates_fetch'])->name('rates.fetch');
Route::get('myOrdersList', [OrderController::class, 'myOrdersList'])->name('myOrdersList')->middleware(['auth']);
Route::post('cancelOrder', [OrderController::class, 'cancelOrder'])->name('cancelOrder')->middleware(['auth']);

Route::get('allOrders', [OrderController::class, 'allOrders'])->name('allOrders')->middleware(['auth']);
Route::get('allOrdersList', [OrderController::class, 'allOrdersList'])->name('allOrdersList')->middleware(['auth']);


Route::resource('walk_in_customers', WalkInCustomerController::class)->middleware(['auth']);


Route::post('makeAdmin', [AdminController::class, 'makeAdmin'])->name('makeAdmin')->middleware(['auth']);
Route::post('makeDispatcher', [AdminController::class, 'makeDispatcher'])->name('makeDispatcher')->middleware(['auth']);
Route::post('makeUser', [AdminController::class, 'makeUser'])->name('makeUser')->middleware(['auth']);

Route::post('unapproveWalkInCusKYC', [WalkInCustomerController::class, 'unapproveWalkInCusKYC'])->name('unapproveWalkInCusKYC')->middleware(['auth']);
Route::post('approveWalkInCusKYC', [WalkInCustomerController::class, 'approveWalkInCusKYC'])->name('approveWalkInCusKYC')->middleware(['auth']);

Route::post('unapproveAgentKYC', [WalkInCustomerController::class, 'unapproveAgentKYC'])->name('unapproveAgentKYC')->middleware(['auth']);
Route::post('approveAgentKYC', [WalkInCustomerController::class, 'approveAgentKYC'])->name('approveAgentKYC')->middleware(['auth']);

Route::post('unapproveMobileUserKYC', [WalkInCustomerController::class, 'unapproveMobileUserKYC'])->name('unapproveMobileUserKYC')->middleware(['auth']);
Route::post('approveMobileUserKYC', [WalkInCustomerController::class, 'approveMobileUserKYC'])->name('approveMobileUserKYC')->middleware(['auth']);


Route::get('dispatchOrders', [OrderController::class, 'dispatchOrders'])->name('dispatchOrders')->middleware(['auth']);
Route::get('dispatchOrdersList', [OrderController::class, 'dispatchOrdersList'])->name('dispatchOrdersList')->middleware(['auth']);

Route::get('dispatchEUFundOrders', [EUFundTransferOrderController::class, 'dispatchEUFundOrders'])->name('dispatchEUFundOrders')->middleware(['auth']);
Route::get('dispatchEUFundOrdersList', [EUFundTransferOrderController::class, 'dispatchEUFundOrdersList'])->name('dispatchEUFundOrdersList')->middleware(['auth']);

Route::get('dispatchIntlFundOrders', [IntlFundTransferOrderController::class, 'dispatchIntlFundOrders'])->name('dispatchIntlFundOrders')->middleware(['auth']);
Route::get('dispatchIntlFundOrdersList', [IntlFundTransferOrderController::class, 'dispatchIntlFundOrdersList'])->name('dispatchIntlFundOrdersList')->middleware(['auth']);

Route::get('adminEUFundOrders', [EUFundTransferOrderController::class, 'adminEUFundOrders'])->name('adminEUFundOrders')->middleware(['auth']);
Route::get('adminEUFundOrdersList', [EUFundTransferOrderController::class, 'adminEUFundOrdersList'])->name('adminEUFundOrdersList')->middleware(['auth']);

Route::get('adminIntlFundOrders', [IntlFundTransferOrderController::class, 'adminIntlFundOrders'])->name('adminIntlFundOrders')->middleware(['auth']);
Route::get('adminIntlFundOrdersList', [IntlFundTransferOrderController::class, 'adminIntlFundOrdersList'])->name('adminIntlFundOrdersList')->middleware(['auth']);

Route::get('adminEUFundOrdersReportPage', [EUFundTransferOrderController::class, 'reports'])->name('adminEUFundOrdersReportPage')->middleware(['auth']);
Route::get('adminIntlFundOrdersReportPage', [IntlFundTransferOrderController::class, 'reports'])->name('adminIntlFundOrdersReportPage')->middleware(['auth']);

Route::get('dispatchEUFundOrdersReportPage', [EUFundTransferOrderController::class, 'reports_disp'])->name('dispatchEUFundOrdersReportPage')->middleware(['auth']);
Route::get('dispatchIntlFundOrdersReportPage', [IntlFundTransferOrderController::class, 'reports_disp'])->name('dispatchIntlFundOrdersReportPage')->middleware(['auth']);


Route::post('unapproveEUFundTransfer', [EUFundTransferOrderController::class, 'unapproveEUFundTransfer'])->name('unapproveEUFundTransfer')->middleware(['auth']);
Route::post('approveEUFundTransfer', [EUFundTransferOrderController::class, 'approveEUFundTransfer'])->name('approveEUFundTransfer')->middleware(['auth']);

Route::post('unapproveIntlFundTransfer', [IntlFundTransferOrderController::class, 'unapproveIntlFundTransfer'])->name('unapproveIntlFundTransfer')->middleware(['auth']);
Route::post('approveIntlFundTransfer', [IntlFundTransferOrderController::class, 'approveIntlFundTransfer'])->name('approveIntlFundTransfer')->middleware(['auth']);

Route::get('dispatcher/settings', [DispatcherController::class, 'settings'])->name('dispatcher.settings')->middleware(['auth']);
Route::get('dispatcher/accept', [DispatcherController::class, 'accept'])->name('dispatcher.accept')->middleware(['auth']);
Route::get('dispatcher/accept-search', [DispatcherController::class, 'accept_search'])->name('dispatcher.accept.search')->middleware(['auth']);
Route::resource('batches', OrderBatchController::class)->middleware(['auth']);
Route::get('batchList', [OrderBatchController::class, 'batchList'])->name('batchList')->middleware(['auth']);
Route::resource('dispatchers', DispatcherController::class)->middleware(['auth']);
Route::get('batchOrdersList/{batch_id}', [OrderBatchController::class, 'batchOrdersList'])->name('batchOrdersList')->middleware(['auth']);
// Route::get('batchOrderEdit/{order_id}', [OrderBatchController::class, 'batchOrderEdit'])->name('batchOrderEdit')->middleware(['auth']);
// Route::post('batchOrderEdit/{order_id}', [OrderBatchController::class, 'batchOrderEdit'])->name('batchOrderEdit')->middleware(['auth']);
Route::post('orderAccept/{order_id}', [DispatcherController::class, 'orderAccept'])->name('orderAccept')->middleware(['auth']);
Route::get('/batches-search', [OrderBatchController::class, 'search'])->name('batches.search')->middleware(['auth']);

Route::get('payment-summary', [PaymentController::class, 'payment_summary'])->middleware(['auth'])->name('payment.summary');
// Route::get('payment-confirm-pay/{order_id}', [PaymentController::class, 'confirm_pay'])->middleware(['auth'])->name('payment.confirm.pay');
Route::get('myPaymentsList', [PaymentController::class, 'myPaymentsList'])->name('myPaymentsList')->middleware(['auth']);
Route::get('my-payments', [PaymentController::class, 'index'])->name('my.payments')->middleware(['auth']);

Route::get('all-payments', [PaymentController::class, 'allPayments'])->name('all.payments')->middleware(['auth']);
Route::get('allPaymentsList', [PaymentController::class, 'allPaymentsList'])->name('allPaymentsList')->middleware(['auth']);


Route::get('/tax-fetch', [WalkInCustomerController::class, 'tax_fetch'])->name('tax.fetch');
Route::resource('walk_in_customer_order', WalkInCustomerOrder::class)->middleware(['auth']);

Route::get('myWalkInOrdersList', [WalkInCustomerOrder::class, 'myOrdersList'])->name('myWalkInOrdersList')->middleware(['auth']);
Route::post('cancelWalkInOrder', [WalkInCustomerOrder::class, 'cancelOrder'])->name('cancelWalkInOrder')->middleware(['auth']);

Route::get('allWalkInOrders', [WalkInCustomerOrder::class, 'allOrders'])->name('allWalkInOrders')->middleware(['auth']);
Route::get('allWalkInOrdersList', [WalkInCustomerOrder::class, 'allOrdersList'])->name('allWalkInOrdersList')->middleware(['auth']);

Route::resource('eu_fund_trasfer_order', EUFundTransferOrderController::class);
Route::resource('intl_fund_trasfer_order', IntlFundTransferOrderController::class);
Route::get('prepaid_order', function () {
    return view('admin.prepaid.index');
})->name('prepaid_order.index');

Route::get('eu_rates_fetch', [EUFundTransferOrderController::class, 'ratesFetch'])->name('eu_rates.fetch');
Route::get('intl_rates_fetch', [IntlFundTransferOrderController::class, 'ratesFetch'])->name('intl_rates.fetch');
Route::get('track-shipping/{tracking_id}', [HomeController::class, 'trackShipping'])->name('track.shipping');
Route::get('track-eufund/{tracking_id}', [HomeController::class, 'trackEUFund'])->name('track.eufund');
Route::get('track-intlfund/{tracking_id}', [HomeController::class, 'trackIntlFund'])->name('track.intlfund');

Route::get('listLogData', [UserLoginLogController::class, 'listLogData'])->name('listUserLoginData');

Route::resource('transaction_limits', TransactionLimitsController::class);
Route::get('transactionLimitsList', [TransactionLimitsController::class, 'transactionLimitsList'])->name('transactionLimitsList');
