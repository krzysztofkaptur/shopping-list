<x-layouts.default>
  <div class="flex justify-between items-center p-4">
    <h1 class="text-2xl">Categories</h1>
    <a href="{{ route('categories.create') }}" class="bg-blue-400 text-white p-2 rounded-2xl">Add category</a>
  </div>

  <section class="p-4 flex flex-col gap-4">
    @foreach($categories as $category)
      <article class="shadow py-2 px-4">
        <header>
          <h3>
            <a href="{{ route('categories.show', $category->id) }}">{{ $category['name'] }}</a>
          </h3>
        </header>
      </article>
    @endforeach

    {{ $categories->links() }}
  </section>

</x-layouts.default>