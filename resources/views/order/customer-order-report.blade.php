@extends('layout.master')
@section('title')
    Orders Report Info
@endsection
@section('barcum')
<h1>
    <i class="fa fa-tag"></i> Orders Report Info
    <small>All Orders Report List</small>
</h1>
<ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-tags"></i> Orders Report Info</a></li>
    <li><a href="#" class="active">Orders Report List</a></li>
</ol>
@endsection

@include('extra.msg')

@section('content')
<!-- Main content -->
<div class="row">
    <!-- left column -->
    <div class="col-md-12">
        <!-- general form elements -->
        <div class="box box-success">
            <div class="box-header with-border">
                <h3 class="box-title"><i class="fa fa-table"></i> Orders Report List</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form">
                <div class="box-body">
                   
                    <table border="1" class="table table-bordered table-hover table-striped">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Customer Name</th>
                                <th>Order Status</th>
                                <th>Total Amount</th>
                                <th>Created</th>
                                <th>Action </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($data as $row)
                            <tr>
                                <td>{{$row->id}}</td>
                                <td>{{$row->cus_name}}</td>
                                <td>{{$row->order_status}}</td>
                                <td>{{$row->total}}</td>
                                <td>{{$row->created_at}}</td>
                                <td><a href="{{url('admin-ecom/orders-view/'.$row->id)}}">View Order</a></td>
                            </tr>
                            
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>ID</th>
                                <th>Customer Name</th>
                                <th>Order Status</th>
                                <th>Total Amount</th>
                                <th>Created</th>
                                <th>Action</th>
                            </tr>
                        </tfoot>
                    </table>
                    <br>
                    <h3>Customer Report Summery</h3>
                    <table border="" class="table table-bordered table-striped">
                        <tbody>
                            <tr>
                                <td style="width: 500px;">Customer Name</td>
                                <td>{{$row->cus_name}}</td>
                                
                            </tr>
                            <tr>
                                
                                <td>Total Amount</td>
                                <td>{{$total}}</td>
                            </tr>
                            <tr>
                                
                                <td>Paid Oder</td>
                                <td>{{$paid}}</td>
                            </tr>
                            <tr>
                                
                                <td>Pending Order</td>
                                <td>{{$pending}}</td>
                            </tr>
                            <tr>
                                
                                <td>Cancel Order</td>
                                <td>{{$cancel}}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <!-- /.box-body -->
            </form>
        </div>
        <!-- /.box -->

    </div>
    <!--/.col (left) -->
</div>
<!-- /.row -->
<!-- /.content -->
@endsection
