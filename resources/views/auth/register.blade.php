<x-layouts.auth>
  <form action="{{ route('register') }}" method="POST" class="flex flex-col gap-4">
    @csrf

    <x-molecules.inputGroup type="text" label="Name" name="name" id="name" htmlFor="name" />
    <x-molecules.inputGroup type="email" label="Email" name="email" id="email" htmlFor="email" />
    <x-molecules.inputGroup type="password" label="Password" name="password" id="password" htmlFor="password" />
    <x-molecules.inputGroup type="password" label="Confirm password" name="password_confirmation" id="password_confirmation" htmlFor="password_confirmation" />

    <button class="bg-blue-500 text-white rounded-2xl p-2">Sign up</button>
  </form>

  <p>Already have an account? <a href="{{ route('login.show') }}">Sign in</a></p>
  <hr>
  <p>or login with:</p>
  <a href="{{ route('auth.github') }}">Github</a>
</x-layouts.auth>