<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('cpf', 11)->unique();
            $table->string('name', 150);
            $table->string('email', 150)->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password')->nullable();
            $table->integer('client_id', false, true)->nullable(true);
            $table->integer('fornecedor_id', false, true)->nullable(true);
            $table->tinyInteger('is_admin', false, true)->default(0)->nullable(false);
            $table->enum('role', ['A', 'V', 'F', 'E'])->comment("'A' => 'Administrativo', 'V' => 'Vendedor', 'F' => 'Funcionário'")->default('F');
            $table->tinyInteger('comissionado', false, true)->default(0)->nullable(true)->comment('Recebe comissões em vendas');
            $table->tinyInteger('produtividade', false, true)->default(0)->nullable(true)->comment('Recebe adicional de produtividade');
            $table->tinyInteger('deliver', false, true)->default(0)->nullable(true)->comment('Usuário pode realizar entregas');
            $table->tinyInteger('buyer', false, true)->default(0)->nullable(true)->comment('Usuário pode realizar compras');
            $table->dateTime('ultimo_login')->nullable(true);
            $table->dateTime('login_atual')->nullable(true);
            $table->rememberToken();
            $table->timestamps();
            $table->dateTime('deleted_at')->nullable(true);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
