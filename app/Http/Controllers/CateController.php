<?php

namespace App\Http\Controllers;


use Dflydev\DotAccessData\Data;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Categories;

class CateController extends Controller
{
    public function insertformCate()
    {
        return view('cate_create');
    }

    public function insertCate(Request $request)
    {
        $catename = $request->input('catename');
        $data = array('catename' => $catename);
        DB::table('categories')->insert($data);

        return redirect('allcate');
    }
    public function allcate()
    {
        $categories = DB::table('categories')->get();
        return view('allcate', ['categories' => $categories]);
    }

    public function deletecate($cate_id)
    {
        DB::table('categories')->where('cate_id', $cate_id)->delete();
        return response()->json(['message' => 'deleted']);
        // return redirect('allcate');
    }

    public function updatecate(Request $request)
    {
        $catename = $request->catename;
        $categories = Categories::find($request->cate_id);
        $categories-> catename = $catename;
        $categories->save();
        return redirect('allcate');

    }

    public function updateFormCate($cate_id)
    {
        $categories = Categories::find($cate_id);
        return view('allcate',compact('categories'));

    }
}
