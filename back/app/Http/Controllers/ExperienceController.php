<?php

namespace App\Http\Controllers;

use App\Experience;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


class ExperienceController extends Controller
{

    public function index(Request $request)
    {
        if ($request->is('experiences')) {

            // return view('experiences/index', ['experiences' => DB::table('experiences')->paginate(15)]);
            return view('experiences/index', ['experiences' => Experience::all()]);
        } else {
            return Experience::all();
        }
    }

    public function show(Experience $id)
    {
        return Experience::find($id);
    }

    public function store(Request $request)
    {
        $experience = $this->validate($request, [
            'company' => 'required',
            'start' => 'required|date',
            'end' => 'required|date|after:start',
            'description' => 'required',
            'position' => 'required',
            'links' => '',
        ]);

        return Experience::create($experience);
    }

    public function update(Request $request, Experience $id)
    {
        $id->update($request->all());

        return response()->json($$id, 200);
    }

    public function delete(Experience $id, Request $request)
    {

        $id->delete();

       if ($request->is('experiences/*')) {
            return redirect('/experiences');
       } else {
            return response()->json(null, 204);
       }

    }
}
