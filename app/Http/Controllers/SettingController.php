<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Setting;
use Illuminate\Support\Facades\Cache;
use Illuminate\Validation\Rule;

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
      // first the simple stuff: strings
      $form_data = $request->validate([
        'website_title' => 'required|min:1',
        'about_me' => 'required|min:1',
        'impressum' => 'required|min:1',
        'shikiTheme' => [
          'required',
          Rule::in(['dark-plus','github-dark','github-light','light-plus','material-darker','material-default','material-lighter','material-ocean','material-palenight','min-dark','min-light','monokai','nord','poimandres','slack-dark','slack-ochin','solarized-dark','solarized-light']),
        ],
      ]);
      foreach (array('website_title', 'about_me', 'impressum', 'shikiTheme') as $setting) {
        $s = Setting::find($setting);
        $s->value = $form_data[$setting];
        $s->save();
      }

      // then the checkboxes with more complex values
      $allowHTML = Setting::find('allowHTML');
      $allowHTML->value = $request->boolean('allowHTML') ? 'allow' : 'strip';
      $allowHTML->save();

      $allowUnsafeLinks = Setting::find('allowUnsafeLinks');
      $allowUnsafeLinks->value = $request->boolean('allowUnsafeLinks') ? 'true' : 'false';
      $allowUnsafeLinks->save();

      // flush cache to apply changes in markdown configuration
      Cache::flush();

      // then the logo file
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
