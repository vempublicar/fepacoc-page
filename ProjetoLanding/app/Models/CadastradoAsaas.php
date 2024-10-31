<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CadastradoAsaas extends Model
{
    use HasFactory;

    protected $fillable = [
        'customer_id',
        'name',
        'email',
        'phone',
        'cpf',
        'address',
        'company_name',
        'cnpj',
        'plan_name',        // Adicionado
        'plan_value',       // Adicionado
        'payment_cycle',    // Adicionado
        'subscription_id',  // Adicionado
    ];
}
