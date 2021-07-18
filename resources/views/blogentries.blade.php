<x-layout>
  <x-slot name="title">
    Home
  </x-slot>
  @foreach($blogentries as $blogentry)
    <h1>{{$blogentry->title}}</h1>
    <p>{{$blogentry->content}}<p>
  @endforeach
</x-layout>
