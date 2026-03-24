<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::where('is_delete', 0)->with('parent')->get();
        return view('category.index', compact('categories'));
    }

    public function create()
    {
        $parents = Category::where('is_delete', 0)->get();
        return view('category.create', compact('parents'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'        => 'required|string|max:255',
            'description' => 'nullable|string',
            'image'       => 'nullable|string|max:255',
            'parent_id'   => 'nullable|exists:categories,id',
            'is_active'   => 'boolean',
        ]);

        Category::create([
            'name'        => $request->name,
            'description' => $request->description,
            'image'       => $request->image,
            'parent_id'   => $request->parent_id ?: null,
            'is_active'   => $request->boolean('is_active', true),
            'is_delete'   => 0,
        ]);

        return redirect()->route('category.index')->with('success', 'Thêm danh mục thành công!');
    }

    public function edit(string $id)
    {
        $category = Category::where('is_delete', 0)->findOrFail($id);

        // Loại trừ chính nó và toàn bộ con cháu để tránh vòng lặp
        $excludeIds = array_merge([$category->id], $category->getAllDescendantIds());
        $parents = Category::where('is_delete', 0)->whereNotIn('id', $excludeIds)->get();

        return view('category.edit', compact('category', 'parents'));
    }

    public function update(Request $request, string $id)
    {
        $category = Category::where('is_delete', 0)->findOrFail($id);

        $excludeIds = array_merge([$category->id], $category->getAllDescendantIds());

        $request->validate([
            'name'        => 'required|string|max:255',
            'description' => 'nullable|string',
            'image'       => 'nullable|string|max:255',
            'parent_id'   => [
                'nullable',
                'exists:categories,id',
                function ($attribute, $value, $fail) use ($excludeIds) {
                    if ($value && in_array($value, $excludeIds)) {
                        $fail('Không thể chọn chính nó hoặc danh mục con làm danh mục cha.');
                    }
                },
            ],
            'is_active'   => 'boolean',
        ]);

        $category->update([
            'name'        => $request->name,
            'description' => $request->description,
            'image'       => $request->image,
            'parent_id'   => $request->parent_id ?: null,
            'is_active'   => $request->boolean('is_active', true),
        ]);

        return redirect()->route('category.index')->with('success', 'Cập nhật danh mục thành công!');
    }

    public function destroy(string $id)
    {
        $category = Category::where('is_delete', 0)->findOrFail($id);
        $category->update(['is_delete' => 1]);

        return redirect()->route('category.index')->with('success', 'Xóa danh mục thành công!');
    }
}
