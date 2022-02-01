@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card text-center">
                    <div class="card-header">
                        Compras
                    </div>
                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                            <form action="{{route('Compras.store')}}" method="POST">
                                <div class="form-group">
                                <label for="">Eliga un Producto</label>
                                    @csrf
                                    <select class="form-control" name="producto">
                                        <option>Eliga una opción</option>
                                        @foreach($products as $product)
                                            <option value="{{$product->id}}">{{$product->name}} //Precio: {{$product->price}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <input type="submit" class="btn btn-primary" value="Comprar">

                                </div>
                            </form>


                    </div>
                </div>
            </div>
        </div>


    </div>
@endsection
