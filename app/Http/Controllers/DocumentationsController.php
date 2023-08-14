<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Documentation;
use Illuminate\Support\Facades\Storage;

class DocumentationsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $docs = Documentation::latest()->get();
        return view('admin.documentations.index')->with('docs', $docs);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'doc_img' => 'required|image|mimes:jpeg,png,jpg,gif,avif,webp|max:5048', // Example image validation rules
            'caption' => 'required|string',
        ]);

        if ($request->hasFile('doc_img')) {
            $imageFile = $request->file('doc_img');
            $originalName = pathinfo($imageFile->getClientOriginalName(), PATHINFO_FILENAME);
            $fileName = $originalName . "." . time() . '.' . $imageFile->getClientOriginalExtension();
            $path = $imageFile->storeAs('public/upload/images', $fileName);

            if (Auth::check()){
                $userId = Auth::id();
            }
            // Save the image details to the database // 
           Documentation::create([
            'image' => $fileName,
            'caption' => $request->input('caption'),
            'author_id' => $userId,
           ]);

        //    return view('admin.documentations.index')->with('success', 'You Uploaded a Picture Successfully!');
           return view('admin.documentations.index')->with('uploadSuccess','The image '.$fileName.' successfully uploaded!');
        //    return redirect()->route('admin.documentations.index')->with('success', 'Document uploaded successfully!');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
