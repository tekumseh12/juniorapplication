<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKniznicasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kniznicas', function (Blueprint $table) {
          $table->increments('id');
          $table->text("nazov")->nullable(false);
          $table->text("isbn")->nullable(false);
          $table->float("cena", 10,2)->nullable(false);
          $table->text("kategoria")->nullable(false);
          $table->text("autor")->nullable(false);
          $table->integer("autor1")->nullable(false);
          $table->foreign("autor1")->nullable(false)->references('id')->on('autor');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('kniznicas');
    }
}
