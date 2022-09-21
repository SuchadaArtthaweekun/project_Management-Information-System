<?php

namespace App\Http\Controllers;

use App\Models\Projects;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SearchController extends Controller
{
    //     public function search_index(Request $request)
    //     {

    //         $projects = Projects::all()->where('published',1);
    //         if (!empty($request->search)) {
    //             $items = Projects::orderBy('created_at', 'desc')
    //                 ->where('name', 'like', '%' . $request->search . '%')
    //                 ->orWhere('detail', 'like', '%' . $request->search . '%')
    //                 ->orWhere('published', 1)
    //                 ->paginate(8);
    //             $items->withPath('?search=' . $request->search);
    //         }  else {
    //             $items = Projects::orderBy('created_at', 'desc')->where('published', 1)->paginate(8);
    //         }

    //         // get recently views

    //         return view('searchpage.search-dash', compact('items','projects'));
    //     }

    public function showProjects()
    {

        $project = DB::table('projects')
            ->join('documents', 'documents.project_id', '=', 'projects.project_id')
            ->get();
        return view('searchpage.search-home', compact('project'));
    }

    public function showsec()
    {

        $projects = DB::table('projects')->get();
        $documents = DB::table('documents')->get();
        return view('searchpage.search-dash', compact('projects', 'documents'));
    }

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
        return view('searchpage.search-dash', compact('projects', 'documents', 'categories', 'advisers', 'adviser'));
    }
    public function result_dashsearch(Request $request)
    {

        $projects = Projects::all()->where('published', 1);

        if ($request != null) {

            $lists = Projects::all()
                ->where('title_th', 'like', "%{$request->input('title_th')}%");
            // ->orWhere('edition', 'like', '%' . $request->edition . '%')
            // ->orWhere('cate_id', 'like', '%' . $request->search . '%')
            // ->orWhere('published', 1)
            // ->paginate(20);
            // $items->withPath('?search=' . $request); 
            // echo $lists;
        } else {
            $lists = Projects::orderBy('created_at', 'desc')->where('published', 1)->paginate(20);
        }


        return view('searchpage.result-search', compact('projects', 'lists'));
    }



    public function searchProject(Request $request)
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
        } 
        // else if ($request->input('title_th') != null) {
        //     $data = DB::table('projects')
        //         ->where('title_th', 'like', '%' . $request->input('title_th') . '%')
        //         ->get();
        // } else if ($request->input('edition')  != null) {
        //     $data = DB::table('projects')
        //         ->where('edition', 'like', '%' . $request->input('edition') . '%')
        //         ->get();
        // } else if ($request->input('author')  != null) {
        //     $data = DB::table('projects')
        //         ->where('author', 'like', '%' . $request->input('author') . '%')
        //         ->get();
        // }



        // if ($request->input('cate_id') == 'all' && $request->input('adviser') == 'all') {
        //     $data = DB::table('projects')
        //         ->where('published', '=', 1)
        //         ->where('edition', 'like', '%' . $request->input('edition') . '%')
        //         ->where('title_th', 'like', '%' . $request->input('title_th') . '%')
        //         ->Where('author', 'like', '%' . $request->input('author') . '%')
        //         ->Where('co_author', 'like', '%' . $request->input('author') . '%')
        //         ->get();
        //     //  echo $request->input('cate_id');
        // } else if ($request->input('title_th') == null){
        //     $data = DB::table('projects')
        //     ->where('published', '=', 1)
        //     ->where('edition', 'like', '%' . $request->input('edition') . '%')
        //     ->Where('author', 'like', '%' . $request->input('author') . '%')
        //     ->Where('co_author', 'like', '%' . $request->input('author') . '%')
        //     ->get();
        // }
        // else if ($request->input('edition') == null){
        //     $data = DB::table('projects')
        //     ->where('published', '=', 1)
        //     ->where('title_th', 'like', '%' . $request->input('title_th') . '%')
        //     ->Where('author', 'like', '%' . $request->input('author') . '%')
        //     ->Where('co_author', 'like', '%' . $request->input('author') . '%')
        //     ->get();
        // }

        // if ( $request->input('adviser') == 'all') {
        //     $data = DB::table('projects')
        //         ->where('published', '=', 1)
        //         ->where('cate_id', 'like', '%' . $request->input('cate_id') . '%')
        //         ->where('title_th', 'like', '%' . $request->input('title_th') . '%')
        //         ->where('edition', 'like', '%' . $request->input('edition') . '%')
        //         ->Where('author', 'like', '%' . $request->input('author') . '%')
        //         ->Where('co_author', 'like', '%' . $request->input('author') . '%')
        //         ->get();
        //     //  echo $request->input('cate_id');
        // }

        // if ($request->input('cate_id') == 'all' && $request->input('adviser') != 'all') {
        //     $data = DB::table('projects')
        //         ->where('published', '=', 1)
        //         ->where('title_th', 'like', '%' . $request->input('title_th') . '%')
        //         ->where('edition', 'like', '%' . $request->input('edition') . '%')
        //         ->where('adviser', 'like', '%' . $request->input('adviser') . '%')
        //         ->Where('author', 'like', '%' . $request->input('author') . '%')
        //         ->Where('co_author', 'like', '%' . $request->input('author') . '%')
        //         ->get();
        //     //  echo $request->input('cate_id');
        // }

        return view('searchpage.result-search', compact('data'));
    }

    public function search(Request $request)
    {
        $data = DB::table('projects')
            ->where('published', '=', 1)
            ->where('title_th', 'like', '%' . $request->input('title_th') . '%')
            ->Where('edition', 'like', '%' . $request->input('edition') . '%')
            ->Where('cate_id', 'like', '%' . $request->input('cate_id') . '%')
            ->Where('author', 'like', '%' . $request->input('author') . '%')
            ->Where('co_author', 'like', '%' . $request->input('author') . '%')
            ->Where('adviser', 'like', '%' . $request->input('adviser') . '%')
            ->Where('co_adviser', 'like', '%' . $request->input('adviser') . '%')
            ->get();




        // 




        if ($request->input('cate_id') != null && $request->input('edition') != null && $request->input('cate_id') != 'all') {
            $data = DB::table('projects')
                ->where('published', '=', 1)
                ->where('title_th', 'like', '%' . $request->input('title_th') . '%')
                ->where('edition', 'like', '%' . $request->input('edition') . '%')
                ->Where('author', 'like', '%' . $request->input('author') . '%')
                ->Where('co_author', 'like', '%' . $request->input('author') . '%')
                ->get();;
            //  echo $request->input('cate_id');
        } else if ($request->input('title_th') != null) {
            $data = DB::table('projects')
                ->where('published', '=', 1)
                ->where('title_th', 'like', '%' . $request->input('title_th') . '%')
                ->get();
        } else if ($request->input('edition') != null) {
            $data = DB::table('projects')
                ->where('published', '=', 1)
                ->where('edition', 'like', '%' . $request->input('edition') . '%')
                ->get();
        } else if ($request->input('cate_id') != null) {
            $data = DB::table('projects')
                ->where('published', '=', 1)
                ->where('cate_id', 'like', '%' . $request->input('cate_id') . '%')
                ->get();
        } else if ($request->input('cate_id') == 'all') {
            $data = DB::table('projects')->all()
                ->where('published', '=', 1)
                ->get();
            // echo $request->input('cate_id');

        } else if ($request->input('adviser') && $request->input('adviser') != 'all') {
            $data = DB::table('projects')
                ->where('published', '=', 1)
                ->where('adviser', 'like', '%' . $request->input('adviser') . '%')
                ->orWhere('co_adviser', 'like', '%' . $request->input('adviser') . '%')
                ->get();
            // echo $request->input('cate_id');

        } else if ($request->input('author')) {
            $data = DB::table('projects')
                ->where('published', '=', 1)
                ->where('author', 'like', '%' . $request->input('author') . '%')
                ->orWhere('co_author', 'like', '%' . $request->input('author') . '%')
                ->get();
            // echo $request->input('cate_id');

        }



        return view('searchpage.result-search', compact('data'));
    }

    public function konha(Request $request)
    {
        $data = [];
        $title_th = $request->title_th;
        $edition = $request->edition;
        $cate_id = $request->cate_id;


        if ($title_th && $edition && $cate_id != 'all') {
            $data = Projects::where([
                ['title_th', 'LIKE', "%{$title_th}%"],
                ['edition', 'LIKE', "%{$edition}%"],
                ['cate_id', '=', $cate_id],
            ])->get();
            return view('searchpage.result-search', compact('data'));
        }

        if ($title_th) {
            $data = Projects::where([
                ['title_th', 'LIKE', "%{$title_th}%"],
            ])->get();
            return view('searchpage.result-search', compact('data'));
        }

        if ($edition) {
            $data = Projects::where([
                ['edition', 'LIKE', "%{$edition}%"],
            ])->get();
            return view('searchpage.result-search', compact('data'));

            if ($cate_id != 'all') {
                $data = Projects::where([
                    ['cate_id', '=', $cate_id],
                ])->get();
                return view('searchpage.result-search', compact('data'));
            }
            if ($cate_id = 'all' && $edition = null && $title_th = null) {
                $data = DB::table('projects')
                    ->select('*')
                    ->get();
                return view('searchpage.result-search', compact('data'));
            }

            return $data;
        }
    }
    public function konhasearch(Request $request)
    {
        $data = [];
        $title_th = $request->title_th;
        $edition = $request->edition;
        $cate_id = $request->cate_id;

        if ($title_th) {
            $data[] = ['title_th', 'LIKE', "%{$title_th}%"];
        }

        if ($edition) {
            $data[] = ['edition', 'LIKE', "%{$edition}%"];
        }

        if ($cate_id) {
            $data[] = ['cate_id', '=', $cate_id];
        }

        $eq = Projects::where($data)->get();

        return view('searchpage.result-search', compact('eq'));
    }

    public function searchNew(Request $request){
        // เงื่อนไข 4 ตำแหน่ง
        if ($request->input('cate_id') != 'all'  && $request->input('adviser') != 'all' 
        && $request->input('title_th') != null && $request->input('edition') != null) {
            $data = DB::table('projects')
                ->where('published', '=', 1)
                ->where('title_th', 'like', '%' . $request->input('title_th') . '%')
                ->where('edition', 'like', '%' . $request->input('edition') . '%')
                ->Where('author', 'like', '%' . $request->input('author') . '%')
                ->Where('co_author', 'like', '%' . $request->input('author') . '%')
                ->get();;
            //  echo $request->input('cate_id');
        } 

        return view('searchpage.result-search', compact('data'));
    }
}
