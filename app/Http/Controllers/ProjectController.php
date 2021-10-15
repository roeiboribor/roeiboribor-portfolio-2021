<?php

namespace App\Http\Controllers;

use App\Http\Requests\Projects\ProjectStoreRequest;
use App\Http\Requests\Projects\ProjectUpdateRequest;
use App\Models\Project;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $projects = Project::get();
        return view('projects.index', [
            'projects' => $projects,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('projects.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProjectStoreRequest $request)
    {
        try {
            $newImageName = uniqid() . '-' . $request->slug . '.' . $request->image->extension();
            $request->image->move(public_path('assets\img\portfolio\projects'), $newImageName);

            Project::create([
                'title' => $request->title,
                'slug' => $request->slug,
                'tags' => $request->tags,
                'link' => $request->link,
                'description' => $request->description,
                'image' => $newImageName,
                'created_at' => Carbon::now(),
            ]);

            return back()->with('status', 'success');
        } catch (Exception $err) {
            return back()->with('status', 'error');
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($slug)
    {
        $project = Project::where('slug', $slug)->first();
        return view('projects.edit', [
            'project' => $project
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ProjectUpdateRequest $request, $slug)
    {
        try {
            $project = Project::where('slug', $slug)->first();

            if ($request->image) {
                $newImageName = uniqid() . '-' . $request->slug . '.' . $request->image->extension();
                $request->image->move(public_path('assets\img\portfolio\projects'), $newImageName);
                unlink('assets/img/projects/' . $project->image);
            } else {
                $newImageName = $project->image;
            }

            $project->update([
                'title' => $request->title,
                'slug' => $request->slug,
                'tags' => $request->tags,
                'link' => $request->link,
                'description' => $request->description,
                'image' => $newImageName,
                'updated_at' => Carbon::now(),
            ]);

            return back()->with('status', 'success');
        } catch (Exception $err) {
            return back()->with('status', 'error');
        }
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
