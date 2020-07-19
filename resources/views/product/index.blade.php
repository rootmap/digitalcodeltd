@extends('layout.master')
@section('title')
Products Info
@endsection
@section('barcum')
<h1>
    <i class="fa fa-tag"></i> Products Info
    <small>All Product List</small>
</h1>
<ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-tags"></i> Product Info</a></li>
    <li><a href="#" class="active">Product List</a></li>
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
                <h3 class="box-title"><i class="fa fa-table"></i> Product List</h3>
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
                              <th>Code</th>
                              <th width="100">Name</th>
                              <th>Price</th>
                              <th>Category</th>
                              <th>Action</th>
                            </tr>
                          </thead>
                          <tbody>
                            @if(isset($dataTable))
                                @foreach($dataTable as $row)
                                <tr id="pid_{{$row->id}}">
                                  <td>{{$row->id}}</td>
                                  <td>{{$row->pcode}}</td>
                                  <td>{{$row->name}}</td>
                                  <td>{{$row->price}}</td>
                                  <td>{{$row->cname}}</td>
                                  <td>
                                    <a class="btn btn-info btn-sm" href="{{url('admin-ecom/product/'.$row->id)}}"><i class="fa fa-edit"></i></a> 
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
  cursor: move;
}
table.dataTable thead th,table.dataTable thead td{ font-size: smaller;  }
</style>
<script type="text/javascript">
  $(document).ready(function() {
    $('.example').DataTable( {
      "scrollX": true,
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

    $(function() {

      $('table').sortable({
        items: 'tr',
        opacity: 0.6,
        axis: 'y',
        stop: function (event, ui) {
          var data = $(this).sortable('serialize');
          $.ajax({
           data: {data,'_token':'<?=csrf_token()?>'},
           type: 'POST',
           url: 'product-reorder'
         });
        }
      });
    });

  });


</script>

  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.15/css/jquery.dataTables.min.css">
  <script src='https://cdn.datatables.net/1.10.15/js/jquery.dataTables.min.js' type="text/javascript"></script>
  <script src="{{url('datatable-lib/draw-table/js/jquery.tablednd.js')}}" type="text/javascript"></script>
@endsection