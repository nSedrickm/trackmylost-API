<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Notification;


class NotificationsController extends Controller
{
    public function index(Request $request, Notification $notification)
    {

        //used to search for item based on name
        if ($request->has('name')) {
            $search_result = $notification
                ->where('first_name', $request->input('name'))
                ->orWhere('other_names', $request->input('name'))
                ->orderBy('created_at', 'desc')
                ->get();

            if ($search_result->isEmpty()) {
                Notification::abort(404);
            }

            return $search_result;
        }

        // return only items registered by the phone number 
        if ($request->has('phone_number')) {
            $search_result = $notification
                ->where('phone_number', $request->input('phone_number'))
                ->orderBy('created_at', 'desc')
                ->get();

            if ($search_result->isEmpty()) {
                Notification::abort(404);
            }

            return $search_result;
        }

        if ($request->has('recent')) {
            return Notification::latest('id')
                ->take(4)
                ->get();
        }

        return Notification::all();
    }

    public function show(Notification $notification)
    {
        return $notification;
    }

    public function store(Request $request)
    {
        $notification = Notification::create($request->all());

        return response()->json($notification, 201);
    }

    public function update(Request $request, Notification $notification)
    {
        $notification->update($request->all());

        return response()->json($notification, 200);
    }

    public function delete(Notification $notification)
    {
        $notification->delete();

        return response()->json(null, 204);
    }
}
