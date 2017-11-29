<?php

namespace App\Http\Controllers;

use App\Cafe;
use Gate;
use Illuminate\Http\Request;

class CafeController extends Controller
{
    public function index()
    {
        return response()->json(Cafe::all());
    }

    public function createCafe(Request $request)
    {
        if (Gate::denies('change_cafes')) {
            return response('User do not have permission to create new cafe', 403);
        }
        if (!$request->has('name')) {
            return response('Name not set', 202);
        }
        if (!$request->has('price')) {
            return response('Price not set', 202);
        }
        if (!$request->has('picture')) {
            return response('Picture not set', 202);
        }
        $cafe = Cafe::create($request->all());
        return response()->json($cafe);
    }
    
    public function updateCafe(Request $request, $id)
    {
        if (Gate::denies('change_cafes')) {
            return response('User do not have permission to create new cafe', 403);
        }
        $cafe = Cafe::findOrFail($id);
        if (!$request->has('name')) {
            return response('Name not set', 202);
        }
        if (!$request->has('price')) {
            return response('Price not set', 202);
        }
        if (!$request->has('picture')) {
            return response('Picture not set', 202);
        }
        $cafe->name = $request->name;
        $cafe->price = $request->price;
        $cafe->picture = $request->picture;
        $cafe->description = $request->input('description');
        $cafe->save();
        return response()->json($cafe);
    }

    public function deleteCafe($id)
    {
        if (Gate::denies('change_cafes')) {
            return response('User do not have permission to create new cafe', 403);
        }
        $cafe = Cafe::findOrFail($id);
        $cafe->delete();
        return response()->json($cafe);
    }
}
