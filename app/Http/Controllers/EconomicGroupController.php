<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreEconomicGroupRequest;
use App\Models\EconomicGroup;
use Illuminate\Http\{RedirectResponse, Request};
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
        return view('groups. create');
    }

    /**
     * Store a newly created resource in storage.
     * @param StoreEconomicGroupRequest $request
     * @return RedirectResponse
     */
    public function store(StoreEconomicGroupRequest $request): RedirectResponse
    {
        //        dd($request->validated());
        groups()->create($request->validated());

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
    public function edit(EconomicGroup $id): view
    {
        $this->authorize('update', $id);

        return view('groups.edit', ['group' => $id]);
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
