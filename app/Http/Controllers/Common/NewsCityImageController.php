<?php

namespace App\Http\Controllers\Common;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\NewsCity;
use App\Http\Resources\Cities\CityResource;
use App\Http\Controllers\Common\ImageController;
use App\Http\Requests\Common\ImageUploadRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class NewsCityImageController extends Controller
{
    public function index()
    {
        $title = 'Gresham Global';
        $heading = 'News and Blogs Cities';
        $cities = NewsCity::all(); // adjust model name if different
        return view('admin.admin.newsandblog.city_images.index', compact('title', 'heading', 'cities'));
    }

    // public function create()
    // {
    //     return view('admin.newsandblog.cities.create');
    // }
    public function create()
    {
        $newsCities = NewsCity::with('news')->get(); // Ensure relation 'news' is defined in NewsCity model
        return view('admin.news_city_images.create', compact('newsCities'));
    }


    public function create()
    {
        $news = NewsAndBlog::all(); // fetch all blogs for dropdown
        return view('admin.newsandblogs.cities.create', compact('news'));
    }


    public function store(Request $request)
    {
        $request->validate([
            'city_name' => 'required|string|max:255'
        ]);

        NewsCity::create([
            'city_name' => $request->city_name
        ]);

        return redirect()->route('admin.newsandblog.cities')->with('success', 'City added successfully.');
    }
}
