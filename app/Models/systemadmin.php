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
        return DB::table('users')->orderBy('created_at','desc')->get();
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
            'department_id' => null,
            'user_status' => 1,
            'default_password_status' => 0,
        ]);
    }
    
  
}
