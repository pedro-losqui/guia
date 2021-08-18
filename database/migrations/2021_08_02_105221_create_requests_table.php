<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRequestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('requests', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('company_id');
            $table->unsignedBigInteger('partner_id');
            $table->string('protocol');
            $table->enum('status', ['Valida', 'Invalida'])->default('Valida');
            $table->enum('situation', ['Solicitado', 'Agendado', 'Recebido', 'Digitado'])->default('Solicitado');
            $table->string('service', 30);
            $table->string('cpf', 14);
            $table->string('employee_name', 100);
            $table->enum('gender', ['M', 'F']);
            $table->date('born_date');
            $table->string('department', 100);
            $table->string('post', 100);
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')
            ->onUpdate('cascade')
            ->onDelete('cascade');

            $table->foreign('company_id')->references('id')->on('companies')
            ->onUpdate('cascade')
            ->onDelete('cascade');

            $table->foreign('partner_id')->references('id')->on('partners')
            ->onUpdate('cascade')
            ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('requests');
    }
}
