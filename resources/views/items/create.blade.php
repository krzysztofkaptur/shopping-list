<x-layouts.default>
  <section class="p-4 flex flex-col gap-4">
    <form action="{{ route('items.store') }}" method="POST" class="flex flex-col gap-4 items-start">
      @csrf

      <x-molecules.inputGroup type="text" label="Name" name="name" id="name" htmlFor="name" />

      <div class="flex flex-col">
        <x-atoms.label label="Category" />
        <select id="category_id" name="category_id" class="shadow p-2">
          <option value="" disabled selected>Select a category</option>

          @foreach($categories as $category)
            <option value="{{ $category->id }}" {{ $category->id == old('category_id') ? 'selected' : '' }}>{{ $category->name }}</option>
          @endforeach
        </select>
      </div>

      <input type="hidden" value="false" name="completed" id="completed">

      <button class="p-2 bg-blue-400 text-white rounded-2xl">Create</button>
    </form>
  </section>
</x-layouts.default>