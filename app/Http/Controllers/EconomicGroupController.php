<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreEconomicGroupRequest;
use App\Models\EconomicGroup;
use Illuminate\Http\{RedirectResponse};
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
    public function edit(EconomicGroup $economic_groups): view
    {
        $this->authorize('update', $economic_groups);

        return view('groups.edit', ['economic_groups' => $economic_groups]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(EconomicGroup $economic_groups): RedirectResponse
    {
        $this->authorize('update', $economic_groups);

        request()->validate([
            'name' => 'required|string|max:255|unique:economic_groups,name,' . $economic_groups->id,
        ]);

        $economic_groups->name = request()->name;
        $economic_groups->save();

        return redirect()->route('groups.index')->with('success', 'Economic group updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(EconomicGroup $economic_groups): RedirectResponse
    {
        $this->authorize('delete', $economic_groups);

        $economic_groups->delete();

        return redirect()->route('groups.index')->with('success', 'Economic group deleted successfully.');
    }
}
