<?php

namespace App\Http\Controllers;

use App\Models\Test;
use Illuminate\Http\Request;
use Illuminate\view\view;


class ExampleController extends Controller
{
    // private $columns = ['name', 'content'];
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        if (request('trashed') == 'yes') {

            $test = Test::withTrashed()->get();
        } else {

            $test = Test::get();
        }
        return view('example.index', compact('test'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('example.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request->name);
        $data = $request->validate([
            'name' => 'required|string',
            'content' => 'required|string',
            'status' => 'required|in:enabled,disabled',
            'show' => 'required|in:1,0'
        ],[],[
            'name' => 'title',
            'content' => 'content text',
            'status' => 'status',
            'show' => 'show data'
        ]);
        Test::create($data);

        return redirect('example');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $test = Test::find($id);
        return view('example.show', compact('test'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $test = Test::find($id);
        return view('example.edit', compact('test'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = $request->validate([
            'name' => 'required|string',
            'content' => 'required|string',
            'status' => 'required|in:enabled,disabled',
            'show' => 'required|in:1,0'
        ],[],[
            'name' => 'title',
            'content' => 'content text',
            'status' => 'status',
            'show' => 'show data'
        ]);
        Test::where('id', $id)->update($data);

        return redirect('example');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Test::where('id', $id)->delete();

        return redirect('example');
    }
    /**
     * Remove the specified resource from storage.
     */
    public function restore(string $id)
    {
        Test::where('id', $id)->restore();

        return redirect('example');
    }
    /**
     * Remove the specified resource from storage.
     */
    public function forcedelete(string $id)
    {
        Test::where('id', $id)->forcedelete();

        return redirect('example');
    }
}
