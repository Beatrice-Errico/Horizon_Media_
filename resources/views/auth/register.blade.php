<x-main-layout>
  <x-slot name="title">Registrati</x-slot>


  <div class="nyt-login-wrapper">
    <h1 class="nyt-login-title">Crea un nuovo account</h1>

    <form action="{{ route('register') }}" method="POST" class="nyt-login-form" novalidate>
      @csrf

      <div class="mb-4 text-start">
        <label for="name" class="nyt-label">Nome utente</label>
        <input 
          type="text" 
          name="name" 
          id="name" 
          class="nyt-input @error('name') is-invalid @enderror" 
          value="{{ old('name') }}" 
          required 
          autofocus
        >
        @error('name')
          <div class="nyt-error">{{ $message }}</div>
        @enderror
      </div>

      <div class="mb-4 text-start">
        <label for="email" class="nyt-label">Email</label>
        <input 
          type="email" 
          name="email" 
          id="email" 
          class="nyt-input @error('email') is-invalid @enderror" 
          value="{{ old('email') }}" 
          required
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

      <div class="mb-4 text-start">
        <label for="password_confirmation" class="nyt-label">Conferma password</label>
        <input 
          type="password" 
          name="password_confirmation" 
          id="password_confirmation" 
          class="nyt-input" 
          required
        >
      </div>

      <button type="submit" class="nyt-button">Registrati</button>

      <div class="nyt-footer-link">
        <p>Hai già un account? 
          <a href="{{ route('login') }}">Accedi qui</a>
        </p>
      </div>
    </form>
  </div>


    <div class="bgcolor" style="padding-bottom: 200px;"></div>

</x-main-layout>

