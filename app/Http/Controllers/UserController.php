<?php

namespace App\Http\Controllers;

use App\User;
use App\AssignSubject;
use Validator;
use Illuminate\Http\Request;
use App\Http\Requests;
use Yajra\Datatables\Datatables;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    public function __construct(){
        $this->middleware('auth:admin');
    }
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $nav = array();
        $nav['navUserProfile'] = " active ";
        return view('admin.user.index',$nav);
    }


    public function get_user(){

        return Datatables::of(User::query()
        ->orderBy('created_at', 'DESC'))
        ->addIndexColumn()
        ->addColumn('actions',function($row){
            $html = '<a href="'.route('admin.user.edit',$row->id).'" class="btn btn-round btn-info btn-outline-info btn-mini">Edit</a> ';
            $html .= '<button class="btn btn-round btn-danger btn-outline-danger btn-delete btn-mini" data-remote="'.route('admin.user.destroy',$row->id).'">Delete</button>';
            return $html;
        })->editColumn('status',function($row){
             if($row->status == "active"){
                $status_data ='<button class="btn btn-round btn-success btn-change-status btn-outline-success btn-mini" data-remote="'.route('admin.user.status.edit',$row->id).'">'.$row->status.'</button>';
            }else{
                $status_data = '<button class="btn btn-round btn-danger btn-change-status btn-outline-danger btn-mini" data-remote="'.route('admin.user.status.edit',$row->id).'">'.$row->status.'</button>';
            }
            return $status_data;
        })->editColumn('created_at',function($row){
            return date('d/m/Y', strtotime($row->created_at));
        })->rawColumns(['status','actions'])->make(true);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $nav = array();
        $nav['navUserProfile'] = " active ";
        return view('admin.user.create',$nav);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $validator = Validator::make($request->all(),[
            'name' => 'required',
            'email' => 'required|unique:users',
            'mobile' => 'required|numeric|min:1111111111|max:9999999999',
            'status' => 'required',
            'password' => 'required|confirmed',
            'profile_photo' => 'nullable|max:2048|mimes:jpg,jpeg,png'
        ]);

        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $medianame = "no-img.jpg";

        $params = array();
        $params['name'] = $request->name;
        $params['profile_photo'] = $medianame;
        
        if($request->hasFile('profile_photo')){
            $medianame = str_slug($request->name).'_'.str_random(10).'.'.$request->profile_photo->getClientOriginalExtension();
            $request->profile_photo->move(public_path('storage/images/profile/'),$medianame);
            $medianame = 'storage/images/profile/'.$medianame;
            $params['profile_photo'] = $medianame;
        }

        $params['email']=$request->email;
        $params['mobile']=$request->mobile;
        if(isset($request->dob))
            $params['dob']=$request->dob;
        $params['password']=bcrypt($request->password);
        $params['status']=$request->status;

        $user = User::create($params);

        if($user)
        {
            toastr()->success('User has been added successfully!!!');
            $nav = array();
            $nav['navUserProfile'] = " active ";
            return redirect()->route('admin.user.index')->with($nav);
        }else{
            toastr()->error('Data Add In Error!');
            $nav = array();
            $nav['navUserProfile'] = " active ";
            return redirect()->route('admin.user.index')->with($nav);
        }

    }

    
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $nav = array();
        $nav['navUserProfile'] = " active ";
        $nav['user'] = User::find($id);
        return view('admin.user.edit')->with($nav);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);

        $validator = Validator::make($request->all(),[
            'name' => 'required',
            'email' => 'required',
            'mobile' => 'required|numeric|min:1111111111|max:9999999999',
            'status' => 'required',
            'profile_photo' => 'nullable|max:2048|mimes:jpg,jpeg,png'
        ]);

        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $medianame = "no-img.jpg";

        $params = array();
        $params['name'] = $request->name;
        
        if($request->hasFile('profile_photo')){

            if($user->profile_photo != $medianame && file_exists(public_path($user->profile_photo))){
                unlink(public_path('/').$user->profile_photo);
            }

            $medianame = str_slug($request->name).'_'.str_random(10).'.'.$request->profile_photo->getClientOriginalExtension();
            $request->profile_photo->move(public_path('storage/images/profile/'),$medianame);
            $medianame = 'storage/images/profile/'.$medianame;
            $params['profile_photo'] = $medianame;
        }

        $params['email']=$request->email;
        $params['mobile']=$request->mobile;
        if(isset($request->dob))
            $params['dob']=$request->dob;
        if(isset($request->password) && isset($request->password_confirmation)){
            if($request->password_confirmation == $request->password){
                $params['password']=bcrypt($request->password);
            }else{
                toastr()->error('Password and Confirm Password does not match!!!');
                $nav = array();
                $nav['navUserProfile'] = " active ";
                return redirect()->route('admin.user.edit',$id)->with($nav);
            }
        }
        
        $params['status']=$request->status;

        $user = $user->update($params);

        if($user)
        {
            toastr()->success('User has been udpated successfully!!!');
            $nav = array();
            $nav['navUserProfile'] = " active ";
            return redirect()->route('admin.user.index')->with($nav);
        }else{
            toastr()->error('Pelase try again!!!');
            $nav = array();
            $nav['navUserProfile'] = " active ";
            return redirect()->route('admin.user.index')->with($nav);
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id);
        if(!isset($user)){
            echo "error";
        }else{
            if($user->delete()){
                if(file_exists(public_path($user->profile_photo))){
                    unlink(public_path('/').$user->profile_photo);
                }
                echo "success";
            }else{
                echo "error";
            }
        }
    }

    public function edit_status($id){
        $user = User::find($id);
         if($user->status == "active"){
            $user->status = "disable";
        }else if($user->status == "disable"){
            $user->status = "active";
        }
        if($user->save()){
            echo "success";
        }
    }
}
