<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LeadController;
use App\Http\Controllers\PlanController;
use App\Http\Controllers\AsaasController;
use App\Http\Controllers\AdminController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::get('/lead-form', function () {
    return view('lead_form');
})->name('lead.form');
Route::get('/landing-b', function () {
    return view('landing_b');
})->name('landing.b');

Route::post('/lead-submit', [LeadController::class, 'store'])->name('lead.submit');

Route::get('/plan-selection', function () {
    return view('plan_selection');
})->name('plan.selection');

Route::get('/confirm-plan/{plan}', [PlanController::class, 'confirm'])->name('plan.confirm');

Route::get('/register-asaas', function () {
    return view('register_asaas');
})->name('register.asaas');

Route::post('/register-asaas-submit', [AsaasController::class, 'register'])->name('register.asaas.submit');

Route::get('/thank-you', function () {
    return view('thank_you');
})->name('thank.you');

Route::middleware(['admin.auth'])->group(function () {
    Route::get('/admin', [AdminController::class, 'index'])->name('admin.index');
    Route::get('/admin/leads/{id}', [AdminController::class, 'show'])->name('admin.show');
});

Route::get('/test-create-customer', function (App\Services\AsaasService $asaasService) {
    $customer = $asaasService->createCustomer([
        'name' => 'Cliente Teste',
        'email' => 'teste@example.com',
        'cpfCnpj' => '12345678900',
        'phone' => '11987654321',
        // outros campos obrigatórios
    ]);
    return response()->json($customer);
});

Route::get('/test-create-subscription', function (App\Services\AsaasService $asaasService) {
    $subscription = $asaasService->createSubscription([
        'customer' => 'id_do_cliente',
        'billingType' => 'CREDIT_CARD', // ou outro método de pagamento
        'value' => 100.00,
        'nextDueDate' => '2024-11-10',
        'cycle' => 'MONTHLY',
        // outros campos obrigatórios
    ]);
    return response()->json($subscription);
});

