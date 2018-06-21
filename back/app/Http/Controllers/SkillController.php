<?php

namespace App\Http\Controllers;

use App\Language;
use App\Skill;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Pagination\Paginator;
use Illuminate\Database\Query\Builder;


class SkillController extends Controller
{
    protected $levels;

    public function __construct()
    {
        $this->levels = [10, 20, 30, 40, 50, 60, 70, 80, 90, 100];
    }

    public function index(Request $request)
    {

        if ($request->is('skills')) {
            $skills =  DB::table('skills')->paginate(5);
            return view('skills/index',['skills'=>$skills, 'levels' => $this->levels]);
        } 
        
        return Skill::all();
    }

    public function show(Skill $id, Request $request)
    {
        if ($request->is('skills/*')) {
            return view('skills/show',['skill'=>Skill::find($id)->first(), 'levels' => $this->levels]  );
        }

        return Skill::find($id);
    }

    public function create()
    {
        return view('skills/new',['levels' => $this->levels]);
    }

    public function store(Request $request)
    {
        $skill = $this->validate($request, [
            'skill' => 'required',
            'level' => 'required',
        ]);

        Skill::create($skill);

        return redirect('/skills');
    }

    public function update(Request $request, Skill $id)
    {
        $id->update($request->all());
        return redirect('/skills');
    }

    public function delete(Skill $id, Request $request)
    {
        $id->delete();
        return redirect('/skills');
    }
}
