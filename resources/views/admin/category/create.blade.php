@extends('admin.app')
@section('content')

{!!Form::open(['action'=>'AdminCategoriesController@store','method'=>'POST']) !!}

<table >


    <tr><td><h1>Create Category:</h1></td></tr>
    <tr>
         <td>

                {!!Form::label('name','Category Name:') !!}
         </td>
         <td>
                {!!Form::text('name',null)!!}
         </td>
    </tr>
    <tr>
        <td>
                {!!Form::Submit('Submit Category') !!}
        </td>
    </tr>
    </table>


{!!Form::close() !!}



    
@endsection