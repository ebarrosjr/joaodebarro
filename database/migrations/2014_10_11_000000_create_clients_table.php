<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clients', function (Blueprint $table) {
            $table->id();
            $table->string('nome', 300)->nullable(false);
            $table->string('cnpj', 45)->nullable(false);
            $table->string('ie', 45);
            $table->string('cep', 45);
            $table->string('numero', 45);
            $table->string('complemento', 45);
            $table->string('telefone', 45);
            $table->string('email', 45);
            $table->string('endereco', 300);
            $table->enum('pix', ['C', 'T', 'E', 'A'])->comment("'C' => 'CPF/CNPJ', 'T' => 'Telefone', 'E' => 'Email', 'A' => 'Aleatória'");
            $table->string('chavepix', 300);
            $table->tinyInteger('cliente', false, true);
            $table->tinyInteger('fornecedor', false, true);
            $table->integer('street_id', false, true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('clients');
    }
}
