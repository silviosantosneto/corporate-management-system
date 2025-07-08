<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;

class EconomicGroupController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        // You can also use a query to filter or sort the groups if needed
        return view('groups.index', ['groups' => groups()->paginate(10)]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('groups. create', [
            'group' => groups()->make(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'        => 'required|string|max:255',
            'description' => 'nullable|string|max:1000',
        ]);

        groups()->create($request->only(['name', 'description']));

        return redirect()->route('groups.index')->with('success', 'Economic group created successfully.');
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
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
