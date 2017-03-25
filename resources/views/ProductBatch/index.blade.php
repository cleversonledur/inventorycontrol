@extends('layouts.default')
 
@section('content')

    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Categories </h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('category.create') }}"> Create New Category</a>
            </div>
        </div>
    </div>

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

    <table class="table table-bordered">
        <tr>
            <th>No</th>
            <th>Description</th>
            <th width="280px">Action</th>
        </tr>
    @foreach ($category as $key => $category)
    <tr>
        <td>{{ ++$i }}</td>
        
        <td>{{ $category->description }}</td>
        <td>
            <a class="btn btn-info" href="{{ route('category.show',$category->id) }}">Show</a>
            <a class="btn btn-primary" href="{{ route('category.edit',$category->id) }}">Edit</a>
            {!! Form::open(['method' => 'DELETE','route' => ['category.destroy', $category->id],'style'=>'display:inline']) !!}
            {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
            {!! Form::close() !!}
        </td>
    </tr>
    @endforeach
    </table>

   

@endsection