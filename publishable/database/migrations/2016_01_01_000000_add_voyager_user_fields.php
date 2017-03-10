<?php

use Illuminate\Database\Migrations\Migration;

class AddVoyagerUserFields extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        $user_class = '\\' . config('voyager.user.namespace');
        $primary_key = with(new $user_class)->getKeyName();

        Schema::table('users', function ($table) use ($primary_key) {
            $table->string('avatar')->nullable()->after('email');
            $table->integer('role_id')->nullable()->after($primary_key);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::table('users', function ($table) {
            $table->dropColumn('avatar');
            $table->dropColumn('role_id');
        });
    }
}
