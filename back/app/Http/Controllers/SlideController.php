<?php

namespace App\Http\Controllers;

use App\Language;
use App\Slide;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Pagination\Paginator;
use Illuminate\Database\Query\Builder;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Input;
use Image;
use File;


class SlideController extends Controller
{

    protected $langs;

    public function __construct()
    {
        $this->langs = DB::table('languages')->get()->pluck('lang')->unique();
    }

    public function saveSlide($file) {
        $image = $file;
        $filename = time() . '.' . $image->getClientOriginalExtension();
        $path = public_path('upload/swiper/' . $filename);
        Image::make($image->getRealPath())->resize(200, 200)->save($path);
        return $filename;
    }

    public function deleteSlide($id) {
        $image = Slide::find($id)[0]['image'];
        $image_path = public_path('upload/swiper/' . $image);

        if (File::exists($image_path)) {
            File::delete($image_path);
        }
    }

    public function index(Request $request)
    {
        $slides = Slide::all()->map(function ($slide) {
            $slide['image'] = asset('upload/swiper') . '/' . $slide['image'];
            return $slide;
        });

        if ($request->is('slides')) {
            $slides =  DB::table('slides')->paginate(5);
            return view('slides/index',['slides'=>$slides, 'lang' => 'all', 'langs' => $this->langs]);
        }

        return $slides;
    }

    public function create()
    {
        return view('slides/new',['langs' => $this->langs]);
    }

    public function store(Request $request)
    {
        $slide = $this->validate($request, [
            'image' => 'required',
            'footnote' => '',
            'lang' => '',
        ]);

        $slide['image'] = $this->saveSlide(Input::file('image'));

        Slide::create($slide);

        return redirect('/slides');
    }

    public function delete(Slide $id, Request $request)
    {
        $this->deleteSlide($id);
        $id->delete();
        return redirect('/slides');
    }

    public function filter($lang){

        if ($lang === 'all' ) {
            return redirect('/slides');
        }

        $slides = DB::table('slides')->where('lang', $lang)->orderBy('start', 'des')->paginate(5);;
        return view('slides/index',['slides'=>$slides, 'lang' => $lang, 'langs' => $this->langs]);
    }

}
