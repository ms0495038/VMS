<?php
namespace App\Http\Controllers;

use DB;
use App\User;
use App\Users;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class EditProfileController extends Controller
{
    /**
     * 顯示給定使用者的個人資料。
     *
     * @param  int  $id
     * @return Response
     */
    public function showProfile($id)
    {

        //database information is in .env file
        $user = Users::all()
                ->where('id', (int)$id)
                ->first();
                
        $username = $user->full_name;
        $sex = $user->gender;
        $birthdate = $user->birth_date;
        $email = $user->email;
        $cellphone = $user->phone;
        
        
        
        return view('editprofile', ['id'=> $id,
                                'username'=> $username,
                                'sex'=> $sex,
                                'birthdate'=> $birthdate,
                                'email'=> $email,
                                'cellphone'=> $cellphone]);
    }
    public function editProfile(Request $request)
    {
        $id = $request->input('id');
        $username = $request->input('username');
        $sex = $request->input('sex');
        $birthdate = $request->input('birthdate');
        $email = $request->input('email');
        $cellphone = $request->input('cellphone');
        
        
        //use ORM to connect DB
        $user = Users::find($id);
        $user->full_name = $username;
        $user->gender = $sex;
        $user->birth_date = $birthdate;
        $user->email = $email;
        $user->phone = $cellphone;
        $user->save();
        
        
        return redirect('user/'.$id);
    }
}
