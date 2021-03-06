<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Hash;

class employee extends Model
{
    protected $table = 'employee'; 
    protected $fillable = ['id', 'first_name', 'last_name' ,'password'];
    public $timestamps = false;

    public function getEmployees()
    {
        $employee = new employee();
        return $employee->all();
    }  

    public function getEmployeeById($id)
    {
       $employee = employee::find($id);
       return $employee;
    
    }  

    public function checkPassword($id, $pw)
    {
       $hashedPassword = employee::find($id)->password;

		if (Hash::check($pw, $hashedPassword)) 
			return true;
		else
			return false;
    }
}
