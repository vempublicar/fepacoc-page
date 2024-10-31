<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('cadastrado_asaas', function (Blueprint $table) {
            $table->id();
            $table->string('customer_id'); // ID retornado pelo Asaas
            $table->string('name');
            $table->string('email');
            $table->string('phone');
            $table->string('cpf');
            $table->string('address');
            $table->string('company_name')->nullable();
            $table->string('cnpj')->nullable();
            $table->string('plan_name'); // Nome do plano escolhido
            $table->decimal('plan_value', 8, 2); // Valor do plano
            $table->string('payment_cycle'); // Ciclo de pagamento (MONTHLY ou ANNUAL)
            $table->string('subscription_id')->nullable(); // ID da assinatura no Asaas
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cadastrado_asaas');
    }
};
