<?php

namespace App\Http\Controllers;

use App\Models\adviser;
use App\Models\Advisers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdviserController extends Controller
{

    public function alladviser() {

        $advisers = DB::table('advisers')->get();
        return view('advisers.alladvisers', ['advisers' => $advisers]);
    }

    public function deleteadviser($adviser_id) {
        DB::table('advisers')->where('adviser_id', $adviser_id)->delete();
        // return redirect('alladviser');
        return response()->json(['message' => 'deleted']);
       
    }

    public function addAdviser(Request $request) {
        $name_prefix_th = $request->input('name_prefix_th');
        $name_prefix_eng = $request->input('name_prefix_eng');
        $adviser_fullname_th = $request->input('adviser_fullname_th');
        $adviser_fullname_en = $request->input('adviser_fullname_en');
        $adviser_tel = $request->input('adviser_tel');
        $adviser_email = $request->input('adviser_email');
        $data=array('name_prefix_th'=>$name_prefix_th, 'name_prefix_eng'=>$name_prefix_eng, 
        'adviser_fullname_th'=>$adviser_fullname_th, 'adviser_fullname_en'=>$adviser_fullname_en, 'adviser_tel'=>$adviser_tel, 
        'adviser_email'=>$adviser_email );
        DB::table('advisers')->insert($data);

        return redirect()->route('alladviser');
 
    }

    public function updateadviser(Request $request)
    {
        $name_prefix_th = $request->name_prefix_th;
        $name_prefix_eng = $request->name_prefix_eng;
        $adviser_fullname_th = $request->adviser_fullname_th;
        $adviser_fullname_en = $request->adviser_fullname_en;
        $adviser_tel = $request->adviser_tel;
        $adviser_email = $request->adviser_email;
        $adviser = advisers::find($request->adviser_id);
        $adviser-> name_prefix_th = $name_prefix_th;
        $adviser-> name_prefix_eng = $name_prefix_eng;
        $adviser-> adviser_fullname_th = $adviser_fullname_th;
        $adviser-> adviser_fullname_en = $adviser_fullname_en;
        $adviser-> adviser_tel = $adviser_tel;
        $adviser-> adviser_email = $adviser_email;
        $adviser->save();
        return redirect('alladviser');

    }
}
