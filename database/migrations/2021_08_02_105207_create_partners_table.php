<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePartnersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('partners', function (Blueprint $table) {
            $table->id();
            $table->string('name', 150);
            $table->string('email', 100);
            $table->enum('status', ['Ativa', 'Inativa']);
            $table->enum('type', ['Parceiro', 'Não Parceiro']);
            $table->string('telephone', 15)->nullable();
            $table->string('cell_phone', 15)->nullable();
            $table->integer('sla')->unsigned()->nullable();
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
        Schema::dropIfExists('partners');
    }
}
