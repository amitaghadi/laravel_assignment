<?php

namespace App\Http\Controllers;
use DB;
use Validator;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Userdetails;
use App\AvoCareer;
class Resume extends Controller
{
    protected $userdetails;   
	public function index()
	{ 

	    $user_id = (isset($_REQUEST['user_id'])) ? $_REQUEST['user_id'] : '';
	    $selected_users = '';// $this->userdetails->get_user_list();
	    if( $user_id != ''){
	    	$selected_users = Userdetails::get_user_list($user_id);// $this->userdetails->get_user_list();
	    }	     
	    $users = Userdetails::get_user_list();// $this->userdetails->get_user_list();
	    
	    return view('resume.index', ['users' => $users,'selected_users'=>$selected_users]);
	}

    public function insert(Request $request)
    {   
    	$this->validate($request, [
	        'name' => 'required',
	        'email_id' => 'required|email',
	        'company' => 'required',
	        'qualification' => 'required',
	        'hobbies' => 'required',
			'resume' => 'required | mimes:doc,pdf,docx | max:5120', //max file size is 5 mb 
        ]);
		 
        $file = $request->file('resume');
        //Move Uploaded File
        $destinationPath = 'uploads';
        $fileName = date("Ymdhis").$file->getClientOriginalName();
        $file->move($destinationPath,$fileName);
        $file_url = asset('uploads/'.$fileName);

        $_POST['resume_path'] =  $file_url;
        // $_POST['resume_path'] = base_path() . '/public/uploads/'. $fileName;//$_FILES['resume_path']['name'];

        $id = Userdetails::insert_user_list($_POST);
        return redirect("/resume");
        return back()->with('success', 'You have just created one item');
    }

    public function update(Request $request)
    {
       if($request->file('resume')!=''){
            $file = $request->file('resume');       
            //Move Uploaded File
            $destinationPath = 'uploads';
            $fileName = date("Ymdhis").$file->getClientOriginalName();
            $file->move($destinationPath,$fileName);
            $file_url = asset('uploads/'.$fileName);
            $_POST['resume_path'] =  $file_url; 
        }
        $id = Userdetails::update_user_list($_POST);
       return redirect("/resume");        
    }  
    public function delete()
    {
         $id = Userdetails::delete_user_list($_REQUEST);
        return redirect("/resume");
    }

    
    


}