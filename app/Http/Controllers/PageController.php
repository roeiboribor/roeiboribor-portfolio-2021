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

        $projects = Project::select('title', 'link', 'image', 'tags', 'description')->get();

        return view('home', [
            'sections' => $sections,
            'projects' => $projects,
        ]);
    }

    public function dashboard()
    {
        $users = $this->getDashboardData();
        return view('dashboard', [
            'users' => $users,
        ]);
    }

    private function getDashboardData()
    {
        $data = [];
        $usersCount = User::get()->count();
        $agentsCount = User::where('role', 'agent')->get()->count();
        $data = [
            'usersCount' => $usersCount,
            'agentsCount' => $agentsCount,
        ];
        return $data;
    }

    public function blogs()
    {
        return view('blogs');
    }

    public function test()
    {
        return view('pages.test');
    }
}
