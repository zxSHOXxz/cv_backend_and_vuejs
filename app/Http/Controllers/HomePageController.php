<?php

namespace App\Http\Controllers;

use App\DataTables\HomePageDataTable;
use App\Models\HomePage;
use Illuminate\Http\Request;

class HomePageController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:create home page', ['only' => ['create', 'store']]);
        $this->middleware('can:read home page', ['only' => ['show', 'index']]);
        $this->middleware('can:edit home page', ['only' => ['edit', 'update']]);
        $this->middleware('can:delete home page', ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     */
    public function index(HomePageDataTable $dataTable)
    {
        return $dataTable->render('pages/apps.home-page.list');
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

    public function show()
    {
        $home_page = HomePage::all()->first();
        return view('pages.apps.home-page.show', compact('home_page'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(HomePage $homePage)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, HomePage $homePage)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(HomePage $homePage)
    {
        //
    }
}
