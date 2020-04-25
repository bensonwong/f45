<?php

use App\Card;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCardsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cards', function (Blueprint $table) {
            $table->id();

            $table->string('studio_name');
            $table->string('member_name');
            $table->string('img');
            $table->integer('week_number');

            $table->string('classes')->nullable();

            $table->timestamps();
        });

        Card::create([
            'studio_name' => 'F45 DIXIE',
            'member_name' => 'Janice Rogers',
            'week_number' => 17,
            'classes' => 'foxtrot,bears,tripledouble,romans',
            'img' => '/img/janice.png',
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cards');
    }
}
