<x-layout>
  <x-slot name="title">
    About Me
  </x-slot>
  <section class="section">
    <div class="container">
      <x-markdown class="content"  theme="{{frenchpress_setting('shikiTheme')}}">{!!frenchpress_setting('about_me')!!}</x-markdown>
    </div>
  </section>

</x-layout>
