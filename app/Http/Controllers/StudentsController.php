<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Students;

class StudentsController extends Controller
{
    //use to search all students
    public function index(){
        $student = Students::all();
        return response($student);
    }

    //use to search students by id
    public function show($id){
        $student = Students::find($id);
        return response($student);
    }

    //use to store students
    public function store(Request $request)
    {
        $student=new Students();
        $student->name = $request->name;
        $student->student_id = $request->student_id;
        $student->created_ata = $request->created_ata;

        $student->save();
        return response([
            "message"=>"Students added in database!!"
        ]);
    }

    // used to update students by id
    public function update(Request $request)
    {
        $student = Students::find($request->id);

        $student->name = $request->name;
        $student->student_id = $request->student_id;
        $student->created_ata = $request->created_ata;

        $student->update();
        return response([
            "message"=>"Updated Succesfully"
        ]);
    }

    // used to delete students by id
    public function destroy($id){
        $user = Students::find($id);
        if ($user == null){
            return response([
                "message"=>"Record not found"
            ],404);
        }
        else{
            $user->delete();
            return response([
                "message"=>"Deleted succesfully!"
            ],200);
        }
    }
}
