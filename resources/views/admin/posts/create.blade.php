@extends('admin.app')
@section('content')



{!!Form::open(['method'=>'post','action'=>'AdminPostsController@store','files'=>true]) !!}
<table>
    <tr>
        <td><h1>Create Posts:</h1></td>
    </tr>
    <tr>
        <td>{!!Form::label('title','Title:') !!}</td>
        <td>{!!Form::text('title',null) !!}</td>
    </tr>
   
    <tr>
            <td>{!!Form::label('photo_id','upload image:') !!}</td>
            <td>{!!Form::file('photo_id') !!}</td>
    </tr>
    <tr>
            <td> {!!Form::label('category_id','Select Category:') !!}</td>
            <td>{!!Form::select('category_id', [''=>'select category'] + $category) !!}</td>
    </tr>
    <tr>
            <td>{!!Form::label('content','Body:') !!}</td>
            <td>{!!Form::textarea('content',null) !!}</td>
    </tr>
    <tr>
            <td>{!!Form::submit('Submit Post') !!}</td>
            <td></td>
    </tr>
        



</table>
{!!Form::close() !!}

@foreach ($errors->all() as $errors)
    {{$errors}}
    
@endforeach

    
@endsection