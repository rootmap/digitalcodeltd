@extends('layout.master')
@section('title')
Products Info
@endsection
@section('barcum')
<h1>
    <i class="fa fa-tag"></i> Inclusive Meal Info
    <small>All Inclusive Meal Info List</small>
</h1>
<ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-tags"></i> Inclusive Meal Info Info</a></li>
    <li><a href="#" class="active">Inclusive Meal Info List</a></li>
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
                <h3 class="box-title"><i class="fa fa-table"></i> Inclusive Meal Info List</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form">
                <div class="box-body">                
                    <div class="table-responsive">
                        
                        <table  class="display example" cellspacing="0" width="100%">
                          <thead>
                            <tr>
                              <th>P.ID</th>
                              <th>Name</th>
                              <th>Price</th>
                              <th>Action</th>
                            </tr>
                          </thead>
                          <tbody>
                            @if(isset($dataTable))
                                @foreach($dataTable as $row)
                                <tr id="pid_{{$row->id}}">
                                  <td>{{$row->id}}</td>
                                  <td>{{$row->name}}</td>
                                  <td>{{$row->price}}</td>
                                  <td>
                                    <a class="btn btn-info btn-sm" href="{{url('admin-ecom/inclusive-meal/edit/'.$row->id)}}"><i class="fa fa-edit"></i></a> 
                                    <a class="btn btn-danger btn-sm" onclick="javascript:deleteClick(<?=$row->id?>);" ><i class="fa fa-trash"></i></a>
                                    </td>
                               </tr>
                               @endforeach
                           @endif
                        </tbody>
                        </table>





                    </div>

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



@section('js')

  <script src="{{url('datatable-lib/draw-table/jquery-ui/js/jquery-ui.min.js?v=v1.2.3')}}"></script>
  <link rel="stylesheet" href="{{url('datatable-lib/draw-table/tablednd.css')}}" type="text/css"/>

  
<style type="text/css">

tr > td
{
    font-size: 11px;
        padding: 5px 0px !important;
}
tr{
  
}
table.dataTable thead th,table.dataTable thead td{ font-size: smaller;  }
</style>
<script type="text/javascript">
  $(document).ready(function() {
    $('.example').DataTable( {
      "order":false,
      "aLengthMenu": [[25, 50, 75, -1], [25, 50, 75, "All"]],
      "pageLength": 25
    });
  });

function deleteClick(id) {
        var c = confirm("Do you want to delete?");
        if (c === true) {
            $.ajax({
                type: "GET",
                dataType: "json",
                url: "product-delete/" + id,
                success: function (result) {
                    $("#id_"+id).fadeOut('slow');
                }
            });
        }
}
</script>


<script language = "Javascript">
  $(document).ready(function(){

 

  });
</script>

  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.15/css/jquery.dataTables.min.css">
  <script src='https://cdn.datatables.net/1.10.15/js/jquery.dataTables.min.js' type="text/javascript"></script>
  <script src="{{url('datatable-lib/draw-table/js/jquery.tablednd.js')}}" type="text/javascript"></script>
@endsection