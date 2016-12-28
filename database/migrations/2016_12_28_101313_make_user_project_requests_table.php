<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class MakeUserProjectRequestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_project_requests', function (Blueprint $table) {
            $table->integer('user_id');
            $table->integer('project_id');
            $table->string('user_name', 255);
            $table->string('project_name', 255);
            $table->string('reason', 255);
        });
        
        Schema::table('user_project_requests', function ($table) {
            $table->index('user_id', 'index_for_requests');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('user_project_requests');
    }
}
