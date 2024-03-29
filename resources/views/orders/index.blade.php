@extends('layouts.global')

@section('title') Orders List @endsection 

@section('content') 
    <form action="{{route('orders.index')}}">
        <div class="row mb-3">
            <div class="col-md-5">
                <input value="{{Request::get('email')}}" name="email" type="text" class="form-control" placeholder="Search by email...">
            </div>
            <div class="col-md-2">
                <select name="status" class="form-control" id="status">
                    <option value="">Status</option>
                    <option {{Request::get('status')=="Submit" ? "selected" : "" }} value="Submit">Submit</option>
                    <option {{Request::get('status')=="Process" ? "selected" : "" }} value="Process">Process</option>
                    <option {{Request::get('status')=="Finish" ? "selected" : "" }} value="Finish">Finish</option>
                    <option {{Request::get('status')=="Cancel" ? "selected" : "" }} value="Cancel">Cancel</option>
                </select>
            </div>
            <div class="col-md-2">
                <input type="submit" value="Filter" class="btn btn-primary">
            </div>
        </div>
    </form>
    <div class="row">
        <div class="col-md-12">
            <table class="table table-bordered table-stripped">
                <thead>
                    <tr>
                        <th><center><b>Invoice Number</b></center></th>
                        <th><center><b>Status</b></center></th>
                        <th><center><b>Buyer</b></center></th>
                        <th><center><b>Total Quantity</b></center></th>
                        <th><center><b>Order Date</b></center></th>
                        <th><center><b>Total Price</b></center></th>
                        <th><center><b>Action</b></center></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($orders as $order)
                        <tr>
                            <td><center>{{$order->invoice_number}}</center></td>
                            <td>
                                <center>
                                    @if($order->status == "Submit")
                                        <span class="badge bg-warning text-light">{{$order->status}}</span>
                                    @elseif($order->status == "Process")
                                        <span class="badge bg-info text-light">{{$order->status}}</span>
                                    @elseif($order->status == "Finish")
                                        <span class="badge bg-success text-light">{{$order->status}}</span>
                                    @elseif($order->status == "Cancel")
                                        <span class="badge bg-dark text-light">{{$order->status}}</span>
                                    @endif
                                </center>
                            </td>
                            <td>
                                {{$order->user->name}}<br>
                                <small>{{$order->user->email}}</small>
                            </td>
                            <td><center>{{$order->totalQuantity}} pc (s)</center></td>
                            <td><center>{{$order->created_at}}</center></td>
                            <td><center>{{$order->total_price}}</center></td>
                            <td>
                                <center>
                                    <a class="btn btn-info text-white btn-sm" href="{{route('orders.edit', [$order->id])}}">Edit</a>
                                </center>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
                <tfoot>
                    <tr>
                        <td colspan="10">
                            {{$orders->appends(Request::all())->links()}}
                        </td>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
@endsection