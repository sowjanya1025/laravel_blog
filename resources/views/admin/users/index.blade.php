@extends('admin.app')

@section('content')

@if (session()->has('status'))
   <p>{{session()->pull('status')}}</p>

  @endif  
<h1>Users</h1>
<table class="table">
        <thead>
          <tr>
            <th>Id</th>
            <th>Photo</th>
            <th>Name</th>
            <th>Email</th>
            <th>Role</th>
            <th>Active</th>
            <th>Created At</th>
            <th>Updated At</th>
            <th>Actions</th>
          </tr>
        </thead>
        <tbody>
                
                        @foreach ($users_list as $users)

                     <tr> 
                          <td> {{$users->id}}</td>
                          <td><img src="{{'/images/'.$users->photo->file}}" height="58"> </td>
                          <td> {{$users->name}}</td>
                          <td>{{$users->email}}</td>
                          <td>{{$users->role->name}}</td>
                          <td>{{$users->is_active}}</td>
                          <td>{{$users->created_at->format('Y:M:D')}}</td>
                          <td>{{$users->updated_at->diffForHumans()}}</td>
                          <td>
                            <a href="{{route('users.edit',['id'=>$users->id])}}">Edit</a>
                            {!!Form::open(
                              ['method'=>'DELETE',
                              'action'=>['AdminUsersController@destroy',$users->id]]) !!}
                            {!!Form::submit('Delete User',['class'=>'btn btn-danger']) !!} 
                                                     {!!Form::close()!!}</td>
                                          </tr>
                    
                @endforeach

               



        </tbody>
</table>



@endsection