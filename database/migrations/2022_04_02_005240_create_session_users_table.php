<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('session_users', function (Blueprint $table) {
            $table->id();
            $table->foreignId('session_id')->constrained()->onUpdate('cascade')
            ->onDelete('cascade');
            $table->foreignId('user_id')->constrained()->onUpdate('cascade')
            ->onDelete('cascade');
            $table->enum('etat', array('Payer','En attente'))->default('En attente');
            $table->string('reference')->nullable();
            // $table->string('transaction_id');
            $table->string('token')->nullable();
            $table->string('operateur')->nullable();
            $table->string('message')->nullable();
            $table->string('description')->nullable();
            $table->string('customer_city')->nullable();
            $table->string('customer_country')->nullable();
            $table->string('customer_state')->nullable();
            $table->string('customer_zip_code')->nullable();
            $table->string('reponse')->nullable();
            $table->enum('niveau', array('commencer','En cour','Fini'))->default('commencer');
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
        Schema::dropIfExists('session_users');
    }
};
