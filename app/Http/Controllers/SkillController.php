<?php

namespace App\Http\Controllers;

use App\DataTables\SkillsDataTable;
use App\Models\Skill;
use Illuminate\Http\Request;

class SkillController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:create skill', ['only' => ['create', 'store']]);
        $this->middleware('can:read skill', ['only' => ['show', 'index']]);
        $this->middleware('can:edit skill', ['only' => ['edit', 'update']]);
        $this->middleware('can:delete skill', ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     */
    public function index(SkillsDataTable $dataTable)
    {
        return $dataTable->render('pages/apps.skills.list');
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
    public function show(Skill $skill)
    {
        return view('pages/apps.skills.show', compact('skill'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Skill $skill)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Skill $skill)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Skill $skill)
    {
        //
    }
}
