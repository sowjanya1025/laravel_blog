<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Photo;
use App\Role;

class AdminUsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //

        $users_list = User::all();
       // return $users_list;
        //exit;
        return view('admin.users.index',compact('users_list'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $role = Role::pluck('name','id')->all();
        return view('admin.users.create',compact('role'));
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
       // return $request;
        
        $validateddata = $request->validate([
            'name'=> 'required',
            'email'=>'required',
            'role_id'=>'required',
            'is_active'=>'required',
            'password'=>'required',
            'photo_id'=>'required'
        ]);

        $data = $request->all();

        if($request->hasFile('photo_id'))
        {
            //$destintion = '/images';
            $file = $request->file('photo_id');
            $path = time().$file->getClientOriginalName();
            $file->move('images',$path);

            $photo = Photo::create(['file'=>$path]);
            $insertedphotoid = $photo->id;

            $data['photo_id'] = $insertedphotoid; 
            
        }
        $store = User::create($data);
        return redirect('/admin/users'); 


       // $store = User::create($data);
      // return redirect('/admin/users'); 

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
        // return "i am here";
         $users = User::findOrFail($id);
         $roles = Role::pluck('name','id')->all();
         return view('admin.users.edit',compact('users','roles'));
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
       // return "i am here";
        $user = User::findOrFail($id);
        unlink(public_path() .'/images/'. $user->photo->file);
        $user->delete();
        session()->flash('status','User Deleted');
        return redirect('admin/users');

    }
}
