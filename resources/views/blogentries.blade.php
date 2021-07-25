<x-layout>
  <x-slot name="title">
    {{ frenchpress_setting('website_title') }}
  </x-slot>
  <section class="section">
    <div class="container">
      @foreach($blogentries as $blogentry)
      <div class="card mb-3">
        @if($blogentry->header_image)
        <div class="card-image is-clickable"
             onclick="location = '{{route('posts', $blogentry->id)}}'">
          <figure class="image is-3by1">
            <img style="object-fit: cover;" src="{{asset('storage/' . $blogentry->header_image)}}">
          </figure>
        </div>
        @endif
        <div class="card-content">
          <div>
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
            <h2 class="subtitle">{{$blogentry->publication_date->calendar()}}</h2>
            <h1 class="title is-clickable"
                 onclick="location = '{{route('posts', $blogentry->id)}}'">
              {{$blogentry->title}}
            </h1>
          </div>
          <div class="mb-5">
            <x-markdown  theme="{{frenchpress_setting('shikiTheme')}}" class="content">{!!$blogentry->first_n_lines(5)!!}</x-markdown>
            <a class="is-pulled-right mt-3 mb-3" href="{{route('posts', $blogentry->id)}}">
              continue reading
              <i class="fas fa-chevron-right"></i>
            </a>
          </div>
        </div>
      </div>

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

      @endforeach
    </div>
  </section>
</x-layout>
