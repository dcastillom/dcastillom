<?php

namespace App\Http\Controllers;

use App\Language;
use App\Experience;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Pagination\Paginator;
use Illuminate\Database\Query\Builder;


class ExperienceController extends Controller
{
    protected $langs;

    public function __construct()
    {
        $this->langs = DB::table('languages')->get()->pluck('lang')->unique();
    }

    public function index(Request $request)
    {

        if ($request->is('experiences')) {
            $experiences =  DB::table('experiences')->orderBy('lang', 'des')->orderBy('start', 'des')->paginate(5);
            return view('experiences/index',['experiences'=>$experiences, 'lang' => 'all', 'langs' => $this->langs]);
        } 
        
        return Experience::all();
    }

    public function filter($lang){

        if ($lang === 'all' ) {
            return redirect('/experiences');
        }

        $experiences = DB::table('experiences')->where('lang', $lang)->orderBy('start', 'des')->paginate(5);;
        return view('experiences/index',['experiences'=>$experiences, 'lang' => $lang, 'langs' => $this->langs]);
    }

    public function show(Experience $id, Request $request)
    {
        if ($request->is('experiences/*')) {
            return view('experiences/show',['experience'=>Experience::find($id)->first(), 'langs' => $this->langs]  );
        }

        return Experience::find($id);
    }

    public function create()
    {
        return view('experiences/new',['langs' => $this->langs]);
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

        Experience::create($experience);

        return redirect('/experiences');
    }

    public function update(Request $request, Experience $id)
    {
        $id->update($request->all());
        return redirect('/experiences');
    }

    public function delete(Experience $id, Request $request)
    {
        $id->delete();
        return redirect('/experiences');
    }
}
