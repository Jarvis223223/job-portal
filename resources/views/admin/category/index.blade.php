@extends('admin.layout.app')
@section('content')
    <div class="container">
        <a href="{{url('admin/categories/create')}}" class="btn btn-sm btn-primary my-3 float-end">+Add</a>

        @if(Session('successMsg'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <div>{{ Session('successMsg') }}</div>
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif

        <table class="table table-bordered table-hover">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($categories as $category)
                    <tr>
                        <td>{{$category->id}}</td>
                        <td>{{$category->name}}</td>
                        <td>
                            <form action="{{url('admin/categories/'.$category->id)}}" method="post">
                                @csrf @method('delete')
                                <a href="{{url('admin/categories/'.$category->id.'/edit')}}" class="btn btn-sm btn-warning">Edit</a>
                                <button class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
