<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Manufactur;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ManufacturController extends Controller
{
    public function index()
    {
        $manufactur = Manufactur::orderBy('id', 'desc')->paginate(8);
        return view('admin.manufacturs.index', ['rev' => $manufactur]);
    }

    public function create()
    {
        return view('admin.manufacturs.create');
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
                'public/images/manufactur',
                $fileNameToStore
            );
        }
        $date = $request->all();
        $date['image'] = $path ?? null;

        Manufactur::create($date);

        return redirect()->route('admin.manufactur.index');
    }

    public function edit(Manufactur $manufactur)
    {
        return view(
            'admin.manufacturs.edit',
            compact(
                'manufactur'
            )
        );
    }

    public function update(Request $request, Manufactur $manufactur)
    {
        //--------------------------------Main image-------------------------------
        if ($request->has('image')) {
            $file = $request->file('image');
            $filenameWithExt = $file->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $extention = $file->getClientOriginalExtension();
            $fileNameToStore = $filename . '_' . time() . '.' . $extention;
            $path = $file->storeAs(
                'public/images/manufactur',
                $fileNameToStore
            );
        }
        $date = $request->all();
        if (isset($path)) {
            $this->deleteImage($manufactur->image);
            $date['image'] = $path;
        } else {
            ($date['image'] = $manufactur->image);
        }

        $manufactur->update($date);
        return redirect()->route('admin.manufactur.index');
    }

    public function delete(Manufactur $manufactur)
    {
        if ($manufactur->image) {
            $this->deleteImage($manufactur->image);
        }
        $manufactur->forceDelete();
        return redirect()->route('admin.manufactur.index');
    }

    public function deleteImage($image)
    {
        Storage::delete($image);
    }
}
