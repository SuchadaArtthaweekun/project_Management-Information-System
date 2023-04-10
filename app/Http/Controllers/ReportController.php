<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use Barryvdh\DomPDF\PDF;

class ReportController extends Controller
{
    public function index()
    {

        return view('report.allreport');
    }

    public function userReport()
    {
        $users = DB::table('users')->get();

        $userAdmin = DB::table('users')->where('level', '=', 'ผู้ดูแลระบบ')->where('status', '=', 1)->get();


        $coutAllUser = DB::table('users')->where('status', '=', 1)->count();
        $coutAdmin = DB::table('users')->where('level', '=', 'ผู้ดูแลระบบ')->where('status', '=', 1)->count();
        $coutTch = DB::table('users')->where('level', '=', 'อาจารย์')->where('status', '=', 1)->count();
        $coutStd = DB::table('users')->where('level', '=', 'นักศึกษา')->where('status', '=', 1)->count();

        $coutUnTch = DB::table('users')->where('level', '=', 'อาจารย์')->where('status', '=', 0)->count();
        $coutUnStd = DB::table('users')->where('level', '=', 'นักศึกษา')->where('status', '=', 0)->count();

        return view('report.userReport', compact('users', 'coutAllUser', 'coutAdmin', 'coutTch', 'coutStd', 'coutUnTch', 'coutUnStd', 'userAdmin'));
    }

    public function projectCateReport()
    {

        $categories = DB::table('categories')->get();
        $project = DB::table('categories')->join('projects', 'projects.cate_id', '=', 'categories.cate_id')->get();
        return view('report.projectCateReport', compact('categories', 'project'));
    }
    public function projectReport()
    {
        $projectselect = DB::table('projects')
        ->select('edition')
        ->distinct()
        ->orderByDesc(DB::raw("edition"))
        ->get();
        $categories = DB::table('categories')->get();
        $project = DB::table('categories')->join('projects', 'projects.cate_id', '=', 'categories.cate_id')->simplePaginate(10);
        return view('report.projectReport', compact('categories', 'project','projectselect'));
    }
    public function viewReport()
    {

        $categories = DB::table('categories')->get();
        $project = DB::table('categories')->join('projects', 'projects.cate_id', '=', 'categories.cate_id')
            ->orderBy('projects.cate_id')
            ->get();
        $coutView = DB::table('projects')->where('published', '=', '1')->where('', '=', 0)->count();
        return view('report.projectReport', compact('categories', 'project'));
    }

    public function exportToPdf()
    {
        // Fetch data
        // $data = ['foo' => 'bar'];

        // Render view to HTML
        $html = view('report.projectReport')->render();

        // Generate PDF
        $pdf = \PDF::loadHTML($html);

        // Return PDF as download
        return $pdf->download('report.projectReport');
    }

    public function reportDownload()
    {
        $download = DB::table('projects')
            ->select(DB::raw('MONTH(created_at) as month'), DB::raw('COUNT(*) as total'))
            ->groupBy('month')
            ->get();
        $total = DB::table('categories')
            ->join('projects', 'projects.cate_id', '=', 'categories.cate_id')
            ->join('documents', 'documents.project_id', '=', 'projects.project_id')
            ->orderByDesc('download_counter')
            ->paginate(10);
        return view('report.downloadReport', compact('download', 'total'));
    }

    public function reportDownloadTotal()
    {
        $download = DB::table('projects')
            ->select(DB::raw('MONTH(created_at) as month'), DB::raw('COUNT(*) as total'))
            ->groupBy('month')
            ->get();
        $total = DB::table('categories')
            ->join('projects', 'projects.cate_id', '=', 'categories.cate_id')
            ->join('documents', 'documents.project_id', '=', 'projects.project_id')
            ->orderByDesc('download_counter')
            ->get();
        $projects = DB::table('categories')
            ->join('projects', 'projects.cate_id', '=', 'categories.cate_id')
            ->join('documents', 'documents.project_id', '=', 'projects.project_id')
            // ->select(DB::raw("projects.project_id"))
            // ->select(DB::raw("projects.title_th"))
            ->select(DB::raw("SUM(download_counter) as download", 'projects.project_id', 'title_th'))
            ->groupBy(DB::raw("(documents.project_id)"))
            ->orderByDesc(DB::raw("download"))
            // ->SUM('download_counter')
            ->get();
        $totalD = DB::table('categories')
            ->join('projects', 'projects.cate_id', '=', 'categories.cate_id')
            ->join('documents', 'documents.project_id', '=', 'projects.project_id')
            ->select(array(DB::raw("SUM(download_counter) as download"), 'projects.project_id', 'title_th'))
            ->groupBy('documents.project_id')
            ->orderByDesc(DB::raw("download"))
            // ->paginate(10);
            ->get();

        return view('report.downloadTotalReport', compact('download', 'total', 'projects', 'totalD'));
    }

