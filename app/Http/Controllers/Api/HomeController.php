<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function project($slug)
    {
        $project = Project::select('title', 'tags', 'slug', 'description')
            ->where('slug', $slug)
            ->first();

        return response()->json($project);
    }
}
