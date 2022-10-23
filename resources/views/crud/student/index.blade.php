@extends('crud.student.templete')

@section('data')
    <div class="data_section">
        <h2>All Student</h2>
        <table class="all_data">
            <tr>
                <th>#</th>
                <th>Name</th>
                <th>Unique Id</th>
                <th>Gender</th>
                <th>Contact</th>
                <th>Action</th>
            </tr>
            @foreach($students as $student)
                <tr>
                    <td>{{$loop->iteration}}</td>
                    <td>{{$student->name}}</td>
                    <td>{{$student->unique_id}}</td>
                    <td>{{$student->gender}}</td>
                    <td>{{$student->contact}}</td>
                    <td>
                        <form action="{{route('student.show')}}" method="POST" class="action" >
                            @csrf
                            <button type="submit" class="view_btn btn" name="id" value="{{$student->id}}">View</button>
                        </form>
                        <form action="{{route('student.edit',$student->id)}}" method="GET" class="action">
                            <!-- {{csrf_field()}} -->
                            <button type="submit" class="edit_btn btn">Edit</button>
                        </form>
                        <form action="{{route('student.delete', $student->id)}}" method="POST" class="action">
                            @method('delete')
                            <input type="hidden" name="_token" value={{csrf_token()}}>
                            <button type="submit" class="delete_btn btn">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </table>
    </div>
@endsection