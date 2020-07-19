@extends('layout.master')
@section('title')
Manual Order Info
@endsection
@section('barcum')
<h1>
    Manual Order Info
    <small>Create New Manual Order</small>
</h1>
<ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-tags"></i> Order Info</a></li>
    <li><a href="#"><i class="fa fa-tags"></i> Manual Order Info</a></li>
    <li><a href="#" class="active">Create New Manual Order</a></li>
</ol>
@endsection

@include('extra.msg')

@section('content')
<!-- Main content -->
<div class="row">
    <div class="col-md-12">
        <form method="post" role="form" enctype="multipart/form-data" action="{{url('admin-ecom/orders-add')}}">
        <div class="panel panel-invoice rounded">
            <div class="panel-heading">
                <div class="pull-left">
                    <input type="hidden" name="_token" value="<?php echo csrf_token(); $tracking=str_random(5); ?>">
                    <input type="hidden" name="tracking" value="<?php echo $tracking; ?>">
                    <h3 class="no-margin">New Manual Order : <code>Tracking No.#<?php echo $tracking; ?></code></h3>
                </div>
                <div class="pull-right">
                    <div class="logo-block"><img data-no-retina src="{{url('plugins/def.jpg')}}" alt="Logo"></div>
                </div>
                <div class="clearfix"></div>
            </div><!-- /.panel-heading -->
            <div class="panel-sub-heading">
                <div class="row inner-all">
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                        <div class="text-left mb-10">
                            <h3 class="mt-0">Company information</h3>
                            <strong>FROM</strong>
                            <address>
                                <strong>Company Name, Inc.</strong><br>
                                XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX<br>
                                <abbr title="Phone">P:</abbr> (XXX) XXX-XXXXX
                            </address>
                            <p class="text-right">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Due Date</label>
                                <input type="text" style="width: 150px;" class="form-control datepicker" id="exampleInputEmail1" name="due_date" placeholder="Select Due Date">
                            </div>
                            </p>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                        <div class="text-right">
                            <h3 class="mt-0">Customer information</h3>
                            <div class="clearfix"></div>
                            <div class="col-md-6 pull-right">
                                <address>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">TO</label>
                                        <select class="form-control col-md-6" id="cid" name="cid">
                                            <option value="0">Select Customer</option>
                                            @if(!empty($cat))
                                            @foreach($cat as $ct)
                                            <option value="<?= $ct->id ?>"><?= $ct->name ?></option>
                                            @endforeach
                                            @endif

                                        </select>
                                    </div>
                                </address>
                                <br/>
                                <br/>
                                <p class="text-right">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Invoice Date</label>
                                    <input type="text" class="form-control datepicker"  name="invoice_date" placeholder="Invoice Date">
                                </div>
                                </p>

                            </div>
                        </div>
                    </div>
                </div>
            </div><!-- /.panel-sub-heading -->
            <div class="panel-body">
                <div class="table-responsive">
                    <table id="pit" class="table table-striped table-theme">
                        <thead>
                            <tr>
                                <th>Product/Product description</th>
                                <th style="width: 80px;">Qty</th>
                                <th style="width: 150px;">Unit Price $</th>
                                <th style="width: 100px;">Tax Rate %</th>
                                <th style="width: 80px;">Tax</th>
                                <th style="width: 100px;">Total Price $</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr id="tmp">
                                <td>
                                    <select  class="form-control pid" style="width: 350px;" id="pid" name="pid[]">
                                        <option value="0">Select Product</option>
                                        @if(!empty($pro))
                                        @foreach($pro as $ct)
                                        <option value="<?= $ct->id ?>"><?= $ct->name ?></option>
                                        @endforeach
                                        @endif

                                    </select>
                                </td>
                                <td><input type="text" onkeyup="checksum(this)" class="form-control quantity" name="quantity[]" value="0" /></td>
                                <td><input type="text" onkeyup="checksum(this)"  class="form-control unit_price" name="unit_price[]" value="0" /></td>
                                <td><input type="text" class="form-control tax_rate" name="tax_rate[]" value="0" /></td>
                                <td><input type="text" class="form-control tax_amount" name="tax_amount[]" value="0" /></td>
                                <td><input type="text" onkeyup="checksum(this)"  class="form-control row_totals" name="row_total[]" value="0" /></td>
                                <td><button type="button" class="btn" value="Delete" onclick="deleteRow(this)"><i class="fa fa-close"></i></button></td>
                            </tr>

                        </tbody>
                        <tfoot>
                            <tr>
                                <td colspan="3" rowspan="4">&nbsp;</td>
                                <td colspan="2">Total (Net)</td>
                                <td colspan="2">$<span  id="total_net">0</span></td>
                            </tr>
                            <tr>
                                <td colspan="2">Total Quantity</td>
                                <td colspan="2" id="total_quantity">0.00</td>
                            </tr>
                            <tr>
                                <td colspan="2">VAT</td>
                                <td colspan="2" id="taxtota">0.00</td>
                            </tr>
                            <tr>
                                <td colspan="2"><b>Total</b></td>
                                <td colspan="2"><b>$<span  id="total_row_price">0</span></b></td>
                            </tr>
                        </tfoot>

                    </table>
                </div><!-- /.table-responsive -->
            </div><!-- /.panel-body -->
            <div class="panel-footer">
                <div class="pull-left hidden-sm hidden-xs">
                    <button type="button"  id="tmpAddRow" class="btn btn-success pull-right rounded"><i class="fa fa-fw fa-plus"></i> Add More Rows</button> 
                </div>
                <div class="pull-right">
                    <button type="submit" class="btn btn-success pull-right rounded"><i class="fa fa-fw fa-arrow-right"></i> Save</button>
                </div>
                <div class="clearfix"></div>
            </div><!-- /.panel-footer -->
        </div><!-- /.panel-invoice -->
    </form>
    </div>
