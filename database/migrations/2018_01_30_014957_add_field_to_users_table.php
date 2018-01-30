<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddFieldToUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('provider')->nullable();
            $table->string('provider_id')->nullable();
            $table->boolean('is_admin')->default(config('setting.not_admin'));
            $table->string('phone')->nullable();
            $table->string('address')->nullable();
            $table->string('village_or_ward')->nullable();
            $table->string('district_or_town')->nullable();
            $table->string('province_or_city')->nullable();
            $table->date('date_of_birth')->nullable();
            $table->boolean('gender')->nullable();
            $table->string('avatar')->nullable();
            $table->boolean('is_ban')->default(config('setting.not_ban'));
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
            $table->dropColumn('provider');
            $table->dropColumn('provider_id');
            $table->dropColumn('is_admin');
            $table->dropColumn('phone');
            $table->dropColumn('address');
            $table->dropColumn('village_or_ward');
            $table->dropColumn('district_or_town');
            $table->dropColumn('province_or_city');
            $table->dropColumn('date_of_birth');
            $table->dropColumn('gender');
            $table->dropColumn('avatar');
            $table->dropColumn('is_ban');
        });
    }
}
