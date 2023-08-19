<?php

namespace App\Http\Controllers;

use App\Models\Diary;
use App\Models\User;
use Error;
use DataTables;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DiariesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        // $diaries = Diary::all();
        // return view('admin.diaries.index', compact('diaries'));
        if(request()->ajax())
        {
            if(Auth::user()->role == 1){
                $diaries = Diary::all();
                return $this->generateDatatables($diaries);
            } else if(Auth::user()->role == 2){
                $supervisorId = Auth::user()->id;

                $diaries = Diary::where(function ($query) use ($supervisorId) {
                    $query->where('supervisor_id', $supervisorId)
                        ->orWhere('author_id', $supervisorId);
                })->get();
                return $this->generateDatatables($diaries);
            } else {
                $diaries = Diary::where('author_id','=',Auth::user()->id)->get();
                return $this->generateDatatables($diaries);
            }
        };

        return view('admin.diaries.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $supervisors = User::where('role','=',2)->get();
        return view('admin.diaries.create')->with('supervisors',$supervisors);
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
                'plantoday' => 'required',
                'eod' => 'required',
                'roadblocks' => 'required',
                'summary' => 'required',
                'plantomorrow' => 'required',
                'supervisor' => 'required'
            ]); 
        
            $diary = Diary::create([
                'plan_today' => $request->plantoday,
                'end_today' => $request->eod,
                'roadblocks' => $request->roadblocks,
                'summary' => $request->summary,
                'plan_tomorrow' => $request->plantomorrow,
                'author_id' => Auth::user()->id,
                'supervisor_id' => $request->supervisor,
                'status' => 0
            ]);
        
            $diaries = Diary::all();
        
            
            $diary = Diary::with(['author', 'supervisor'])->find($diary->id);            
            return view('admin.diaries.index')->with('diaries',$diaries);
            // return redirect()->route('success')->with('success', 'Data saved successfully!');
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
       
        $diary = Diary::findOrFail($id);
        return view('admin.diaries.show', compact('diary'));
       
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $diary = Diary::findOrFail($id);
        $supervisors = User::where('role','=',2)->get();
        
        return view('admin.diaries.edit')->with(['diary' => $diary,'supervisors' => $supervisors,]);
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
                'plantoday' => 'required',
                'eod' => 'required',
                'roadblocks' => 'required',
                'summary' => 'required',
                'plantomorrow' => 'required',
                'supervisor' => 'required'
            ]);

            $diary = Diary::findOrFail($id);
    
            $diary->update([
                'plan_today' => $request->plantoday,
                'end_today' => $request->eod,
                'roadblocks' => $request->roadblocks,
                'summary' => $request->summary,
                'plan_tomorrow' => $request->plantomorrow,
                'author_id' => Auth::user()->id,
                'supervisor_id' => $request->supervisor,
                'status' => 0
            ]);

            $diaries = Diary::all();
            // $diaries = Diary::with('supervisor')->get();
            // $message = 'EOD Report has been updated!';
            // 'success' =>$message]

            return redirect('diaries')->with('diaries',$diaries);
            // return redirect()->route('success')->with('success', 'Data saved successfully!');
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
        $deleteDiary = Diary::findOrFail($id);
        
        $deleteDiary->destroy($id);
        
        if($deleteDiary){
            return response()->json(['message' => 'Diary deleted successfully']);
        } else {
            return response()->json(['error' => 'Deletion failed!']);
        }
    }


//     public function getDiaries()
// {
//     $diaries = Diary::all(); // Replace with your actual model and query
//     return response()->json($diaries);
// }

public function generateDatatables($request)
{
    return DataTables::of($request)
            ->addIndexColumn()
            ->addColumn('title', function($data){
                $date = $data->created_at->format('F j, Y');
                $author = User::where('id','=',$data->author_id)->first();
                if(Auth::user()->role == 1 || Auth::user()->role == 2){
                    return $title = 'EOD Report for '.$date.' by '.$author->name;
                } else {
                    return $title = 'EOD Report for '.$date;
                }
            })
            ->addColumn('status', function($data){
                $status = '';
                if($data->status == 0){
                    $status = '<span class="badge badge-danger">Pending</span>';                        
                } else {
                    $status = '<span class="badge badge-success">Approved</span>';
                }
                return $status;
            })
            ->addColumn('action', function($data){
                $actionButtons = '<a href="'.route("diaries.show",$data->id).'" data-id="'.$data->id.'" class="btn btn-sm btn-primary">
                                    <i class="fas fa-eye"></i>
                                </a>
                                <a href="'.route("diaries.edit",$data->id).'" data-id="'.$data->id.'" class="btn btn-sm btn-warning editDiary">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <button data-id="'.$data->id.'" class="btn btn-sm btn-danger" onclick="confirmDeleteDiary('.$data->id.')">
                                <i class="fas fa-trash"></i>
                                </button>';
                return $actionButtons;
            })
            ->rawColumns(['action','status','title','author'])
            ->make(true);
           
    }
}






