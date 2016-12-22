<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddToProjects extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('projects', function (Blueprint $table) {
            //
            $table->integer('project_admin_user_id')->nullable();
            $table->string('github_link', 100)->nullable();
            $table->string('slack_link', 100)->nullable();
            $table->string('website_link', 100)->nullable();
            $table->longText('get_involved_pitch')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('projects', function (Blueprint $table) {
            //
            $table->dropColumn('project_admin_user_id');
            $table->dropColumn('github_link');
            $table->dropColumn('slack_link');
            $table->dropColumn('website_link');
            $table->dropColumn('get_involved_pitch');
        });
    }
}
