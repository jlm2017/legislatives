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
            $table->integer('numDep');
            $table->integer('numCirco');
            $table->integer('titulaire')->unsigned();
            $table->integer('suppleant')->unsigned();

            $table->primary(['numDep', 'numCirco']);
            $table->foreign('titulaire')->references('idCandidat')->on('candidats')->onDelete('cascade');
            $table->foreign('suppleant')->references('idCandidat')->on('candidats')->onDelete('cascade');
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
