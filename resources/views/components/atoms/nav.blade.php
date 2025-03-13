<nav class="w-full flex justify-between p-4">
  @auth
    <div class="flex gap-4">
      <a href="{{ route('items.index') }}" class="{{ request()->routeIs('items.index') ? 'text-red-500' : '' }}">Items</a>
      <a href="{{ route('categories.index') }}" class="{{ request()->routeIs('categories.index') ? 'text-red-500' : '' }}">Categories</a>
    </div>

    <div class="flex gap-4 items-center">
      <span>{{ Auth::user()->email }}</span>
      <form action="{{ route('logout') }}" method="POST">
        @csrf
        
        <button class="text-sm">Logout</button>
      </form>
    </div>
  @endauth

  @guest
    <a href="{{ route('login.show') }}">Login</a>
    <a href="{{ route('register.show') }}">Sign up</a>
  @endguest
</nav>