<?php

namespace App\Http\Controllers;

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
    public function search(Request $request)
    {
        $data = [];
        $type = $request->type;
        $name = $request->name;


        // if ($type = 'all') {
        //     $data = DB::table('projects')
        //         ->select('*')
        //         ->get();
        //     return view('searchpage.result-search-home', compact('data'));
        // }

        if ($type = 'author') {
            $data = Projects::where([
                ['author', 'LIKE', "%{$name}%"]
            ])
                ->where([['co_author', 'LIKE', "%{$name}%"]])
                ->get();
            return view('searchpage.result-search-home', compact('data'));
        }
        if ($type = 'title_th') {
            $data = Projects::where([
                ['title_th', 'LIKE', "%{$name}%"]
            ])
                ->get();
            return view('searchpage.result-search-home', compact('data'));
        }
        if ($type = 'edition') {
            $data = Projects::where([
                ['edition', 'LIKE', "%{$name}%"]
            ])
                ->get();
            return view('searchpage.result-search-home', compact('data'));
        }
        if ($type = 'cate_id') {
            $data = Projects::where([
                ['cate_id', 'LIKE', "%{$name}%"]
            ])
                ->get();
            return view('searchpage.result-search-home', compact('data'));
        }
    }
}
