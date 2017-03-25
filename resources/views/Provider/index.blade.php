@extends('layouts.default')
 
@section('content')

    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Providers </h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('provider.create') }}"> Create New Provider</a>
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
    @foreach ($provider as $key => $p)
    <tr>
        <td>{{ ++$i }}</td>
        
        <td>{{ $p->name }}</td>
        <td>
            <a class="btn btn-info" href="{{ route('provider.show',$p->id) }}">Show</a>
            <a class="btn btn-primary" href="{{ route('provider.edit',$p->id) }}">Edit</a>
            {!! Form::open(['method' => 'DELETE','route' => ['provider.destroy', $p->id],'style'=>'display:inline']) !!}
            {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
            {!! Form::close() !!}
        </td>
    </tr>
    @endforeach
    </table>
     {!! $provider->render() !!}
     {!! Form::close() !!}
   

@endsection