<?php

namespace App\Http\Controllers;

use App\DataTables\PersonalInformationDataTable;
use App\Models\PersonalInformation;
use Illuminate\Http\Request;

class PersonalInformationController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:create personal information', ['only' => ['create', 'store']]);
        $this->middleware('can:read personal information', ['only' => ['show', 'index']]);
        $this->middleware('can:edit personal information', ['only' => ['edit', 'update']]);
        $this->middleware('can:delete personal information', ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     */
    public function index(PersonalInformationDataTable $dataTable)
    {
        return $dataTable->render('pages/apps.personal-information.list');
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
    public function show(PersonalInformation $personal_information)
    {
        return view('pages/apps.personal-information.show', compact('personal_information'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(PersonalInformation $personalInformation)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, PersonalInformation $personalInformation)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(PersonalInformation $personalInformation)
    {
        //
    }
}
