@extends('admin.app')

@section('content')

@if (session()->has('status'))
   <p>{{session()->pull('status')}}</p>

  @endif  
<h1>Categories</h1>
<table class="table">
        <thead>
          <tr>
            <th>Id</th>
            <th>Name</th>
            <th>Created At</th>
            <th>Updated At</th>
            <th>Actions</th>
          </tr>
        </thead>
        <tbody>
                
                        @foreach ($category as $category)

                     <tr> 
                          <td> {{$category->id}}</td>
                          <td> {{$category->name}}</td>
                          <td>{{$category->created_at->format('Y:M:D')}}</td>
                          <td>{{$category->updated_at->diffForHumans()}}</td>
                          <td>
                          <a href="{{route('categories.edit',['id'=>$category->id])}}">Edit/</a>
                          {!!Form::open
                          (['method'=>'DELETE',
                          'action'=>['AdminCategoriesController@destroy',$category->id]]) !!}
                          {!!Form::submit('Delete') !!}
                          {!!Form::close() !!}
                        </td>
                                          </tr>
                    
                @endforeach

               



        </tbody>
</table>



@endsection