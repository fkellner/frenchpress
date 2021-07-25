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
   * @param $id
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
  * Blog entry creation form
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

  /**
   * Blog Entry update form
   *
   * @return \Illuminate\View\View
   * @param $id
   */
  function update_form($id) {
    $entry = BlogEntry::find($id);
    return view('update_blogentry', ['blogentry' => $entry]);
  }

  /**
   * Validate Form and update BlogEntry
   *
   * @param $id
   * @param \Illuminate\Http\Request $request
   * @return \Illuminate\View\View
   */
  public function update($id, Request $request)
  {
   $blogentry = BlogEntry::find($id);
   $form_data = $request->validate([
     'title' => 'required|min:1',
     'content' => 'required|min:1',
     'publication_date' => 'required|date'
   ]);
   $blogentry->title = $form_data['title'];
   $blogentry->content = $form_data['content'];
   $blogentry->publication_date = $form_data['publication_date'];
   $blogentry->save();

   if($request->hasFile('image')) {
     $blogentry->setHeader($request->file('image'));
   }
   return redirect(route('posts', $blogentry->id));
  }

  /**
   * Delete blog entry
   *
   * @return \Illuminate\View\View
   * @param $id
   */
  function delete($id) {
    $entry = BlogEntry::find($id);
    $entry->delete();
    return redirect(route('home'));
  }

  /**
   * Render Markdown Preview
   *
   * @param \Illuminate\Http\Request $request
   * @return \Illuminate\View\View
   */
  public function render(Request $request)
  {
    $form_data = $request->validate([
      'markdown' => 'required|min:1',
      'theme' => 'nullable'
    ]);
    return view('markdown-render', $form_data);
  }


}