</div><!-- /.row -->
<!-- /.content -->
@endsection

@section('css')
<link rel="stylesheet" href="{{url('plugins/iCheck/all.css')}}">
<link rel="stylesheet" href="{{url('plugins/select2/select2.min.css')}}">
<link rel="stylesheet" href="{{url('plugins/invoice.css')}}">
<link rel="stylesheet" href="{{url('plugins/default.theme.css')}}">
@endsection

@section('js')
<script src="{{url('plugins/iCheck/icheck.min.js')}}"></script>
<script src="{{url('plugins/select2/select2.full.min.js')}}"></script>
<script src="{{url('plugins/datepicker/bootstrap-datepicker.js')}}"></script>
<script type="text/javascript">

                                    function checksum(st)
                                    {
                                        var quantity = 0.00;
                                        var unitprice = 0.00;
                                        var taxprice = 0.00;
                                        var rowtotal = 0.00;
                                        //var rquan=$(this).attr('class');
                                        //console.log(rquan);
                                        $(".quantity").each(function (index,val) {
                                            
                                            var getunitprice = $('.unit_price:eq('+index+')').val();
                                            var getquantity = $('.quantity:eq('+index+')').val();
                                            var gettax = $('.tax_amount:eq('+index+')').val();
                                            var ssuq=(getunitprice*getquantity)-gettax;
                                            $('.row_totals:eq('+index+')').val(ssuq);
                                            console.log(ssuq);
                                            quantity += parseFloat($(this).val().replace(/\s/g, '').replace(',', '.'));
                                        });

                                        $(".unit_price").each(function (index,val) {
                                            
                                            unitprice += parseFloat($(this).val().replace(/\s/g, '').replace(',', '.'));
                                        });
                                        
                                        $(".tax_amount").each(function (index,val) {
                                            
                                            taxprice += parseFloat($(this).val().replace(/\s/g, '').replace(',', '.'));
                                        });

                                        $(".row_totals").each(function (index,val) {
                                            
                                            rowtotal += parseFloat($(this).val().replace(/\s/g, '').replace(',', '.'));

                                        });
                                        //console.log(rowtotal);
                                        document.getElementById('total_quantity').innerHTML = quantity;
                                        document.getElementById('total_net').innerHTML = rowtotal;
                                        document.getElementById('taxtota').innerHTML = taxprice;
                                        document.getElementById('total_row_price').innerHTML = rowtotal;

                                        //$("#inv_total_cost").val(rowtotal);
                                    }

                                    function GetProductPrice(pid)
                                    {

                                    }


                                    function deleteRow(btn) {
                                        var numor = $("#pit > tbody > tr").length;
                                        if (numor != 1)
                                        {
                                            console.log(numor);
                                            var row = btn.parentNode.parentNode;
                                            row.parentNode.removeChild(row);
                                        } else
                                        {
                                            alert('Minimum 1 Product info required to create a invoice.');
                                        }
                                    }

                                    $(document).ready(function () {
                                        $('.datepicker').datepicker({
                                            autoclose: true
                                        });
                                        $('button#tmpAddRow').click(
                                                function ($e) {
                                                    $e.preventDefault();
                                                    $('tr#tmp').clone(true).removeAttr('id').appendTo('tbody');
                                                }
                                        );

                                        $(".pid").change(function () {
                                            var tv = $(this).val();
                                            var randomst=Math.random().toString(36).substring(7);
                                            //console.log(randomst);
                                            $(this).closest('tr').find('.unit_price').attr("id",randomst);
                                            var unit_price = 0;
                                            if (tv != null)
                                            {
                                                $.post("./orders-filter-subcat-data", {'pid': tv, '_token': '<?php echo csrf_token(); ?>'},
                                                        function (data) {
                                                            //console.log(data);
                                                            var obj = data;
                                                            var unit_price= obj[0].price;
                                                            $("#"+randomst).val(unit_price);
                                                            
                                                            //console.log(obj[0].price);
                                                        });

                                            }
                                            //var tt=$(this).closest('tr').find('.quantity').attr("id","gg");
                                            //
                                        });

//$("#brandimage").kendoUpload();

                                        $(".select2").select2();
                                        $('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
                                            checkboxClass: 'icheckbox_minimal-blue',
                                            radioClass: 'iradio_minimal-blue'
                                        });
                                        
                                    });
</script>

@endsection