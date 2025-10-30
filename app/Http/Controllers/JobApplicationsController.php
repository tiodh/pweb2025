<?php

namespace App\Http\Controllers;

use App\Http\Requests\Storejob_applicationsRequest;
use App\Http\Requests\Updatejob_applicationsRequest;
use App\Models\job_applications;

class JobApplicationsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
    public function store(Storejob_applicationsRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(job_applications $job_applications)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(job_applications $job_applications)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Updatejob_applicationsRequest $request, job_applications $job_applications)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(job_applications $job_applications)
    {
        //
    }
}
