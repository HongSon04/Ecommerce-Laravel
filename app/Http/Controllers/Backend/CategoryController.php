<?php

namespace App\Http\Controllers\Backend;

use App\DataTables\CategoryDataTable;
use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(CategoryDataTable $dataTable)
    {
        //
        return $dataTable->render('admin.category.index');
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('admin.category.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate(
            [
                'icon' => 'required|not_in:empty',
                'name' => 'required',
                'status' => 'required'
            ],
            [
                'name.required' => 'Tên danh mục không được để trống',
                'description.required' => 'Mô tả danh mục không được để trống',
                'status.required' => 'Trạng thái không được để trống',
                'icon.required' => 'Icon không được để trống',
                'icon.not_in' => 'Vui lòng chọn icon'
            ],
            [
                'name' => 'Tên danh mục',
                'status' => 'Trạng thái'
            ]
        );

        $category = new Category();
        $category->icon = $request->icon;
        $category->name = $request->name;
        $category->slug = Str::slug($request->name);
        $category->status = $request->status;

        $category->save();

        toastr('Thêm danh mục thành công', 'success');
        return redirect()->route('admin.category.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $category = Category::findOrFail($id);
        return view('admin.category.edit', compact('category'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $request->validate(
            [
                'icon' => 'required|not_in:empty',
                'name' => 'required|max:200|unique:categories,name,' . $id,
                'status' => 'required'
            ],
            [
                'name.required' => 'Tên danh mục không được để trống',
                'description.required' => 'Mô tả danh mục không được để trống',
                'status.required' => 'Trạng thái không được để trống',
                'icon.required' => 'Icon không được để trống',
                'icon.not_in' => 'Vui lòng chọn icon'
            ],
            [
                'name' => 'Tên danh mục',
                'status' => 'Trạng thái'
            ]
        );

        $category = Category::findOrFail($id);
        $category->icon = $request->icon;
        $category->name = $request->name;
        $category->slug = Str::slug($request->name);
        $category->status = $request->status;

        $category->save();

        toastr('Cập nhật danh mục thành công', 'success');
        return redirect()->route('admin.category.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $category = Category::findOrFail($id);
        $category->delete();

        return response(['message' => 'Xóa danh mục thành công', 'status' => 'success']);
    }

    public function changeStatus(Request $request)
    {
        $category = Category::findOrFail($request->id);
        $category->status = $request->status == 'true' ? 1 : 0;
        $category->save();

        return response(['message' => 'Thay đổi trạng thái thành công!']);
    }
}
