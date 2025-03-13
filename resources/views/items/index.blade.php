<x-layouts.default>

  <div class="flex justify-between items-center p-4">
    <h1 class="text-2xl">Items</h1>
    <a href="{{ route('items.create') }}" class="bg-blue-400 text-white p-2 rounded-2xl">Add item</a>
  </div>

  <section class="p-4 flex flex-col gap-4">
    @foreach($items as $item)
      <article class="shadow py-2 px-4 {{ $item['completed'] ? 'border-l-2 border-red-400 text-gray-400' : '' }}">
        <header>
          <h3>
            <a href="{{ route('items.show', $item->id) }}">{{ $item->name }} - {{ $item->category->name }}</a>
          </h3>
        </header>
      </article>
    @endforeach
    <footer>
      {{ $items->links() }}
    </footer>
  </section>
</x-layouts.default>