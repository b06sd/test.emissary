<?php

namespace App\Http\Controllers;

use DB;
use Auth;
use App\Schedule;
use Redirect,Response;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class DeliveryController extends Controller
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
            ->select('schedules.*', 'units.name')
            ->get();

            return DataTables::of($schedule)
            ->addColumn('action', function($cb_schedule){
                if(Auth::user()->hasRole('units'))
                {
                    return
                    '<a href="'.route("schedules.show", $cb_schedule->id).'" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm readSchedule"><i class="fa fa-eye"></i> View</a>&nbsp;';
                }
                if(Auth::user()->hasRole('administrator'))
                {
                    return
                    '<a href="'.route("deliveries.show", $cb_schedule->id).'" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm readSchedule"><i class="fa fa-cogs"></i> Activate Delivery</a>&nbsp;';
                }
            })
            ->rawColumns(['action'])
            ->addIndexColumn()
            ->make(true);
        }
        return view('deliveries.index');
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $schedule = DB::table('schedules')
        ->where('id', $id)
        ->get();

        return view('deliveries.show', compact('schedule'));
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
