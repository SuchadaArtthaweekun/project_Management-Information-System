<?php

namespace App\Http\Controllers;

use App\Models\Categories;
use App\Models\Document;
use App\Models\Projects;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PHPUnit\Framework\Constraint\IsEmpty;
use SebastianBergmann\CodeCoverage\Report\Xml\Project;

use function Psy\debug;

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
    public function searchindex(Request $request)
    {
        // $data = (object)[];
        $catebar = DB::table('categories')->get();
        $list = DB::table('categories')->get();
        if ($request->input('cate_id') == 'all' && $request->input('adviser') == 'all') {
            if ($request->input('cate') == 'title') {
                $data = DB::table('categories')->join('projects', 'projects.cate_id', '=', 'categories.cate_id')
                    ->join('advisers', 'advisers.adviser_id', '=', 'projects.adviser')
                    ->where('published', '=', 1)
                    ->where('title_th', 'like', '%' . $request->input('word') . '%')
                    ->simplePaginate(2);
            } else if ($request->input('cate') == 'author') {
                $data = DB::table('categories')->join('projects', 'projects.cate_id', '=', 'categories.cate_id')
                    ->join('advisers', 'advisers.adviser_id', '=', 'projects.adviser')
                    ->where('published', '=', 1)
                    ->where('author', 'like', '%' . $request->input('word') . '%')
                    ->simplePaginate(2);
            } else if ($request->input('cate') == 'edition') {
                $data = DB::table('categories')->join('projects', 'projects.cate_id', '=', 'categories.cate_id')
                    ->join('advisers', 'advisers.adviser_id', '=', 'projects.adviser')
                    ->where('published', '=', 1)
                    ->where('edition', 'like', '%' . $request->input('word') . '%')
                    ->simplePaginate(2);
            }
        } else if ($request->input('cate_id') != "all" && $request->input('adviser') != 'all') {
            if ($request->input('cate') == 'title') {
                $data = DB::table('categories')->join('projects', 'projects.cate_id', '=', 'categories.cate_id')
                    ->join('advisers', 'advisers.adviser_id', '=', 'projects.adviser')
                    ->where('published', '=', 1)
                    ->where('projects.cate_id', 'like', '%' . $request->input('cate_id') . '%')
                    ->where('adviser', 'like', '%' . $request->input('adviser') . '%')
                    ->where('title_th', 'like', '%' . $request->input('word') . '%')
                    ->simplePaginate(2);
            } else if ($request->input('cate') == 'author') {
                $data = DB::table('categories')->join('projects', 'projects.cate_id', '=', 'categories.cate_id')
                    ->join('advisers', 'advisers.adviser_id', '=', 'projects.adviser')
                    ->where('published', '=', 1)
                    ->where('projects.cate_id', 'like', '%' . $request->input('cate_id') . '%')
                    ->where('adviser', 'like', '%' . $request->input('adviser') . '%')
                    ->where('author', 'like', '%' . $request->input('word') . '%')
                    ->simplePaginate(2);
            } else if ($request->input('cate') == 'edition') {
                $data = DB::table('categories')->join('projects', 'projects.cate_id', '=', 'categories.cate_id')
                    ->join('advisers', 'advisers.adviser_id', '=', 'projects.adviser')
                    ->where('published', '=', 1)
                    ->where('edition', 'like', '%' . $request->input('word') . '%')
                    ->simplePaginate(2);
            }
        } else if ($request->input('cate_id') == "all" && $request->input('adviser') != 'all') {
            if ($request->input('cate') == 'title') {
                $data = DB::table('categories')->join('projects', 'projects.cate_id', '=', 'categories.cate_id')
                    ->join('advisers', 'advisers.adviser_id', '=', 'projects.adviser')
                    ->where('published', '=', 1)
                    ->where('adviser', 'like', '%' . $request->input('adviser') . '%')
                    ->where('title_th', 'like', '%' . $request->input('word') . '%')
                    ->simplePaginate(2);
            } else if ($request->input('cate') == 'author') {
                $data = DB::table('categories')->join('projects', 'projects.cate_id', '=', 'categories.cate_id')
                    ->join('advisers', 'advisers.adviser_id', '=', 'projects.adviser')
                    ->where('published', '=', 1)
                    ->where('adviser', 'like', '%' . $request->input('adviser') . '%')
                    ->where('author', 'like', '%' . $request->input('word') . '%')
                    ->simplePaginate(2);
            } else if ($request->input('cate') == 'edition') {
                $data = DB::table('categories')->join('projects', 'projects.cate_id', '=', 'categories.cate_id')
                    ->join('advisers', 'advisers.adviser_id', '=', 'projects.adviser')
                    ->where('published', '=', 1)
                    ->where('edition', 'like', '%' . $request->input('word') . '%')
                    ->simplePaginate(2);
            }
        } else if ($request->input('cate_id') != "all" && $request->input('adviser') == 'all') {
            if ($request->input('cate') == 'title') {
                $data = DB::table('categories')->join('projects', 'projects.cate_id', '=', 'categories.cate_id')
                    ->join('advisers', 'advisers.adviser_id', '=', 'projects.adviser')
                    ->where('published', '=', 1)
                    ->where('projects.cate_id', 'like', '%' . $request->input('cate_id') . '%')
                    ->where('title_th', 'like', '%' . $request->input('word') . '%')
                    ->simplePaginate(2);
            } else if ($request->input('cate') == 'author') {
                $data = DB::table('categories')->join('projects', 'projects.cate_id', '=', 'categories.cate_id')
                    ->join('advisers', 'advisers.adviser_id', '=', 'projects.adviser')
                    ->where('published', '=', 1)
                    ->where('projects.cate_id', 'like', '%' . $request->input('cate_id') . '%')
                    ->where('author', 'like', '%' . $request->input('word') . '%')
                    ->simplePaginate(2);
            } else if ($request->input('cate') == 'edition') {
                $data = DB::table('categories')->join('projects', 'projects.cate_id', '=', 'categories.cate_id')
                    ->join('advisers', 'advisers.adviser_id', '=', 'projects.adviser')
                    ->where('published', '=', 1)
                    ->where('edition', 'like', '%' . $request->input('word') . '%')
                    ->simplePaginate(2);
            }
        } else {
            $data = DB::table('categories')->join('projects', 'projects.cate_id', '=', 'categories.cate_id')
                ->join('advisers', 'advisers.adviser_id', '=', 'projects.adviser')
                ->where('published', '=', 1)
                ->simplePaginate(2);
        }
        // dd($data);
        // echo $data;
        return view('searchpage.result-search-home', compact('data', 'list', 'catebar'));
    }

    public function searchhome(Request $request)
    {
        $catebar = DB::table('categories')->get();
        $list = DB::table('categories')->get();
        if ($request->input('cate_id') != "all" && $request->input('adviser') != 'all') {
            $data = DB::table('categories')->join('projects', 'projects.cate_id', '=', 'categories.cate_id')
                ->join('advisers', 'advisers.adviser_id', '=', 'projects.adviser')
                ->where('published', '=', 1)
                ->where('projects.cate_id', 'like', '%' . $request->input('cate_id') . '%')
                ->where('adviser', 'like', '%' . $request->input('adviser') . '%')
                ->where('title_th', 'like', '%' . $request->input('title_th') . '%')
                ->where('edition', 'like', '%' . $request->input('edition') . '%')
                ->where('author', 'like', '%' . $request->input('author') . '%')
                ->simplePaginate(2);

            //  echo $request->input('cate_id');
            // echo $request->input('cate_id') , $request->input('adviser');
        } else if ($request->input('cate_id') == 'all' && $request->input('adviser') == 'all') {
            $data = DB::table('categories')->join('projects', 'projects.cate_id', '=', 'categories.cate_id')
                ->join('advisers', 'advisers.adviser_id', '=', 'projects.adviser')
                ->where('published', '=', 1)
                ->where('title_th', 'like', '%' . $request->input('title_th') . '%')
                ->where('edition', 'like', '%' . $request->input('edition') . '%')
                ->where('author', 'like', '%' . $request->input('author') . '%')
                ->simplePaginate(2);
        } else if ($request->input('cate_id') != 'all' && $request->input('adviser') == 'all') {
            $data = DB::table('categories')->join('projects', 'projects.cate_id', '=', 'categories.cate_id')
                ->join('advisers', 'advisers.adviser_id', '=', 'projects.adviser')
                ->where('published', '=', 1)
                ->where('projects.cate_id', 'like', '%' . $request->input('cate_id') . '%')
                ->where('title_th', 'like', '%' . $request->input('title_th') . '%')
                ->where('edition', 'like', '%' . $request->input('edition') . '%')
                ->where('author', 'like', '%' . $request->input('author') . '%')
                ->simplePaginate(2);
        } else if ($request->input('cate_id') == 'all' && $request->input('adviser') != 'all') {
            $data = DB::table('categories')->join('projects', 'projects.cate_id', '=', 'categories.cate_id')
                ->join('advisers', 'advisers.adviser_id', '=', 'projects.adviser')
                ->where('published', '=', 1)
                ->where('adviser', 'like', '%' . $request->input('adviser') . '%')
                ->where('title_th', 'like', '%' . $request->input('title_th') . '%')
                ->where('edition', 'like', '%' . $request->input('edition') . '%')
                ->where('author', 'like', '%' . $request->input('author') . '%')
                ->simplePaginate(2);
        } else {
            $data = DB::table('categories')->join('projects', 'projects.cate_id', '=', 'categories.cate_id')
                ->where('published', '=', 1)
                ->orderByDesc('updated_at')
                ->simplePaginate(2);
        }
        return view('searchpage.result-search-home', compact('data', 'list', 'catebar'));
    }

    public function showDoc($project_id, Projects $projects)
    {
        // $documents = Document::find($project_id);
        // $documents = DB::table('documents')->where('documents.project_id', '=' , $project_id);
        $adviser = DB::table('advisers')->get();
        $data = DB::table('categories')->get();
        $catebar = DB::table('categories')->get();
        $project = DB::table('categories')
            ->join('projects', 'projects.cate_id', '=', 'categories.cate_id')
            ->join('advisers', 'advisers.adviser_id', '=', 'projects.adviser')
            ->join('documents', 'documents.project_id', '=', 'projects.project_id')
            ->where('documents.project_id', '=', $project_id)
            ->where('projects.project_id', '=', $project_id)
            ->get();
        $documents = DB::table('documents')->where('documents.project_id', '=', $project_id)->get();
        $countDownload = DB::table('documents')
            ->select('download_counter')
            // ->where('documents.doc_id', '=', $doc_id)
            ->get();
        Projects::find($project_id)->increment('view_counter');
        return view('projects.doc', compact('project', 'data', 'adviser', 'catebar', 'countDownload', 'documents'));
    }

    public function allFiles()
    {
        $files = Document::all();
        $categories = Categories::all();
        $projects = DB::table('categories')
            ->join('projects', 'projects.cate_id', '=', 'categories.cate_id')
            ->join('advisers', 'advisers.adviser_id', '=', 'projects.adviser');
        return view('projects.doc', compact('files', 'projects', 'categories'));
    }

    public function showProject()
    {
        $catebar = DB::table('categories')->get();
        $categories = DB::table('categories')->get();
        $project = DB::table('projects')
            ->join('categories', 'categories.cate_id', '=', 'projects.cate_id')
            ->join('documents', 'documents.project_id', '=', 'projects.project_id')
            ->get();
        return view('searchpage.result-search-home', compact('project', 'categories', 'caatebar'));
    }
    // sidebar 
    public function newProject()
    {
        $adviser = DB::table('advisers')->get();
        $catebar = DB::table('categories')->get();
        $data =  DB::table('categories')->join('projects', 'projects.cate_id', '=', 'categories.cate_id')
            ->join('advisers', 'advisers.adviser_id', '=', 'projects.adviser')
            ->orderByDesc('projects.edition')
            ->simplePaginate(2);
        return view('searchpage.result-search-home', compact('data', 'catebar', 'adviser'));
    }
    public function oldProject()
    {
        $catebar = DB::table('categories')->get();
        $data =  DB::table('categories')->join('projects', 'projects.cate_id', '=', 'categories.cate_id')
            ->join('advisers', 'advisers.adviser_id', '=', 'projects.adviser')
            ->orderBy('projects.edition')
            ->simplePaginate(2);
        return view('searchpage.result-search-home', compact('data', 'catebar'));
    }
    public function cate1Project()
    {
        // หมวดหมู่เว็บไซต์
        $catebar = DB::table('categories')->get();
        $data =  DB::table('categories')->join('projects', 'projects.cate_id', '=', 'categories.cate_id')
            ->join('advisers', 'advisers.adviser_id', '=', 'projects.adviser')
            ->where('projects.cate_id', '=', 1)
            ->simplePaginate(2);
        return view('searchpage.result-search-home', compact('data', 'batebar'));
    }
    public function cate2Project()
    {
        $catebar = DB::table('categories')->get();
        // หมวดหมู่ IoT
        $data =  DB::table('categories')->join('projects', 'projects.cate_id', '=', 'categories.cate_id')
            ->join('advisers', 'advisers.adviser_id', '=', 'projects.adviser')
            ->where('projects.cate_id', '=', 2)
            ->simplePaginate(2);
        return view('searchpage.result-search-home', compact('data', 'catebar'));
    }
    public function cate4Project()
    {
        $catebar = DB::table('categories')->get();
        // หมวดหมู่ เกม 2 มิติ
        $data =  DB::table('categories')->join('projects', 'projects.cate_id', '=', 'categories.cate_id')
            ->where('projects.cate_id', '=', 4)
            ->simplePaginate(2);
        return view('searchpage.result-search-home', compact('data', 'catebar'));
    }


    public function searchcate($cate_id)
    {
        // $categories = Categories::find($cate_id)->get();
        $adviser = DB::table('advisers')->get();
        $catebar = DB::table('categories')->get();
        $categories = DB::table('categories')->where('categories.cate_id', '=', $cate_id)->get();
        if ($data = DB::table('projects')
            ->join('categories', 'categories.cate_id', '=', 'projects.cate_id')
            ->join('documents', 'documents.project_id', '=', 'projects.project_id')
            ->join('advisers', 'advisers.adviser_id', '=', 'projects.project_id')
            ->where('projects.cate_id', '=', $cate_id)
        ) {
            if ($data == Null) {
                return redirect()->route('searchcate')->with('info', 'data is empty');
            } else {
                $data = DB::table('projects')
                    ->join('categories', 'categories.cate_id', '=', 'projects.cate_id')
                    ->join('documents', 'documents.project_id', '=', 'projects.project_id')
                    ->join('advisers', 'advisers.adviser_id', '=', 'projects.project_id')
                    ->where('projects.cate_id', '=', $cate_id)
                    ->simplePaginate(2);
            }
        }




        return view('categories.searchcate', compact('categories', 'catebar', 'data', 'adviser'));
    }

    // test
    public function searchtest(Request $request)
    {
        $catebar = DB::table('categories')->get();
        $list = DB::table('categories')->get();
        $cate_id = $request->input('cate_id');
        $adviser = $request->input('adviser');
        $cate = $request->input('cate');
        $word = $request->input('word');
        $title = $request->input('title');
        $author = $request->input('author');
        $edition = $request->input('edition');
        if ($cate == $title) {
            $data = DB::table('categories')->join('projects', 'projects.cate_id', '=', 'categories.cate_id')
                ->join('advisers', 'advisers.adviser_id', '=', 'projects.adviser')
                ->where('published', '=', 1)
                ->where('title_th', 'like', '%' . $word . '%')
                ->simplePaginate(2);
        }

        return view('searchpage.result-search-home', compact('data', 'list', 'catebar'));
    }
}
