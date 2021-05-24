<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
            $table->id();
            $table->string('username')->unique();
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('firstname')->nullable();
            $table->string('middlename')->nullable();
            $table->string('lastname')->nullable();
            $table->string('phonenumber')->nullable();
            $table->string('address')->nullable();
            $table->string('user_status')->nullable();
            $table->string('user_category')->nullable();
            $table->string('user_type')->nullable();
            $table->string('default_password_status')->nullable();
            $table->foreignId('directorate_id')->nullable()->constrained();
            $table->foreignId('unit_id')->nullable()->constrained();
            $table->foreignId('designation_id')->nullable()->constrained();
            $table->string('avatar')->nullable();
            $table->rememberToken();
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
