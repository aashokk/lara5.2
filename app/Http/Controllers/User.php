<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Users;
use Illuminate\Support\MessageBag;
use Validator;
use Session;
use DB;

class User extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    
    public function register(){
        
        
        return view('user.register');
    }
    
    public function create_user(Request $request){
        
        $rules = array(
            'username' => 'required',
            'email'    => 'required',
            'password' => 'required'            
        );
        /*
         * $validateDate = $this->validate($request, [
            'username' => 'required',
            'email'    => 'required',
            'password' => 'required'
        ],
        [
            'username.required' => 'This username is required'
        ]
        );
         */
        $validator = Validator::make($request->all(), $rules);
        if(empty($validator->getMessageBag()->count())){
            $check_user = $this->check_user($request->all());
            if(!empty($check_user)){
                $insert = Users::create(['name'=> $request->input('username'), 'email' => $request->input('email'), 'password' => $request->input('password')]);
                echo $insert;
            } else {
                $validator->getMessageBag()->add('exists_user', 'This user already exists!');
            } 
        }       
        return redirect('user_registration')->withErrors($validator);
        //Users::create(['name'=> $request->input('username'), 'email' => $request->input('email'), 'password' => $request->input('password')]);
    }
    
    public function check_user($user_details){
        $get_user = Users::where('name', $user_details['username'])->take(1)->get()->toArray();
        if(count($get_user)){
            return $get_user    ;
        } 
        return array();
    }
    
    public function get_user($id){
        $get_user = Users::where('id', $id)->take(1)->get()->toArray();
        if(count($get_user)){
            return $get_user;
        } 
        return array();
    }
    
    public function user_login(Request $request){
        $rule = array(
            'username'  =>  'required',
            'password'  =>  'required'
        );
        $validator = Validator::make($request->all(), $rule);
        if(empty($validator->getMessageBag()->count())){
            $user_details = $this->check_user($request->all());
            if(!empty($user_details)){
                Session::put(array('username' => $user_details[0]['name'], 'email' => $user_details[0]['email']));
                if(Session::get('username')){
                    return redirect('user_dashboard');
                }
            } else {
                $validator->getMessageBag()->add('exists_user', 'Invalid credentials');
            }
        } 
        
        if($validator->getMessageBag()->count()){
            return redirect('user_login')->withErrors($validator);
        }
    }
    
    public function user_list(){
        $user_details = DB::table('users')->get();
        return view('user.list', compact('user_details'));
    }
    
    public function user_update($id){
        $user_detail = $this->get_user($id);
        if(!empty($user_detail)){
            return view('user.update', compact('user_detail'));
        }
    }
    
    public function update_user(Request $request, $id){
         $rules = array(
            'username' => 'required',
            'email'    => 'required',
            'password' => 'required'            
        );
        /*
         * $validateDate = $this->validate($request, [
            'username' => 'required',
            'email'    => 'required',
            'password' => 'required'
        ],
        [
            'username.required' => 'This username is required'
        ]
        );
         */
        $validator = Validator::make($request->all(), $rules);
        if(empty($validator->getMessageBag()->count())){
            
            $user = Users::find($id);
            $user->email = $request->input('email');
            $user->name = $request->input('username');
            $user->password = $request->input('password');
            $update_user = $user->save();
            
            //$update_user = Users::where('id', $id)->update(array('name' => $request->input('username'), 'email' => $request->input('email'), 'password' => $request->input('password')));
            if($update_user){
                return redirect('user_list');
            } else {
                echo 'something went wrong';
            }
             
        }
    }
    
    public function delete_user($id){
        $user = Users::find($id);
        $user->delete();
        return redirect('user_list');
    }
}
