<?php

namespace App\Http\Controllers;



use App\Http\Resources\ContactDetailsResource;
use App\Http\Resources\ContactResource;
use App\Models\Contact;
use App\Models\SearchRecord;
// use Illuminate\Auth\Access\Gate;
use Illuminate\Support\Facades\Gate;
use Illuminate\Http\Request;

use App\Http\Resources\ContactDetailResource;
use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;
use PhpParser\Node\Expr\FuncCall;
use Symfony\Component\CssSelector\Node\FunctionNode;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    // public function index()
    // {


    //     $contacts = Contact::latest("id")->paginate(5)->withQueryString();
    //     return ContactResource::collection($contacts);

    //     // $contacts = Contact::when(request()->has("keyword"), function ($query) {
    //     //     $query->where(function (Builder $builder) {
    //     //         $keyword = request()->keyword;

    //     //         $builder->where("title", "like", "%" . $keyword . "%");
    //     //         $builder->orWhere("description", "like", "%" . $keyword . "%");
    //     //     });
    //     // })->get();






    // }


    public function index()

    {

        $contacts = Contact::when(request()->has("keyword"), function ($query) {

            $query->where(function (Builder $builder) {

                $keyword = request()->keyword;

                $builder->where("name", "like", "%" . $keyword . "%");
                $builder->orWhere("phone_number", "like", "%" . $keyword . "%");
                SearchRecord::create(
                    [
                        'user_id' => Auth::id(),
                        'keywords' => request()->keyword
                    ]
                );
            });
        })->where('user_id', '=', Auth::id())->latest("id")
            ->paginate(7)->withQueryString();
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
            "phone_number" => $request->phone_number,
            'user_id' => Auth::id()
        ]);


        return new ContactDetailsResource($contact);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id, Request $request)
    {
        if ($request->restore == true) {
            Contact::withTrashed()->findOrFail($id)->restore();
        }
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
    public function destroy(string $id): JsonResponse
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

    public function multipleDelete(Request $request): JsonResponse

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




    public function forceDelete($id): JsonResponse
    {

        $contact = Contact::withTrashed()->findOrFail($id);

        if (Gate::denies('custom-validate', $contact)) {
            return response()->json([
                'message' => "action invalid"
            ], 200);
        }
        $contact->forceDelete();
        return response()->json([
            'message' => "contacts is  force deleted"
        ], 200);
    }


    public function GetMYFavs()
    {
    }


    public function ForceDeleteAll()
    {
        Contact::where('user_id', Auth::id())->forceDelete();
        return response()->json([
            'message' => "All contacts    force deleted"
        ], 200);
    }
}
