<?php

namespace App\Http\Controllers;

use App\Models\Lead;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        // Obtém todos os leads
        $leads = Lead::all();
        return view('admin.index', compact('leads'));
    }

    public function show($id)
    {
        // Exibe detalhes de um lead específico
        $lead = Lead::findOrFail($id);

        // Aqui é possível incluir uma chamada à API do Asaas para obter o status do pagamento
        // $status = $this->getAsaasStatus($lead);

        return view('admin.show', compact('lead'));
    }

    // Função para obter o status da assinatura no Asaas (a ser implementada)
    private function getAsaasStatus($lead)
    {
        // Exemplo de chamada à API do Asaas para obter status
    }
}
