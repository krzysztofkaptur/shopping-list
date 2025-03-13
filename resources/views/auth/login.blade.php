<x-layouts.auth>
  <form action="{{ route('login') }}" method="POST" class="flex flex-col gap-4">
    @csrf

    <x-molecules.inputGroup type="email" label="Email" name="email" id="email" htmlFor="email" />
    <x-molecules.inputGroup type="password" label="Password" name="password" id="password" htmlFor="password" />

    <button class="bg-blue-500 text-white rounded-2xl p-2">Sign in</button>
  </form>
  <p>Don't have an account? <a href="{{ route('register.show') }}">Sign up</a></p>
  <hr>
  <p>or login with:</p>
  <a href="{{ route('auth.github') }}">Github</a>
</x-layouts.auth>