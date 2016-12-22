<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class GithubAllowedNull extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('github_link');
        });
          Schema::table('users', function (Blueprint $table) {
            $table->string('github_link', 100)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('github_link', 100);
        });
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('github_link');
        });
    }
}
