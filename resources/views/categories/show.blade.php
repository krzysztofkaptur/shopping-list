<x-layouts.default>
  <section class="p-4 flex flex-col gap-4">
    <h1 class="text-2xl">Details</h1>

    <form action="{{ route('categories.update', $category) }}" method="POST" class="flex flex-col gap-4 items-start">
      @csrf
      @method('PATCH')

      <x-molecules.inputGroup type="text" label="Name" name="name" id="name" htmlFor="name" value="{{ $category->name }}" />

      <button class="p-2 bg-blue-400 text-white rounded-2xl">Update</button>
    </form>

    <form action="{{ route('categories.destroy', $category) }}" method="POST">
      @csrf
      @method('DELETE')

      <button class="p-2 bg-red-600 text-white rounded-2xl">Delete</button>
    </form>
  </section>
</x-layouts.default>