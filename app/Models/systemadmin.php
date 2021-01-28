<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class systemadmin extends Model
{
    use HasFactory;

    public function getAllUsers()
    {
        return DB::table('users')
                ->leftJoin('roles','users.role_id','roles.id')
                ->leftJoin('departments','users.department_id','departments.id')
                ->select('users.*','roles.role_name','departments.department_name')
                ->orderBy('created_at','desc')->get();
    }

    public function getUserAccountDetails($id){
        return DB::table('users')
                ->where('id',$id)
                ->get();
    }

    public function getSubdivisionsByType(string $subdivision)
    {
        if($subdivision == 'regions'){

            return DB::table($subdivision)->get();
        }
        else if($subdivision == 'districts'){
            return DB::table('districts')
                    ->leftJoin('regions','districts.region_id','regions.id')
                    ->select('districts.id','districts.district_name','districts.region_id','regions.region_name','districts.created_at')
                    ->get();
        }
        else {
            return DB::table('towns_villages')
                    ->leftJoin('districts','towns_villages.district_id','districts.id')
                    ->select('towns_villages.id','towns_villages.town_or_village_name','towns_villages.district_id','districts.district_name',
                    'towns_villages.created_at')
                    ->get();
        }
    }

    public function getRoles()
    {
        return DB::table('roles')->select('id','role_name')->orderBy('created_at','desc')->get();
    }

    public function getDepartments()
    {
        return DB::table('departments')->orderBy('created_at','desc')->get();
    }

    
    public function createSubdivisionByType(array $data){
        if($data['subdivisionType'] == 'regions'){
            DB::table('regions')->insert([
                'region_name' => $data['subdivisionName'],
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);
        }
        else if($data['subdivisionType'] == 'districts'){
            DB::table('districts')->insert([
                'district_name' => $data['subdivisionName'],
                'region_id' => $data['region'],
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);
        }
        else{
            DB::table('towns_villages')->insert([
                'town_or_village_name' => $data['subdivisionName'],
                'district_id' => $data['district'],
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]); 
        }
       
    }

    public function updateSubdivisionByType(string $id, array $data){
        if($data['subdivisionType'] == 'regions'){
            DB::table('regions')->where('id',$id)
            ->update([
                'region_name' => $data['subdivisionName'],
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);
        }
        else if($data['subdivisionType'] == 'districts'){
            DB::table('districts')->where('id',$id)
            ->update([
                'district_name' => $data['subdivisionName'],
                'region_id' => $data['region'],
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);
        }
        else{
            DB::table('towns_villages')->where('id',$id)
            ->update([
                'town_or_village_name' => $data['subdivisionName'],
                'district_id' => $data['district'],
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]); 
        }
    }

    public function createUser($data)
    {
        $data = json_decode($data);
        User::create([
            'username' => $data->username,
            'email' => $data->email,
            'password' => Hash::make($data->password),
            'first_name' => $data->first_name,
            'middle_name' => $data->middle_name ?? null,
            'last_name' => $data->last_name,
            'full_name' => $data->first_name.' '.$data->middle_name.' '.$data->last_name ?? $data->first_name.' '.$data->last_name,
            'phone_number' => $data->phone_number,
            'address' => $data->address,
            'role_id' => 1,
            'department_id' => $data->department,
            'user_status' => 1,
            'default_password_status' => 0,
        ]);
    }
    
    public function createDepartment($data)
    {
        $data = json_decode($data);

        DB::table('departments')->insert([
            'department_name' => $data->departmentName,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
    }

    // change user account status

    public function changeAccountStatus($id,$status){
        DB::table('users')->where('id',$id)
            ->update([
                'user_status' => $status,
                'updated_at' => Carbon::now(),
            ]); 
    }

    public function updateUser($id, $data, $passwordUpdateStatus){
        $data = json_decode($data);
        if($passwordUpdateStatus == 1){
            DB::table('users')->where('id',$id)
            ->update([
                'username' => $data->username,
                'email' => $data->email,
                'password' => Hash::make($data->password),
                'first_name' => $data->first_name,
                'middle_name' => $data->middle_name ?? null,
                'last_name' => $data->last_name,
                'full_name' => $data->first_name.' '.$data->middle_name.' '.$data->last_name ?? $data->first_name.' '.$data->last_name,
                'phone_number' => $data->phone_number,
                'address' => $data->address,
                'role_id' => $data->role,
                'department_id' => $data->department,
                'user_status' => 1,
                'default_password_status' => 0,
                'updated_at' => Carbon::now(), 
            ]);
        }else{
            DB::table('users')->where('id',$id)
            ->update([
                'username' => $data->username,
                'email' => $data->email,
                'first_name' => $data->first_name,
                'middle_name' => $data->middle_name ?? null,
                'last_name' => $data->last_name,
                'full_name' => $data->first_name.' '.$data->middle_name.' '.$data->last_name ?? $data->first_name.' '.$data->last_name,
                'phone_number' => $data->phone_number,
                'address' => $data->address,
                'role_id' => $data->role,
                'department_id' => $data->department,
                'user_status' => 1,
                'default_password_status' => 0, 
                'updated_at' => Carbon::now(),
            ]);
        }
       
    }

    public function updateDepartment($deptId,$data){
        DB::table('departments')->where('id',$deptId)
            ->update([
                'department_name' =>json_decode($data)->departmentName,
                'updated_at' => Carbon::now()
            ]);
    }
  
}
