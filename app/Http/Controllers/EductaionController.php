<?php

namespace App\Http\Controllers;

use App\DataTables\EductaionDataTable;
use App\Models\Eductaion;
use Illuminate\Http\Request;

class EductaionController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:create education', ['only' => ['create', 'store']]);
        $this->middleware('can:read education', ['only' => ['show', 'index']]);
        $this->middleware('can:edit education', ['only' => ['edit', 'update']]);
        $this->middleware('can:delete education', ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     */
    public function index(EductaionDataTable $dataTable)
    {
        return $dataTable->render('pages/apps.education.list');
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
    public function show(Eductaion $eductaion)
    {
        return view('pages/apps.education.show', compact('education'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Eductaion $eductaion)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Eductaion $eductaion)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Eductaion $eductaion)
    {
        //
    }
}
