<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCommunityEngagementTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('community_engagement', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('uuid');    
            $table->string('name');    
            $table->string('age');    
            $table->string('country');    
            $table->string('region');    
            $table->string('languages_spoken');    
            $table->string('organization');    
            $table->string('thematic_area');    
            $table->string('email');    
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
        Schema::dropIfExists('community_engagement');
    }
}
