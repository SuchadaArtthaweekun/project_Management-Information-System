<?php

namespace App\Http\Controllers;

use App\Models\Document;
use App\Models\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use SebastianBergmann\CodeCoverage\Report\Xml\Project;

class DocController extends Controller
{
    //

    public function allfile() {
        $projects = DB::table('projects')->get();
        $categories = DB::table('categories')->get();
        $documents = DB::table('documents')->get();
        return view('projects.projects', ['projects' => $projects,'categories' => $categories,'documents' => $documents]);
    }

    public function allfiles($project_id) {
        DB::table('document')->where('project_id', $project_id)->show_source();

        // return view('projects.allproject', ['projects' => $projects,'categories' => $categories,'documents' => $documents]);
    }

    public function addfile(){
            $projects = DB::table('projects')->get();
            $categories = DB::table('categories')->get();
            $documents = DB::table('documents')->get();
        return view('addfile', ['projects' => $projects,'categories' => $categories,'documents' => $documents]);
    }


    public function store(Request $request)
    {
        $file = $request-> file('file');
        
        $name = $request->file('file')->getClientOriginalName();
        $path = $request->file('file')->store('public/files');
        $file -> move(public_path('files'),$name);
        $file_type = $request->input('file_type');

        $save = new File();

        $save->file_name =$name;
        $save->file_path = $path;
        $save->file_type = $file_type;
        $save->save();

        return redirect('allproject')->with('status', 'File Has been uploaded successfully in laravel 8');
 
    }

    public function uploadfile(Request $request)
    {

       

        $file = $request-> file('file');
        
        $name = $request->file('file')->getClientOriginalName();
        $path = $request->file('file')->store('public/files');
        $file -> move(public_path('files'),$name);
        $type = $request->input('type');
        $doc_status = 'on';
        $download_counter = '0';
        $project_id =$request->input('project_id');

        $save = new Document();

        $save->docname =$name;
        $save->doc_path = $path;
        $save->doc_type = $type;
        $save->doc_status = $doc_status;
        $save->download_counter =  $download_counter;
        $save->project_id = $project_id;
        $save->save();

        return redirect('allproject')->with('status', 'File Has been uploaded successfully in laravel 8');
 
    }
   
   
}
