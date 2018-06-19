<?php

namespace App\Http\Controllers;

use App\Language;
use App\Introduction;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Pagination\Paginator;
use Illuminate\Database\Query\Builder;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Input;
use Image;
use File;


class IntroductionController extends Controller
{
    protected $langs;

    public function __construct()
    {
        $this->langs = DB::table('languages')->get()->pluck('lang')->unique();
    }

    public function saveAvatar($file) {
        //$image = Input::file('avatar');
        $image = $file;
        $filename = time() . '.' . $image->getClientOriginalExtension();
        $path = public_path('upload/img/' . $filename);
        Image::make($image->getRealPath())->resize(200, 200)->save($path);
        return $filename;
    }

    public function deleteAvatar($id) {
        $image = Introduction::find($id)[0]['avatar'];
        $image_path = public_path('upload/img/' . $image);

        if (File::exists($image_path)) {
            File::delete($image_path);
        }
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
            return view('introductions/show',['introduction'=>Introduction::find($id)->first(), 'langs' => $this->langs]  );
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

        $introduction['avatar'] = $this->saveAvatar(Input::file('avatar'));

        if ($request->is('introductions/*')) {
            Introduction::create($introduction);
            return redirect('/introductions');
        } else {
            return Introduction::create($introduction);
        }
    }

    public function update(Request $request, Introduction $id, File $avatar)
    {

        $introduction = $this->validate($request, [
            'greeting' => 'required',
            'intro' => 'required',
            'avatar' => 'image',
            'lang' => 'required'
        ]);

        if(file_exists($_FILES['avatar']['tmp_name']) && is_uploaded_file($_FILES['avatar']['tmp_name'])) {
            $this->deleteAvatar($id);
            $introduction['avatar'] = $this->saveAvatar($request->file('avatar'));
        } else {
            $request['avatar'] = $request['oldAvatar'];
            $introduction['avatar'] = $request['oldAvatar']; 
        }

        $id->update($introduction);

        if ($request->is('introductions/*')) {
            return redirect('/introductions');
        } else {
            return response()->json($$id, 200);
        }
    }

    public function delete(Introduction $id, Request $request)
    {
        $this->deleteAvatar($id);

        $id->delete();

       if ($request->is('introductions/*')) {
            return redirect('/introductions');
       } else {
            return response()->json(null, 204);
       }
    }

}
