@extends('admin.app')
@section('content')

{!!
Form::model
        ($users,['method'=> 'PATCH',
                'action'=>['AdminUsersController@update',$users->id],
                'files'=>true])!!}




<table >


        <tr><td><h1>Edit users</h1></td></tr>
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
               {{Form::select('role_id',$roles)}}
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
                            <img src="{{'/images/'.$users->photo->file}}" height="58">
                            {{Form::label('Photo_id','upload Image :')}}
                        </td>
                        <td>
                            {{Form::file('photo_id')}}
                        </td>
                        </tr>

                        <tr>
                                <td>
                                     {{Form::Submit('Edit changes')}}
                                </td>
                                
                                </tr>
                 

    

</table>
{{Form::close()}}


@endsection

