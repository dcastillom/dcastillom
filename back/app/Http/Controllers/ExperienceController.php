<?php
namespace App\Http\Controllers;

use App\Experience;
use Illuminate\Http\Request;


class ExperienceController extends Controller
{


    public function index()
    {
        return Experience::all();
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

    public function delete(Experience $id)
    {
        $id->delete();

        return response()->json(null, 204);
    }
}
