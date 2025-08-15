<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PublicationCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PublicationCategoryController extends Controller
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

        while (PublicationCategory::where('slug', $slug)->exists()) {
            $slug = $originalSlug . '-' . $count;
            $count++;
        }

        return $slug;
    }
    public function index()
    {
        $categories = PublicationCategory::get();
        return view('pages.admin.publication-category.index', compact('categories'), [
            'title' => 'Publication Category'
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
        ]);

        $slug = $this->generateUniqueSlug($validated['name']);

        // Simpan data banner
        PublicationCategory::create([
            'name' => $validated['name'],
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
            'id' => 'required|exists:publication_categories,id',
            'name' => 'required|string|max:255',
        ]);

        $category = PublicationCategory::findOrFail($request->id);


        // Siapkan data update
        $dataUpdate = [
            'name' => $request->name,
        ];

        if ($request->name !== $category->name) {
            $dataUpdate['slug'] = $this->generateUniqueSlug($request->name);
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
        $category = PublicationCategory::findOrFail($id);

        $category->delete();

        return redirect()
            ->back()
            ->with('successDelete', 'Kategori berhasil dihapus.');
    }
}
