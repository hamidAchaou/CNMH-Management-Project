<?php

namespace App\Http\Controllers;

use App\Exports\ProjectExport;
use App\Models\Task;
use App\Repositories\Interfaces\ProjectInterface;
use App\Repositories\Interfaces\TaskInterface;
use Illuminate\Http\Request;
use App\Imports\ProjectImport;
use Illuminate\Support\Facades\Log;
use Maatwebsite\Excel\Facades\Excel;

class ProjectController extends Controller
{
    private $projectInterface;
    private $taskInterface;

    public function __construct(ProjectInterface $projectInterface, TaskInterface $taskInterface)
    {
        $this->projectInterface = $projectInterface;
        $this->taskInterface = $taskInterface;
    }
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {

        // get data with search
        if($request->ajax())
        {
            $searchValue = $request->get("searchValue");
            $searchValue = str_replace(' ', '%' , $searchValue);
            $projects = $this->projectInterface->search($searchValue);
            return view('projects.search', compact('projects'))->render();
        }

        // get data
        $projects = $this->projectInterface->getAll();
        return view('projects.index', compact('projects'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('projects.create');
    }
    
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:255',
            'description' => 'nullable|max:555',
        ]);

        $data = $request->only(['name', 'description']);
        $result = $this->projectInterface->create($data);

        return redirect()->route('projects.index')->with('success', "Projects added successfally");

    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request, $id)
    {
        // get data why search
        if($request->ajax()) 
        {
            $searchValue = $request->get('searchValue');
            $searchValue = str_replace(' ', '%' , $searchValue );
    
            $projects = Task::query()
                ->where('project_Id', $id) 
                ->where(function ($query) use ($searchValue) {
                    $query->where('name', 'LIKE', '%' . $searchValue . '%')
                          ->orWhere('description', 'LIKE', '%' . $searchValue . '%');
                })
                ->get();
    
            return view('projects.tasks.search-tasks', compact('projects'))->render();
        }
    
        // get tasks this project
        $tasks = $this->taskInterface->getAll($id);
        $project = $this->projectInterface->show($id);
        return view('projects.show', compact('project', 'tasks'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $project = $this->projectInterface->find($id);
        return view('projects.edit', compact('project'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|max:33',
            'description' => 'nullable|max:455',
        ]);
        

        $data = $request->only(['name', 'description']);
        $this->projectInterface->update($data, $id);

        return redirect()->route('projects.index')->with('success', 'projects edit successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        $id = $request->input('project_id');

        $this->projectInterface->delete($id);

        return redirect()->route('projects.index')->with('success', 'Project deleted successfully');
    }

    // export Project 
    public function export() 
    {
        return Excel::download(new ProjectExport, 'projects.xlsx');
    }

    // Import Projects
    public function import(Request $request, ProjectInterface $projectInterface)
{
    $request->validate([
        'file' => 'required|mimes:xlsx,xls,csv|max:2048',
    ]);

    try {
        $import = new ProjectImport;
        $data = Excel::import($import, $request->file('file'));

        // The import method directly creates the models. No need for extra 'create' call.

        return redirect()->route('projects.index')->with('success', 'Projet ajouté avec succès');

    } catch (\Throwable $e) {
        Log::error($e);
        return redirect()->route('projects.index')->withError('Quelque chose s\'est mal passé, vérifiez votre fichier');
    }
}
}
