<x-layout>
  <x-slot name="title">
    Impressum
  </x-slot>
  <section class="section">
    <div class="container">
      <x-markdown  theme="{{frenchpress_setting('shikiTheme')}}" class="rendered-markdown">{!!frenchpress_setting('impressum')!!}</x-markdown>
    </div>
  </section>

</x-layout>
