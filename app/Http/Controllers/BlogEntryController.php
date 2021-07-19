<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BlogEntry;
use Carbon\Carbon;

class BlogEntryController extends Controller
{
  /**
   * Show all published blog entries
   *
   * @return \Illuminate\View\View
   */
   function show_published() {
     return view('blogentries', [
       'blogentries' => BlogEntry::where(
         'publication_date',
          '<=',
           Carbon::now()
         )->orderBy('publication_date', 'desc')->get()
       ]);
   }

   /**
    * Show all blog entries waiting for publication
    *
    * @return \Illuminate\View\View
    */
    function show_planned() {
      return view('blogentries', [
        'blogentries' => BlogEntry::where(
          'publication_date',
           '>',
            Carbon::now()
          )->orderBy('publication_date', 'asc')->get()
        ]);
    }
}
