<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Sex;
use DB;
use App\Student;
use Illuminate\Support\Facades\Storage;


class StudentController extends Controller
{
    public function index(){

        $students = Student::join('sexes','sexes.id','=','students.sex_id')
            ->selectRaw('sexes.sex,
                            students.first_name,
                            students.last_name,
                            
                            students.id
                            ')
            ->get();
        return view('students.index',compact('students'));
    }

    public function insert(){
        return view('students.insert',['sexses'=>Sex::all()]);
    }

     public function save(Request $request)
     {
        // dd($request->photo);
         $request->validate([
             'first_name'=>'required',
             'last_name'=>'required',
             'sex_id'=>'required',

         ]);



         Student::create($request->all());

         return redirect('student/list');
     }

    public function edit($id=1){
        $sexes = Sex::all();
        $student = DB::table('students')->where('id',$id)->first();
        return view('students.edit',compact('sexes','student'))->with('id',$id);
    }

    public function update(Request $request)
    {
        $data=[
            'first_name'=>$request->first_name,
            'last_name'=>$request->last_name,
            'sex_id'=>$request->sex_id
        ];
        DB::table('students')->where('id',$request->id)->update($data);
        return redirect('student/list');
    }

    public function delete(Request $request){

        $student = Student::destroy($request->id);
        return back();
    }

    public function multi_delete(Request $request)
    {
       Student::destroy($request->mult_id);
       return back();
    }

}
