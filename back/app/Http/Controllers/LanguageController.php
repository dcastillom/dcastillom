<?php

namespace App\Http\Controllers;

use App\Language;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Pagination\Paginator;


class LanguageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        {
            if ($request->is('languages')) {
                // $languages =  DB::table('languages');
                $languages =  Language::all();
                return view('languages/index',['languages'=>$languages]);
            } 
            
            return Language::all();
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $language = $this->validate($request, [
            'lang' => 'required',
        ]);

        if ($request->is('languages/*')) {
            Language::create($language);
            return redirect('/languages');
        } else {
            return Language::create($language);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete(Language $id, Request $request)
    {
        $id->delete();

        if ($request->is('languages/*')) {
            return redirect('/languages');
        } else {
            return response()->json(null, 204);
        }
    }
}
