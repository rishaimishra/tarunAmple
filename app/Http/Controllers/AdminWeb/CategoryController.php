<?php

namespace App\Http\Controllers\AdminWeb;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use App\Models\BannerModel;
use App\Models\CategoryModel;

class CategoryController extends Controller
{
    

    public function create()
    {
        // Your add category form view goes here
        return view('admin.category.category_add');
    }





    public function store(Request $request)
    {
        dd($request->all());
        // Your store category logic goes here
        // Validate the request, save the category, etc.
    }




    public function index()
    {
       
        $categories = CategoryModel::where('id', '!=', 1)->orderBy('id')->get();
        return view('admin.category.category_list', ['categories' => $categories]);
    }





    public function edit($id)
    {
        // Your edit category form view goes here
        $category = CategoryModel::find($id);
        return view('admin.category.category_edit', ['category' => $category]);
    }






    public function update(Request $request, $id)
    {
        // Your update category logic goes here
        // Validate the request, update the category, etc.
    }




}
