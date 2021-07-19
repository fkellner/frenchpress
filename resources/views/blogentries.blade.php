<x-layout>
  <x-slot name="title">
    Home
  </x-slot>
  <section class="section">
    <div class="container">
      @foreach($blogentries as $blogentry)
      <div class="card mb-3 is-clickable"
           onclick="location = '{{route('posts', $blogentry->id)}}'">
        @if($blogentry->header_image)
        <div class="card-image">
          <figure class="image is-3by1">
            <img style="object-fit: cover;" src="{{asset('storage/' . $blogentry->header_image)}}">
          </figure>
        </div>
        @endif
        <div class="card-content">
          <h2 class="subtitle">{{$blogentry->publication_date->calendar()}}</h2>
          <h1 class="title">{{$blogentry->title}}</h1>
          <p>{{$blogentry->first_n_sentences(3)}}..<p>
        </div>
      </div>
      @endforeach
    </div>
  </section>
</x-layout>
