<?php

namespace App\Http\Controllers;

use App\Experience;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Pagination\Paginator;


class ExperienceController extends Controller
{

    public function index(Request $request)
    {
        if ($request->is('experiences')) {
            $experiences =  DB::table('experiences')->orderBy('start', 'asc')->paginate(5);
            return view('experiences/index',['experiences'=>$experiences]);
        } 
        
        return Experience::all();
    }

    public function show(Experience $id, Request $request)
    {
        if ($request->is('experiences/*')) {
            return view('experiences/show',['experience'=>Experience::find($id)->first()]);
        }

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

        if ($request->is('experiences/*')) {
            return redirect('/experiences');
        } else {
            return response()->json($$id, 200);
        }

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
