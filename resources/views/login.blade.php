<x-layout>
  <x-slot name="title">
    Login
  </x-slot>
  <section class="section">
    <div class="container box">
      <h1 class="title">Login</h1>
      <form method="post" action="{{route('authenticate')}}">
        @csrf

        <div class="field">
          <label class="label">Email</label>
          <div class="control">
            <input class="input"
                   type="email"
                   name="email"
                   value="{{ old('email') }}">
          </div>
          @error('email')
          <p class="help is-danger">
            {{$message}}
          </p>
          @enderror
        </div>

        <div class="field">
          <label class="label">Password</label>
          <div class="control">
            <input class="input"
                   type="password"
                   name="password">
          </div>
          @error('password')
          <p class="help is-danger">
            {{$message}}
          </p>
          @enderror
        </div>

        <div class="field">
          <div class="control">
            <input class="button" type="submit" value="Login">
          </div>
        </div>

      </form>
    </div>
  </section>
</x-layout>
