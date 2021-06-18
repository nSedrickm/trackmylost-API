<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Notification;


class NotificationsController extends Controller
{
    public function index()
    {
        return Notification::orderByDesc('id')->get();
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
