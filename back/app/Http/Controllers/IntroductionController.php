<?php

namespace App\Http\Controllers;

use App\Language;
use App\Introduction;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Pagination\Paginator;
use Illuminate\Database\Query\Builder;
use Input;
use Image;
use File;
use Storage;


class IntroductionController extends Controller
{
    protected $langs;

    public function __construct()
    {
        $this->langs = DB::table('languages')->get()->pluck('lang')->unique();
    }

    public function index(Request $request)
    {

        $introductions = Introduction::all()->map(function ($introduction) {
            $introduction['avatar'] = asset('upload/img') . '/' . $introduction['avatar'];
            return $introduction;
        });

        if ($request->is('introductions')) {
            $introductions =  DB::table('introductions')->orderBy('lang', 'des')->orderBy('start', 'des')->paginate(5);
            return view('introductions/index',['introductions'=>$introductions, 'lang' => 'all', 'langs' => $this->langs]);
        } 

        return $introductions;
    }

    public function filter($lang){

        if ($lang === 'all' ) {
            return redirect('/introductions');
        }

        $introductions = DB::table('introductions')->where('lang', $lang)->orderBy('start', 'des')->paginate(5);;
        return view('introductions/index',['introductions'=>$introductions, 'lang' => $lang, 'langs' => $this->langs]);
    }

    public function show(Introduction $id, Request $request)
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
        $introduction = $this->validate($request, [
            'greeting' => 'required',
            'intro' => 'required',
            'avatar' => 'required|image',
            'lang' => 'required'
        ]);

        $image = Input::file('avatar');
        $filename = time() . '.' . $image->getClientOriginalExtension();
        $path = public_path('upload/img/' . $filename);
        
        Image::make($image->getRealPath())->resize(200, 200)->save($path);
   
        $introduction['avatar'] = $filename;

        if ($request->is('introductions/*')) {
            Introduction::create($introduction);
            return redirect('/introductions');
        } else {
            return Introduction::create($introduction);
        }
    }


    public function update(Request $request, Introduction $id)
    {
        $id->update($request->all());

        if ($request->is('introductions/*')) {
            return redirect('/introductions');
        } else {
            return response()->json($$id, 200);
        }

    }

    public function delete(Introduction $id, Request $request)
    {
        $image = Introduction::find($id)[0]['avatar'];
        $image_path = public_path('upload/img/' . $image);

        if (File::exists($image_path)) {
            File::delete($image_path);
        }

        $id->delete();

       if ($request->is('introductions/*')) {
            return redirect('/introductions');
       } else {
            return response()->json(null, 204);
       }
    }

}
