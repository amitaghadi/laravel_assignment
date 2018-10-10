<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


use DB;

class Userdetails extends Model
{
	public static function get_user_list($user_id=''){
		if($user_id!=''){
			// $users = DB::select('select * from user_master where id=? and status=?',[$user_id,'active']); 
			$users = DB::table('user_master')
                    ->where('id', '=', $user_id)
                    ->Where('status','=', 'active')
                    ->get();
            
		}else{
			// $users = DB::select('select * from user_master'); 
			$users = DB::table('user_master')
                    ->where('status', '=', 'active')                    
                    ->get();
             	
		}		
	    return $users;
	}

	public static function insert_user_list($input){
		$data = array();
		foreach ($input as $key => $val) {
			if($key!='_token'){
				$data[$key] = $val; 
			}
		}
		$id = DB::table('user_master')->insert($data);
	    return $id;
	}
	public static function delete_user_list($input){
		$data = array();		 
		$id = DB::table('user_master')
			->where('id', $input['user_id'])
            ->update(['status' => 'disabled']);
	    return $id;
	}
	public static function update_user_list($input){
		$data = array();
		foreach ($input as $key => $val) {
			if($key!='_token' && $key!='user_id' ){
				$data[$key] = $val; 
			}
		}		 
		$id = DB::table('user_master')
			->where('id', $input['user_id'])
            ->update($data);
	    return $id;
	}

}
