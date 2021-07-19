<x-layout>
  <x-slot name="title">
    {{$blogentry->title}}
  </x-slot>
  <section class="hero">
    <div class="hero-body">
      <figure class="image is-3by1">
        <img style="object-fit: cover;" src="{{asset('storage/' . $blogentry->header_image)}}">
      </figure>
      <p class="subtitle mt-2">{{$blogentry->publication_date->calendar()}}</p>
      <p class="title">{{$blogentry->title}}</p>
    </div>
  </section>
  <section class="section">
    <div class="container">
      <p>{{$blogentry->content}}</p>
      <div class="columns mt-6">
        @if($previous)
        <div class="column">
          <a href="{{route('posts', $previous->id)}}">
            <i class="fas fa-chevron-left"></i>
            {{$previous->title}}
          </a>
        </div>
        @endif
        @if($next)
        <div class="column">
          <a class="is-pulled-right" href="{{route('posts', $next->id)}}">
            {{$next->title}}
            <i class="fas fa-chevron-right"></i>
          </a>
        </div>
        @endif
    </div>
  </section>
</x-layout>
