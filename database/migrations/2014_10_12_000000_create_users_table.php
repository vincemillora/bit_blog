<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->string('user_email', 100)->unique();
            $table->string('user_name', 100);
            $table->longtext('user_description');
            $table->string('account_url', 50);
            $table->string('password', 25);
            $table->boolval('is_enabled');
            $table->longtext('account_img');
            $table->longtext('header_img');
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
        Schema::dropIfExists('users');
    }
}
