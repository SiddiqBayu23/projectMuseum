<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class NewsController extends Controller
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

        while (News::where('slug', $slug)->exists()) {
            $slug = $originalSlug . '-' . $count;
            $count++;
        }

        return $slug;
    }
    public function index()
    {
        $news = News::get();
        return view('pages.admin.news.index', compact('news'), [
            'title' => 'Berita'
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
            'title'     => 'required|string|max:255',
            'image'     => 'required|image|mimes:jpg,jpeg,png,webp|max:2048',
            'summary'   => 'required|string|max:500',
            'content'   => 'required|string',
            'is_publish' => 'nullable|boolean',
        ]);

        $imagePath = $request->file('image')->store('news_images', 'public');


        $slug = $this->generateUniqueSlug($validated['title']);
        News::create([
            'title'      => $validated['title'],
            'slug'       => $slug,
            'image'      => $imagePath,
            'summary'    => $validated['summary'],
            'content'    => $validated['content'],
            'is_publish' => $request->has('is_publish') ? 1 : 0,
        ]);

        return redirect()->route('admin.news.index')->with('success', 'Berita berhasil ditambahkan.');
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
            'id'        => 'required|exists:news,id',
            'title'     => 'required|string|max:255',
            'summary'   => 'required|string|max:255',
            'content'   => 'required|string',
            'image'     => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'is_publish' => 'nullable|boolean',
        ]);

        $news = News::findOrFail($request->id);;

        $dataUpdate = [
            'title' => $request->title,
            'summary' => $request->summary,
            'content' => $request->content,
            'is_publish' => $request->has('is_publish') ? 1 : 0,
        ];

        if ($request->title !== $news->title) {
            $dataUpdate['slug'] = $this->generateUniqueSlug($request->title);
        }


        if ($request->hasFile('image')) {
            if ($news->image && Storage::exists('public/' . $news->image)) {
                Storage::delete('public/' . $news->image);
            }

            $dataUpdate['image'] = $request->file('image')->store('news_images', 'public');
        }

        preg_match_all('/<img[^>]+src="([^">]+)"/i', $news->content, $oldImages);
        preg_match_all('/<img[^>]+src="([^">]+)"/i', $request->content, $newImages);

        $deletedImages = array_diff($oldImages[1], $newImages[1]);

        foreach ($deletedImages as $imgPath) {
            $relativePath = str_replace(asset('storage') . '/', '', $imgPath);
            if (Storage::exists('public/' . $relativePath)) {
                Storage::delete('public/' . $relativePath);
            }
        }

        $news->update($dataUpdate);

        return redirect()->back()->with('successUpdate', 'Berita berhasil diperbarui.');
    }



    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $news = News::findOrFail($request->id);

        if ($news->image && Storage::exists('public/' . $news->image)) {
            Storage::delete('public/' . $news->image);
        }

        preg_match_all('/<img[^>]+src="([^">]+)"/i', $news->content, $imagesInContent);

        foreach ($imagesInContent[1] as $imgPath) {
            $relativePath = str_replace(asset('storage') . '/', '', $imgPath);
            if (Storage::exists('public/' . $relativePath)) {
                Storage::delete('public/' . $relativePath);
            }
        }

        $news->delete();

        return redirect()->back()->with('successDelete', 'Berita berhasil dihapus.');
    }


    public function uploadImage(Request $request)
    {
        $request->validate([
            'image' => 'required|image|max:2048'
        ]);

        $path = $request->file('image')->store('news_content_images', 'public');

        return response()->json(['url' => asset('storage/' . $path)]);
    }
}
