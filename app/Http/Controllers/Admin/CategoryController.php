<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Traits\ImageUploading;
use App\Models\Tb_productcate;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\ImageUploadingTrait;
use App\Http\Requests\Admin\Tb_productcateRequest;
use App\Models\Category;

class CategoryController extends Controller
{
    use ImageUploadingTrait;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::withCount('products')->get();

        return view('admin.categories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Tb_productcate::whereNull('category_id')->pluck('name', 'id');
        return view('admin.categories.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Tb_productcateRequest $request)
    {
        $category=Tb_productcate::create($request->validated());

        if($request->input('photo', false)){
            $category->addMedia(storage_path('tmp/uploads/') . $request->input('photo'))->toMediaCollection('photo');

        }

        return redirect()->route('admin.categories.index')->with([
            'message' => 'Succeess Created !',
            'type' => 'success'
        ]);
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Tb_productcate $category)
    {
        $categories = Tb_productcate::whereNull('category_id')->pluck('name', 'id');
        return view('admin.categories.edit', compact('category', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Tb_productcateRequest $request, Category $category)
    {
        $category -> update($request->validated());

        if($request->input('photo', false)){
            if(!$category->photo || $request->input('photo') !== $category->photo->file_name){
                isset($category->photo) ? $category->photo->delete() : null;
                $category->addMedia(storage_path('tmp/uploads/') . $request->input('photo'))->toMediaCollection('photo');
            }
        }else if($category->photo){
            $category->photo->delete();
        }

        return redirect()->route('admin.categories.index')->with([
            'message' => 'Success Updated !',
            'type' => 'info'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tb_productcate $category)
    {
        $category->delete();

        return redirect()->back()->with([
            'message' => 'Delete successfully!',
            'type' =>  'danger'
        ]);
    }
}
