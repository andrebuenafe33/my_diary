<?php

namespace App\Http\Controllers;

use App\Models\Example;
use Illuminate\Http\Request;
use DataTables;

class ExamplesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(request()->ajax())
        {
            $examples = Example::all(); 
            // $examples = User::where('id','!=',Auth::user()->id)->get();
            return $this->generateDatatables($examples);
        };
        return view('admin.examples.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.examples.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
          try {
            $validatedData = $request->validate([
                'firstName' => 'required',
                'middleName' => 'required',
                'lastName' => 'required',
                'contactNumber' => 'required',
                'Course' => 'required',
            ]); 
        
            $example = Example::create([
                'first_name' => $request->firstName,
                'middle_name' => $request->middleName,
                'last_name' => $request->lastName,
                'contact_number' => $request->contactNumber,
                'course' => $request->Course,
            ]);
            
            $examples = Example::all();
            $message = "Example Has Been Created Successfully!";
            
            // return view('admin.diaries.index')->with(['examples'=>$examples,'success'=>$message]);
            return redirect()->route('examples.index')->with('success', 'Example Has Been Created Successfully!');

        } catch (ValidationException $e) {
            return redirect()->back()->withErrors($e->errors())->withInput();
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
        $example = Example::find($id);
        if ($example) {
            return response()->json($example);
        } else {
            return response()->json(['message' => 'Example not found'], 404);
        }
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
        try {
            $validatedData = $request->validate([
                'firstName' => 'required',
                'middleName' => 'required',
                'lastName' => 'required',
                'contactNumber' => 'required',
                'Course' => 'required',
            ]);
    
            $example = Example::findOrFail($id);
            
            $example->update([
                'first_name' => $request->firstName,
                'middle_name' => $request->middleName,
                'last_name' => $request->lastName,
                'contact_number' => $request->contactNumber,
                'course' => $request->Course,
            ]);
    
            $examples = Example::all();
            $message = "Example '$example->first_name' Updated Successfully!";

            // return view('admin.examples.index')->with(['examples'=>$examples,'first_name'=>$example->first_name, 'success'=>$message]);
            return redirect()->route('examples.index')->with('success', $message);
        } catch (ValidationException $e) {
            return redirect()->back()->withErrors($e->errors())->withInput();
        }
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


    public function generateDatatables($request)
    {
        return DataTables::of($request)
                ->addIndexColumn()
                ->addColumn('action', function($data){
                    $actionButtons = '<a href="javascript:void(0)" data-id="'.$data->id.'" class="btn btn-sm btn-warning editExample">
                                        <i class="fas fa-edit"></i>
                                      </a>
                                      <button data-id="'.$data->id.'" class="btn btn-sm btn-danger" onclick="confirmDelete('.$data->id.')">
                                        <i class="fas fa-trash"></i>
                                      </button>';
                    return $actionButtons;
                })
                ->rawColumns(['action'])
                ->make(true);
    }
}
