<?php

namespace App\Http\Controllers;

use App\Models\Favourite;
use App\Http\Requests\StoreFavouriteRequest;
use App\Http\Requests\UpdateFavouriteRequest;
use GuzzleHttp\Psr7\Request;
use Illuminate\Support\Facades\Auth;

class FavouriteController extends Controller
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
    public function store(StoreFavouriteRequest $request)
    {
        Favourite::create([
            'user_id' => Auth::id(),
            'contact_id' => $request->contact_id
        ]);

        return response()->json([
            'message' => "Favourite is added "
        ], 200);
    }

    /**
     * Display the specified resource.
     */
    public function show(Favourite $favourite)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Favourite $favourite)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateFavouriteRequest $request, Favourite $favourite)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, Favourite $favourite)
    {
        $delHistory = $favourite->findOrFail($request->id);
        $delHistory->delete();

        return response()->json([
            'message' => "Remove  from  Favourite successfully "
        ], 200);
    }
}
