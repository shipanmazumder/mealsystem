<?php

namespace App\Http\Controllers;

use App\Meal;
use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Auth;

class MealController extends Controller
{
    private $data;
    /**
     * @var Meal
     */
    private $model;

    /**
     * MealController constructor.
     */
    public function __construct()
    {
        $this->model=new Meal();
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         $this->data['users']=User::all();
        return view("inc.meal",$this->data);
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
            $this->model=Meal::find($request->id);


        }
        $validatedData = $request->validate([
            'user_id'=>'required',
            'total_meal'=>'required|string',
            'description'=>'',
        ]);
        $this->model->user_id=$request->user_id;
        $this->model->total_meal=$request->total_meal;
        $this->model->description=$request->description;
        $this->model->date=$request->date;
        $this->model->created_by=Auth::id();
        $this->model->save();
        setMessage("message","success","Successfully");
        return redirect()->route('mealsuccess', ['last_id' => $this->model->id]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Meal  $meal
     * @return \Illuminate\Http\Response
     */
    public function show(Meal $meal)
    {
         return view("inc.mealView",["meal"=>$meal]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Meal  $meal
     * @return \Illuminate\Http\Response
     */
    public function edit(Meal $meal)
    {
        $this->data['single']=$meal;
        $this->data['users']=User::all();
        return view("inc.meal",$this->data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Meal  $meal
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Meal $meal)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Meal  $meal
     * @return \Illuminate\Http\Response
     */
    public function destroy(Meal $meal)
    {
        //
    }
    public function success($id)
    {
        return view("inc.mealSuccess",['id'=>$id]);
    }
}
