<?php

namespace App\Http\Controllers;

use App\Core\Response\ResponseService;
use App\Enums\SpeakingCategoryStatus;
use App\Models\SpeakingCategory;
use Illuminate\Http\Request;

class SpeakingCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = SpeakingCategory::query()
            ->where('status', SpeakingCategoryStatus::ACTIVE)
            ->with(['user'])
            ->get();
        return ResponseService::success($categories);
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
    public function show(SpeakingCategory $speakingCategory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(SpeakingCategory $speakingCategory)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, SpeakingCategory $speakingCategory)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(SpeakingCategory $speakingCategory)
    {
        //
    }
}
