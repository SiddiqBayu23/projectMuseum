<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ServiceSection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ServiceSectionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $serviceSection = ServiceSection::first();
        return view('pages.admin.service-section.index', compact('serviceSection'), [
            'title' => 'Service Section'
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
        //
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
            'id' => 'required|exists:service_sections,id',
            'title' => 'required|string|max:255',
            'day' => 'required|string|max:255',
            'time' => 'required|string|max:255',
            'procedure' => 'required|string',
            'url' => 'required|string|max:255',
            'thumbnail' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048'
        ]);

        $serviceSection = ServiceSection::findOrFail($request->id);

        $dataUpdate = [
            'title' => $request->title,
            'day' => $request->day,
            'time' => $request->time,
            'procedure' => $request->procedure,
            'url' => $request->url,
        ];

        if ($request->hasFile('thumbnail')) {
            if ($serviceSection->thumbnail && Storage::exists('public/' . $serviceSection->thumbnail)) {
                Storage::delete('public/' . $serviceSection->thumbnail);
            }

            $dataUpdate['thumbnail'] = $request->file('thumbnail')->store('service_section_thumbnails', 'public');
        }

        $serviceSection->update($dataUpdate);

        return redirect()->back()->with('successUpdate', 'Service section berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
