<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Document;

class PutFileController extends Controller
{
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
}
