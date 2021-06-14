<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Item;

class ItemsController extends Controller
{
    public function index(Request $request, Item $item)
    {

        //used to search for item based on name
        if ($request->has('name')) {
            $search_result = $item
                ->where('first_name', $request->input('name'))
                ->orWhere('other_names', $request->input('name'))
                ->orderBy('created_at', 'desc')
                ->get();

            if ($search_result->isEmpty()) {
                Item::abort(404);
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

        return Item::all();
    }

    public function show(Item $item)
    {
        return $item;
    }

    public function store(Request $request)
    {
        $item = Item::create($request->all());

        return response()->json($item, 201);
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
