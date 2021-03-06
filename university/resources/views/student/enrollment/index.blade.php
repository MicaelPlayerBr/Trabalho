@extends('layouts.student')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <a href="/enrollment/newly" class="float-right btn btn-success">{{ _('New Enrollment') }}</a>
                </div>
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    <table class="table">
                        <tr>
                            <th>ID</th>
                            <th>Student ID</th>
                            <th>Student Name</th>
                            <th>Course ID</th>
                            <th>Course Name</th>
                            <th>Status</th>
                            <th>Options</th>
                        </tr>
                        @foreach($enrollment as $p)
                            <tr>
                                <td>{{ $p->id }}</td>
                                <td>{{ $p->id_student }}</td>
                                <td>{{ $p->student['name']}}</td>
                                <td>{{ $p->id_course }}</td>
                                <td>{{ $p->course['name'] }}</td>
                                <td>
                                    @if(!($p->authorization))
                                        Unauthorized
                                    @else
                                        Authorized
                                    @endif
                                    
                                </td>
                                <td>
                                    <a href="/student/enrollments/{{ $p->id }}/edit" class="btn btn-warning">Edit</a>
                                    <a href="/student/enrollments/{{ $p->id }}/delete" class="btn btn-danger">Delete</a>
                                </td>
                            </tr>
                        @endforeach
                    </table>
                    {{$enrollment->render()}}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
