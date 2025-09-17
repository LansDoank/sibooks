<?php

namespace App\Http\Controllers;

use {{ namespacedModel }};
use App\Models\TestController;
use Illuminate\Http\Request;

class TestController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(TestController $testController)
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(TestController $testController)
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, TestController $testController)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(TestController $testController, {{ model }} ${{ modelVariable }})
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(TestController $testController, {{ model }} ${{ modelVariable }})
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, TestController $testController, {{ model }} ${{ modelVariable }})
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(TestController $testController, {{ model }} ${{ modelVariable }})
    {
        //
    }
}