    public function reportViewTotal()
    {
        $View = DB::table('categories')
            ->join('projects', 'projects.cate_id', '=', 'categories.cate_id')
            ->join('documents', 'documents.project_id', '=', 'projects.project_id')
            ->select(array(DB::raw("SUM(view_counter) as view"), 'projects.project_id', 'title_th'))
            ->groupBy('documents.project_id')
            ->orderByDesc(DB::raw("view"))
            ->get();
        $totalV = DB::table('categories')
            ->join('projects', 'projects.cate_id', '=', 'categories.cate_id')
            ->join('documents', 'documents.project_id', '=', 'projects.project_id')
            ->select(DB::raw("SUM(view_counter) as view"))
            ->get();
        return view('report.viewReport', compact('View', 'totalV'));
    }

    public function reportGenTotal()
    {
        $selectGen  = DB::table('projects')
            ->select('gen')
            ->distinct()
            ->orderByDesc(DB::raw("gen"))
            ->get();
        $project = DB::table('categories')->join('projects', 'projects.cate_id', '=', 'categories.cate_id')->simplePaginate(10);
        $gen = DB::table('categories')
            ->join('projects', 'projects.cate_id', '=', 'categories.cate_id')
            ->select(array(DB::raw("SUM(gen) as sumGen"), 'projects.project_id', 'title_th', 'gen'))
            ->groupBy('projects.gen')
            ->orderByDesc(DB::raw("gen"))
            ->get();
        $totalG = DB::table('categories')
            ->join('projects', 'projects.cate_id', '=', 'categories.cate_id')
            ->join('documents', 'documents.project_id', '=', 'projects.project_id')
            ->select(DB::raw("SUM(gen) as sumGen"))
            ->get();
        return view('report.genReport', compact('gen', 'totalG', 'project', 'selectGen'));
    }
    public function genOld()
    {
        $selectGen  = DB::table('projects')
            ->select('gen')
            ->distinct()
            ->orderByDesc(DB::raw("gen"))
            ->get();
        $project = DB::table('categories')->join('projects', 'projects.cate_id', '=', 'categories.cate_id')->simplePaginate(10);
        $gen = DB::table('categories')
            ->join('projects', 'projects.cate_id', '=', 'categories.cate_id')
            ->select(array(DB::raw("SUM(gen) as sumGen"), 'projects.project_id', 'title_th', 'gen'))
            ->groupBy('projects.gen')
            ->orderByDesc(DB::raw("gen"))
            ->get();
        $totalG = DB::table('categories')
            ->join('projects', 'projects.cate_id', '=', 'categories.cate_id')
            ->join('documents', 'documents.project_id', '=', 'projects.project_id')
            ->select(DB::raw("SUM(gen) as sumGen"))
            ->get();
        return view('report.genOld', compact('gen', 'totalG', 'project', 'selectGen'));
    }
    public function genReport2()
    {
        $selectGen  = DB::table('projects')
            ->select('gen')
            ->distinct()
            ->orderByDesc(DB::raw("gen"))
            ->get();
        $project = DB::table('categories')->join('projects', 'projects.cate_id', '=', 'categories.cate_id')->simplePaginate(10);
        $gen = DB::table('categories')
            ->join('projects', 'projects.cate_id', '=', 'categories.cate_id')
            ->select(array(DB::raw("SUM(gen) as sumGen"), 'projects.project_id', 'title_th', 'gen'))
            ->groupBy('projects.gen')
            ->orderByDesc(DB::raw("gen"))
            ->get();
        $totalG = DB::table('categories')
            ->join('projects', 'projects.cate_id', '=', 'categories.cate_id')
            ->join('documents', 'documents.project_id', '=', 'projects.project_id')
            ->select(DB::raw("SUM(gen) as sumGen"))
            ->get();
        return view('report.genReport2', compact('gen', 'totalG', 'project', 'selectGen'));
    }


    public function show()
    {
        $data = DB::table('documents')
            ->select(
                DB::raw('updated_at as month'),
                DB::raw('download_counter as download')
            )
            ->get();
        $array[] = ['month', 'Num'];
        foreach ($data as $key => $value) {
            $array[++$key] = [$value->month, $value->download];
        }
        return view('report.downloadReport')->with('json', json_encode($array));
    }
}
