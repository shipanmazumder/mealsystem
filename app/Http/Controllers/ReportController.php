<?php

namespace App\Http\Controllers;

use App\Bazar;
use App\Maintenance;
use App\Meal;
use App\Report;
use App\User;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    private $data;
    public function index()
    {
        return view("inc.reportsForm",['users'=>User::all()]);
    }

    public function searchReports(Request $request)
    {
        $month=$request->month;
        $year=$request->year;
        $user_id=$request->user;
        $type=$request->type;
        if($type=="All")
        {
             $this->data['bazar']=$this->get_bazar($year,$month,$user_id);
             $this->data['maintenance']=$this->get_maintenance($year,$month,$user_id);
             $this->data['meal']=$this->get_meal($year,$month,$user_id);
             $this->data['meal_summery']=$this->get_meal_summary($year,$month,$user_id);
        }
        else if($type=="Bazar")
        {

            $this->data['bazar']=$this->get_bazar($year,$month,$user_id);
        }
        else if($type=="Maintenance")
        {

            $this->data['maintenance']=$this->get_maintenance($year,$month,$user_id);
        }
        else if($type=="Meal")
        {
            $this->data['meal']=$this->get_meal($year,$month,$user_id);
        }
//        dd($this->data);
        $this->data["total_bazar"]=Bazar::whereYear("date",'=',$year)->whereMonth("date",'=',$month)->sum("amount");
        $this->data["total_maintenance"]=Maintenance::whereYear("date",'=',$year)->whereMonth("date",'=',$month)->sum("amount");
        $this->data["total_meal"]=Meal::whereYear("date",'=',$year)->whereMonth("date",'=',$month)->sum("total_meal");
        if($this->data['total_meal']>0)
            $this->data['meal_charge']=$this->data['total_bazar']/$this->data['total_meal'];
        else
            $this->data['meal_charge']=0;
        $this->data['extra_charge']=$this->data["total_maintenance"]/User::count();
        return view("inc.reportPage",$this->data);
    }

    private function get_bazar($year,$month,$user_id)
    {
        $bazar=new Bazar();
        $bazar=$bazar->whereYear("date",'=',$year);
        $bazar=$bazar->whereMonth("date",'=',$month);
        $bazar=$bazar->orderBy("date","desc");
        if($user_id!='All')
        {
            $bazar=$bazar->where("user_id",$user_id);
        }
        return $bazar->get();
    }

    private function get_meal($year,$month,$user_id)
    {
        $meal=new Meal();
        $meal=$meal->whereYear("date",'=',$year);
        $meal=$meal->whereMonth("date",'=',$month);
        $meal=$meal->orderBy("date","desc");
        if($user_id!='All')
        {
            $meal=$meal->where("user_id",$user_id);
        }
       return $meal->get();

    }

    private function get_maintenance($year,$month,$user_id)
    {
            $maintenance=new Maintenance();
            $maintenance=$maintenance->whereYear("date",'=',$year);
            $maintenance=$maintenance->whereMonth("date",'=',$month);
            $maintenance=$maintenance->orderBy("date","desc");
            if($user_id!='All')
            {
                $maintenance=$maintenance->where("user_id",$user_id);
            }
            return $maintenance->get();
    }

    private function get_meal_summary($year, $month, $user_id)
    {
        $meal=new Meal();
        $meal=$meal->whereYear("date",'=',$year);
        $meal=$meal->whereMonth("date",'=',$month);
        $meal=$meal->orderBy("date","desc");
        if($user_id!='All')
        {
            $meal=$meal->where("user_id",$user_id);
        }
        $meal=$meal->groupBy('user_id');
        return $meal->selectRaw('user_id,sum(total_meal) as per_user_meal')->get();
    }
}
