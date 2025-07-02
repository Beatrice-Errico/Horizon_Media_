<x-main-layout>

  <x-slot name="title">Accedi</x-slot>


  <div class="nyt-login-wrapper">
    <h1 class="nyt-login-title">Accedi al tuo account</h1>

    <form action="{{ route('login') }}" method="POST" class="nyt-login-form" novalidate>
      @csrf

      <div class="mb-4 text-start">
        <label for="email" class="nyt-label">Email</label>
        <input 
          type="email" 
          name="email" 
          id="email" 
          class="nyt-input @error('email') is-invalid @enderror" 
          value="{{ old('email') }}" 
          required 
          autofocus 
        >
        @error('email')
          <div class="nyt-error">{{ $message }}</div>
        @enderror
      </div>

      <div class="mb-4 text-start">
        <label for="password" class="nyt-label">Password</label>
        <input 
          type="password" 
          name="password" 
          id="password" 
          class="nyt-input @error('password') is-invalid @enderror" 
          required
        >
        @error('password')
          <div class="nyt-error">{{ $message }}</div>
        @enderror
      </div>

      <button type="submit" class="nyt-button">Accedi</button>

      <div class="nyt-footer-link">
        <p>Non sei registrato? 
          <a href="{{ route('register') }}">Clicca qui</a>
        </p>
      </div>
    </form>
  </div>



    <div class="bgcolor" style="padding-bottom: 200px;"></div>
</x-main-layout>