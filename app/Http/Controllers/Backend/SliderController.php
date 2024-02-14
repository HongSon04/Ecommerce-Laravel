<?php

namespace App\Http\Controllers\Backend;

use App\DataTables\SliderDataTable;
use App\Http\Controllers\Controller;
use App\Models\Slider;
use App\Traits\ImageUploadTrait;
use Illuminate\Http\Request;

class SliderController extends Controller
{
    use ImageUploadTrait;
    /**
     * Display a listing of the resource.
     */
    public function index(SliderDataTable $dataTable)
    {
        //
        return $dataTable->render('admin.slider.index');
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('admin.slider.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate(
            [
                // 'banner' => 'required|image|max:5012',
                'type' => 'required|string|max:200',
                'title' => 'required|max:200',
                'starting_price' => 'required|max:200',
                'btn_url' => 'required|url',
                'serial' => 'required|integer',
            ],
            [
                'banner.required' => 'Ảnh không được để trống',
                'banner.image' => 'Ảnh không đúng định dạng',
                'banner.max' => 'Ảnh không quá 5MB',
                'type.required' => 'Kiểu không được để trống',
                'type.string' => 'Kiểu không đúng định dạng',
                'type.max' => 'Kiểu không quá 200 ký tự',
                'title.required' => 'Tiêu đề không được để trống',
                'title.max' => 'Tiêu đề không quá 200 ký tự',
                'starting_price.required' => 'Giá không được để trống',
                'starting_price.max' => 'Giá không quá 200 ký tự',
                'btn_url.required' => 'URL không được để trống',
                'btn_url.url' => 'URL không đúng định dạng',
                'serial.integer' => 'Thứ tự phải là số nguyên',
                'serial.required' => 'Thứ tự không được để trống',
                'status.required' => 'Trạng thái không được để trống',
            ],
            [
                'banner' => 'Ảnh',
                'type' => 'Kiểu',
                'title' => 'Tiêu đề',
                'starting_price' => 'Giá',
                'btn_url' => 'URL',
                'serial' => 'Thứ tự',
                'status' => 'Trạng thái',
            ]
        );

        $slider = new Slider(); // ? Lấy model Slider

        /* Handle File Upload */
        $imagePath = $this->uploadImage($request, 'banner', '/uploads');

        $slider->banner = $imagePath;
        $slider->type = $request->type;
        $slider->title = $request->title;
        $slider->starting_price = $request->starting_price;
        $slider->btn_url = $request->btn_url;
        $slider->serial = $request->serial;
        $slider->status = $request->status;

        $slider->save();
        toastr('Thêm mới thành công', 'success');

        return redirect()->route('admin.slider.index');
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
        $slider = Slider::findOrFail($id);
        return view('admin.slider.edit', compact('slider'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $request->validate(
            [
                // 'banner' => 'required|image|max:5012',
                'type' => 'nullable|string|max:200',
                'title' => 'required|max:200',
                'starting_price' => 'required|max:200',
                'btn_url' => 'required|url',
                'serial' => 'required|integer',
            ],
            [
                'banner.required' => 'Ảnh không được để trống',
                'banner.image' => 'Ảnh không đúng định dạng',
                'banner.max' => 'Ảnh không quá 5MB',
                'type.required' => 'Kiểu không được để trống',
                'type.string' => 'Kiểu không đúng định dạng',
                'type.max' => 'Kiểu không quá 200 ký tự',
                'title.required' => 'Tiêu đề không được để trống',
                'title.max' => 'Tiêu đề không quá 200 ký tự',
                'starting_price.required' => 'Giá không được để trống',
                'starting_price.max' => 'Giá không quá 200 ký tự',
                'btn_url.required' => 'URL không được để trống',
                'btn_url.url' => 'URL không đúng định dạng',
                'serial.integer' => 'Thứ tự phải là số nguyên',
                'serial.required' => 'Thứ tự không được để trống',
                'status.required' => 'Trạng thái không được để trống',
            ],
            [
                'banner' => 'Ảnh',
                'type' => 'Kiểu',
                'title' => 'Tiêu đề',
                'starting_price' => 'Giá',
                'btn_url' => 'URL',
                'serial' => 'Thứ tự',
                'status' => 'Trạng thái',
            ]
        );

        $slider = Slider::findOrFail($id); // ? Lấy model Slider

        /* Handle File Upload */
        $imagePath = $this->updateImage($request, 'banner', '/uploads', $slider->banner);

        $slider->banner = $imagePath;
        $slider->type = $request->type;
        $slider->title = $request->title;
        $slider->starting_price = $request->starting_price;
        $slider->btn_url = $request->btn_url;
        $slider->serial = $request->serial;
        $slider->status = $request->status;

        $slider->save();
        toastr('Cập nhật thành công', 'success');

        return redirect()->route('admin.slider.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $slider = Slider::findOrFail($id);
        $this->deleteImage($slider->banner);
        $slider->delete();

        return response(['status' => 'success', 'message' => 'Deleted Successfully!']);
    }
}
