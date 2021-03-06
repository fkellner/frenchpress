<x-layout>
  <x-slot name="title">
    Add Post
  </x-slot>
  <section class="section">
    <div class="container box">
      <h1 class="title">Create new Post</h1>
      <x-blogentry_form :blogentry="false">
        <x-slot name="action">
          {{ route('create_blogentry' )}}
        </x-slot>
        <x-slot name="submitText">
          Save
        </x-slot>
      </x-blogentry_form>
    </div>
  </section>
</x-layout>
