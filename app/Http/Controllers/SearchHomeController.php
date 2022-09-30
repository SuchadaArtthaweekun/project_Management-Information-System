<?php

namespace App\Http\Controllers;

use App\Models\Categories;
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
        $list = DB::table('categories')->get();
        if ($request->input('cate_id') != "all" && $request->input('adviser') != 'all') {
            $data = DB::table('categories')->join('projects', 'projects.cate_id', '=', 'categories.cate_id')
                ->where('published', '=', 1)
                ->where('projects.cate_id', 'like', '%' . $request->input('cate_id') . '%')
                ->where('adviser', 'like', '%' . $request->input('adviser') . '%')
                ->where('title_th', 'like', '%' . $request->input('title_th') . '%')
                ->where('edition', 'like', '%' . $request->input('edition') . '%')
                ->where('author', 'like', '%' . $request->input('author') . '%')
                ->simplePaginate(5);

            //  echo $request->input('cate_id');
            // echo $request->input('cate_id') , $request->input('adviser');
        } else if ($request->input('cate_id') == 'all' && $request->input('adviser') == 'all') {
            $data = DB::table('categories')->join('projects', 'projects.cate_id', '=', 'categories.cate_id')
                ->join('advisers', 'advisers.adviser_id', '=', 'projects.adviser')
                ->where('published', '=', 1)
                ->where('title_th', 'like', '%' . $request->input('title_th') . '%')
                ->where('edition', 'like', '%' . $request->input('edition') . '%')
                ->where('author', 'like', '%' . $request->input('author') . '%')
                ->simplePaginate(5);
        } else if ($request->input('cate_id') != 'all' && $request->input('adviser') == 'all') {
            $data = DB::table('categories')->join('projects', 'projects.cate_id', '=', 'categories.cate_id')
                ->where('published', '=', 1)
                ->where('cate_id', 'like', '%' . $request->input('cate_id') . '%')
                ->where('title_th', 'like', '%' . $request->input('title_th') . '%')
                ->where('edition', 'like', '%' . $request->input('edition') . '%')
                ->where('author', 'like', '%' . $request->input('author') . '%')
                ->simplePaginate(5);
        } else if ($request->input('cate_id') == 'all' && $request->input('adviser') != 'all') {
            $data = DB::table('categories')->join('projects', 'projects.cate_id', '=', 'categories.cate_id')
                ->where('published', '=', 1)
                ->where('adviser', 'like', '%' . $request->input('adviser') . '%')
                ->where('title_th', 'like', '%' . $request->input('title_th') . '%')
                ->where('edition', 'like', '%' . $request->input('edition') . '%')
                ->where('author', 'like', '%' . $request->input('author') . '%')
                ->simplePaginate(5);
        } else {
            $data = DB::table('categories')->join('projects', 'projects.cate_id', '=', 'categories.cate_id')
                ->where('published', '=', 1)
                ->orderByDesc('updated_at')
                ->simplePaginate(5);
        }

        return view('searchpage.result-search-home', compact('data', 'list'));
    }

    public function showDoc($project_id)
    {
        // $documents = Document::find($project_id);
        // $documents = DB::table('documents')->where('documents.project_id', '=' , $project_id);
        $project = DB::table('projects')
            ->join('documents', 'documents.project_id', '=', 'projects.project_id')
            ->where('documents.project_id', '=', $project_id)
            ->get();


        return view('projects.doc', compact('project'));
    }
    public function showDocument($project_id)
    {
        
        $documents = Document::find($project_id);
        $projectslist = DB::select('select * from projects');
        $project = DB::table('projects')
            ->join('documents', 'documents.project_id', '=', 'projects.project_id')
            ->where('projects.project_id', '=', $project_id)
            ->get();


        return view('projects.doc', compact('project', 'documents', 'projectslist'));
    }
    public function allFiles()
    {
        $files = Document::all();
        $projects = Projects::all();
        return view('projects.doc', compact('files', 'projects'));
    }

    public function showProject()
    {
        $categories = DB::table('categories')->get();
        $project = DB::table('projects')
            ->join('categories', 'categories.cate_id', '=', 'projects.cate_id')
            ->join('documents', 'documents.project_id', '=', 'projects.project_id')
            ->get();
        return view('searchpage.result-search-home', compact('project', 'categories'));
    }
// sidebar 
    public function newProject()
    {
        $data =  DB::table('categories')->join('projects', 'projects.cate_id', '=', 'categories.cate_id')
        ->orderByDesc('projects.updated_at')
        ->simplePaginate(5);
        return view('searchpage.result-search-home',compact('data'));
    }
    public function oldProject()
    {
        $data =  DB::table('categories')->join('projects', 'projects.cate_id', '=', 'categories.cate_id')
        ->orderBy('projects.updated_at')
        ->simplePaginate(5);
        return view('searchpage.result-search-home',compact('data'));
    }
    public function cate1Project()
    {
        // หมวดหมู่เว็บไซต์
        $data =  DB::table('categories')->join('projects', 'projects.cate_id', '=', 'categories.cate_id')
        ->where('projects.cate_id', '=', 1)
        ->simplePaginate(5);
        return view('searchpage.result-search-home',compact('data'));
    }
    public function cate2Project()
    {
        // หมวดหมู่ IoT
        $data =  DB::table('categories')->join('projects', 'projects.cate_id', '=', 'categories.cate_id')
        ->where('projects.cate_id', '=', 2)
        ->simplePaginate(5);
        return view('searchpage.result-search-home',compact('data'));
    }
    public function cate4Project()
    {
        // หมวดหมู่ เกม 2 มิติ
        $data =  DB::table('categories')->join('projects', 'projects.cate_id', '=', 'categories.cate_id')
        ->where('projects.cate_id', '=', 4)
        ->simplePaginate(5);
        return view('searchpage.result-search-home',compact('data'));
    }


    public function searchcate($cate_id){
        // $categories = Categories::find($cate_id)->get();
        $categories = DB::table('categories')->where('categories.cate_id', '=', $cate_id)->get();
        return view('categories.searchcate',compact('categories'));
    }
}
