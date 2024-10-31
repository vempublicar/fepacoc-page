<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Lead;

class LeadController extends Controller
{
    public function store(Request $request)
    {
        // Validação dos dados do formulário
        $messages = [
            'email.unique' => 'Este e-mail já está cadastrado. Por favor, use outro e-mail.',
        ];
        // dd($request->all());
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:leads,email',
            'whatsapp' => 'required|string|max:20',
            'user_type' => 'required|string',
        ],$messages);

        // Criar o lead no banco de dados
        Lead::create($request->all());

        // Redireciona para a próxima etapa (página de seleção de plano)
        return redirect()->route('plan.selection')->with('success', 'Lead cadastrado com sucesso!');
    }
}
