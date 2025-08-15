<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Publication;
use App\Models\PublicationCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class PublicationController extends Controller
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

        while (Publication::where('slug', $slug)->exists()) {
            $slug = $originalSlug . '-' . $count;
            $count++;
        }

        return $slug;
    }

    public function index()
    {
        $categories = PublicationCategory::get();
        $publications = Publication::with('category')->get();
        return view('pages.admin.publication.index', compact('publications', 'categories'), [
            'title' => 'Publication'
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
            'title'                    => 'required|string|max:255',
            'publication_category_id'  => 'required|exists:publication_categories,id',
            'author'                   => 'required|string|max:255',
            'content'                  => 'required|string',
            'url'                      => 'required|url',
            'image'                    => 'required|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        // Upload gambar
        $imagePath = $request->file('image')->store('publication_images', 'public');

        $slug = $this->generateUniqueSlug($validated['title']);

        // Simpan data publikasi
        Publication::create([
            'title'                   => $validated['title'],
            'slug'                    => $slug,
            'publication_category_id' => $validated['publication_category_id'],
            'author'                  => $validated['author'],
            'content'                 => $validated['content'],
            'url'                     => $validated['url'],
            'image'                   => $imagePath,
        ]);

        return redirect()->back()->with('successAdd', 'Publikasi berhasil ditambahkan.');
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
            'id' => 'required|exists:publications,id',
            'title' => 'required|string|max:255',
            'publication_category_id' => 'required|exists:publication_categories,id',
            'author' => 'required|string|max:255',
            'content' => 'required|string',
            'url' => 'required|url',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
        ]);

        $publication = Publication::findOrFail($request->id);

        $dataUpdate = [
            'title' => $request->title,
            'publication_category_id' => $request->publication_category_id,
            'author' => $request->author,
            'content' => $request->content,
            'url' => $request->url,
        ];

        if ($request->title !== $publication->title) {
            $dataUpdate['slug'] = $this->generateUniqueSlug($request->title);
        }

        if ($request->hasFile('image')) {
            if ($publication->image && Storage::exists('public/' . $publication->image)) {
                Storage::delete('public/' . $publication->image);
            }

            $dataUpdate['image'] = $request->file('image')->store('publication_images', 'public');
        }

        $publication->update($dataUpdate);

        return redirect()->back()->with('successUpdate', 'Publikasi berhasil diperbarui.');
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

        $publication = Publication::findOrFail($id);

        if ($publication->image && Storage::exists('public/' . $publication->image)) {
            Storage::delete('public/' . $publication->image);
        }

        $publication->delete();

        return redirect()
            ->back()
            ->with('successDelete', 'Publikasi berhasil dihapus.');
    }
}
