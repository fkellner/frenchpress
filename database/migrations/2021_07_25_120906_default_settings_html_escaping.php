<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\Setting;

class DefaultSettingsHtmlEscaping extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Setting::create([
        'key' => 'allowHTML',
        'value' => 'strip'
      ]);
      Setting::create([
        'key' => 'allowUnsafeLinks',
        'value' => 'false'
      ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
      Setting::where('key', 'allowHTML')->delete();
      Setting::where('key', 'allowUnsafeLinks')->delete();
    }
}
