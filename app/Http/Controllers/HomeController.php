<?php

namespace App\Http\Controllers;

use App\Http\Resources\SectionResource;
use App\Models\HomeSection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Redis;

class HomeController extends Controller
{
    /**
     * Display the home page with sections
     */
    public function index()
    {
        $sections = HomeSection::active()
            ->ordered()
            ->get();
        $sections = SectionResource::collection($sections)->toArray(request());
        $visits = Redis::incr('home_page_visits');
        return view('welcome', compact('sections', 'visits'));
    }



}
