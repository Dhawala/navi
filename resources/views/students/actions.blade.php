@if(!Auth::guest() && Auth::user()->role=='admin')
    <a href="/students/{{$student->id}}/edit"
       class="btn btn-primary btn-sm btn-circle"><i
                class="fa fa-edit"></i></a>
    <form action="/students/{{$student->id}}" method="POST" class="d-inline">
        @csrf
        @method('DELETE')
        <button type="submit" id="submit"
                class="btn btn-danger btn-sm btn-circle"><i
                    class="fa fa-trash "></i></button>
    </form>
@endif
