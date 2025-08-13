<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\NavbarLink;
use App\Models\NavbarSection;
use Illuminate\Http\Request;

class NavbarLinkController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $section = NavbarSection::first();

        if (!$section) {
            return redirect()->back()->with('error', 'Navbar section belum dibuat.');
        }

        return view('navbar-links.create', compact('section'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'navigation' => 'required|string|max:255',
            'href' => 'required|string|max:255',
        ]);

        $section = NavbarSection::first();

        NavbarLink::create([
            'navbar_section_id' => $section->id,
            'navigation' => $request->navigation,
            'href' => $request->href,
        ]);

        return redirect()->back()->with('successAdd', 'Navbar link berhasil ditambahkan.');
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
    // NavbarLinkController.php
    public function update(Request $request)
    {
        $request->validate([
            'id' => 'required|exists:navbar_links,id',
            'navigation' => 'required|string|max:255',
            'href' => 'required|string|max:255',
        ]);

        $link = NavbarLink::findOrFail($request->id);
        $link->update([
            'navigation' => $request->navigation,
            'href' => $request->href,
        ]);

        return redirect()->back()->with('successUpdate', 'Link navbar berhasil diperbarui.');
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

        $link = NavbarLink::findOrFail($id);

        $link->delete();

        return redirect()->back()->with('successDelete', 'Link navbar berhasil dihapus.');
    }
}
