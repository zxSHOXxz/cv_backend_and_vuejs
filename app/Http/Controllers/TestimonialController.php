<?php

namespace App\Http\Controllers;

use App\DataTables\TestimonialsDataTable;
use App\Models\Testimonial;
use Illuminate\Http\Request;

class TestimonialController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:create testimonial', ['only' => ['create', 'store']]);
        $this->middleware('can:read testimonial', ['only' => ['show', 'index']]);
        $this->middleware('can:edit testimonial', ['only' => ['edit', 'update']]);
        $this->middleware('can:delete testimonial', ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     */
    public function index(TestimonialsDataTable $dataTable)
    {
        return $dataTable->render('pages/apps.testimonials.list');
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
    public function show(Testimonial $testimonial)
    {
        return view('pages/apps.testimonials.show', compact('testimonial'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Testimonial $testimonial)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Testimonial $testimonial)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Testimonial $testimonial)
    {
        //
    }
}
