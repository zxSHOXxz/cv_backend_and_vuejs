<?php

namespace App\Http\Controllers;

use App\DataTables\ExperienceDataTable;
use App\Models\Experience;
use Illuminate\Http\Request;

class ExperienceController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:create experience', ['only' => ['create', 'store']]);
        $this->middleware('can:read experience', ['only' => ['show', 'index']]);
        $this->middleware('can:edit experience', ['only' => ['edit', 'update']]);
        $this->middleware('can:delete experience', ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     */
    public function index(ExperienceDataTable $dataTable)
    {
        return $dataTable->render('pages/apps.experience.list');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Experience $experience)
    {
        return view('pages/apps.experience.show', compact('experience'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Experience $experience)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Experience $experience)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Experience $experience)
    {
        //
    }
}
