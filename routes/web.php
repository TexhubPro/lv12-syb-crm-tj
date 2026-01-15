<?php

use App\Http\Controllers\AuthController;
use App\Livewire\Auth\Login;
use App\Http\Controllers\BankController;
use App\Http\Controllers\CashierController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\ControlTypeController;
use App\Http\Controllers\CorniceTypeController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\FabricCodeController;
use App\Http\Controllers\ManagerCashierController;
use App\Http\Controllers\ManagerDashboardController;
use App\Http\Controllers\ManagerOrderController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\OrderTypeController;
use App\Http\Controllers\ProfileColorController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SurveyorCashierController;
use App\Http\Controllers\SurveyorOrderController;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->name('admin.dashboard');
    Route::get('/admin/dashboard/export', [DashboardController::class, 'export'])
        ->name('admin.dashboard.export');

    Route::get('/admin/profile', [ProfileController::class, 'show'])->name('admin.profile');
    Route::post('/admin/profile', [ProfileController::class, 'update'])->name('admin.profile.update');

    Route::get('/admin/order-types', [OrderTypeController::class, 'index'])->name('admin.order-types.index');
    Route::post('/admin/order-types', [OrderTypeController::class, 'store'])->name('admin.order-types.store');
    Route::put('/admin/order-types/{orderType}', [OrderTypeController::class, 'update'])->name('admin.order-types.update');
    Route::delete('/admin/order-types/{orderType}', [OrderTypeController::class, 'destroy'])->name('admin.order-types.destroy');

    Route::get('/admin/profile-colors', [ProfileColorController::class, 'index'])->name('admin.profile-colors.index');
    Route::post('/admin/profile-colors', [ProfileColorController::class, 'store'])->name('admin.profile-colors.store');
    Route::put('/admin/profile-colors/{profileColor}', [ProfileColorController::class, 'update'])->name('admin.profile-colors.update');
    Route::delete('/admin/profile-colors/{profileColor}', [ProfileColorController::class, 'destroy'])->name('admin.profile-colors.destroy');

    Route::get('/admin/cornice-types', [CorniceTypeController::class, 'index'])->name('admin.cornice-types.index');
    Route::post('/admin/cornice-types', [CorniceTypeController::class, 'store'])->name('admin.cornice-types.store');
    Route::put('/admin/cornice-types/{corniceType}', [CorniceTypeController::class, 'update'])->name('admin.cornice-types.update');
    Route::delete('/admin/cornice-types/{corniceType}', [CorniceTypeController::class, 'destroy'])->name('admin.cornice-types.destroy');

    Route::get('/admin/fabric-codes', [FabricCodeController::class, 'index'])->name('admin.fabric-codes.index');
    Route::post('/admin/fabric-codes', [FabricCodeController::class, 'store'])->name('admin.fabric-codes.store');
    Route::put('/admin/fabric-codes/{fabricCode}', [FabricCodeController::class, 'update'])->name('admin.fabric-codes.update');
    Route::delete('/admin/fabric-codes/{fabricCode}', [FabricCodeController::class, 'destroy'])->name('admin.fabric-codes.destroy');

    Route::get('/admin/control-types', [ControlTypeController::class, 'index'])->name('admin.control-types.index');
    Route::post('/admin/control-types', [ControlTypeController::class, 'store'])->name('admin.control-types.store');
    Route::put('/admin/control-types/{controlType}', [ControlTypeController::class, 'update'])->name('admin.control-types.update');
    Route::delete('/admin/control-types/{controlType}', [ControlTypeController::class, 'destroy'])->name('admin.control-types.destroy');

    Route::get('/admin/clients', [ClientController::class, 'index'])->name('admin.clients.index');
    Route::post('/admin/clients', [ClientController::class, 'store'])->name('admin.clients.store');
    Route::put('/admin/clients/{client}', [ClientController::class, 'update'])->name('admin.clients.update');
    Route::delete('/admin/clients/{client}', [ClientController::class, 'destroy'])->name('admin.clients.destroy');

    Route::get('/admin/cashier', [CashierController::class, 'create'])->name('admin.cashier');
    Route::post('/admin/cashier', [CashierController::class, 'store'])->name('admin.cashier.store');

    Route::get('/admin/orders', [OrderController::class, 'index'])->name('admin.orders.index');
    Route::get('/admin/orders/{order}', [OrderController::class, 'show'])->name('admin.orders.show');
    Route::get('/admin/orders/{order}/receipt', [OrderController::class, 'downloadReceipt'])->name('admin.orders.receipt');
    Route::get('/admin/orders/{order}/excel', [OrderController::class, 'downloadExcel'])->name('admin.orders.excel');
    Route::delete('/admin/orders/{order}', [OrderController::class, 'destroy'])->name('admin.orders.destroy');

    Route::get('/admin/employees', [EmployeeController::class, 'index'])->name('admin.employees.index');
    Route::post('/admin/employees', [EmployeeController::class, 'store'])->name('admin.employees.store');
    Route::put('/admin/employees/{employee}', [EmployeeController::class, 'update'])->name('admin.employees.update');
    Route::delete('/admin/employees/{employee}', [EmployeeController::class, 'destroy'])->name('admin.employees.destroy');

    Route::get('/admin/bank', [BankController::class, 'index'])->name('admin.bank.index');
    Route::post('/admin/bank', [BankController::class, 'store'])->name('admin.bank.store');
    Route::put('/admin/bank/{transaction}', [BankController::class, 'update'])->name('admin.bank.update');
    Route::post('/admin/bank/{transaction}/pay', [BankController::class, 'pay'])->name('admin.bank.pay');
    Route::delete('/admin/bank/{transaction}', [BankController::class, 'destroy'])->name('admin.bank.destroy');
});

