<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCandidats extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('candidats', function (Blueprint $table) {
            $table->increments('id');
            $table->string('departement');
            $table->integer('circonscription');
            $table->boolean('titulaire');
            $table->string('nom');
            $table->string('prenom');
            $table->string('nom_usage')->nullable();
            $table->string('prenom_usage')->nullable();
            $table->string('sexe');
            $table->string('photo');
            $table->boolean('charte')->nullable();
            $table->string('date_naissance');
            $table->string('activite');
            $table->string('email');
            $table->string('telephone');
            $table->string('bio');
            $table->string('email_campagne')->nullable();
            $table->string('twitter')->nullable();
            $table->string('facebook')->nullable();
            $table->string('colistier_nom')->nullable();
            $table->string('colistier_prenom')->nullable();
            $table->string('colistier_mail')->nullable();
            $table->string('colistier_telephone')->nullable();
            $table->string('mandataire_nom')->nullable();
            $table->string('mandataire_prenom')->nullable();
            $table->string('mandataire_adresse_ligne1')->nullable();
            $table->string('mandataire_adresse_ligne2')->nullable();
            $table->string('mandataire_adresse_zipcode')->nullable();
            $table->string('mandataire_adresse_ville')->nullable();
            $table->string('mandataire_mail')->nullable();
            $table->string('mandataire_telephone')->nullable();
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
        Schema::dropIfExists('candidats');
    }
}
