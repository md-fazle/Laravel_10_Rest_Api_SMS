<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Student;

class StudentController extends Controller
{
    public function index(){
        $students = Student::all();
        if($students->count()>0){
            return response()->json([
                'status' => 200,
                'students' => $students
            ],200);
        }else{
            return response()->json([
                'status' =>404,
                'massage' => "No Record Found"
            ],404);
        }

    }

    public function store(Request $request){
          $validator = Validator::make($request->all(),[
            'Student_id'=>'required|string|max:100',
            'Name'=>'required|string|max:100',
            'Age'=>'required|string|max:100',
            'Birth_Date'=>'required|string|max:100',
            'Phone'=>'required|digits:11',
            'Email'=>'required|email|max:100',
            'Father'=>'required|string|max:100',
            'Mother'=>'required|string|max:100',
            'Father_Num'=>'required|string|max:100',
            'Address'=>'required|string|max:100',
            'CGPA'=>'required|string|max:100',
          ]);

          if($validator->fails()){
            return response()->json([
                'status' => 422,
                'errors' => $validator->messages()
            ],422);
          }else{

            $student = Student::create([
                'Student_id'=>$request->Student_id,
                'Name'=>$request->Name,
                'Age'=>$request->Age,
                'Birth_Date'=>$request->Birth_Date,
                'Phone'=>$request->Phone,
                'Email'=>$request->Email,
                'Father'=>$request->Father,
                'Mother'=>$request->Mother,
                'Father_Num'=>$request->Father_Num,
                'Address'=>$request->Address,
                'CGPA'=>$request->CGPA,
            ]);

            if($student){
                return response()->json([
                   'status' => 200,
                   'message' => "Student Created Successfull"
                ],200);

            }else{
                return response()->json([
                    'status' => 500,
                    'message' => "Somthing went Wrong"
                 ],500);

            }

          }
    }

    public function show($id){
        $student = Student::find($id);

        if($student){
            return response()->json([
                'status' => 200,
                'student' => $student
             ],200);

        }else{
            return response()->json([
               'status' => 405,
               'message' => "No Such Students Found!"
            ],405);
        }
    }

    public function edit($id){
        $student = Student::find($id);

        if($student){
            return response()->json([
                'status' => 200,
                'student' => $student
             ],200);

        }else{
            return response()->json([
               'status' => 405,
               'message' => "No Such Students Found!"
            ],405);
        }
    }


    public function update(Request $request, int $id){
        $validator = Validator::make($request->all(),[
            'Student_id'=>'required|string|max:100',
            'Name'=>'required|string|max:100',
            'Age'=>'required|string|max:100',
            'Birth_Date'=>'required|string|max:100',
            'Phone'=>'required|digits:11',
            'Email'=>'required|email|max:100',
            'Father'=>'required|string|max:100',
            'Mother'=>'required|string|max:100',
            'Father_Num'=>'required|string|max:100',
            'Address'=>'required|string|max:100',
            'CGPA'=>'required|string|max:100',
          ]);

          if($validator->fails()){
            return response()->json([
                'status' => 422,
                'errors' => $validator->messages()
            ],422);
          }else{

            $student = Student::find($id);

            if($student){
                $student -> update([
                    'Student_id'=>$request->Student_id,
                    'Name'=>$request->Name,
                    'Age'=>$request->Age,
                    'Birth_Date'=>$request->Birth_Date,
                    'Phone'=>$request->Phone,
                    'Email'=>$request->Email,
                    'Father'=>$request->Father,
                    'Mother'=>$request->Mother,
                    'Father_Num'=>$request->Father_Num,
                    'Address'=>$request->Address,
                    'CGPA'=>$request->CGPA,
                ]);
                return response()->json([
                   'status' => 200,
                   'message' => "Student updated Successfull"
                ],200);

            }else{
                return response()->json([
                    'status' => 404,
                    'message' => "No Such Student Found!"
                 ],404);

            }

          }
    }

    public function destroy($id){
       $student = Student::find($id);
       if($student){
        $student->delete();
        return response()->json([
            'status' => 200,
            'message' => "Student Deleted Successfull"
         ],200);
       }else{
        return response()->json([
            'status' => 404,
            'message' => "No Such Student Found!"
         ],404);
       }
    }


}
