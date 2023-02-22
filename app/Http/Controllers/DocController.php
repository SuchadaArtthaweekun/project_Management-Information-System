<?php

namespace App\Http\Controllers;

use App\Models\Categories;
use App\Models\Document;
use App\Models\File;
use App\Models\Projects;
use Facade\FlareClient\Http\Response;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use SebastianBergmann\CodeCoverage\Report\Xml\Project;
use Symfony\Component\Console\Input\Input;

class DocController extends Controller
{
    //

    public function allfile($project_id)
    {
        $catebar = DB::table('categories')->get();
        $project = Projects::find($project_id);
        $documents = Document::all();

        // $file = DB::table('projects')
        // ->join('documents', 'documents.project_id', '=', 'documents.project_id')
        // ->join('categories', 'categories.cate_id', '=', 'projects.cate_id')
        // ->where('projects.project_id', '=', $project_id)
        // ->get();

        // $projects = DB::table('projects')->get();
        // $categories = DB::table('categories')->get();
        // $documents = DB::table('documents')->get();

        // return view('projects.projects', ['file' => $file]);
        return view('projects.projects', ['project' => $project, 'file' => $documents, 'catebar' => $catebar]);
    }

    public function allFiles($project_id)
    {
        $documents = Document::all();
        $categories = Categories::all();
        $projectslist = DB::select('select * from projects');
        // echo $project;
        $catebar = DB::table('categories')->get();
        // $project = DB::table('categories')
        //     ->join('projects', 'projects.cate_id', '=', 'categories.cate_id')
        //     ->join('documents', 'documents.project_id', '=', 'projects.project_id')
        //     ->join('advisers', 'advisers.adviser_id', '=', 'projects.adviser')
        //     ->where('projects.project_id', '=', $project_id)
        //     ->first();

        // $project = DB::select(DB::raw("
        //     SELECT projects.*, documents.*, advisers.*, categories.* FROM projects 
        //     LEFT JOIN categories ON categories.cate_id = projects.cate_id 
        //     LEFT JOIN documents ON documents.project_id = projects.project_id
        //     LEFT JOIN advisers ON advisers.adviser_id = projects.adviser 
        //     WHERE projects.project_id = $project_id"));

        // if ($project) {
        //     $project = $project[0];
        // }else{
        //     $project = [];
        // }

        // $project = Projects::where("project_id", "=", $project_id)->with("documents")
        // ->with(['adviser_lists' => function ($query) {
        //         $query->with('advisers');
        //     }])
        // ->first();

        $project = Projects::where("project_id", "=", $project_id)->with("documents")
        ->with('adviser_lists')
        ->first();
        
        dd($project);
        // return $project;
        return view('projects.allFiles', compact('project', 'categories', 'catebar'));
    }

    public function stdAllFiles($project_id)
    {
        $documents = Document::all();
        $categories = Categories::all();
        $projectslist = DB::select('select * from projects');
        // echo $project;
        $catebar = DB::table('categories')->get();

        // $projects = array(
        //     'car' => array('required', 'unique:insur_docs,car_id')
        // );
        // $validation = Validator::make(Input::all(), $projects);
        $project = DB::table('categories')
            ->join('projects', 'projects.cate_id', '=', 'categories.cate_id')
            ->join('documents', 'documents.project_id', '=', 'projects.project_id')
            ->join('advisers', 'advisers.adviser_id', '=', 'projects.adviser')
            ->where('projects.project_id', '=', $project_id)
            ->get();
        return view('dashboard.std-allfiles', compact('project', 'categories', 'catebar'));
    }
    public function tchAllFiles($project_id)
    {
        $documents = Document::all();
        $categories = Categories::all();
        $projectslist = DB::select('select * from projects');
        // echo $project;
        $catebar = DB::table('categories')->get();
        $project = DB::table('categories')
            ->join('projects', 'projects.cate_id', '=', 'categories.cate_id')
            ->join('documents', 'documents.project_id', '=', 'projects.project_id')
            ->join('advisers', 'advisers.adviser_id', '=', 'projects.adviser')
            ->where('projects.project_id', '=', $project_id)
            ->get();
        return view('dashboard.tch-allfiles', compact('project', 'categories', 'catebar'));
    }



    public function dballFiles($project_id)
    {
        $catebar = DB::table('categories')->get();
        $filedb = DB::table('projects')
            ->join('documents', 'documents.project_id', '=', 'documents.project_id')
            ->join('categories', 'categories.cate_id', '=', 'projects.cate_id')
            ->where('projects.project_id', '=', $project_id)
            ->get();
        return view('projects.allFiles', compact('filedb', 'catebar'));
    }

    public function addfile($project_id)
    {

        // $file = DB::table('projects')
        // ->join('documents', 'documents.project_id', '=', 'documents.project_id')
        // ->join('categories', 'categories.cate_id', '=', 'projects.cate_id')
        // ->where('projects.project_id', '=', $project_id)
        // ->get();
        // return view('addfile', ['file' => $file]);

        $catebar = DB::table('categories')->get();
        $projects = DB::table('projects')->get();
        $categories = DB::table('categories')->get();
        $documents = DB::table('documents')->get();

        return view('addfile', ['projects' => $projects, 'categories' => $categories, 'documents' => $documents, 'catebar' => $catebar]);
    }
    public function fileindoc($project_id)
    {
        $catebar = DB::table('categories')->get();
        $file = DB::table('projects')
            ->join('documents', 'documents.project_id', '=', 'documents.project_id')
            ->join('categories', 'categories.cate_id', '=', 'projects.cate_id')
            ->where('projects.project_id', '=', $project_id)
            ->get();

        $title_th = DB::table('projects');

        return view('projects.doc', ['file' => $file, 'catebar' => $catebar]);
    }

