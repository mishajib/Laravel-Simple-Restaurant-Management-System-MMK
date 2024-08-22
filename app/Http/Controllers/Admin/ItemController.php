<?php

namespace App\Http\Controllers\Admin;

use App\Models\Category;
use App\Models\Item;
use Carbon\Carbon;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ItemController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $items = Item::all();

        return view('admin.item.index',compact('items'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $categories = Category::all();

        return view('admin.item.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'category' => 'required',
            'name' => 'required',
            'description' => 'required',
            'price' => 'required',
            'image' => 'required|image',
        ]);
        $data['category_id'] = $request->category;
        if ($request->hasFile('image')){
            $data['image'] = imageUploadHandler(
                $request->file('image'),
                'uploads/item'
            );
        }

        Item::create($data);

        return back()->with('successMsg', 'Item added successfully.');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id): View
    {
        $item = Item::find($id);
        $categories = Category::all();

        return view('admin.item.edit', compact('item', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Item $item)
    {
        $data = $request->validate([
            'category' => 'required',
            'name' => 'required',
            'description' => 'required',
            'price' => 'required',
            'image' => 'nullable|image',
        ]);
        $data['category_id'] = $request->category;

        if ($request->hasFile('image')){
            $data['image'] = imageUploadHandler(
                $request->file('image'),
                'uploads/item',
                null,
                $item->image
            );
        }

        $item->update($data);

        return to_route('admin.items.index')->with('successMsg', 'Item updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Item $item)
    {
        if (Storage::disk(config('filesystems.default'))->exists($item->image)) {
            Storage::disk(config('filesystems.default'))->delete($item->image);
        }

        $item->delete();

        return to_route('admin.items.index')->with('successMsg', 'Item deleted successfully.');
    }
}
