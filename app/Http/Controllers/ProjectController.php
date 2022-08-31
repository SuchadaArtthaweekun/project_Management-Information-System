<?php

namespace App\Http\Controllers;

use App\Models\Document;
use App\Models\Projects;
use Categories;
use Facade\FlareClient\Stacktrace\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Psy\Readline\Hoa\Console;
use SebastianBergmann\CodeCoverage\Report\Xml\Project;

class ProjectController extends Controller
{

    public function allProject() {
        $projects = DB::table('projects')->get();
        $categories = DB::table('categories')->get();
        return view('projects.allproject', ['projects' => $projects,'categories' => $categories]);
    }
    public function editproject() {
        $projects = DB::table('projects')->get();
        return view('projects.editproject', ['projects' => $projects]);
    }


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


    public function addProject(Request $request) {
        // $author = $request->input('author');
        // $co_auther = $request->input('co_auther');
        // $title_th = $request->input('title_th');
        // $title_en = $request->input('title_en');
        // $edition = $request->input('edition');
        // $article = $request->input('article');
        // $abtract = $request->input('abtract');
        // $adviser = $request->input('adviser');
        // $co_advisers = $request ->input('adviser2');
        // $cate_id = $request->input('cate_id');
        // $id = $request->input('id');

        // $branch = $request->input('branch');
        // $gen = $request->input('gen');
        // $published = ('1');
        // $view_counter = ('0');
        // // $data=array('author'=>$author, 'co_auther'=>$co_auther	, 'title_th'=>$title_th, 'title_en'=>$title_en, 'edition'=>$edition, 
        // // 'article'=>$article, 'abtract'=>$abtract,'adviser'=>$adviser, 'co_adviser'=>$co_advisers, 'branch'=>$branch, 'gen'=>$gen,
        // // 'published'=>$published,'view_counter'=>$view_counter, 'cate_id'=>$cate_id, 'id'=>$id );
        // // DB::table('projects')->insert($data);

        // $project = new Projects();
        // $project -> author = $author;
        // $project -> co_auther = $co_auther;
        // $project -> title_th = $title_th;
        // $project -> title_en = $title_en;
        // $project -> edition = $edition;
        // $project -> article = $article;
        // $project -> abtract = $abtract;
        // $project -> adviser = $adviser;
        // $project -> co_adviser = $co_advisers;
        // $project -> cate_id = $cate_id;
        // $project -> id = $id;
        // $project -> branch = $branch;
        // $project -> gen = $gen;
        // $project -> published = $published;
        // $project -> view_counter = $view_counter;
        // $project ->save();


        $file = $request -> file('files');

        $name = $file -> getClientOriginalName();
        $path = $request->file('file')->store('public/document');
        $file -> move(public_path('document'),$name);

        $save = new Document;

        $save->docname =$name;
        $save->doc_path = $path;
        $save->save();

       

        // return redirect()->route('allproject');
 
    }
    
    public function deletepro($project_id)
    {
        DB::table('projects')->where('project_id', $project_id)->delete();
        return redirect('allproject');
    }

}
