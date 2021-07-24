<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Setting;

class SettingController extends Controller
{
    function settings_form() {
      return view('settings');
    }

    /**
     * Update website settings
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\View\View
     */
    public function update_settings(Request $request)
    {
      $form_data = $request->validate([
        'website_title' => 'required|min:1',
        'about_me' => 'required|min:1',
        'impressum' => 'required|min:1'
      ]);
      foreach (array('website_title', 'about_me', 'impressum') as $setting) {
        $s = Setting::find($setting);
        $s->value = $form_data[$setting];
        $s->save();
      }

      if($request->hasFile('logo')) {
        $name = $request->file('logo')->getClientOriginalName();
        $s = Setting::find('logo_path');
        $s->value = $request->file('logo')
          ->storeAs('logo', $name, 'public');
        $s->save();
      }
      return redirect(route('home'));
    }
}