    public function doc($project_id)
    {
        $catebar = DB::table('categories')->get();
        $file = DB::table('projects')
            ->join('documents', 'documents.project_id', '=', 'documents.project_id')
            ->join('categories', 'categories.cate_id', '=', 'projects.cate_id')
            ->where('projects.project_id', '=', $project_id)
            ->get();
        $file = Project::find($project_id)->get();
        $title_th = DB::table('projects');

        return view('projects.doc', ['file' => $file, 'catebar' => $catebar]);
    }


    public function store(Request $request)
    {
        $project_id = $request->input('project_id');
        $title_th = Projects::find($project_id);
        $file = $request->file('file');


        $name = $request->file('file')->getClientOriginalName();
        $path = $request->file('file')->store('public/documents/');
        $file->move(public_path('documents'), $name);
        $file_type = $request->input('type');
        $doc_status = 'on';
        $download_counter = '0';


        $save = new Document();

        $save->docname = $name;
        $save->doc_path = $path;
        $save->doc_type = $file_type;
        $save->doc_status = $doc_status;
        $save->download_counter =  $download_counter;
        $save->project_id = $project_id;
        $save->save();

        return redirect('allproject')->with('status', 'File Has been uploaded successfully in laravel 8');
        // echo $project_id;

    }
    // 
    public function upFileDoc(Request $request)
    {
        $catebar = DB::table('categories')->get();
        $project_id = $request->input('project_id');
        $title_th = Projects::find($project_id);
        $file = $request->file('file');

        if ($request->hasfile('file')) {
            foreach ($request->file('file') as $key => $file) {
                // $name = $file->getClientOriginalName();
                $name = $project_id . "-" . $file->getClientOriginalName();
                $path = $file->store('documents');
                $file->move(public_path('documents'), $name);
                $doc_type = $request->input('type');
                $download_counter = '0';


                $insert[$key]['docname'] = $name;
                $insert[$key]['doc_path'] = $path;
                $insert[$key]['doc_type'] = $doc_type;
                $insert[$key]['download_counter'] = $download_counter;
                $insert[$key]['project_id'] = $project_id;
                echo $name;
            }
        }

        Document::insert($insert);
        return redirect()->back()->with('status', 'อัปโหลดเสร็จสิ้น');
        // echo $project_id;

    }
    public function storeAgain(Request $request)
    {
        $catebar = DB::table('categories')->get();
        $project_id = $request->input('project_id');
        $title_th = Projects::find($project_id);
        $file = $request->file('file');

        if ($request->hasfile('file')) {
            foreach ($request->file('file') as $key => $file) {
                // $name = $file->getClientOriginalName();
                $name = $project_id . "-" . $file->getClientOriginalName();
                $path = $file->store('documents');
                $file->move(public_path('documents'), $name);
                $doc_type = $request->input('type');
                $download_counter = '0';


                $insert[$key]['docname'] = $name;
                $insert[$key]['doc_path'] = $path;
                $insert[$key]['doc_type'] = $doc_type;
                $insert[$key]['download_counter'] = $download_counter;
                $insert[$key]['project_id'] = $project_id;
                echo $name;
            }
        }

        Document::insert($insert);
        return redirect('allproject')->with('status', 'File Has been uploaded successfully in laravel 8');
        // echo $project_id;

    }
    // 
    public function stdUploadfile(Request $request)
    {
        $catebar = DB::table('categories')->get();
        $project_id = $request->input('project_id');
        $title_th = Projects::find($project_id);
        $file = $request->file('file');

        if ($request->hasfile('file')) {
            foreach ($request->file('file') as $key => $file) {
                // $name = $file->getClientOriginalName();
                $name = $project_id . "-" . $file->getClientOriginalName();
                $path = $file->store('documents');
                $file->move(public_path('documents'), $name);
                $doc_type = $request->input('type');
                $download_counter = '0';


                $insert[$key]['docname'] = $name;
                $insert[$key]['doc_path'] = $path;
                $insert[$key]['doc_type'] = $doc_type;
                $insert[$key]['download_counter'] = $download_counter;
                $insert[$key]['project_id'] = $project_id;
                echo $name;
            }
        }

        Document::insert($insert);
        return redirect()->back();
        // redirect()->back();
        // echo $project_id;

    }




    // 
    public function showDoc($project_id)
    {
        $documents = Document::all();
        $categories = Categories::all();
        $projectslist = DB::select('select * from projects');
        // echo $project;
        $catebar = DB::table('categories')->get();
        $project = DB::table('categories')
            ->join('projects', 'projects.cate_id', '=', 'categories.cate_id')
            ->join('documents', 'documents.project_id', '=', 'projects.project_id')
            ->where('projects.project_id', '=', $project_id)
            ->get();


        return view('projects.showDoc', compact('project', 'documents', 'projectslist', 'categories', 'catebar'));
    }

    public function deletedoc($doc_id)
    {

        DB::table('documents')->where('doc_id', $doc_id)->delete();
        // return redirect(url()->previous());
        return response()->json(['message' => 'deleted']);
    }



    public function Download($doc_id, $docname)
    {

        Document::find($doc_id)->increment('download_counter');
        // echo $doc_id;
        return response()->download('documents/' . $docname);
    }

    public function getpdf($doc_id, $docname, $doc_path)
    {

        Document::find($doc_id)->increment('download_counter');
        // echo $doc_id;
        return response()->download($doc_path);
    }
}
