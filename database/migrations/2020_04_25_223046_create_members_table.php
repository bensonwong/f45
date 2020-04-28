<?php

use App\Member;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMembersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('members', function (Blueprint $table) {
            $table->id();

            $table->string('slug');
            $table->string('name');

            $table->string('img')->nullable();

            $table->string('studio_slug')->nullable();

            $table->timestamps();
        });

        $members = [
            'Rob Burre' => 'rob.png',
            'Janice Ritchie' => 'janice.png',
            'Ben Wong' => 'ben.png',
            'Pam Lis' => 'pam.png',
            'Justin Mah' => 'justin.png',
            'Amber Thompson' => 'amber.png',
        ];

        foreach ($members as $name => $img) {
            Member::create([
                'name' => $name,
                'img' => $img,
                'studio_slug' => 'f45-dixie',
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
        Schema::dropIfExists('members');
    }
}
