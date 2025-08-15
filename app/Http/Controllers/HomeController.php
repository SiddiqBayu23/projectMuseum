<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use App\Models\Category;
use App\Models\Collection;
use App\Models\News;
use App\Models\ServiceSection;
use App\Models\VideoStreaming;
use App\Models\Visitor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $visitors = Visitor::select(
            DB::raw('DATE_FORMAT(visit_date, "%M %Y") as month'),
            DB::raw('COUNT(DISTINCT ip_address) as total')
        )
            ->groupBy('month', DB::raw('YEAR(visit_date)'), DB::raw('MONTH(visit_date)'))
            ->orderBy('visit_date', 'desc')
            ->take(12)
            ->get()
            ->reverse();

        $labels = $visitors->pluck('month');
        $data = $visitors->pluck('total');

        $banners = Banner::where('is_active', 1)->get();
        $categories = Category::get();
        $news = News::limit(4)->orderBy('created_at', 'desc')->get();

        $service = ServiceSection::first();
        $video_streamings = VideoStreaming::limit(8)->get();
        return view('pages.home.index', compact('banners', 'categories', 'news', 'labels', 'data', 'service', 'video_streamings'));
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
    public function update(Request $request, $id)
    {
        //
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
