@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card text-center">

                    <div class="card-header">
                        Facturas
                    </div>
                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                            <a class="btn btn-success" href="{{route('Facturas.create')}}">Generar Facturas</a>
                            <br>
                            <br>
                    <table class="table">
                        <thead>
                            <tr>
                                <td>id</td>
                                <td>Monto Total</td>
                                <td>Impuesto a Pagar</td>
                                <td>Detalle</td>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($Facturas as $Factura)
                            <tr>
                                <td>{{$Factura->id}}</td>
                                <td>$ {{$Factura->total_price}}</td>
                                <td>$ {{$Factura->total_tax}}</td>
                                <td>
                                    <a class="btn btn-success" target="_blank" href="{{route('Facturas.show',$Factura)}}">Detalle</a>
                                </td>
                            </tr>

                        @endforeach
                        </tbody>
                    </table>
                    </div>
                </div>
            </div>
        </div>


    </div>
@endsection
