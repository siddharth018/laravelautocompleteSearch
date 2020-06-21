<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Category;
use DB;

class CategoryController extends Controller
{
    public function index()
    {
        return view('category');
    }
    public function getCategory(Request $request)
    {
        if($request->get('query')){
            $query  = $request->get('query');
            $data = DB::table('category')
                    ->where('name','LIKE',"%{$query}%")
                    ->get();
            $outout = '<ul class="dropdown-menu" style="display:block;position:relative">';
            foreach ($data as $row) {
                $outout .= '
                <li> <a href="#">'.$row->name.'</a></li>
                ';  
            }
            $outout .= '</ul>';
            echo $outout;
        }
    }
}
