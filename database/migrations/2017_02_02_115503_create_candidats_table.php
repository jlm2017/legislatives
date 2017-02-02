<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCandidatsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Create table candidats
        Schema::create('candidats', function(Blueprint $table) {
            $table->increments('idCandidat');
            $table->string('nom');
            $table->string('prenom');
            $table->text('bio');
            $table->string('photo');
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
        Schema::dropIfExists('candidats');
    }
}
