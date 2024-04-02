<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    use HasFactory;
    protected $table = "teachers";
    protected $fillable =['Teacher_id','Name','Age','Birth_Date','Phone','Email','Gander','Department','Possession','Address','Salary'];
}
