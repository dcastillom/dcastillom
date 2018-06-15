<?php

namespace App\Http\Controllers;

use App\Language;
use App\Introduction;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Pagination\Paginator;
use Illuminate\Database\Query\Builder;


class IntroductionController extends Controller
{
    protected $langs;

    public function __construct()
    {
        $this->langs = DB::table('languages')->get()->pluck('lang')->unique();
    }

    public function index(Request $request)
    {

        if ($request->is('introductions')) {
            $introductions =  DB::table('introductions')->orderBy('lang', 'des')->orderBy('start', 'des')->paginate(5);
            return view('introductions/index',['introductions'=>$introductions, 'lang' => 'all', 'langs' => $this->langs]);
        } 
        
        return Introduction::all();
    }

    public function filter($lang){

        if ($lang === 'all' ) {
            return redirect('/introductions');
        }

        $introductions = DB::table('introductions')->where('lang', $lang)->orderBy('start', 'des')->paginate(5);;
        return view('introductions/index',['introductions'=>$introductions, 'lang' => $lang, 'langs' => $this->langs]);
    }

    public function show(Experience $id, Request $request)
    {
        if ($request->is('introductions/*')) {
            return view('introductions/show',['experience'=>Introduction::find($id)->first()]);
        }

        return Introduction::find($id);
    }

    public function create()
    {
        return view('introductions/new',['langs' => $this->langs]);
    }

    public function store(Request $request)
    {
        $experience = $this->validate($request, [
            'greeting' => 'required',
            'intro' => 'required',
            // 'avatar' => 'required',
            'lang' => 'required'
        ]);


        if ($request->is('introductions/*')) {
            Introduction::create($experience);
            return redirect('/introductions');
        } else {
            return Introduction::create($experience);
        }
    }

    public function update(Request $request, Experience $id)
    {
        $id->update($request->all());

        if ($request->is('introductions/*')) {
            return redirect('/introductions');
        } else {
            return response()->json($$id, 200);
        }

    }

    public function delete(Experience $id, Request $request)
    {
        $id->delete();

       if ($request->is('introductions/*')) {
            return redirect('/introductions');
       } else {
            return response()->json(null, 204);
       }
    }
}
