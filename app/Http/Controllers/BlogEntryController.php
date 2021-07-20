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
       'blogentries' => BlogEntry::get_visible()
         ->orderBy('publication_date', 'desc')->get()
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

    /**
     * Show one blog entry
     *
     * @return \Illuminate\View\View
     */
     function show($id) {
       $entry = BlogEntry::find($id);
       return view('blogentry', [
         'blogentry' => $entry,
         'previous' => BlogEntry::get_visible()->where(
           'publication_date',
           '>',
           $entry->publication_date
         )->orderBy('publication_date', 'asc')->first(),
         'next' => BlogEntry::get_visible()->where(
           'publication_date',
           '<',
           $entry->publication_date
         )->orderBy('publication_date', 'desc')->first()
         ]);
     }

     /**
      * Show one blog entry
      *
      * @return \Illuminate\View\View
      */
      function create_form() {
        return view('add_blogentry');
      }

      /**
       * Validate Form and create BlogEntry
       *
       * @param \Illuminate\Http\Request $request
       * @return \Illuminate\View\View
       */
      public function create(Request $request)
      {
        $form_data = $request->validate([
          'title' => 'required|min:1',
          'content' => 'required|min:1',
          'publication_date' => 'required|date'
        ]);
        $form_data['header_image'] = '';
        $blogentry = BlogEntry::create($form_data);

        if($request->hasFile('image')) {
          $blogentry->setHeader($request->file('image'));
        }
        return redirect(route('posts', $blogentry->id));
      }
}
