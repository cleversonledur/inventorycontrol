@extends('layouts.default')
 
@section('content')

    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Purchases:</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('productbatch.create') }}"> Create New Purchase </a>
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
            <th>Product Name</th>
            <th>Batch ID</th>
            <th>Quantity</th>
            <th>Price</th>
            <th>Total Price</th>

            <th width="280px">Action</th>
        </tr>
    @foreach ($productbatch as $pb)
    <tr>
        <td>{{ ++$i }}</td>
        <td>{{ $pb->name }}</td>
        <td>{{ $pb->batch_id }}</td>

        <td>{{ $pb->quantity }}</td>
        <td>{{ $pb->price }}</td>
        <td>R$ {{ $pb->price * $pb->quantity }}</td>

        <td>
            <a class="btn btn-info" href="{{ route('productbatch.show',$pb->id) }}">Show</a>
            <a class="btn btn-primary" href="{{ route('productbatch.edit',$pb->id) }}">Edit</a>
            {!! Form::open(['method' => 'DELETE','route' => ['productbatch.destroy', $pb->id],'style'=>'display:inline']) !!}
            {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
            {!! Form::close() !!}
        </td>
    </tr>
    @endforeach
    </table>
    {!! $productbatch->render() !!}

   

@endsection