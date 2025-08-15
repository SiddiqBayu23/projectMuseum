<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CollectionCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class CollectionCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    private function generateUniqueSlug($name)
    {
        $slug = Str::slug($name);
        $originalSlug = $slug;
        $count = 1;

        while (CollectionCategory::where('slug', $slug)->exists()) {
            $slug = $originalSlug . '-' . $count;
            $count++;
        }

        return $slug;
    }
    public function index()
    {
        $categories = CollectionCategory::get();
        return view('pages.admin.collection-category.index', compact('categories'), [
            'title' => 'Collection Category'
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'image' => 'required|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        // Upload gambar
        $imagePath = $request->file('image')->store('collection_category_images', 'public');

        $slug = $this->generateUniqueSlug($validated['name']);

        // Simpan data banner
        CollectionCategory::create([
            'name' => $validated['name'],
            'image' => $imagePath,
            'slug' => $slug,
        ]);

        return redirect()->back()->with('successAdd', 'Kategori berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $request->validate([
            'id' => 'required|exists:collection_categories,id',
            'name' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        $category = CollectionCategory::findOrFail($request->id);


        // Siapkan data update
        $dataUpdate = [
            'name' => $request->name,
        ];

        if ($request->name !== $category->name) {
            $dataUpdate['slug'] = $this->generateUniqueSlug($request->name);
        }

        // Jika ada gambar baru
        if ($request->hasFile('image')) {
            // Hapus gambar lama jika ada
            if ($category->image && Storage::exists('public/' . $category->image)) {
                Storage::delete('public/' . $category->image);
            }

            // Upload gambar baru
            $dataUpdate['image'] = $request->file('image')->store('collection_category_images', 'public');
        }

        // Update ke database
        $category->update($dataUpdate);

        return redirect()->back()->with('successUpdate', 'Kategori berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $id = $request->id;

        // Ambil kategori
        $category = CollectionCategory::findOrFail($id);

        // Hapus gambar jika ada di storage
        if ($category->image && Storage::exists('public/' . $category->image)) {
            Storage::delete('public/' . $category->image);
        }

        // Hapus kategori
        $category->delete();

        return redirect()
            ->back()
            ->with('successDelete', 'Kategori berhasil dihapus.');
    }
}
