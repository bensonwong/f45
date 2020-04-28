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

            $table->string('slug');

            $table->string('studio_slug');
            $table->string('member_slug');
            $table->string('studio_name')->nullable();
            $table->string('member_name')->nullable();
            $table->string('img')->nullable();
            $table->integer('week_number');

            $table->string('classes')->nullable();

            $table->timestamps();
        });

        foreach (\App\Member::all() as $member) {
            Card::create([
                'studio_slug' => 'f45-dixie',
                'member_slug' => $member->slug,
                'week_number' => 18,
                'classes' => '',
            ]);
        }
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
