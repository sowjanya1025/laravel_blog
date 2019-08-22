@extends('admin.app')

@section('content')

@if (session()->has('status'))
   <p>{{session()->pull('status')}}</p>

  @endif  
<h1>Posts</h1>
<table class="table">
        <thead>
          <tr>
            <th>Id</th>
            <th>Owner</th>
            <th>Photo</th>
            <th>Category</th>
            <th>Title</th>
            <th>Body</th>
            <th>Created At</th>
            <th>Updated At</th>
            <th>Actions</th>
          </tr>
        </thead>
        <tbody>
                
                        @foreach ($posts as $post)

                     <tr> 
                          <td> {{$post->id}}</td>
                          <td> {{$post->user->name}}</td>
                          <td><img src="../images/{{$post->photo->file}}" height="50"></td>
                          <td>{{$post->category->name}}</td>
                          <td> <a href="{{route('posts.id',$post->id)}}">{{$post->title}}</a></td>
                          <td>{{substr($post->content,0,3)."..."}}</td>
                          <td>{{$post->created_at->format('Y:M:D')}}</td>
                          <td>{{$post->updated_at->diffForHumans()}}</td>
                          <td>View comments</td>
                          <td>
                          
                        </td>
                                          </tr>
                    
                @endforeach

               



        </tbody>
</table>



@endsection