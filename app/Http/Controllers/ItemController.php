<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Item;
use Illuminate\Http\Request;

class ItemController extends Controller
{
    public function index() {
      $items = Item::with('category')->orderBy('created_at', 'desc')->paginate(10);

      return view('items.index', ["items" => $items]);
    }

    public function show(int $id) {
      $categories = Category::all();

      return view('items.show', ["item" => Item::find($id), 'categories' => $categories]);
    }

    public function create() {
      $categories = Category::all();

      return view('items.create', ['categories' => $categories]);
    }

    public function store(Request $request) {
      $request->validate([
        'name' => 'required|string|min:1|max:50',
        'category_id' => 'required|exists:categories,id'
      ]);

      Item::create([
        'name' => $request->name,
        'completed' => $request->completed == 'on' ? 1 : 0,
        'category_id' => $request->category_id
      ]);

      return redirect()->route('items.index');
    }

    public function destroy(Item $item) {
      $item->delete();

      return redirect()->route('items.index');
    }

    public function update(Item $item, Request $request) {
      $request->validate([
        'name' => 'required|string|min:1|max:255',
        'completed' => '',
        'category_id' => 'required|exists:categories,id'
      ]);

      $item->update([
        'name' => $request->name,
        'completed' => $request->completed == 'on' ? 1 : 0,
        'category_id' => $request->category_id
      ]);

      return redirect()->route('items.index');
    }
}