Route::prefix('manager')->middleware(['auth', 'manager'])->group(function () {
    Route::get('/', [ManagerDashboardController::class, 'index'])->name('manager.dashboard');
    Route::get('/dashboard/export', [ManagerDashboardController::class, 'export'])->name('manager.dashboard.export');

    Route::get('/cashier', [ManagerCashierController::class, 'create'])->name('manager.cashier');
    Route::post('/cashier', [ManagerCashierController::class, 'store'])->name('manager.cashier.store');

    Route::get('/orders', [ManagerOrderController::class, 'index'])->name('manager.orders.index');
    Route::get('/orders/{order}', [ManagerOrderController::class, 'show'])->name('manager.orders.show');
    Route::get('/orders/{order}/receipt', [ManagerOrderController::class, 'downloadReceipt'])->name('manager.orders.receipt');
    Route::get('/orders/{order}/excel', [ManagerOrderController::class, 'downloadExcel'])->name('manager.orders.excel');
    Route::delete('/orders/{order}', [ManagerOrderController::class, 'destroy'])->name('manager.orders.destroy');
});

Route::prefix('surveyor')->middleware(['auth', 'surveyor'])->group(function () {
    Route::get('/cashier', [SurveyorCashierController::class, 'create'])->name('surveyor.cashier');
    Route::post('/cashier', [SurveyorCashierController::class, 'store'])->name('surveyor.cashier.store');

    Route::get('/orders', [SurveyorOrderController::class, 'index'])->name('surveyor.orders.index');
    Route::get('/orders/{order}', [SurveyorOrderController::class, 'show'])->name('surveyor.orders.show');
    Route::get('/orders/{order}/receipt', [SurveyorOrderController::class, 'downloadReceipt'])->name('surveyor.orders.receipt');
    Route::get('/orders/{order}/excel', [SurveyorOrderController::class, 'downloadExcel'])->name('surveyor.orders.excel');
    Route::delete('/orders/{order}', [SurveyorOrderController::class, 'destroy'])->name('surveyor.orders.destroy');
});

Route::get('/login', Login::class)
    ->middleware('guest')
    ->name('login');
Route::post('/logout', [AuthController::class, 'logout'])
    ->middleware('auth')
    ->name('logout');

Route::get('/docs/alert', function () {
    return view('pages.alert');
});

Route::get('/docs/accordion', function () {
    return view('pages.accordion');
});

Route::get('/docs/avatar', function () {
    return view('pages.avatar');
});

Route::get('/docs/badge', function () {
    return view('pages.badge');
});

Route::get('/docs/breadcrumbs', function () {
    return view('pages.breadcrumbs');
});

Route::get('/docs/button', function () {
    return view('pages.button');
});

Route::get('/docs/checkbox', function () {
    return view('pages.checkbox');
});

Route::get('/docs/checkbox-group', function () {
    return view('pages.checkbox-group');
});

Route::get('/docs/chip', function () {
    return view('pages.chip');
});

Route::get('/docs/input', function () {
    return view('pages.input');
});

Route::get('/docs/input-otp', function () {
    return view('pages.input-otp');
});

Route::get('/docs/radio-group', function () {
    return view('pages.radio-group');
});

Route::get('/docs/select', function () {
    return view('pages.select');
});

Route::get('/docs/switch', function () {
    return view('pages.switch');
});

Route::get('/docs/textarea', function () {
    return view('pages.textarea');
});

Route::get('/docs/rich-text', function () {
    return view('pages.rich-text');
});

Route::get('/docs/text', function () {
    return view('pages.text');
});

Route::get('/docs/tabs', function () {
    return view('pages.tabs');
});
