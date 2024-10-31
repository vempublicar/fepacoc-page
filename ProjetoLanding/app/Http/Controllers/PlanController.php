<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session; // Importando a classe Session

class PlanController extends Controller
{
    public function confirm($plan)
    {
        // Validação simples para verificar se o plano é válido
        $availablePlans = ['basic', 'professional', 'business'];
        if (!in_array($plan, $availablePlans)) {
            return redirect()->route('plan.selection')->with('error', 'Plano inválido.');
        }

        // Armazenar o plano escolhido na sessão para uso posterior
        Session::put('selected_plan', $plan);

        // Redirecionar para o próximo formulário para completar o registro no Asaas
        return redirect()->route('register.asaas')->with('success', 'Plano selecionado com sucesso!');
    }
}
