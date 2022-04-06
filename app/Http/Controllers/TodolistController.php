<?php

namespace App\Http\Controllers;

use DB;
use App\Models\Todolist;
use Illuminate\Http\Request;
use Illuminate\support\Facades\Session;

class TodolistController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $todo =  Todolist::paginate(5);
        return view('index')
            ->with('todo', $todo);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('todolist.form');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:50',
            'description' => 'required|max:75'
        ]);

        $client = Todolist::create($request->only('name', 'description'));

        //Session::flash('mensaje', 'Actividad creada con exito!');
        return redirect()->route('todolist.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Todolist  $todolist
     * @return \Illuminate\Http\Response
     */
    public function show(Todolist $todolist)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Todolist  $todolist
     * @return \Illuminate\Http\Response
     */
    public function edit(Todolist $todolist)
    {
        return view('todolist.form')
            ->with('todolist', $todolist);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Todolist  $todolist
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Todolist $todolist)
    {
        $request->validate([
            'name' => 'required|max:50',
            'description' => 'required|max:75'
        ]);

        $todolist->name = $request['name'];
        $todolist->description = $request['description'];

        $todolist->save();

        // Session::flash('mensaje', 'actividad actualizada con exito!');
        return redirect()->route('todolist.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Todolist  $todolist
     * @return \Illuminate\Http\Response
     */
    public function destroy(Todolist $todolist)
    {
        $todolist->delete();
        // Session::flash('mensaje', 'actividad eliminada con exito!');
        return redirect()->route('todolist.index');
    }

    public function destroyAll()
    {
        Todolist::truncate();
        // Session::flash('mensaje', 'actividades eliminadas con exito!');
        return view('todolist.form');
        //return redirect()->route('todolist.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function deletebyName($name)
    {
        DB::table('todolists')->where('name', $name)->delete();
        //Session::flash('mensaje', 'actividades seleccionadas eliminadas con exito!');
        return redirect()->route('todolist.index');
    }
}
