<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\Database\Eloquent\Builder;


use App\Http\Resources\ContactDetailsResource;
use App\Http\Resources\ContactResource;
use App\Models\Contact;
use App\Models\SearchRecord;
// use Illuminate\Auth\Access\Gate;
use Illuminate\Support\Facades\Gate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Termwind\Components\Dd;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {


        // $contacts = Contact::all();


        $contacts = Contact::when(
            $request->has("keywords"),
            function (Builder $query) {
                $query->where(function (Builder $builder) {

                    $keywords =  request()->has("keywords");


                    $builder->where("name", "like", "%" . $keywords . "%")
                        ->orWhere("number", "like", "%" . $keywords . "%");
                });
            }`
        )
            // ->where('user_id', '=', Auth::id())->paginate(5)
            ->all();
        return ContactResource::collection($contacts);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate(
            [
                'name' => 'required',
                'phone_number' => 'required'
            ]
        );

        $contact = Contact::create([
            "name" => $request->name,
            "country_code" => $request->country_code,
            "phone_number" => $request->phone_number
        ]);
        return new ContactDetailsResource($contact);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $contact = Contact::findOrFail($id);
        if (is_null($contact)) {
            return response()->json([
                'message' => 'contact not found'
            ], 404);
        }

        // Gate::denies()
        return  new ContactDetailsResource($contact);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            "name" => "nullable",
            "country_code" => "nullable",
            "phone_number" => "nullable"
        ]);
        $contact = Contact::find($id);




        if (is_null($contact)) {
            return response()->json([
                'message' => 'contact not found'
            ], 404);
        }

        if ($request->has('name')) {
            $contact->name  = $request->name;
        }
        if ($request->has('country_code')) {
            $contact->country_code  = $request->country_code;
        }
        if ($request->has('phone_number')) {
            $contact->phone_number  = $request->name;
        }
        $contact->update();

        return new ContactDetailsResource($contact);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {


        $contact = Contact::findOrFail($id);

        // $this->authorize('delete', $contact);
        if (Gate::denies('custom-validate', $contact)) {
            return response()->json([
                'message' => "action invalid"
            ], 200);
        }


        $contact->delete();
        return response()->json([
            'message' => "contact is deleted"
        ], 200);
    }

    public function multipleDelete(Request $request)

    {
        // return $request;
        foreach ($request->contacts  as $contact) {
            $delContact = Contact::findOrFail($contact);
            $delContact->delete();
        };

        return response()->json([
            'message' => "contacts are  deleted"
        ], 200);
    }


    public function forceDelete($id)
    {

        $contact = SearchRecord::withTrashed()->findOrFail($id);

        $contact->tags()->detach();
        $contact->forceDelete();
        return response()->json([
            'message' => "contacts is  deleted"
        ], 200);
    }
}
