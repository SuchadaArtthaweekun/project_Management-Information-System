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

        $categories = DB::table('categories')->get();
        $project = DB::table('categories')->join('projects', 'projects.cate_id', '=', 'categories.cate_id')->get();
        return view('report.projectReport', compact('categories', 'project'));
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

    public function chartDownload()
    {
        $download = DB::table('projects')
            ->select(DB::raw('MONTH(created_at) as month'), DB::raw('COUNT(*) as total'))
            ->groupBy('month')
            ->get();
        return view('report.downloadReport',compact('download'));
    }

   
    public function show(){
        $data = DB::table('documents')
        ->select(
            DB::raw('updated_at as month'),
            DB::raw('download_counter as download')
        )
        ->get();
        $array[]=['month','Num'];
        foreach($data as $key => $value){
            $array[++$key] = [$value->month,$value->download];
        }
        return view('report.downloadReport')->with('json',json_encode($array));
    }

    
}
