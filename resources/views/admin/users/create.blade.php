@extends('admin.app')
@section('content')

{{Form::open(array('method'=> 'POST','action'=>'AdminUsersController@store','files'=>true))}}
<table >


        <tr><td><h1>Create users</h1></td></tr>
    <tr>


        <td>
             {{Form::label('name','Username :')}}
        </td>
        <td>
            {{Form::text('name')}}
        </td>
    </tr>
        <tr>
         <td>
                {{Form::label('email','Email :')}}
           </td>
           <td>
               {{Form::text('email')}}
           </td>

           </tr>
           <tr>
           <td>
                {{Form::label('role','Role :')}}
           </td>
           <td>
               {{Form::select('role_id',$role)}}
           </td>
           </tr>
           <tr>
           <td>
                {{Form::label('status','Status :')}}
           </td>
           <td>
               {{Form::text('is_active')}}
           </td>
           </tr>
           <tr>
                <td>
                     {{Form::label('password','Password :')}}
                </td>
                <td>
                    {{Form::text('password')}}
                </td>
                </tr>
                <tr>
                        <td>
                             {{Form::label('Photo_id','upload Image :')}}
                        </td>
                        <td>
                            {{Form::file('photo_id')}}
                        </td>
                        </tr>

                        <tr>
                                <td>
                                     {{Form::Submit('Submit')}}
                                </td>
                                
                                </tr>
                 

    

</table>
{{Form::close()}}

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
@endsection

