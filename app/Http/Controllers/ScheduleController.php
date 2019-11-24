<?php

namespace App\Http\Controllers;

use DB;
use Auth;
use App\Schedule;
use Redirect,Response;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class ScheduleController extends Controller
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
            $schedule = DB::table('schedules')
            ->join('units', 'schedules.unit_id', '=', 'units.id')
            ->where('unit_id', '=', Auth::user()->unit_id)
            ->select('schedules.*', 'units.name')
            ->get();

            return DataTables::of($schedule)
            ->addColumn('action', function($cb_schedule){
                if(Auth::user()->hasRole('units'))
                {
                    return
                    '<a href="'.route("schedules.show", $cb_schedule->id).'" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm readSchedule"><i class="fa fa-eye"></i> View</a>&nbsp;'.
                    '<a href="'.route("schedules.edit", $cb_schedule->id).'" class="d-none d-sm-inline-block btn btn-sm btn-info shadow-sm" id="edit-schedule"><i class="fa fa-plus"></i> Edit</a>&nbsp;';
                }
                if(Auth::user()->hasRole('administrator'))
                {
                    return
                    '<a href="'.route("schedules.show", $cb_schedule->id).'" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm readSchedule"><i class="fa fa-eye"></i> View</a>&nbsp;'.
                    '<a href="'.route("schedules.edit", $cb_schedule->id).'" class="d-none d-sm-inline-block btn btn-sm btn-info shadow-sm" id="edit-schedule"><i class="fa fa-plus"></i> Edit</a>&nbsp;';
                }
            })
            ->rawColumns(['action'])
            ->addIndexColumn()
            ->make(true);
        }
        return view('schedules.index');
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
            'organisation' => 'required',
            'location' => 'required',
            'item' => 'required',
            'letter_title' => 'required',
            'unit_id' => 'required',
            'user_id' => 'required'
        ]);
        Schedule::create($request->all());
        return redirect()->route('schedules.index')
                        ->with('success','Schedule created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $schedule = Schedule::where('unit_id', Auth::user()->unit_id)
        ->where('user_id', Auth::user()->id)
        ->where('id', $id)
        ->get();
        
        return view('schedules.show', compact('schedule'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Schedule $schedule)
    {
/*         $where = array('id' => $id);
        $schedule = Schedule::where($where)->first();

        return Response::json($schedule); */

        return view('schedules.edit', compact('schedule'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Schedule $schedule)
    {
        $request->validate([
            'item' => 'required',
            'letter_title' => 'required',
            'organisation' => 'required',
            'location' => 'required',
            'unit_id' => 'required',
            'user_id' => 'required'            
        ]);
        
        $schedule->update($request->all());

        return redirect()->route('schedules.index')
        ->with('success','Schedule updated successfully');
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
