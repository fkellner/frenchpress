<x-layout>
  <x-slot name="title">
    {{$blogentry->title}}
  </x-slot>
  <section class="hero is-medium"
           @if($blogentry->header_image)
           style="background-image: url('{{asset('storage/' . $blogentry->header_image)}}'); background-size: cover;"
           @endif>
    <div class="hero-body">
    </div>
  </section>
  <section class="section pt-3">
    <div class="container box">
      <div class="block">
        @auth
        <a class="is-pulled-right ml-3"
           title="delete post"
           onclick="document.getElementById('delete_modal_{{$blogentry->id}}').classList.add('is-active')">
          <i class="fas fa-trash"></i>
        </a>
        <a class="is-pulled-right" title="edit post" href="{{route('update_blogentry', $blogentry->id)}}">
          <i class="fas fa-pen"></i>
        </a>
        @endauth

        <p class="subtitle mt-2">{{$blogentry->publication_date->calendar()}}</p>
        <p class="title is-1">{{$blogentry->title}}</p>
      </div>
      <x-markdown  theme="{{frenchpress_setting('shikiTheme')}}" class="content">{!!$blogentry->content!!}</x-markdown>
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

  @auth
  <div class="modal" id="delete_modal_{{$blogentry->id}}">
    <div class="modal-background"
         onclick="document.getElementById('delete_modal_{{$blogentry->id}}').classList.remove('is-active')">
    </div>
    <div class="modal-content">
      <form action="{{route('delete_blogentry', $blogentry->id)}}"
            method="post">
        @csrf
        <input type="submit" class="button is-danger"
               value="Confirm deleting Post: {{$blogentry->title}}">
      </form>
    </div>
    <button class="modal-close is-large" aria-label="close"
            onclick="document.getElementById('delete_modal_{{$blogentry->id}}').classList.remove('is-active')">
    </button>
  </div>
  @endauth

</x-layout>
