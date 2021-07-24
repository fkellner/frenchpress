<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AddDefaultAdmin extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        User::create([
          'name' => 'Default Admin',
          'email' => env('ADMIN_MAIL', 'test@admin.com'),
          'password' => Hash::make(env('ADMIN_DEFAULT_PASSWORD', 'superinsecuretestpassword'))
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        User::where('name', 'Default Admin')->delete();
    }
}
