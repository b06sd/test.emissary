<?php

namespace App\Http\Controllers;

use DB;
use Auth;
use App\Company;
use App\Schedule;
use Redirect,Response;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class CompanyController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(request()->ajax())
        {
        $company = Company::all();

        return Datatables::of($company)
        ->addColumn('action', function($cb_company){
            if(Auth::user()->hasRole('administrator'))
            {
                return
                '<a href="'.route("companies.show", $cb_company->id).'" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm readcompany"><i class="fa fa-eye"></i> View</a>&nbsp;'.
                '<a href="'.route("companies.edit", $cb_company->id).'" class="d-none d-sm-inline-block btn btn-sm btn-info shadow-sm" id="edit-company"><i class="fa fa-plus"></i> Edit</a>&nbsp;'.
                '<a href="'.route("companies.createSchedule", $cb_company->id).'" class="d-none d-sm-inline-block btn btn-sm btn-primary2 shadow-sm readcompany"><i class="fa fa-calendar"></i> New Schedule</a>&nbsp;';
            }
            if(Auth::user()->hasRole('units'))
            {
                return
                '<a href="'.route("companies.createSchedule", $cb_company->id).'" class="d-none d-sm-inline-block btn btn-sm btn-primary2 shadow-sm readcompany"><i class="fa fa-calendar"></i> New Schedule</a>&nbsp;';
            }            
        })
        ->rawColumns(['action'])
        ->addIndexColumn()
        ->make(true);
    }
    return view('companies.index');
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
            'name' => 'required',
            'address' => 'required',
            'description' => 'required',
            'user_id' => 'required'
        ]);
        
        Company::create($request->all());
        return redirect()->route('companies.index')
                        ->with('success','Company created successfully.');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storeSchedule(Request $request)
    {

        $this->validate(request(), [
            'organisation' => 'required',
            'address' => 'required',
            'item' => 'required',
            'letter_title' => 'required',
            'unit_id' => 'required'
        ]);

        $store_schedule = new Schedule;
        $store_schedule->organisation = request('organisation');
        $store_schedule->location = request('address');
        $store_schedule->item = request('item');
        $store_schedule->letter_title = request('letter_title');
        $store_schedule->unit_id = request('unit_id');     
        $store_schedule->user_id = Auth::user()->id;        
        
        $store_schedule->save();
        return redirect()->route('companies.index')
                        ->with('success','Company created successfully.');
    }    

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $company = Company::where('id', $id)
        ->get();

        return view('companies.show', compact('company'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Company $company)
    {
        return view('companies.edit', compact('company'));
    }

    /**
     * Show the form for creating schedule the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */    
    public function createSchedule(Company $company)
    {
        $company = Company::findOrFail($company->id);
        return view('companies.create', compact('company'));
    }    

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Company $company)
    {
        $request->validate([
            'name' => 'required',
            'address' => 'required',
            'description' => 'required',
            'user_id' => 'required'
        ]);

        $company->update($request->all());

        return redirect()->route('companies.index')
        ->with('success','Company updated successfully');        
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
