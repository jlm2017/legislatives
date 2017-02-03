<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLiensTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Create table Liens
        Schema::create('liens', function(Blueprint $table) {
            $table->integer('idCandidat')->unsigned();
            $table->string('label');
            $table->text('url');

            $table->primary(['idCandidat', 'label']);
            $table->foreign('idCandidat')->references('idCandidat')->on('candidats')->onDelete('cascade');
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
        Schema::dropIfExists('liens');
    }
}
