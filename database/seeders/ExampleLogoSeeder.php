<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;

class ExampleLogoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      Storage::disk('public')->put(
        '/logo/logo.svg',
        Storage::get('example_images/logo.svg'),
      );
    }
}
