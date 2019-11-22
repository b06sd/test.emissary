<?php

namespace App\Http\Controllers;

use DB,Auth,Hash;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use App\Http\Requests\CreateUsersRequest;

use App\Unit;
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
            '<a href="'.route("users.edit", $cb_user->id).'" class="d-none d-sm-inline-block btn btn-sm btn-info shadow-sm" id="edit-user"><i class="fa fa-plus"></i> Edit User</a>&nbsp;'.
            '<a href="" class="d-none d-sm-inline-block btn btn-sm btn-danger shadow-sm readuser"><i class="fa fa-ban"></i> Deactivate User</a>&nbsp;';            
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

    public function allAppUsers()
    {
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
        
    return view('users.appUser');
    }
}
