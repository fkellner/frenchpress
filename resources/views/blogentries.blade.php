<x-layout>
  <x-slot name="title">
    Home
  </x-slot>
  <section class="section">
    <div class="container">
      @foreach($blogentries as $blogentry)
        <h1 class="title">{{$blogentry->title}}</h1>
        <p>{{$blogentry->content}}<p>
      @endforeach
    </div>
  </section>
</x-layout>
