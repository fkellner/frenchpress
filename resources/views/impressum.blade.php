<x-layout>
  <x-slot name="title">
    Impressum
  </x-slot>
  <section class="section">
    <div class="container box">
      <x-markdown  theme="{{frenchpress_setting('shikiTheme')}}" class="content">{!!frenchpress_setting('impressum')!!}</x-markdown>
    </div>
  </section>

</x-layout>
