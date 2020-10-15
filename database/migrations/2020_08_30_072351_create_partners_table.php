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
            $table->string('organization')->nullable();  
            $table->string('region')->nullable();      
            $table->string('country')->nullable();         
            $table->string('type_of_org')->nullable();     
            $table->string('name_of_focus_person')->nullable();            
            $table->string('position')->nullable();      
            $table->string('organization_overview')->nullable();     
            $table->string('area_of_focus')->nullable();    
            $table->string('source_funding')->nullable();  
            $table->string('thematic_area')->nullable();     
            $table->string('services_offered')->nullable();      
            $table->string('youth_focused_projects')->nullable();    
            $table->string('agreement_with_auc')->nullable(); 
            $table->string('email')->nullable();
            $table->string('website')->nullable();
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
