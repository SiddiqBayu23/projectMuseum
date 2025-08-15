<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Collection;
use App\Models\CollectionCategory;
use App\Models\CollectionImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class CollectionController extends Controller
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

        while (Collection::where('slug', $slug)->exists()) {
            $slug = $originalSlug . '-' . $count;
            $count++;
        }

        return $slug;
    }

    public function index()
    {
        $categories = CollectionCategory::get();
        $collections = Collection::get();
        return view('pages.admin.collection.index', compact('collections', 'categories'), [
            'title' => 'Collection'
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
            'thumbnail' => 'required|image|mimes:jpg,jpeg,png,webp|max:2048',
            'no_inv' => 'required|string|max:255',
            'collection_category_id' => 'required|exists:collection_categories,id',
            'material' => 'required|string|max:255',
            'color' => 'required|string|max:255',
            'length' => 'required|numeric|min:0',
            'width' => 'required|numeric|min:0',
            'height' => 'required|numeric|min:0',
            'acquisition_method' => 'required|string|max:255',
            'description' => 'required|string',
            'function' => 'required|string',
            'images.*' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        // Upload thumbnail
        $thumbnailPath = $request->file('thumbnail')->store('collection_thumbnails', 'public');

        // Generate slug unik
        $slug = $this->generateUniqueSlug($validated['name']);

        // Simpan data utama collection
        $collection = Collection::create([
            'name' => $validated['name'],
            'slug' => $slug,
            'thumbnail' => $thumbnailPath,
            'no_inv' => $validated['no_inv'],
            'collection_category_id' => $validated['collection_category_id'],
            'material' => $validated['material'],
            'color' => $validated['color'],
            'length' => $validated['length'],
            'width' => $validated['width'],
            'height' => $validated['height'],
            'acquisition_method' => $validated['acquisition_method'],
            'description' => $validated['description'],
            'function' => $validated['function'],
        ]);

        // Simpan gambar tambahan ke collection_images
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                $imagePath = $image->store('collection_images', 'public');

                $collection->images()->create([
                    'image' => $imagePath,
                ]);
            }
        }

        return redirect()->back()->with('successAdd', 'Koleksi berhasil ditambahkan.');
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
        $collection = Collection::findOrFail($request->id);

        // Validasi input
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'thumbnail' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'no_inv' => 'required|string|max:255',
            'collection_category_id' => 'required|exists:collection_categories,id',
            'material' => 'required|string|max:255',
            'color' => 'required|string|max:255',
            'length' => 'required|numeric',
            'width' => 'required|numeric',
            'height' => 'required|numeric',
            'acquisition_method' => 'required|string|max:255',
            'description' => 'required|string',
            'function' => 'required|string',
            'images.*' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'delete_images.*' => 'nullable|exists:collection_images,id',
        ]);

        // Update data utama
        $collection->update([
            'name' => $validated['name'],
            'no_inv' => $validated['no_inv'],
            'collection_category_id' => $validated['collection_category_id'],
            'material' => $validated['material'],
            'color' => $validated['color'],
            'length' => $validated['length'],
            'width' => $validated['width'],
            'height' => $validated['height'],
            'acquisition_method' => $validated['acquisition_method'],
            'description' => $validated['description'],
            'function' => $validated['function'],
        ]);

        // Update thumbnail
        if ($request->hasFile('thumbnail')) {
            // Hapus thumbnail lama
            if ($collection->thumbnail && Storage::disk('public')->exists($collection->thumbnail)) {
                Storage::disk('public')->delete($collection->thumbnail);
            }
            // Simpan thumbnail baru
            $path = $request->file('thumbnail')->store('collection_thumbnails', 'public');
            $collection->thumbnail = $path;
            $collection->save();
        }

        // Hapus multiple image jika dipilih
        if ($request->filled('delete_images')) {
            $imagesToDelete = CollectionImage::whereIn('id', $request->delete_images)->get();
            foreach ($imagesToDelete as $img) {
                if ($img->image && Storage::disk('public')->exists($img->image)) {
                    Storage::disk('public')->delete($img->image);
                }
                $img->delete();
            }
        }

        // Tambah multiple image baru
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $file) {
                if ($file) {
                    $path = $file->store('collection_images', 'public');
                    CollectionImage::create([
                        'collection_id' => $collection->id,
                        'image' => $path,
                    ]);
                }
            }
        }

        return redirect()->back()->with('successUpdate', 'Koleksi berhasil diperbarui.');
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

        // Ambil collection dengan relasi images
        $collection = Collection::with('images')->findOrFail($id);

        // Hapus thumbnail
        if ($collection->thumbnail && Storage::exists('public/' . $collection->thumbnail)) {
            Storage::delete('public/' . $collection->thumbnail);
        }

        // Hapus semua gambar tambahan
        foreach ($collection->images as $img) {
            if ($img->image && Storage::exists('public/' . $img->image)) {
                Storage::delete('public/' . $img->image);
            }
            $img->delete();
        }

        // Hapus collection
        $collection->delete();

        return redirect()
            ->back()
            ->with('successDelete', 'Koleksi dan semua gambar terkait berhasil dihapus.');
    }
}
