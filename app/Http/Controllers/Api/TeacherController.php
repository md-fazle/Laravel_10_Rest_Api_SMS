<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Teacher;
class TeacherController extends Controller
{
    public function index(){
        $teachers = Teacher::all();
        if($teachers->count()>0){
            return response()->json([
                'status' => 200,
                'teachers' => $teachers
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
            'Teacher_id'=>'required|string|max:100',
            'Name'=>'required|string|max:100',
            'Age'=>'required|string|max:100',
            'Birth_Date'=>'required|string|max:100',
            'Phone'=>'required|digits:11',
            'Email'=>'required|email|max:100',
            'Gander'=>'required|string|max:100',
            'Department'=>'required|string|max:100',
            'Possession'=>'required|string|max:100',
            'Address'=>'required|string|max:100',
            'Salary'=>'required|string|max:100',
          ]);

          if($validator->fails()){
            return response()->json([
                'status' => 422,
                'errors' => $validator->messages()
            ],422);
          }else{

            $teacher = Teacher::create([
                'Teacher_id'=>$request->Teacher_id,
                'Name'=>$request->Name,
                'Age'=>$request->Age,
                'Birth_Date'=>$request->Birth_Date,
                'Phone'=>$request->Phone,
                'Email'=>$request->Email,
                'Gander'=>$request->Gander,
                'Department'=>$request->Department,
                'Possession'=>$request->Possession,
                'Address'=>$request->Address,
                'Salary'=>$request->Salary,
            ]);

            if($teacher){
                return response()->json([
                   'status' => 200,
                   'message' => "teacher Created Successfull"
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
        $teacher = Teacher::find($id);

        if($teacher){
            return response()->json([
                'status' => 200,
                'teacher' => $teacher
             ],200);

        }else{
            return response()->json([
               'status' => 405,
               'message' => "No Such teachers Found!"
            ],405);
        }
    }

    public function edit($id){
        $teacher = Teacher::find($id);

        if($teacher){
            return response()->json([
                'status' => 200,
                'teacher' => $teacher
             ],200);

        }else{
            return response()->json([
               'status' => 405,
               'message' => "No Such teachers Found!"
            ],405);
        }
    }


    public function update(Request $request, int $id){
        $validator = Validator::make($request->all(),[
            'Teacher_id'=>'required|string|max:100',
            'Name'=>'required|string|max:100',
            'Age'=>'required|string|max:100',
            'Birth_Date'=>'required|string|max:100',
            'Phone'=>'required|digits:11',
            'Email'=>'required|email|max:100',
            'Gander'=>'required|string|max:100',
            'Department'=>'required|string|max:100',
            'Possession'=>'required|string|max:100',
            'Address'=>'required|string|max:100',
            'Salary'=>'required|string|max:100',
          ]);

          if($validator->fails()){
            return response()->json([
                'status' => 422,
                'errors' => $validator->messages()
            ],422);
          }else{

            $teacher = Teacher::find($id);

            if($teacher){
                $teacher -> update([
                    'Teacher_id'=>$request->Teacher_id,
                    'Name'=>$request->Name,
                    'Age'=>$request->Age,
                    'Birth_Date'=>$request->Birth_Date,
                    'Phone'=>$request->Phone,
                    'Email'=>$request->Email,
                    'Gander'=>$request->Gander,
                    'Department'=>$request->Department,
                    'Possession'=>$request->Possession,
                    'Address'=>$request->Address,
                    'Salary'=>$request->Salary,
                ]);
                return response()->json([
                   'status' => 200,
                   'message' => "teacher updated Successfull"
                ],200);

            }else{
                return response()->json([
                    'status' => 404,
                    'message' => "No Such teacher Found!"
                 ],404);

            }

          }
    }

    public function destroy($id){
       $teacher = Teacher::find($id);
       if($teacher){
        $teacher->delete();
        return response()->json([
            'status' => 200,
            'message' => "teacher Deleted Successfull"
         ],200);
       }else{
        return response()->json([
            'status' => 404,
            'message' => "No Such teacher Found!"
         ],404);
       }
    }

}
