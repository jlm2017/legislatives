<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCirconscriptionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Create table Circonscriptions
        Schema::create('circonscriptions', function(Blueprint $table) {
            $table->increments('id');
            $table->integer('numDep');
            $table->integer('numCirco');
            $table->string('prenomTitu')->nullable();
            $table->string('nomTitu');
            $table->string('bioTitu');
            $table->string('prenomSupp')->nullable();
            $table->string('nomSupp')->nullable();
            $table->string('bioSupp')->nullable();
            $table->string('facebook')->nullable();
            $table->string('twitter')->nullable();
            $table->string('email')->nullable();
            $table->string('blog')->nullable();

            $table->unique(['numDep', 'numCirco']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // Delete table if migrated
        Schema::dropIfExists('circonscriptions');
    }
}
