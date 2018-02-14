<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


use App\Sex;
use DB;
use App\Student;
use File;
use Storage;
use Illuminate\Support\Facades\Cache;

class RcController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $students = Student::join('sexes','sexes.id','=','students.sex_id')
            ->selectRaw('sexes.sex,
                            students.first_name,
                            students.last_name,
                            students.photo,
                            students.id
                            ')
            ->simplePaginate(5);
        return view('students.index',compact('students'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('students.insert',['sexses'=>Sex::all()]);
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
            'first_name'=>'required',
            'last_name'=>'required',
            'sex_id'=>'required',

        ]);
            //dd($request);
        $photo = "";
        if($request->photo)
        {
            $destinationPath ="photo";
            $file= $request->photo;
            $extention =$file->getClientOriginalExtension();
            $fileName = rand(1111,9999).".".$extention;
            $file->move($destinationPath,$fileName);
            $photo =$fileName;
            echo 'Yes';
        }

        $data = ['first_name'=>$request->first_name,
            'last_name'=>$request->last_name,
                'sex_id'=>$request->sex_id,
            'photo'=>$photo];



        Student::create($data);


        return redirect('students');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $student = Student::join('sexes','sexes.id','=','students.sex_id')
            ->selectRaw('sexes.sex,
                            students.first_name,
                            students.last_name,
                            
                            students.id
                            ')->orderBy('students.id','ASC')
                                ->where('students.id',$id)
                                ->first();
            ;
        return view('students.show',compact('student'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $sexes = Sex::all();
        $student = Student::find($id);
        return view('students.edit',compact('sexes','student'))->with('id',$id);
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
        $data=[
            'first_name'=>$request->first_name,
            'last_name'=>$request->last_name,
            'sex_id'=>$request->sex_id
        ];
        DB::table('students')->where('id',$id)->update($data);
        return redirect('students');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete(Request $request)
    {
        echo 12;
        dd($request);
        //$student = Student::destroy($request->id);
        //return back();
    }
}
