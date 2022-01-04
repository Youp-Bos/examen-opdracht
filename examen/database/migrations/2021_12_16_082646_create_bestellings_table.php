<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBestellingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::disableForeignKeyConstraints();

        Schema::create('reseverings', function (Blueprint $table) {
            $table->increments('id');
            $table->date('datum');
            $table->time('tijd');
            $table->integer('tafel')->unique();
            $table->string('naam');
            $table->bigInteger('telefoonnummer');
            $table->integer('aantal');
            $table->text('allergien')->nullable();
            $table->text('opmerkingen')->nullable();
            $table->tinyInteger('status')->default('0');
            $table->timestamps();
        });

        Schema::create('menus', function (Blueprint $table) {
            $table->increments('id');
            $table->string('code', 3)->unique();
            $table->text('naam', 20);
            $table->integer('itemcatagory');
            $table->float('prijs');
        });

        Schema::create('bestellings', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('resevering_id')->unsigned();
            $table->string('menuitem_code', 3);
            $table->integer('menuitem_catagory');
            $table->integer('hoeveelheid');
            $table->float('prijs_menuitem');

            $table->foreign('resevering_id')
                ->references('id')
                ->on('reseverings')
                ->onDelete('cascade');

            $table->foreign('menuitem_code')
                ->references('code')
                ->on('menus')
                ->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('reseverings');
        Schema::dropIfExists('menus');
        Schema::dropIfExists('bestellings');

    }
}
