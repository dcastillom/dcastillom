<?php

namespace App\Http\Controllers;

use App\Experience;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Pagination\Paginator;
use Illuminate\Database\Query\Builder;


class ExperienceController extends Controller
{

    public function index(Request $request)
    {
        if ($request->is('experiences')) {
            $experiences =  DB::table('experiences')->orderBy('lang', 'des')->orderBy('start', 'des')->paginate(5);

            $lang = 'all';
            $langs = Experience::select('lang')->get()->pluck('lang')->unique();

            return view('experiences/index',['experiences'=>$experiences, 'lang' => $lang, 'langs' => $langs]);
        } 
        
        return Experience::all();
    }

    public function filter($lang){

        if ($lang === 'all' ) {
            return redirect('/experiences');
        }

        $experiences = DB::table('experiences')->where('lang', $lang)->orderBy('start', 'des')->paginate(5);;

        $langs = Experience::select('lang')->get()->pluck('lang')->unique();
    
        return view('experiences/index',['experiences'=>$experiences, 'lang' => $lang, 'langs' => $langs]);
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
            'lang' => 'required',
            'company' => 'required',
            'start' => 'required',
            'end' => 'required',
            'description' => 'required',
            'position' => 'required',
            'links' => '',
        ]);


        if ($request->is('experiences/*')) {
            Experience::create($experience);
            return redirect('/experiences');
        } else {
            return Experience::create($experience);
        }
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
