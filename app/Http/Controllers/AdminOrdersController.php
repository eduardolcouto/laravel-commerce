<?php

namespace CodeCommerce\Http\Controllers;

use Illuminate\Http\Request;

use CodeCommerce\Http\Requests;
use CodeCommerce\Http\Controllers\Controller;

class AdminOrdersController extends Controller
{

    private $order;

    public function __construct(\CodeCommerce\Order $order)
    {
        $this->order = $order;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $orders = $this->order->all();
        return view('orders.index',compact('orders'));
    }

  
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id, \CodeCommerce\StatusOrder $statusOrder)
    {
        $order = \CodeCommerce\Order::find($id);
        $statusAtual = $order->status;
        $listStatus = $statusOrder->lists('name','id');

        return view('orders.edit',compact('listStatus','statusAtual','order'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $order = \CodeCommerce\Order::find($id);
        
        $order->status_id = $request->get('status');
        
        $order->save();

        return redirect()->route('orders.index');
    }

}
