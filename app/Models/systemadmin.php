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
        return  User::with('roles');
        // return DB::table('users')
        //         ->joinSub('select roles.* from roles inner join users_roles on roles.id = users_roles.role_id','roles','users.id','users_roles.user_id')
        //         ->leftJoin('directorates','users.directorate_id','directorates.id')
        //         ->leftJoin('designations','users.designation_id','designations.id')
        //         ->leftJoin('units','users.unit_id','units.id')
        //         ->select('users.*','roles.*','directorates.directorate_name','designations.designation_name','units.name')
        //         ->orderBy('created_at','desc')->get();
        // return DB::table('users')
        //         ->join('users_roles','users.id','users_roles.user_id')
        //         ->join('roles','users_roles.role_id','roles.id')
        //         ->leftJoin('directorates','users.directorate_id','directorates.id')
        //         ->leftJoin('designations','users.designation_id','designations.id')
        //         ->leftJoin('units','users.unit_id','units.id')
        //         ->select('users.*','roles.name','directorates.directorate_name','designations.designation_name','units.name')
        //         ->orderBy('created_at','desc')->get();
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
        return DB::table('roles')->select('id','name','created_at')->orderBy('created_at','desc')->get();
    }

    public function getDirectorates()
    {
        return DB::table('directorates')->orderBy('created_at','desc')->get();
    }

    public function getUnits()
    {
        return DB::table('units')
                ->leftJoin('directorates','units.directorate_id','directorates.id')
                ->select('units.*','directorates.directorate_name')
                ->orderBy('created_at','desc')->get();
    }

    public function getUnitsByDirectorate($directorate){
        return DB::table('units')
        ->leftJoin('directorates','units.directorate_id','directorates.id')
        ->select('units.*','directorates.directorate_name')
        ->orderBy('created_at','desc')
        ->where('units.directorate_id',$directorate)
        ->get();
    }

    public function getDesignations()
    {
        return DB::table('designations')->orderBy('created_at','desc')->get();
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
            'role_id' => $data->role,
            'directorate_id' => $data->directorate,
            'unit_id' => $data->unit,
            'designation_id' => $data->designation,
            'user_status' => 1,
            'default_password_status' => 0,
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
                'directorate_id' => $data->directorate,
                'unit_id' => $data->unit,
                'designation_id' => $data->designation,
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
                'directorate_id' => $data->directorate,
                'unit_id' => $data->unit,
                'designation_id' => $data->designation,
                'user_status' => 1,
                'default_password_status' => 0, 
                'updated_at' => Carbon::now(),
            ]);
        }
       
    }

    // change user account status

    public function changeAccountStatus($id,$status){
        DB::table('users')->where('id',$id)
            ->update([
                'user_status' => $status,
                'updated_at' => Carbon::now(),
            ]); 
    }
    
    public function createDirectorate($data)
    {
        $data = json_decode($data);

        DB::table('directorates')->insert([
            'directorate_name' => $data->directorateName,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
    }

    public function updateDirectorate($deptId,$data){
        DB::table('directorates')->where('id',$deptId)
            ->update([
                'directorate_name' =>json_decode($data)->directorateName,
                'updated_at' => Carbon::now()
            ]);
    }

    public function createDesignation($data)
    {
        $data = json_decode($data);

        DB::table('designations')->insert([
            'designation_name' => $data->designationName,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
    }

    public function updateDesignation($designationId,$data){
        DB::table('designations')->where('id',$designationId)
            ->update([
                'designation_name' =>json_decode($data)->designationName,
                'updated_at' => Carbon::now()
            ]);
    }

    public function addUnits($units){
        if(count($units['unit']) == 1){
            DB::table('units')->insert([
                'name' => $units['unit'][0],
                'directorate_id' => $units['directorate']
            ]);
        } else{
            foreach ($units['unit'] as $key => $value) {
                DB::table('units')->insert([
                    'name' => $units['unit'][$key],
                    'directorate_id' => $units['directorate']
                ]);
            }

        }
    }

    public function updateUnit($unitId, $data){
        DB::table('units')->where('id',$unitId)
        ->update([
            'name' => $data['unitName'],
            'directorate_id' => $data['directorate'],
            'updated_at' => Carbon::now(),
        ]);
    }

  
}
