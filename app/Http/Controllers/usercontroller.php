<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Auth;
use Hash;

class usercontroller extends Controller
{
    public function userdetails()
    {
        $all_users = User::where('active_status', '1')->get();

        return view('admin.user_details')->with('all_users', $all_users);
    }

    public function update_user_profile(Request $request)
    {
        $pro_email = $request->email;
        $pro_add = $request->pro_add;
        $pro_city = $request->pro_city;
        $id = $request->id;

        $errors=[ 
            'email.required'=> 'Email address is Required.',
            'pro_add.required'=> 'Address is Required.',
            'pro_city.required'=> 'City is Required.',
            'pro_email.unique'=> 'Email address has already been taken.',
            ];

        $this->validate($request, [
        'email' => 'required|email',
        'pro_add' => 'required|string',
        'pro_city' => 'required|string',
        ],$errors);

        $find_user = User::find($id);
        $find_user_mail = $find_user->email;

        if ($find_user_mail != $pro_email) 
        {
            $this->validate($request, [
                'email' => 'unique:users',
            ],$errors);
        }

        $find_user->email = $pro_email;
        $find_user->Address = $pro_add;
        $find_user->city = $pro_city;
        $find_user->update();

        return response()->json(['success'=>'Database update successfully..!']);
    }

    public function update_user_password(Request $request)
    {
        $id = $request->id_pass_id;
        $password = $request->password;
        $new_pass = $request->new_pass;
        $confirm_pass = $request->confirm_pass;

        $errors=[ 
            'password.required'=> 'Current password is Required.',
            'new_pass.required'=> 'New Password is Required.',
            'confirm_pass.required'=> 'Confirm Password is Required.',
            ];

        $this->validate($request, [
        'password' => 'required',
        'new_pass' => 'required',
        'confirm_pass' => 'required',
        ],$errors);

        if (Auth::attempt(['id' => $id, 'password' => $password]))
        {}
        else
        {
            return response()->json(['errors'=>'Current password invalid..!', 'password' => $id]);
        }

        if ($new_pass != $confirm_pass) 
        {
            return response()->json(['errors'=>'Two Password Combination..!']);
        }

        $password = Hash::make($new_pass);
        $find_user = User::find($id);
        $find_user->password = $password;
        $find_user->update();
        


        return response()->json(['success'=>'Password change successfully..!']);

    }

    public function find_user_details(Request $request)
    {
        $id = $request->id;
        $find_user = User::find($id);
        return response()->json(['success'=>'User details find success..!', 'find_user' => $find_user]);
    }

    public function update_user_details(Request $request)
    {
        $id = $request->userid;
        $f_name = $request->f_name;
        $l_name = $request->l_name;
        $user_gender = $request->user_gender;
        $user_dob = $request->user_dob;
        $user_email = $request->email;
        $user_add = $request->user_add;
        $user_city = $request->user_city;
        $user_permission = $request->user_permission;


        $errors=[
            'f_name.required'=> 'First Name is required.',
            'l_name.required'=> 'Last Name is required.',
            'user_gender.required'=> 'Gender is required.',
            'user_dob.required'=> 'Date of birth is required.',
            'email.required'=> 'Email address is required.',
            'user_add.required'=> 'Address is required.',
            'user_city.required'=> 'City is required.',
            'email.unique'=> 'Email address has already been taken.',
            ];

        $this->validate($request, [
        'f_name' => 'required|string',
        'l_name' => 'required|string',
        'user_gender' => 'required|string',
        'user_dob' => 'required',
        'email' => 'required|email',
        'user_add' => 'required|string',
        'user_city' => 'required|string',
        ],$errors);

        $find_user = User::find($id);
        $find_user_mail = $find_user->email;

        if ($find_user_mail != $user_email) 
        {
            $this->validate($request, [
                'email' => 'unique:users',
            ],$errors);
        }
        
        $fullname = $f_name." ".$l_name;

        $find_user->fname = $f_name;
        $find_user->lname = $l_name;
        $find_user->fullname = $fullname;
        $find_user->gender = $user_gender;
        $find_user->DOB = $user_dob;
        $find_user->Address = $user_add;
        $find_user->city = $user_city;
        $find_user->email = $user_email;
        $find_user->premission_type = $user_permission;
        $find_user->update();

        return response()->json(['success'=>'User details update successfully..!']);
    }

    public function remove_user(Request $request)
    {
        $id = $request->id;
        $find_user = User::find($id);
        $find_user->active_status = 0;
        $find_user->update();

        return response()->json(['success'=>'User remove successfully..!']);
    }
}
