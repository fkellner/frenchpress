<?php
if(! function_exists('frenchpress_setting')) {
  function frenchpress_setting($key) {
    return App\Models\Setting::find($key)->value;
  }
}
