<?php

namespace App\Http\Controllers;

use App\Bazar;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use phpDocumentor\Reflection\Types\This;

class BazarController extends Controller
{
    private $data;
    /**
     * @var Bazar
     */
    private $model;

    /**
     * BazarController constructor.
     */
    public function __construct()
    {
        $this->model=new Bazar();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->data['users']=User::all();
        $this->data['add']=true;
        return view("inc.bazar",$this->data);
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
            $this->model=Bazar::find($request->id);
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
        return redirect()->route('success', ['last_id' => $this->model->id]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Bazar  $bazar
     * @return \Illuminate\Http\Response
     */
    public function show(Bazar $bazar)
    {
       return view("inc.bazarView",["bazar"=>$bazar]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Bazar  $bazar
     * @return \Illuminate\Http\Response
     */
    public function edit(Bazar $bazar)
    {
        $this->data['single']=$bazar;
        $this->data['users']=User::all();
        return view("inc.bazar",$this->data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Bazar  $bazar
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Bazar $bazar)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Bazar  $bazar
     * @return \Illuminate\Http\Response
     */
    public function destroy(Bazar $bazar)
    {
        //
    }

    public function success($id)
    {
        return view("inc.bazarSuccess",['id'=>$id]);
    }
}
