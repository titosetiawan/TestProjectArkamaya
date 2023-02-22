<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index(Request $request)
    {
        //menampilkan semua data dari model Project
        $project = Project::query();
        $clientlevel = Client::all();

        // Filter Search
        $project->when($request->project_name, function ($query) use ($request) {
            return $query->where('project_name', 'like', '%'.$request->project_name.'%');
        });

        // Filter CLient
        $project->when($request->client_id, function ($query) use ($request) {
            return $query->where('client_id', '=', $request->client_id);;
        });

        // Filter Status
        $project->when($request->project_status, function ($query) use ($request) {
            return $query->where('project_status', '=', $request->project_status);
        });

        return view('project.index', ['project' => $project -> get()] , compact('project', 'clientlevel'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $clientlevel = Client::all();
        return view('project.create', compact('clientlevel'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //validasi
        $validated = $request->validate([
            'project_name' => 'required|max:100',
            'client_id' => 'required',
            'project_start' => 'required',
            'project_end' => 'required',
            'project_status' => 'required|max:15'
        ]);

        $project = new Project();
        $project->project_name = $request->project_name;
        $project->client_id = $request->client_id;
        $project->project_start = $request->project_start;
        $project->project_end = $request->project_end;
        $project->project_status = $request->project_status;

        $project->save();
        return redirect()->route('project.index')
            ->with('success', 'Data berhasil dibuat!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $project_id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $project_id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $clientlevel = Client::all();
        $project = Project::findOrFail($id);

        $status = [
            '1' => "OPEN",
            '2' => "DOING",
            '3' => "DONE"
        ];

        return view('project.edit', compact('project', 'clientlevel', 'status'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $project_id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //validasi
        $validated = $request->validate([
            'project_name' => 'required',
            'client_id' => 'required',
            'project_start' => 'required',
            'project_end' => 'required',
            'project_status' => 'required'
        ]);

        $project = Project::findOrFail($id);
        $project->project_name = $request->project_name;
        $project->client_id = $request->client_id;
        $project->project_start = $request->project_start;
        $project->project_end = $request->project_end;
        $project->project_status = $request->project_status;

        $project->save();
        return redirect()->route('project.index')
            ->with('success', 'Data berhasil diubah!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $project_id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $project = Project::findOrFail($id);
        $project->delete();
        return redirect()->route('project.index')
            ->with('success', 'Data berhasil dihapus!');
    }
}
