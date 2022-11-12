<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CategController extends Controller
{
    public function index()
    {
        $categories = Category::paginate(3);
        $trashedCategories = Category::onlyTrashed()->get();

        return view(
            'admin.category.index',
            compact('categories', 'trashedCategories')
        );
    }

    public function create()
    {
        return view('admin.category.create');
    }

    public function store(Request $request)
    {
        if ($request->has('image')) {
            $file = $request->file('image');

            $filenameWithExt = $file->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $extention = $file->getClientOriginalExtension();
            $fileNameToStore = $filename . '_' . time() . '.' . $extention;

            $path = $file->storeAs(
                'public/images/category',
                $fileNameToStore
            );
        }
        $date = $request->all();
        $date['image'] = $path ?? null;

        Category::create($date);

        return redirect()->route('admin.category.index');
    }

    public function edit(Category $category)
    {
        return view(
            'admin.category.edit',
            compact(
                'category'
            )
        );
    }

    public function update(Request $request, Category $category)
    {
        //--------------------------------Main image-------------------------------
        if ($request->has('image')) {
            $file = $request->file('image');
            $filenameWithExt = $file->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $extention = $file->getClientOriginalExtension();
            $fileNameToStore = $filename . '_' . time() . '.' . $extention;
            $path = $file->storeAs(
                'public/images/category',
                $fileNameToStore
            );
        }
        $date = $request->all();
        if (isset($path)) {
            $this->deleteImage($category->image);
            $date['image'] = $path;
        } else {
            ($date['image'] = $category->image);
        }

        $category->update($date);
        return redirect()->route('admin.category.index');
    }

    public function delete(Category $category)
    {
        $category->delete();
        return redirect()->route('admin.category.index');
    }

    public function restore($id)
    {
        Category::onlyTrashed()->whereId($id)->first()->restore();

        return redirect()->route('admin.category.index');
    }

    public function destroy($id)
    {
        $category = Category::onlyTrashed()->whereId($id)->first();
        $this->deleteImage($category->image);
        $category->forceDelete();

        return redirect()->route('admin.category.index');
    }

    public function deleteImage($image)
    {
        Storage::delete($image);
    }
}
