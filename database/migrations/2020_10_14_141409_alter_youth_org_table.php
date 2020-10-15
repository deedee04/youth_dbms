<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterYouthOrgTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('youth_org', function (Blueprint $table) {
            $table->string('name',500)->change();
            $table->string('location')->nullable()->change();
            $table->string('legal_status')->nullable()->change();
            $table->string('thematic_focus')->nullable()->change();
            $table->string('phone')->nullable()->change();
            $table->string('email',500)->nullable()->change();
            $table->string('website')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('youth_org', function (Blueprint $table) {
            //
        });
    }
}
