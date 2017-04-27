<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class RenameCircoColumn extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('circonscriptions', function(Blueprint $t) {
            $t->renameColumn('circo', 'numero');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('circonscriptions', function(Blueprint $t) {
            $t->renameColumn('numero', 'circo');
        });
    }
}
