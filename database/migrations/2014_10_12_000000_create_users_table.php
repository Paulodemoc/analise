<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('usuarios', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nome');
            $table->string('login')->unique();
            $table->string('senha');
            $table->integer('tipo');
            $table->timestamp('created_at')->default(DB::raw('CURRENT_TIMESTAMP(0)'));
            $table->timestamp('updated_at')->default(DB::raw('CURRENT_TIMESTAMP(0)'));
        });

        DB::table('usuarios')->insert(
            array(
              'nome' => 'Administrador',
              'login' => 'admin',
              'senha' => 'admin',
              'tipo' => 1
            )
        );

        DB::table('usuarios')->insert(
            array(
              'nome' => 'Operador',
              'login' => 'operador',
              'senha' => 'operador',
              'tipo' => 2
            )
        );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('usuarios');
    }
}
