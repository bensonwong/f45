<?php

use App\Session;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSessionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sessions', function (Blueprint $table) {
            $table->id();

            $table->string('name');
            $table->string('slug');
            $table->smallInteger('week_number')->nullable();
            $table->json('exercises')->nullable();

            $table->timestamps();
        });

        $exercises = json_encode([
            'High Knees on the Spot' => 110,
            'Jump Squat' => 110,
            'Push Up' => 110*5/25,
            'Mountain Climbers' => 110 * 20/25,
            'Running Malcom' => 110,
            'Ice Skater' => 110,
            'Hand Walks In and Hand Walks Out' => 110,
            'Sprint On The Spot' => 110/2,
            'Straight Punches' => 110/2,
            'Double Foot Mountain Climbers' => 110*5/9,
            'Lateral shoot throughs' => 110*4/9,
            'Power Knee Tucks' => 110,
            'Push up + Clap' => 110,
            'Russian Twist' => 110*10/12,
            'Jackknives' => 110*2/12,
            'Inchworm'=> 110 /3,
            'Lunge Jump'=> 110*2/3,
        ]);

        Session::create([
            'week_number' => 18,
            'name' => 'Foxtrot',
            'exercises' => $exercises
        ]);

        $exercises = json_encode([
            'Inchworm' => 140/3,
            'Prisoner Squat' => 140*2/3,
            'Push Up' => 140,
            '180 Lunge Reach' => 140,
            'Kneeling Plank Alternate Limb Raise' => 140,
            'Speed Squats' => 140,
            'Hip Thruster' => 140,
            'Ab Crunch and Twist' => 140,
            'Moving Plank' => 140,
            'Squat Mid Point Alternating Forward Lunges' => 140
        ]);

        Session::create([
            'week_number' => 18,
            'name' => 'Romans',
            'exercises' => $exercises
        ]);

        Schema::create('session_member', function (Blueprint $table) {
            $table->id();

            $table->integer('member_id')->unsigned();
            $table->integer('session_id')->unsigned();

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
        Schema::dropIfExists('sessions');
    }
}
