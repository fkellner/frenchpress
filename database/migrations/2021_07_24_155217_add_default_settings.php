<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Storage;
use App\Models\Setting;

class AddDefaultSettings extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Setting::create([
          'key' => 'website_title',
          'value' => 'My FrenchPress Website'
        ]);
        Setting::create([
          'key' => 'about_me',
          'value' => '# About the author'
        ]);
        Setting::create([
          'key' => 'impressum',
          'value' => '# Legal Information'
        ]);
        Setting::create([
          'key' => 'logo_path',
          'value' => 'logo/logo.svg'
        ]);

        Storage::disk('public')->put(
          '/logo/logo.svg',
          Storage::get('example_images/logo.svg'),
        );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Setting::where('key', 'website_title')->delete();
        Setting::where('key', 'about_me')->delete();
        Setting::where('key', 'impressum')->delete();
        Setting::where('key', 'logo_path')->delete();

        Storage::disk('public')->delete('/logo/logo.svg');
    }
}
