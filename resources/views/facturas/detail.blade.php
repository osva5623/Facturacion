@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card text-center">

                    <div class="card-header">
                        Detalle de factura {{$factura->id}}
                    </div>
                    <div class="card-body">
                        <table class="table">
                            <thead>
                            <tr>
                                <td>Usuario</td>
                                <td>Producto</td>
                                <td>Precio</td>
                                <td>Impuesto</td>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($factura->detail->sortby('creatd_at') as $detail)
                                <tr>
                                    <td>{{$detail->user->name}}</td>
                                    <td>{{$detail->product->name}}</td>
                                    <td>$ {{$detail->product->price}}</td>
                                    <td>% {{$detail->product->fiscal_tax}}</td>
                                </tr>

                            @endforeach
                            <tr>
                                <td>Totales</td>
                                <td></td>
                                <td>$ {{$factura->total_price}}</td>
                                <td>$ {{$factura->total_tax}}</td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
