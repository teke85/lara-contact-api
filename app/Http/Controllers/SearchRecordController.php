<?php

namespace App\Http\Controllers;

use App\Models\SearchRecord;
use App\Http\Requests\StoreSearchRecordRequest;
use App\Http\Requests\UpdateSearchRecordRequest;
use GuzzleHttp\Psr7\Request;
use Illuminate\Support\Facades\Auth;

class SearchRecordController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        // dd(SearchRecord::all());

        $searchRecords =  SearchRecord::where('user_id', '=', Auth::id())->get();
        return response()->json([
            'message' => $searchRecords
        ], 200);
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
    public function store(StoreSearchRecordRequest $request)
    {

        // SearchRecord::created([
        //     'user_id' => Auth::id(),
        //     'keywords' => request()->keywords
        // ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(SearchRecord $searchRecord)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(SearchRecord $searchRecord)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateSearchRecordRequest $request, SearchRecord $searchRecord)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $delHistory = SearchRecord::findOrFail($id);
        $delHistory->delete();
        return response()->json([
            'message' => "delete successfully"
        ], 200);
    }
}
