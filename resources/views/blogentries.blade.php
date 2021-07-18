<x-layout>
  <x-slot name="title">
    Home
  </x-slot>
  <section class="section">
    <div class="container">
      @foreach($blogentries as $blogentry)
      <div class="card mb-3">
        @if($blogentry->header_image)
        <div class="card-image">
          <figure class="image">
            <img src="images/{{$blogentry->header_image}}">
          </figure>
        </div>
        @endif
        <div class="card-content">
          <h2 class="subtitle">{{$blogentry->publication_date}}</h2>
          <h1 class="title">{{$blogentry->title}}</h1>
          <p>{{$blogentry->content}}<p>
        </div>
      </div>
      @endforeach
    </div>
  </section>
</x-layout>
