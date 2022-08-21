<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProjectController extends Controller
{
    public function insertformProject(){
        return view('project_create');
        }

    public function insertProject(Request $request){
        $title = $request->input('title');
        $article = $request->input('article');
        $abtract = $request->input('abtract');
        $year_release = $request->input('year_release');
        $project_file = " ";
        $url = " ";
        $view_counter = " ";
        $cate_id = $request->input('cate_id');
        $data=array('title'=>$title, 'article'=>$article, 'abtract'=>$abtract, 'year_release'=>$year_release, 'cate_id'=>$cate_id );
        DB::table('projects')->insert($data);
    }
}
