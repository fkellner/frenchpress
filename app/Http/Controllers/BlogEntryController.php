<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BlogEntry;

class BlogEntryController extends Controller
{
  /**
   * Show the overview over the progress of all tasks
   *
   * @return \Illuminate\View\View
   */
   function show_all() {
     return view('blogentries', ['blogentries' => BlogEntry::all()]);
   }
}
