<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Fureev\Trees\Table;
use Fureev\Trees\Tests\models\Structure;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index(Request $request){
        $collection = Category::all();
        echo json_encode($collection->toTree()); 
    }

    public function create(Request $request){
        $category = Category::make(['title'=>'child-child','parent_id'=>'bbba860d-35b6-4cce-9592-7fa2cfb42eb3'])->saveAsRoot();

    }
}
