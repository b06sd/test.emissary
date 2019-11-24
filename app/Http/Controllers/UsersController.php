<?php

namespace App\Http\Controllers;

use DB,Auth,Hash;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use App\Http\Requests\CreateUsersRequest;

use App\RoleUser;
use App\Unit;
use App\Role;
use App\User;

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
        $users = DB::table('users')
        ->join('units', 'users.unit_id', '=', 'units.id')
        ->join('roles', 'users.role_id', '=', 'roles.id')
        ->whereNotIn('user_type', ['SysAdmin'])
        ->select('users.*', 'units.name AS unit_name', 'roles.display_name AS role_name')
        ->get();
        return Datatables::of($users)
        ->addColumn('action', function($cb_user){
            return
            '<a href="'.route("users.edit", $cb_user->id).'" class="d-none d-sm-inline-block btn btn-sm btn-info shadow-sm" id="edit-user"><i class="fa fa-plus"></i> Edit User</a>&nbsp;';            
        })
        ->rawColumns(['action'])
        ->addIndexColumn()
        ->make(true);        
        }
        $units = Unit::all();
        return view('users.index', compact('units'));
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
    public function store(CreateUsersRequest $request)
    {
        $validated = $request->validated();
        if(!$validated)
        {
            session()->flash('Error', 'User creation failed');
            return redirect(route('users.index'));
        }
        else{
            User::create([
                'user_type' => $request->user_type,
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'unit_id' => $request->unit_id,
                'role_id' => $request->role_id
            ]);
            session()->flash('success', 'User created successfully.');
            return redirect(route('users.index'));
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
    public function edit(User $user)
    {
        $roles = Role::all();
        $units = Unit::all();
        return view('users.edit', compact('user', 'roles', 'units'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $request->validate([
            'user_type' => 'required',
            'name' => 'required',
            'email' => 'required',
            'unit_id' => 'required',
            'role_id' => 'required'         
        ]);   
        
        $user->update($request->all());

        return redirect()->route('users.index')
        ->with('success','User updated successfully');        
    }

    public function deactivate(Request $request, User $user)
    {
        DB::table('users')
            ->where('id', $user)
            ->update(['status' => 'Deactivate']);

            return redirect()->route('users.index')
            ->with('success','User deactivated successfully');                  
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

    public function allAppUsers()
    {
        $roles = DB::select("select * from roles where name NOT IN('superadministrator')", [1]);
        $users = DB::select("select * from users where status = 'Not Active'", [1]);        
        if(request()->ajax())
        {         
        $appUser = DB::table('not_exsiting')
        ->select('id', 'email', 'status')
        ->get();
        
        return DataTables::of($appUser)
        ->addColumn('action', function ($cb_appUser) {
         return 
         '<a href="#updateroleuser-'.$cb_appUser->id.'"data-toggle="modal" data-target="#create_app_user" class="d-none d-sm-inline-block btn btn-sm btn-success shadow-sm"><i class="fas fa-users"></i> Create App User</a>';
        })
        ->make(true);
        }    
        
    return view('users.appUser', compact('roles', 'users'));
    }

    public function addAppUser(Request $request)
    {
        
        $appUsers = DB::table('not_exsiting')
        ->where('id', '=', $request->user_id)
        ->select('id')
        ->get();
        
        if (!empty($appUsers) )
        {
            $this->validate($request,[
                'role_id' => 'required',
                'user_id' => 'required',
                'user_type' => 'required'
            ]);
    
            $input = [
                'role_id' => $request->role_id,
                'user_id' => $request->user_id,
                'user_type' => $request->user_type
            ];
            RoleUser::create($input);
            User::where('id', $request->user_id)->update(array('status' => 'Active'));
            return redirect()->route('users.allAppUser')->with('success', 'App User created successfully.');
        } 
        return redirect()->route('users.allAppUser')->with('warning', 'App User already exist.');
    }    
}
