<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Http\Requests\ExampleCreate;
use App\Http\Requests\ExampleUpdate;
use App\Models\Test;
use Illuminate\Support\Facades\Storage;

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
    public function store(ExampleCreate $request)
    {

        // dd($request->validated());
        $data = $request->validated();
        $data['photo'] = $request->file('photo')->store('public/images');
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
        // dd($test);
        return view('example.edit', compact('test'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ExampleUpdate $request, string $id)
    {
        $test = Test::find($id);
        Test::where('id', $id)->update($request->validated());

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
        $test = Test::withTrashed()->find($id);

        Test::where('id', $id)->forcedelete();
        if (!empty($test->photo) && Storage::exists($test->photo)) {
            Storage::delete($test->photo);
        }
        return redirect('example');
    }
}
