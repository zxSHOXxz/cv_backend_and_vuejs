<?php

namespace App\Http\Controllers;

use App\DataTables\TagsDataTable;
use App\Models\Tag;
use Illuminate\Http\Request;

class TagController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:create tag', ['only' => ['create', 'store']]);
        $this->middleware('can:read tag', ['only' => ['show', 'index']]);
        $this->middleware('can:edit tag', ['only' => ['edit', 'update']]);
        $this->middleware('can:delete tag', ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     */
    public function index(TagsDataTable $dataTable)
    {
        return $dataTable->render('pages/apps.tags.list');
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
    public function show(Tag $tag)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Tag $tag)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Tag $tag)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Tag $tag)
    {
        //
    }
}
