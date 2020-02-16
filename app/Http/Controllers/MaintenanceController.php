<?php

namespace App\Http\Controllers;

use App\Maintenance;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MaintenanceController extends Controller
{
     private $data;
    /**
     * @var Maintenance
     */
    private $model;

    /**
     * MaintenanceController constructor.
     */
    public function __construct()
    {
        $this->model=new Maintenance();
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         $this->data['users']=User::all();
        return view("inc.maintenance",$this->data);
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
        if($request->id!='')
        {
            $this->model=Maintenance::find($request->id);
        }
        $validatedData = $request->validate([
            'user_id'=>'required',
            'amount'=>'required|string',
            'description'=>'',
        ]);
        $this->model->user_id=$request->user_id;
        $this->model->amount=$request->amount;
        $this->model->description=$request->description;
        $this->model->date=$request->date;
        $this->model->created_by=Auth::id();
        $this->model->save();
        setMessage("message","success","Successfully");
        return redirect()->route('maintenancesuccess', ['last_id' => $this->model->id]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Maintenance  $maintenance
     * @return \Illuminate\Http\Response
     */
    public function show(Maintenance $maintenance)
    {
         return view("inc.maintenanceView",["maintenance"=>$maintenance]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Maintenance  $maintenance
     * @return \Illuminate\Http\Response
     */
    public function edit(Maintenance $maintenance)
    {
        $this->data['single']=$maintenance;
        $this->data['users']=User::all();
        return view("inc.maintenance",$this->data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Maintenance  $maintenance
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Maintenance $maintenance)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Maintenance  $maintenance
     * @return \Illuminate\Http\Response
     */
    public function destroy(Maintenance $maintenance)
    {
        //
    }
    public function success($id)
    {
        return view("inc.maintenanceSuccess",['id'=>$id]);
    }
}
