@extends('books.layout')

@section('content')
<!-- BASED ON YIEDL TADII -->
<a href="{{route('books.create')}}"  class="btn btn-primary">Add new</a></button>
<table class="table">

<th>ID</th>
<th>Title</th>
<th>Author</th>
<th>Page</th>
<th>Year</th>
<th>Action</th>

<!-- utk repetition smua data yg akan ada -->

<!-- dari mana dapat $books tu? ianya datang dari bookcontroller  -->
@foreach ($books as $book )

<tr>
    <td>{{$book->id}}</td>
    <td>{{$book->title}}</td>
    <td>{{$book->author}}</td>
    <td>{{$book->page}}</td>
    <td>{{$book->year}}</td>
    <td>

<a href="{{route('books.show',$book->id)}}" class="btn btn-success">Show</a>
<a href="{{route('books.edit',$book->id)}}" class="btn btn-warning">Edit</a>

<form onclick="return confirm('are you sure?')" action="{{route('books.destroy',$book->id)}}" method="post"   style="display:inline" >
    @csrf
      @method('DELETE')
<button class="btn btn-danger">Delete</button>

</form> 

    </td>
</tr>
@endforeach

</table>
{{$books->links()}}

@endsection