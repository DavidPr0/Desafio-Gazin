<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;

use App\Http\Requests\StoreDevelopersRequest;
use Illuminate\Http\Request;

use App\Models\Developer;

class DevelopersController extends Controller
{

    public function index()
    {
        dd('acessou stor');
    }

    public function store(StoreDevelopersRequest $request)
    {
        dd($request);
        Developer::create($request->all());
        //dd('chegosu');
        // return response()->json($response);
        return response()->json( 201);
    }

    public function show($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
