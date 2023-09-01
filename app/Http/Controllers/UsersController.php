<?php

namespace App\Http\Controllers;

use App\Mail\NewUserEmail;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use DataTables;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class UsersController extends Controller
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
            $users = User::where('id','!=',Auth::user()->id)->get();
            return $this->generateDatatables($users);
        };
        return view('admin.users.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.users.create');
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
                'name' => 'required|string|max:255',
                'role' => 'required|numeric',
                'email' => 'required|email',
                'temp-password' => 'required|min:8',
            ]);
    
            $user = User::create([
                'name' => $request->name,
                'role' => $request->role,
                'email' => $request->email,
                'password' => Hash::make($request->input('temp-password')),
                'isPicComplete' => 0,
                'isSignatureComplete' => 0
            ]);
    
            $users = User::all();
            $message = "User Created Successfully!";

            return view('admin.users.index')->with(['users'=>$users, 'success'=>$message]);
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
        $profile = User::find($id);

        return view('admin.profile.index')->with('profile', $profile);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::findOrFail($id);
        
        return view('admin.users.edit')->with('user',$user);
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
                'name' => 'required|string|max:255',
                'role' => 'required|numeric',
                'email' => 'required|email',
            ]);
    
            $user = User::findOrFail($id);
            
            $user->update([
                'name' => $request->name,
                'role' => $request->role,
                'email' => $request->email,
                'isComplete' => 1
            ]);
    
            $users = User::all();
            $message = "User '$user->name' Updated Successfully!";

            return view('admin.users.index')->with(['users'=>$users,'user_name'=>$user->name, 'success'=>$message]);
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
        $deleteUser = User::findOrFail($id);
        $userName = $deleteUser->name;
        $deleteUser->destroy($id);
        
        if($deleteUser){
            return response()->json(['message' => $userName .' deleted successfully']);
        } else {
            return response()->json(['error' => 'Deletion failed!']);
        }
    }

    public function generateDatatables($request)
    {
        return DataTables::of($request)
                ->addIndexColumn()
                ->addColumn('role', function($data){
                    $role = '';
                    if($data->role == 1){
                        $role = '<span class="badge badge-success">Administrator</span>';
                    } else if($data->role == 2){
                        $role = '<span class="badge badge-warning">Supervisor</span>';
                    } else {
                        $role = '<span class="badge badge-secondary">Trainee</span>';
                    }
                    return $role;
                })
                ->addColumn('action', function($data){
                    $actionButtons = '<a href="'.route("users.edit",$data->id).'" data-id="'.$data->id.'" class="btn btn-sm btn-warning editUser">
                                        <i class="fas fa-edit"></i>
                                      </a>
                                      <button data-id="'.$data->id.'" class="btn btn-sm btn-danger" onclick="confirmDelete('.$data->id.')">
                                        <i class="fas fa-trash"></i>
                                      </button>';
                    return $actionButtons;
                })
                ->rawColumns(['action','role'])
                ->make(true);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updateProfilePic(Request $request, $id)
    {
        if(request()->ajax()){
            try {            
                $request->validate([
                    'profilePic' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048', // Validate the image file
                ]);
        
                if ($request->hasFile('profilePic')) {
                    $imageFile = $request->file('profilePic');
                    $originalName = pathinfo($imageFile->getClientOriginalName(), PATHINFO_FILENAME);
                    // originalName-time.extension
                    $filename = $originalName . "-" . time() . '.' . $imageFile->getClientOriginalExtension();
                    
                    $path = 'uploads/profiles/'.$filename;
                    $user = User::findOrFail($id);
                    // dd($path);
                    $user->update([
                        'img' => $path,
                        'isPicComplete' => 1
                    ]);

                    if($user){
                        $imageFile->storeAs('public/uploads/profiles/', $filename);

                        $successMessage = $user->name .'\'s profile picture successfully uploaded!';

                        return response()->json(['successMessage' => $successMessage]);
                    }
                }
                // return redirect()->route('success')->with('success', 'Data saved successfully!');
            } catch (ValidationException $e) {
                return redirect()->back()->withErrors($e->errors())->withInput();
            }
        }
    }

       /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updateSignature(Request $request, $id)
    {
        if(request()->ajax()){
            try {            
                $request->validate([
                    'signature' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048', // Validate the image file
                ]);
        
                if ($request->hasFile('signature')) {
                    $imageFile = $request->file('signature');
                    $originalName = pathinfo($imageFile->getClientOriginalName(), PATHINFO_FILENAME);
                    // originalName-time.extension
                    $filename = $originalName . "-" . time() . '.' . $imageFile->getClientOriginalExtension();
                    
                    $path = 'uploads/signatures/'.$filename;
                    $user = User::findOrFail($id);
                    // dd($path);
                    $user->update([
                        'signature' => $path,
                        'isSignatureComplete' => 1
                    ]);

                    if($user){
                        $imageFile->storeAs('public/uploads/signatures/', $filename);

                        $successMessage = $user->name.'\'s signature successfully uploaded!';

                        return response()->json(['successMessage' => $successMessage]);
                    }
                }
                // return redirect()->route('success')->with('success', 'Data saved successfully!');
            } catch (ValidationException $e) {
                return redirect()->back()->withErrors($e->errors())->withInput();
            }
        }
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updateProfileName(Request $request, $id)
    {
        if(request()->ajax()){
            try {            
                $request->validate([
                    'name' => 'required|string|max:255', // Validate the image file
                ]);
        
                $user = User::findOrFail($id);
            
                $user->update([
                    'name' => $request->name,
                ]);

                if($user){
                    $successMessage = 'Profile name is now '.$user->name;

                    return response()->json(['successMessage' => $successMessage]);
                }

                // return redirect()->route('success')->with('success', 'Data saved successfully!');
            } catch (ValidationException $e) {
                return redirect()->back()->withErrors($e->errors())->withInput();
            }
        }
    }

      /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updatePassword(Request $request, $id)
    {
            try {            
                $request->validate([
                    'password' => 'required|string|max:255', 
                ]);
                
                $user = User::findOrFail($id);
            
                $user->update([
                    'password' => Hash::make($request->password),
                    'isPassChanged' => 1
                ]);
                
                if($user){
                    $successMessage = 'Your password is now updated '.$user->name.'!';

                    return response()->json(['successMessage' => $successMessage]);
                }

                // return redirect()->route('success')->with('success', 'Data saved successfully!');
            } catch (ValidationException $e) {
                return redirect()->back()->withErrors($e->errors())->withInput();
            }
        // }
    }
}
