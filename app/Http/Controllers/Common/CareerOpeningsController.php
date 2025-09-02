<?php

namespace App\Http\Controllers\Common;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Career;

class CareerOpeningsController extends Controller
{
    public function careers_openings()
    {
        $careers = Career::where('status', 'active')->orderBy('created_at', 'desc')->get();
        return view('website.career-openings', compact('careers'));
    }

    public function search(Request $request)
    {
        $search = $request->input('search');

        $query = Career::where('status', 'active');

        if ($search) {
            $query->where(function ($q) use ($search) {
                $q->where('title', 'like', '%' . $search . '%')
                  ->orWhere('short_description', 'like', '%' . $search . '%')
                  ->orWhere('education_experience_card', 'like', '%' . $search . '%');
            });
        }

        $careers = $query->orderBy('created_at', 'desc')->get();

        return response()->json([
            'careers' => $careers
        ]);
    }
}
