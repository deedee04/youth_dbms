<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePartnersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('partners', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('uuid');    
            $table->string('organization');    
            $table->string('region');    
            $table->string('country');    
            $table->string('address');    
            $table->string('type_of_org');    
            $table->string('name_of_focus_person');    
            $table->string('phone');    
            $table->string('email');    
            $table->string('website');    
            $table->string('position');    
            $table->string('organization_review');    
            $table->string('area_of_focus');    
            $table->string('source_funding');    
            $table->string('thematic_area');    
            $table->string('services_offered');    
            $table->string('youth_focused_projects');    
            $table->string('agreement_with_auc');    
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
        Schema::dropIfExists('partners');
    }
}
