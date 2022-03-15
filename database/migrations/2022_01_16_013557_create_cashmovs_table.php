<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCashmovsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cashmovs', function (Blueprint $table) {
            $table->increments('idcashmovs');
            $table->date('date');
            $table->string('description');
            $table->decimal('amount',10,2);
            $table->string('type',25);
            $table->unsignedInteger('idcashcategories')->nullable();
            $table->foreign('idcashcategories')
                    ->references('idcashcategories')
                    ->on('cash_categories')
                    ->onDelete('set null');
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
        Schema::dropIfExists('cashmovs');
    }
}
