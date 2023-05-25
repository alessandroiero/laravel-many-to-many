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
        Schema::create('project_technology', function (Blueprint $table) {
            // $table->id();
            // se viene eliminato un project vengono eliminate anche tutte le righe dove presente project_id
            $table->foreignId('project_id')->constrained()->cascadeOnDelete(); //con casccade stiamo cancellando dalla tabella ponte
            $table->foreignId('technology_id')->constrained()->cascadeOnDelete();

            // senza una chiave primaria la creiamo noi con l'array formato da project id e technology id
            $table->primary(['project_id', 'technology_id']);
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
        Schema::dropIfExists('project_technology');
    }
};
