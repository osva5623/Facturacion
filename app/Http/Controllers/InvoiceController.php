<?php

namespace App\Http\Controllers;

use App\Invoice;
use App\Shopping;
use Illuminate\Http\Request;

class InvoiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Facturas=Invoice::all();
        return view('facturas.facturas',compact('Facturas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $shopping=new Shopping();
        $shoppingRegisters=$shopping->with('product')
            ->where('invoiced','=','0')
            ->get();
        $shoppingGroupByUser=$shoppingRegisters->groupBy('user_id');
        $results=$shoppingGroupByUser->map(function ($element){
            $totalCantidad=$element->sum(function ($item){
                return $item->product->price;
            });
            $totalImpuestos=$element->sum(function ($elemento){
                $tax=$elemento->product->fiscal_tax;
                $price=$elemento->product->price;
                $result=($tax/100)*$price;
                return $result;
            });
           return [
               'total_price'=>$totalCantidad,
               'total_tax'=>$totalImpuestos
           ];
        });

        foreach ($results as $key=>$result){
            $invoicesNew=new Invoice();
            $invoicesNew->total_price=$result['total_price'];
            $invoicesNew->total_tax=$result['total_tax'];
            $invoicesNew->save();
            $id=$invoicesNew->id;
            $shopping->where('user_id',$key)->update(['invoiced'=>$id]);
        }
        return back()->with('status','Creado con exito');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Invoice  $invoice
     * @return \Illuminate\Http\Response
     */
    public function show(Invoice $Factura)
    {
        $factura=$Factura->load('detail');
        $factura->load('detail.user','detail.product');
        return view('facturas.detail',compact('factura'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Invoice  $invoice
     * @return \Illuminate\Http\Response
     */
    public function edit(Invoice $invoice)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Invoice  $invoice
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Invoice $invoice)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Invoice  $invoice
     * @return \Illuminate\Http\Response
     */
    public function destroy(Invoice $invoice)
    {
        //
    }
}
