<x-layout>
  <x-slot name="title">
    Updating {{$blogentry->title}}
  </x-slot>
  <section class="section">
    <div class="container">
      <h1 class="title">Updating Post</h1>
      <x-blogentry_form :blogentry="$blogentry">
        <x-slot name="action">
          {{ route('update_blogentry', $blogentry->id)}}
        </x-slot>
        <x-slot name="submitText">
          Update
        </x-slot>
      </x-blogentry_form>
    </div>
  </section>
</x-layout>
