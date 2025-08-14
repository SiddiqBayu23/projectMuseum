<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\VideoStreaming;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class VideoStreamingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $videoStreamings = VideoStreaming::get();
        return view('pages.admin.video-streaming.index', compact('videoStreamings'), [
            'title' => 'Streaming'
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
            'title'       => 'required|string|max:255',
            'description' => 'nullable|string',
            'platform'    => 'required|in:youtube,instagram,local',
            'video_url'   => 'required|url',
            'thumbnail'   => 'required|image|mimes:jpg,jpeg,png,webp|max:2048',
            'start_time'  => 'nullable|date',
            'is_live'     => 'nullable|boolean',
        ]);

        // Upload thumbnail
        $imagePath = $request->file('thumbnail')->store('video_thumbnails', 'public');

        // Simpan data video streaming
        VideoStreaming::create([
            'title'       => $validated['title'],
            'description' => $validated['description'] ?? null,
            'platform'    => $validated['platform'],
            'video_url'   => $validated['video_url'],
            'thumbnail'   => $imagePath,
            'start_time'  => $validated['start_time'] ?? null,
            'is_live'     => $validated['is_live'] ?? false,
        ]);

        return redirect()->back()->with('successAdd', 'Video streaming berhasil ditambahkan.');
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
            'id' => 'required|exists:video_streamings,id',
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'platform' => 'required|in:youtube,instagram,local',
            'video_url' => 'required|string|max:500',
            'thumbnail' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'start_time' => 'nullable|date',
            'is_live' => 'nullable|boolean',
        ]);

        $videoStreaming = VideoStreaming::findOrFail($request->id);

        $dataUpdate = [
            'title' => $request->title,
            'description' => $request->description,
            'platform' => $request->platform,
            'video_url' => $request->video_url,
            'start_time' => $request->start_time,
            'is_live' => $request->has('is_live') ? 1 : 0,
        ];

        // Jika ada thumbnail baru
        if ($request->hasFile('thumbnail')) {
            // Hapus thumbnail lama jika ada
            if ($videoStreaming->thumbnail && Storage::exists('public/' . $videoStreaming->thumbnail)) {
                Storage::delete('public/' . $videoStreaming->thumbnail);
            }

            // Upload thumbnail baru
            $dataUpdate['thumbnail'] = $request->file('thumbnail')->store('video_thumbnails', 'public');
        }

        // Update data
        $videoStreaming->update($dataUpdate);

        return redirect()->back()->with('successUpdate', 'Video streaming berhasil diperbarui.');
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

        $videoStreaming = VideoStreaming::findOrFail($id);

        if ($videoStreaming->thumbnail && Storage::exists('public/' . $videoStreaming->thumbnail)) {
            Storage::delete('public/' . $videoStreaming->thumbnail);
        }

        $videoStreaming->delete();

        return redirect()->back()->with('successDelete', 'Video berhasil dihapus.');
    }
}
