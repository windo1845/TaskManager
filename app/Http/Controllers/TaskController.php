<?php

namespace App\Http\Controllers;

use App\Models\Tasks;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tasks = tasks::latest()->paginate(5);
        return view('layouts.index',compact('tasks'))->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('layouts.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
			'status' => 'required',
        ]);
  
        tasks::create($request->all());
   
        return redirect()->route('layouts.index')->with('success','Judul Task Sukses dibuat');
    }

    /**
     * Display the specified resource.
     */
    public function show(Tasks $tasks)
    {
        return view('layouts.show',compact('tasks'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Tasks $tasks)
    {
        return view('layouts.edit',compact('tasks'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Tasks $tasks)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
			'status' => 'required',
        ]);
  
        $tasks->update($request->all());
  
        return redirect()->route('layouts.index')->with('success','Judul Task Sukses diedit');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Tasks $tasks)
    {
        $tasks->delete();
  
        return redirect()->route('layouts.index')->with('success','Judul Task Sukses dihapus');
    }
}
