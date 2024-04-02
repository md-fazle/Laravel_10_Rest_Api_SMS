<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;
    protected $table = "students";
    protected $fillable =['Student_id','Name','Age','Birth_Date','Phone','Email','Father','Mother','Father_Num','Address','CGPA'];

}
