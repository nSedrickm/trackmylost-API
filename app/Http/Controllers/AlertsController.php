<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Alert;

class AlertsController extends Controller
{
    public function index()
    {
        return Alert::orderByDesc('id')->get();

    }

    public function show(Alert $alert)
    {
        return $alert;
    }

    public function store(Request $request)
    {
        $alert = Alert::create($request->all());

        return response()->json($alert, 201);
    }

    public function update(Request $request, Alert $alert)
    {
        $alert->update($request->all());

        return response()->json($alert, 200);
    }

    public function delete(Alert $alert)
    {
        $alert->delete();

        return response()->json(null, 204);
    }
}
