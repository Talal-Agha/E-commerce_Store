<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;


class AdminController extends Controller
{
    public function index(){
		
    	 return view('layouts.admin.index');
    }
    public function login(){ 
            $this->validate(request(),[
        'password' => 'required|min:8',
        'email' => 'required|email|min:10'
]);


if(auth()->guard('nonAdldap')->attempt(['email'=>request('email'),'password'=>request('password'),
	'privilege'=>'admin']) == FALSE) {
     return back()->withErrors([
  'message'=>'Please Chk your Credentials and try again.'
     	]);
   }
 return redirect()->route('adminMainProducts');
     return back()->withErrors([
  'message'=>'Please Fill Both Fields'
        ]);
    }

    public function destroy(){
        auth()->guard('nonAdldap')->logout();
        return redirect()->route('adminlogin');
    }

        public function indexUser(){
       return view('layouts.admin.adduser');
    }

public function showAll(){

    $user = User::where('privilege','admin')->get();
    return view('layouts.admin.user',compact('user'));
}
    public function addNewUser(){

return view('layouts.admin.adduser');
    }
    public function addUser(){
        $this->validate(request(),[
        'name' => 'required|min:5',
        'email' => 'required|email|min:10',
        'password' => 'required|confirmed|min:8'
]);
        $chk = User::where('email','=',request('email'))->count();
        if($chk){
        Session()->flash('error', "Email Already Exist");
        return back();
        }
 $user = User::create([
'name'=>request('name'),
'username'=>request('name'),
'email'=>request('email'),
'password'=>bcrypt(request('password')),
'privilege'=>"admin"
]);
if($user){
     Session()->flash('message', "User ".request('email')." Sucessfully Added");
    return back();
}
     Session()->flash('error', "User ".request('email')." Not Sucessfully Added");
    return back();
    }
        public function editUser($email,$privilage){
            if($email == null && $privilage == null){
               return 0;
            }

 $user = User::where('email','=',$email)->where('privilege','=',$privilage)->get()->first();

return view('layouts.admin.editUser',compact('user'));
    }
    public function generalInfo(){
         $this->validate(request(),[
        'name' => 'required|min:5',
        'email' => 'required|email|min:10',
        'privilege'=>'required|min:4'
]);
         $user = User::where('email','=',request('email'))->where('privilege','=',request('privilege'))->update([
         'name'=>request('name')
         ]);
    if($user){
    Session()->flash('message', "User ".request('email')." Info Sucessfully Updated");
    return redirect('/myadmin/users');
         }
    Session()->flash('error', "User ".request('email')." Info Not Sucessfully Updated");
    return back();
    }
        public function password(){
         $this->validate(request(),[
        'email' => 'required|email|min:10',
        'privilege'=>'required|min:4',
        'password' => 'required|confirmed|min:8'
]);
  if(auth()->guard('nonAdldap')->user()->email == request('email')){
    Session()->flash('error', "Change Password of this Account from Another Account");
    return back();
         }
         $user = User::where('email','=',request('email'))->where('privilege','=',request('privilege'))->update([
         'password'=>bcrypt(request('password'))
         ]);
        if($user){
            Session()->flash('message', "User ".request('email')." Password Sucessfully Updated");
    return redirect('/myadmin/users');
         }
         Session()->flash('error', "User ".request('email')." Password Not Sucessfully Updated");
    return back();
    }
     public function deleteuser(){
         $this->validate(request(),[
        'email' => 'required|email|min:10',
        'privilege'=>'required|min:4',
]);
         if( auth()->guard('nonAdldap')->user()->email == request('email')){
    Session()->flash('error', "Delete this Account From Another Account");
    return back();
         }
         $user = User::where('email','=',request('email'))->where('privilege','=',request('privilege'))->delete();
         if($user){
            Session()->flash('message', "User ".request('email')." Sucessfully Deleted");
    return redirect('/myadmin/users');
         }
         Session()->flash('error', "User ".request('email')." Not Sucessfully Deleted");
    return back();
    }
}
