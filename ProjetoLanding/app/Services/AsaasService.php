<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class AsaasService
{
    protected $apiKey;
    protected $apiUrl;

    public function __construct()
    {
        $this->apiKey = config('services.asaas.api_key');
        $this->apiUrl = config('services.asaas.api_url');
    }

    // Método para criar um cliente
    public function createCustomer(array $data)
    {
        return $this->postRequest('/customers', $data);
    }

    // Método para criar uma assinatura
    public function createSubscription(array $data)
    {
        return $this->postRequest('/subscriptions', $data);
    }

    // Método para verificar o status de um pagamento
    public function getPaymentStatus($paymentId)
    {
        return $this->getRequest("/payments/{$paymentId}");
    }

    // Método genérico para requisições POST
    protected function postRequest($endpoint, array $data)
    {
        $response = Http::withHeaders([
            'Content-Type' => 'application/json',
            'access_token' => $this->apiKey,
        ])->post($this->apiUrl . $endpoint, $data);

        return $response->json();
    }

    // Método genérico para requisições GET
    protected function getRequest($endpoint)
    {
        $response = Http::withHeaders([
            'Content-Type' => 'application/json',
            'access_token' => $this->apiKey,
        ])->get($this->apiUrl . $endpoint);

        return $response->json();
    }

    public function getCustomerByCPF($cpf)
{
    $response = Http::withHeaders([
        'Content-Type' => 'application/json',
        'access_token' => $this->apiKey,
    ])->get($this->apiUrl . '/customers', [
        'cpfCnpj' => $cpf,
    ]);

    $data = $response->json();

    // Verificar se o cliente foi encontrado
    if (!empty($data['data']) && count($data['data']) > 0) {
        return $data['data'][0]; // Retornar o primeiro cliente encontrado
    }

    return null; // Retorna null se o cliente não for encontrado
}
}
