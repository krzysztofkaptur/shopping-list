<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CategoryController extends Controller
{
    public function index() {
      return view('categories.index', ['categories' => Category::where('user_id', Auth::id())->orderBy('created_at', 'desc')->paginate(10)]);
    }

    public function create() {
      return view('categories.create');
    }

    public function store(Request $request) {
      $validated = $request->validate([
        "name" => "required|string|min:1|max:50"
      ]);

      Category::create([
        "name" => $validated['name'],
        "user_id" => Auth::id(),
      ]);

      return redirect()->route('categories.index');
    }

    public function show(int $id) {
      return view('categories.show', ["category" => Category::find($id)]);
    }

    public function destroy(Category $category) {
      $category->delete();

      return redirect()->route('categories.index');
    }

    public function update(Category $category, Request $request) {
      $validated = $request->validate([
        "name" => "required|string|min:1|max:50"
      ]);

      $category->update($validated);

      return redirect()->route('categories.index');
    }
}
