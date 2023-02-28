<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Member;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

        $data = Member::get();
        return view('home')->with(compact("data"));
    }




    public function tree($hash_id=null){

        $id = base64_decode($hash_id);
       
  
        return view("tree-view")->with("id",$id);
    }

    public function downline($dataOne){
        $nextDataArray=[];

            foreach ($dataOne as $dOne){
                $idOne=$dOne['user_id'];

             $dataTwo = Member::where('upline', '=', $idOne)->get()->toArray();

             array_push($nextDataArray, $dataTwo);
            }

           // $this->downline($nextDataArray);

            return $nextDataArray;

    }
}