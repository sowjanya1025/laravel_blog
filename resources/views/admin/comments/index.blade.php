@extends('admin.app')

@section('content')

@if (session()->has('status'))
   <p>{{session()->pull('status')}}</p>

  @endif  
<h1>Comments</h1>
<table class="table">
        <thead>
          <tr>
            <th>Id</th>
            <th>Author</th>
            <th>Email</th>
            <th>Comment</th>
            <th>Created At</th>
            <th>Updated At</th>
            <th>Actions</th>
          </tr>
        </thead>
        <tbody>
                
                        @foreach ($comments as $comment)

                     <tr> 
                          <td> {{$comment->id}}</td>
                          <td> yrtyrt</td>
                          <td>tryrty</td>
                          <td>{{$comment->body}}</td>
                          <td>{{$comment->created_at->format('Y:M:D')}}</td>
                          <td>{{$comment->updated_at->diffForHumans()}}</td>
                          <td>
                            @if ($comment->is_active == 0)

                            {!!Form::open(
                              ['method'=>'post',
                              'action'=>['AdminCommentsController@ApproveComments',$comment->id]]) !!}
                            {!!Form::hidden('approve','1') !!}
                            {!!Form::submit('Approve',null) !!}
                            {!!Form::close() !!}
                            @else
                            {!!Form::open(
                              ['method'=>'post',
                              'action'=>['AdminCommentsController@ApproveComments',$comment->id]]) !!}
                            {!!Form::hidden('approve','0') !!}
                            {!!Form::submit('Unapprove',null) !!}
                            {!!Form::close() !!}

                                
                            @endif
                          
                          </td>
                          <td>
                          
                        </td>
                                          </tr>
                    
                @endforeach

               



        </tbody>
</table>



@endsection