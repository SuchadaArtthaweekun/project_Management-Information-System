<?php

namespace App\Http\Controllers;

use App\Models\Document;
use App\Models\Projects;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use SebastianBergmann\CodeCoverage\Report\Xml\Project;

class SearchHomeController extends Controller
{
    public function dashsearch()
    {

        $projects = DB::table('projects')
            ->join('advisers', 'advisers.adviser_id', '=', 'projects.adviser')
            ->get();
        $documents = DB::table('documents')->get();
        $categories = DB::table('categories')->get();
        $advisers = DB::table('advisers')->get();
        $adviser = DB::table('projects')
            ->select('adviser')
            ->get();
        return view('searchpage.result-search-home', compact('projects', 'documents', 'categories', 'advisers', 'adviser'));
    }
    public function searchhome(Request $request)
    {
        if ($request->input('cate_id') != "all" && $request->input('adviser') != 'all') {
            $data = DB::table('projects')
            
                ->where('published', '=', 1)
                ->where('cate_id', 'like', '%' . $request->input('cate_id') . '%')
                ->where('adviser', 'like', '%' . $request->input('adviser') . '%')
                ->where('title_th', 'like', '%' . $request->input('title_th') . '%')
                ->where('edition', 'like', '%' . $request->input('edition') . '%')
                ->where('author', 'like', '%' . $request->input('author') . '%')
                
                ->get();

            //  echo $request->input('cate_id');
            // echo $request->input('cate_id') , $request->input('adviser');
        } else if ($request->input('cate_id') == 'all' && $request->input('adviser') == 'all') {
            $data = DB::table('projects')
                ->where('published', '=', 1)
                ->where('title_th', 'like', '%' . $request->input('title_th') . '%')
                ->where('edition', 'like', '%' . $request->input('edition') . '%')
                ->where('author', 'like', '%' . $request->input('author') . '%')
                ->get();
        } else if ($request->input('cate_id') != 'all' && $request->input('adviser') == 'all') {
            $data = DB::table('projects')
                ->where('published', '=', 1)
                ->where('cate_id', 'like', '%' . $request->input('cate_id') . '%')
                ->where('title_th', 'like', '%' . $request->input('title_th') . '%')
                ->where('edition', 'like', '%' . $request->input('edition') . '%')
                ->where('author', 'like', '%' . $request->input('author') . '%')
                ->get();
        } else if ($request->input('cate_id') == 'all' && $request->input('adviser') != 'all') {
            $data = DB::table('projects')
                ->where('published', '=', 1)
                ->where('adviser', 'like', '%' . $request->input('adviser') . '%')
                ->where('title_th', 'like', '%' . $request->input('title_th') . '%')
                ->where('edition', 'like', '%' . $request->input('edition') . '%')
                ->where('author', 'like', '%' . $request->input('author') . '%')
                ->get();
        }else {
            return view('home','not found');
        }

        return view('searchpage.result-search-home', compact('data'));
    }

    public function showDoc($project_id)
    {
        // $categoryartist = CategoryArtist::find($id);
        // $artists = Artist::all();

        // $doc_id = Document::find($doc_id);
        // $documents = Document::all();

        // $project = Projects::find($project_id);
        $documents = Document::all();
        $projectslist = DB::select('select * from projects');
        // echo $project;

        $project = DB::table('projects')
            ->join('documents', 'documents.project_id', '=', 'projects.project_id')
            ->where('projects.project_id', '=', $project_id)
            ->get();


        return view('projects.doc', compact('project','documents','projectslist'));
    }
    public function allFiles()
    {
        $files = Document::all();
        $projects = Projects::all();
        return view('projects.doc', compact('files', 'projects'));
    }

}
