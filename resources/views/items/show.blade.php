<x-layouts.default>
  <section class="p-4 flex flex-col gap-4">
    <form action="{{ route('items.update', $item) }}" method="POST" class="flex flex-col gap-4 items-start">
      @csrf
      @method('PATCH')

      <x-molecules.inputGroup type="text" label="Name" name="name" id="name" htmlFor="name" value="{{ $item->name }}" />
      <div>
        <label>Completed</label>
        <input type="checkbox" name="completed" id="completed" {{ $item->completed == 1 ? 'checked' : '' }} />
      </div>

      <div class="flex flex-col">
        <x-atoms.label label="Category" />
        <select id="category_id" name="category_id" class="shadow p-2">
          <option value="" disabled selected>Select a category</option>

          @foreach($categories as $category)
            <option value="{{ $category->id }}" {{ $category->id == $item->category->id ? 'selected' : '' }}>{{ $category->name }}</option>
          @endforeach
        </select>
      </div>

      <button class="p-2 bg-blue-400 text-white rounded-2xl">Update</button>
    </form>

    <form action="{{ route('items.destroy', $item) }}" method="POST">
      @csrf
      @method('DELETE')

      <button class="p-2 bg-red-600 text-white rounded-2xl">Delete</button>
    </form>
  </section>
</x-layouts.default>