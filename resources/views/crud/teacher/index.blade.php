@extends('crud.teacher.templete')

@section('data')
    <div class="data_section">
        <h2>All Teacheteacher</h2>
        <table class="all_data">
            <tr>
                <th>#</th>
                <th>Name</th>
                <th>Unique Id</th>
                <th>Gender</th>
                <th>Contact</th>
                <th>Action</th>
            </tr>
            @foreach($teachers as $teacher)
                <tr>
                    <td>{{$loop->iteration}}</td>
                    <td>{{$teacher->name}}</td>
                    <td>{{$teacher->unique_id}}</td>
                    <td>{{$teacher->gender}}</td>
                    <td>{{$teacher->contact}}</td>
                    <td>
                        <form action="{{route('teacher.show', $teacher->id)}}" method="GET" class="action">
                            <button type="submit" class="view_btn btn">View</button>
                        </form>
                        <!-- <a href="{{route('teacher.show', $teacher->id)}}" class="view_btn btn" style="text-decoration:none;">View</a> -->
                        <form action="{{route('teacher.edit', $teacher->id)}}" method="GET" class="action">
                            {{csrf_field()}}
                            <button type="submit" class="edit_btn btn">Edit</button>
                        </form>
                        <form action="{{route('teacher.destroy', $teacher->id)}}" method="POST" class="action">
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