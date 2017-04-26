<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class RenameColumns extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('circonscriptions', function(Blueprint $t) {
            $t->renameColumn('numDep', 'departement');
        });

        Schema::table('circonscriptions', function(Blueprint $t) {
            $t->renameColumn('numCirco', 'circo');
        });

        Schema::table('circonscriptions', function(Blueprint $t) {
            $t->renameColumn('prenomTitu', 'titulaire_prenom');
        });

        Schema::table('circonscriptions', function(Blueprint $t) {
            $t->renameColumn('nomTitu', 'titulaire_nom');
        });

        Schema::table('circonscriptions', function(Blueprint $t) {
            $t->renameColumn('bioTitu', 'titulaire_bio');
        });

        Schema::table('circonscriptions', function(Blueprint $t) {
            $t->renameColumn('prenomSupp', 'suppleant_prenom');
        });

        Schema::table('circonscriptions', function(Blueprint $t) {
            $t->renameColumn('nomSupp', 'suppleant_nom');
        });

        Schema::table('circonscriptions', function(Blueprint $t) {
            $t->renameColumn('bioSupp', 'suppleant_bio');
        });

        Schema::table('circonscriptions', function(Blueprint $t) {
            $t->renameColumn('email', 'email_campagne');
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
            $t->renameColumn('departement', 'numDep');
        });

        Schema::table('circonscriptions', function(Blueprint $t) {
            $t->renameColumn('circo', 'numCirco');
        });

        Schema::table('circonscriptions', function(Blueprint $t) {
            $t->renameColumn('titulaire_prenom', 'prenomTitu');
        });

        Schema::table('circonscriptions', function(Blueprint $t) {
            $t->renameColumn('titulaire_nom', 'nomTitu');
        });

        Schema::table('circonscriptions', function(Blueprint $t) {
            $t->renameColumn('titulaire_bio', 'bioTitu');
        });

        Schema::table('circonscriptions', function(Blueprint $t) {
            $t->renameColumn('suppleant_prenom', 'prenomSupp');
        });

        Schema::table('circonscriptions', function(Blueprint $t) {
            $t->renameColumn('suppleant_nom', 'nomSupp');
        });

        Schema::table('circonscriptions', function(Blueprint $t) {
            $t->renameColumn('suppleant_bio', 'bioSupp');
        });

        Schema::table('circonscriptions', function(Blueprint $t) {
            $t->renameColumn('email_campagne', 'email');
        });
    }
}
