@extends('layouts.default')
 
@section('content')

    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Lotes </h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('batch.create') }}"> Criar Novo Lote</a>
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
            <th>Fornecedor</th>
            <th width="280px">Action</th>
        </tr>
    @foreach ($batch as $p)
    <tr>
        <td>{{ ++$i }}</td>
        
        <td>{{ $p->provider_id }}</td>
        <td>
            <a class="btn btn-info" href="{{ route('batch.show',$p->id) }}">Show</a>
            <a class="btn btn-primary" href="{{ route('batch.edit',$p->id) }}">Edit</a>
            {!! Form::open(['method' => 'DELETE','route' => ['batch.destroy', $p->id],'style'=>'display:inline']) !!}
            {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
            {!! Form::close() !!}
        </td>
    </tr>
    @endforeach
    </table>
     {!! $batch->render() !!}
    {!! Form::close() !!}
   

@endsection