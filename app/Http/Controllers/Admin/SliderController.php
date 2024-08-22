<?php

namespace App\Http\Controllers\Admin;

use App\Models\Slider;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class SliderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $sliders = Slider::all();

        return view('admin.slider.index', compact('sliders'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('admin.slider.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required',
            'sub_title' => 'required',
            'image' => 'required|image',
        ]);

        if ($request->hasFile('image')) {
            $data['image'] = imageUploadHandler($request->image, 'uploads/slider');
        }

        Slider::create($data);

        sendFlash('Slider added successfully.', 'successMsg');

        return back();
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id): View
    {
        $slider = Slider::find($id);

        return view('admin.slider.edit', compact('slider'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Slider $slider)
    {
       $data = $request->validate([
            'title' => 'required',
            'sub_title' => 'required',
            'image' => 'nullable|image',
        ]);

        if ($request->hasFile('image')) {
            $data['image'] = imageUploadHandler(
                $request->image,
                'uploads/slider',
                null,
                $slider->image
            );
        }

        $slider->update($data);

        sendFlash('Slider updated successfully.', 'successMsg');

        return back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Slider $slider)
    {
        if (Storage::disk(config('filesystems.default'))->exists($slider->image)) {
            Storage::disk(config('filesystems.default'))->delete($slider->image);
        }

        $slider->delete();

        return back()->with('successMsg', 'Slider deleted successfully.');
    }
}
