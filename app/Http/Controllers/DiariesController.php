<?php

namespace App\Http\Controllers;

use App\Models\Diary;
use App\Models\User;
use Error;
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

        $diaries = Diary::all();
        return view('admin.diaries.index', compact('diaries'));
        // if(request()->ajax())
        // {
        //     if(Auth::user()->role == 1){
        //         $diaries = Diary::all();
        //         return $this->generateDatatables($diaries);
        //     } else if(Auth::user()->role == 2){
        //         $supervisorId = Auth::user()->id;

        //         $diaries = Diary::where(function ($query) use ($supervisorId) {
        //             $query->where('supervisor_id', $supervisorId)
        //                 ->orWhere('author_id', $supervisorId);
        //         })->get();
        //         return $this->generateDatatables($diaries);
        //     } else {
        //         $diaries = Diary::where('author_id','=',Auth::user()->id)->get();
        //         return $this->generateDatatables($diaries);
        //     }
        // };

        // return view('admin.diaries.index');
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
        // $diary = Diary::where('id','=',$id)->first();
        // $user = User::where('id','=', $diary->author_id)->first();
        // $date = $user->created_at->format('M d, Y');
      
        // $name = $user->name;
        // $sup = User::where('id','=',$diary->supervisor_id)->first();
        // $supervisor = $sup->name;
        // $title = 'EOD Report by ' . $name . ' on ' . $date;
        // $diary_details = [
        //     'diary' => $diary,
        //     'name' => $name,
        //     'title' => $title,
        //     'supervisor' => $supervisor,
        //     // 'signature' => $sup->signature
        // ];
        // return view('admin.diaries.show')->with('diary',$diary_details);
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

        return view('admin.diaries.edit')->with('diary',$diary);
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
            // dd($request->input('todays-plan'));
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

            return view('admin.diaries.index')->with([
                'diaries'=>$diaries
            ]);
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


}






