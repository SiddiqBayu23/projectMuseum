<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Collection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CollectionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $collections = Collection::get();
        return view('pages.admin.collection.index', compact('collections'), [
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
            'title' => 'required|string|max:255',
            'image' => 'required|image|mimes:jpg,jpeg,png,webp|max:2048',
            'url' => 'required|url',
        ]);

        // Upload gambar
        $imagePath = $request->file('image')->store('collection_images', 'public');

        // Simpan data banner
        Collection::create([
            'title' => $validated['title'],
            'image' => $imagePath,
            'url' => $validated['url'],
        ]);

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
        $request->validate([
            'id' => 'required|exists:collections,id',
            'title' => 'required|string|max:255',
            'url' => 'required|url',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        $collection = Collection::findOrFail($request->id);

        // Siapkan data update
        $dataUpdate = [
            'title' => $request->title,
            'url' => $request->url,
        ];

        // Jika ada gambar baru
        if ($request->hasFile('image')) {
            // Hapus gambar lama jika ada
            if ($collection->image && Storage::exists('public/' . $collection->image)) {
                Storage::delete('public/' . $collection->image);
            }

            // Upload gambar baru
            $dataUpdate['image'] = $request->file('image')->store('collection_images', 'public');
        }

        // Update ke database
        $collection->update($dataUpdate);

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

        $collection = Collection::findOrFail($id);

        $collection->delete();

        return redirect()->back()->with('successDelete', 'Koleksi berhasil dihapus.');
    }
}
