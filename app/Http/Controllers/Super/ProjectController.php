<?php

namespace App\Http\Controllers\Super;

use App\Http\Controllers\Controller;
use App\Http\Requests\Projects\ProjectStoreRequest;
use App\Http\Requests\Projects\ProjectUpdateRequest;
use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class ProjectController extends Controller
{
    protected $prefix;

    public function __construct()
    {
        $this->prefix = 'super.';
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $projects = Project::where('title', 'like', '%' . $request->search . '%')
            ->orWhere('tags', 'like', '%' . $request->search . '%')
            ->orWhere('link', 'like', '%' . $request->search . '%')
            ->paginate(10);
        return view($this->prefix . 'projects.index', [
            'projects' => $projects,
            'oldSearch' => $request->search,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view($this->prefix . 'projects.create');
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
        return view($this->prefix . 'projects.edit', [
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

            if ($request->image == null) {
                $newImageName = $project->image;
            } elseif ($request->image) {
                $newImageName = uniqid() . '-' . $request->slug . '.' . $request->image->extension();
                $request->image->move(public_path('assets\img\portfolio\projects'), $newImageName);
                unlink('assets/img/portfolio/projects/' . $project->image);
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

            return redirect()->route('projects.edit', $request->slug)->with('status', 'success');
        } catch (\Throwable $th) {
            return back()->with('status', 'error');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($slug)
    {
        try {
            $project = Project::firstWhere('slug', $slug);
            unlink('assets/img/portfolio/projects/' . $project->image);
            $project->delete();
            return back()->with('status', 'success');
        } catch (\Throwable $th) {
            return back()->with('status', 'error');
        }
    }
}
