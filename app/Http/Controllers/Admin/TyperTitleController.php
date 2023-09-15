<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\TyperTitleDataTable;
use App\Http\Controllers\Controller;
use App\Models\TyperTitle;
use Illuminate\Http\Request;

class TyperTitleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(TyperTitleDataTable $dataTable)
    {
        return $dataTable->render('admin.type-title.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.type-title.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => ['required', 'max:200']
        ]);

        $create = new TyperTitle();
        $create->title = $request->title;
        $create->save();
        toastr()->success('Created Successfully', 'Congrats');

        return redirect()->route('admin.typer-title.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(TyperTitle $typerTitle)
    {
        return view('admin.type-title.edit', compact('typerTitle'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, TyperTitle $typerTitle)
    {
        $request->validate([
            'title' => ['required', 'max:200']
        ]);

        $typerTitle->title = $request->title;
        $typerTitle->save();
        toastr()->success('Updated Successfully', 'Congrats');

        return redirect()->route('admin.typer-title.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $title = TyperTitle::findOrFail($id);
        $title->delete();
        return response(['status' => 'success', 'message' => 'Slider eliminado con exito!']);

    }
}
