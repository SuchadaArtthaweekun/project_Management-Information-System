<?php

namespace App\Http\Controllers;

use App\Models\Categories;
use App\Models\Document;
use App\Models\File;
use App\Models\Projects;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use SebastianBergmann\CodeCoverage\Report\Xml\Project;

class DocController extends Controller
{
    //

    public function allfile($project_id)
    {

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
        return view('projects.projects', ['project' => $project, 'file' => $documents]);
    }

    public function allFiles($project_id)
    {
        $documents = Document::all();
        $categories = Categories::all();
        $projectslist = DB::select('select * from projects');
        // echo $project;

        $project = DB::table('categories')
            ->join('projects', 'projects.cate_id', '=', 'categories.cate_id')
            ->join('documents', 'documents.project_id', '=', 'projects.project_id')
            ->where('projects.project_id', '=', $project_id)
            ->get();
        return view('projects.allFiles', compact('project','categories'));
    }

    public function dballFiles($project_id)
    {
        $filedb = DB::table('projects')
            ->join('documents', 'documents.project_id', '=', 'documents.project_id')
            ->join('categories', 'categories.cate_id', '=', 'projects.cate_id')
            ->where('projects.project_id', '=', $project_id)
            ->get();
        return view('projects.allFiles', compact('filedb'));
    }

    public function addfile($project_id)
    {

        // $file = DB::table('projects')
        // ->join('documents', 'documents.project_id', '=', 'documents.project_id')
        // ->join('categories', 'categories.cate_id', '=', 'projects.cate_id')
        // ->where('projects.project_id', '=', $project_id)
        // ->get();
        // return view('addfile', ['file' => $file]);


        $projects = DB::table('projects')->get();
        $categories = DB::table('categories')->get();
        $documents = DB::table('documents')->get();

        return view('addfile', ['projects' => $projects, 'categories' => $categories, 'documents' => $documents]);
    }
    public function fileindoc($project_id)
    {
        $file = DB::table('projects')
            ->join('documents', 'documents.project_id', '=', 'documents.project_id')
            ->join('categories', 'categories.cate_id', '=', 'projects.cate_id')
            ->where('projects.project_id', '=', $project_id)
            ->get();

        $title_th = DB::table('projects');

        return view('projects.doc', ['file' => $file]);
    }
    public function alldoc($project_id)
    {
        $file = DB::table('projects')
            ->join('documents', 'documents.project_id', '=', 'documents.project_id')
            ->join('categories', 'categories.cate_id', '=', 'projects.cate_id')
            ->where('projects.project_id', '=', $project_id)
            ->get();
        $file = Project::find($project_id);
        $title_th = DB::table('projects');

        return view('projects.doc', ['file' => $file]);
    }
    public function doc($project_id)
    {
        $file = DB::table('projects')
            ->join('documents', 'documents.project_id', '=', 'documents.project_id')
            ->join('categories', 'categories.cate_id', '=', 'projects.cate_id')
            ->where('projects.project_id', '=', $project_id)
            ->get();
        $file = Project::find($project_id)->get();
        $title_th = DB::table('projects');

        return view('projects.doc', ['file' => $file]);
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
    public function storeAgain(Request $request)
    {
        $project_id = $request->input('project_id');
        $title_th = Projects::find($project_id);
        $file = $request->file('file');

        if ($request->hasfile('file')) {
            foreach ($request->file('file') as $key => $file) {
                $name = $file->getClientOriginalName();
                $path = $file->store('documents/');
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

        // $name = $request->file('file')->getClientOriginalName();
        // $path = $request->file('file')->store('public/documents/' . $title_th);
        // $file -> move(public_path('files'),$name);
        // $file_type = $request->input('type');
        // $doc_status = 'on';
        // $download_counter = '0';


        // $save = new Document();

        // $save->docname =$name;
        // $save->doc_path = $path;
        // $save->doc_type = $file_type;
        // $save->doc_status = $doc_status;
        // $save->download_counter =  $download_counter;
        // $save->project_id = $project_id;
        // $save->save();

        return redirect('allFiles')->with('status', 'File Has been uploaded successfully in laravel 8');
        // echo $project_id;

    }
    // 

    public function uploadfile(Request $request)
    {
        // $project = DB::table('projects')->where('project_id', $request->$project_id);
        // DB::table('projects')->where('project_id', $project_id);
        // $project = Projects::find($request->project_id);
        $title_th = $request->title_th;
        $file = $request->file('file');


        $file = $request->file('file');

        $name = $request->file('file')->getClientOriginalName();
        $path = $request->file('file')->store('public/document/' . $title_th);
        $file->move(public_path('/document/' . $title_th), $name);
        $type = $request->input('type');
        $download_counter = '0';
        $project_id = $request->input('project_id');

        $save = new Document();

        $save->docname = $name;
        $save->doc_path = $path;
        $save->doc_type = $type;
        $save->download_counter =  $download_counter;
        $save->project_id = $project_id;
        $save->save();

        return redirect('allproject')->with('status', 'File Has been uploaded successfully in laravel 8');
    }


    // 
    public function showDoc($project_id)
    {
        // $categoryartist = CategoryArtist::find($id);
        // $artists = Artist::all();

        // $doc_id = Document::find($doc_id);
        // $documents = Document::all();

        // $project = Projects::find($project_id);
        $documents = Document::all();
        $categories = Categories::all();
        $projectslist = DB::select('select * from projects');
        // echo $project;

        $project = DB::table('categories')
            ->join('projects', 'projects.cate_id', '=', 'categories.cate_id')
            ->join('documents', 'documents.project_id', '=', 'projects.project_id')
            ->where('projects.project_id', '=', $project_id)
            ->get();


        return view('projects.showDoc', compact('project', 'documents', 'projectslist','categories'));
    }

    public function deletedoc($doc_id)
    {
        DB::table('documents')->where('doc_id', $doc_id)->delete();
        return redirect(url()->previous());
    }



    public function Download($doc_id)
    {
        return response()->download('documents/' . $doc_id);
    }
}
