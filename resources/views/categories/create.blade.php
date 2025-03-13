<x-layouts.default>
  <section class="p-4 flex flex-col gap-4">
    <h1 class="text-2xl">Create a new category</h1>
    <form action="{{ route('categories.store') }}" method="POST" class="flex flex-col gap-4 items-start">
      @csrf

      <x-molecules.inputGroup type="text" label="Name" name="name" id="name" htmlFor="name" />

      <button class="p-2 bg-blue-400 text-white rounded-2xl">Create</button>
    </form>
  </section>
</x-layouts.default>