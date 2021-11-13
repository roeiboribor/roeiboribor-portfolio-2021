<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\User;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function home()
    {
        $sections = [
            'about',
            'projects',
            'services',
            // 'blogs',
            // 'contact',
        ];

        $projects = Project::get();

        return view('home', compact(['sections', 'projects']));
    }

    public function test()
    {
        return view('pages.test');
    }
}
