<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Item;
use App\Models\Notification;
use App\Models\Alert;


class ItemsController extends Controller
{
    public function index(Request $request, Item $item)
    {

        //used to search for item based on name

        if ($request->has('name')) {
            $name = $request->input('name');
            $search_result = $item
                ->where('first_name', $name)
                ->orWhere('other_names', $name)
                ->orWhereRaw("CONCAT(first_name, ' ', other_names) LIKE ?", [$name])
                ->orderBy('created_at', 'desc')
                ->get();

            if ($search_result->isEmpty()) {
                return response()->json(null, 404);;
            }

            return $search_result;
        }

        // return only items registered by the phone number
        if ($request->has('phone_number')) {
            $search_result = $item
                ->where('phone_number', $request->input('phone_number'))
                ->orderBy('created_at', 'desc')
                ->get();

            if ($search_result->isEmpty()) {
                Item::abort(404);
            }

            return $search_result;
        }

        if ($request->has('recent')) {
            return Item::latest('id')
                ->take(4)
                ->get();
        }

        return Item::orderByDesc('id')->get();
    }

    public function show(Item $item)
    {
        return $item;
    }

    public function store(Request $request)
    {
        $item = Item::create($request->all());

        $full_names = $request->first_name . " " . $request->other_names;
        $result = Alert::where('name', $full_names)->first();

        if ($result) {
            Notification::create([
                "type" => "item-found",
                "document_type" => $result->document_type,
                "name" => $result->name
            ]);
        }

        return response()->json(null, 201);
    }

    public function update(Request $request, Item $item)
    {
        $item->update($request->all());

        return response()->json($item, 200);
    }

    public function delete(Item $item)
    {
        $item->delete();

        return response()->json(null, 204);
    }
}
