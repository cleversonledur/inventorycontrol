@extends('layouts.default')
 
@section('content')

    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Products </h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('product.create') }}"> Create New Product</a>
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
            <th>Id</th>
            <th>Nome do Produto</th>
            <th>Categoria</th>
            <th width="280px">Action</th>
        </tr>
    @foreach ($product as $p)
    <tr>
        <td>{{ ++$i }}</td>
        
        <td>{{ $p->name }}</td>
        <td>{{ $p->category_id }}</td>
        <td>
            <a class="btn btn-info" href="{{ route('product.show',$p->id) }}">Show</a>
            <a class="btn btn-primary" href="{{ route('product.edit',$p->id) }}">Edit</a>
            {!! Form::open(['method' => 'DELETE','route' => ['product.destroy', $p->id],'style'=>'display:inline']) !!}
            {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
            {!! Form::close() !!}
        </td>
    </tr>
    @endforeach
    </table>
     {!! $product->render() !!}
    {!! Form::close() !!}
   

@endsection