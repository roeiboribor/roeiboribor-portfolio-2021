<?php

namespace App\Http\Controllers;

use App\Models\Project;
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

        return view('home', [
            'sections' => $sections,
            'projects' => $projects,
        ]);
    }

    public function dashboard()
    {
        return view('dashboard');
    }

    public function blogs()
    {
        return view('blogs');
    }

    public function settings()
    {
        return view('settings');
    }

    public function test()
    {
        return view('pages.test');
    }
}
