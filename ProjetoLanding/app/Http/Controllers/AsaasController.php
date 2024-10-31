<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\AsaasService;
use App\Models\CadastradoAsaas;

class AsaasController extends Controller
{
    public function register(Request $request, AsaasService $asaasService)
    {
        $validatedData = $request->validate([
            'name' => 'required|string',
            'email' => 'required|email',
            'phone' => 'required|string',
            'cpf' => 'required|string',
            'address' => 'required|string',
            'company_name' => 'required|string',
            'cnpj' => 'required|string',
            'plan_name' => 'required|string',
            'plan_value' => 'required|numeric',
            'plan_description' => 'required|string',
            'payment_cycle' => 'required|string|in:MONTHLY,ANNUAL',
        ]);

        // Consulta pelo CPF no Asaas para verificar se o cliente já está registrado
        $existingCustomer = $asaasService->getCustomerByCPF($validatedData['cpf']);

        if ($existingCustomer) {
            $customerId = $existingCustomer['id'];
        } else {
            // Criar o Customer se não existir
            $customer = $asaasService->createCustomer([
                'name' => $validatedData['name'],
                'email' => $validatedData['email'],
                'cpfCnpj' => $validatedData['cpf'],
                'phone' => $validatedData['phone'],
                'address' => $validatedData['address'],
                'company' => $validatedData['company_name'],
                'cnpj' => $validatedData['cnpj'],
            ]);

            if (isset($customer['errors'])) {
                return redirect()->back()->withErrors($customer['errors'])->withInput();
            }

            $customerId = $customer['id'];
        }

        // Ajustar o valor do plano conforme o ciclo
        $billingCycle = $validatedData['payment_cycle'];
        $planValue = $billingCycle === 'ANNUAL' ? $validatedData['plan_value'] * 12 * 0.9 : $validatedData['plan_value'];

        // Criar a assinatura usando o ID do Customer
        $subscription = $asaasService->createSubscription([
            'customer' => $customerId,
            'billingType' => 'UNDEFINED', // Ajuste para o método de pagamento
            'value' => $planValue,
            'cycle' => $billingCycle,
            'description' => 'Assinatura do ' . $validatedData['plan_name'],
        ]);

        if (isset($subscription['errors'])) {
            return redirect()->back()->withErrors($subscription['errors'])->withInput();
        }

        // Salvar o usuário na tabela cadastrados_asaas com o customer_id do Asaas
        CadastradoAsaas::create([
            'customer_id' => $customerId,
            'name' => $validatedData['name'],
            'email' => $validatedData['email'],
            'phone' => $validatedData['phone'],
            'cpf' => $validatedData['cpf'],
            'address' => $validatedData['address'],
            'company_name' => $validatedData['company_name'],
            'cnpj' => $validatedData['cnpj'],
            'plan_name' => $validatedData['plan_name'], // Certifique-se de que este campo está preenchido
            'plan_value' => $planValue,
            'payment_cycle' => $billingCycle,
            'subscription_id' => $subscription['id'],
        ]);

        return redirect()->route('thank.you')->with('success', 'Assinatura criada com sucesso!');
    }
}
