<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Document;

class PutFileController extends Controller
{
    public function uploadfile(Request $request,$project_id)
    {
        $path = $request->file('avatar')->storeAs(
            'avatars', $request-> $project_id
        );

        return redirect('allproject')->with('status', 'File Has been uploaded successfully in laravel 8');
    }
}
