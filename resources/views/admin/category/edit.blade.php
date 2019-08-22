@extends('admin.app')
@section('content')

{!!
Form::model
        ($categor,['method'=> 'PATCH',
                'action'=>['AdminCategoriesController@update',$categor->id],
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
          <td> {{Form::Submit('Edit changes')}} </td>
       </tr>
</table>
{{Form::close()}}

@endsection

