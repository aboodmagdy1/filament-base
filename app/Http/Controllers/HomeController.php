<?php

namespace App\Http\Controllers;

use App\Http\Resources\SectionResource;
use App\Models\HomeSection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

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
        dd($sections);
        return view('home.index', compact('sections'));
    }

}
