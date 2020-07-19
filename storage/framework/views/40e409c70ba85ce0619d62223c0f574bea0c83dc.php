
<link rel="stylesheet" href="<?php echo e(url('kendoui/styles/kendo.common.min.css')); ?>"  />
<link rel="stylesheet" href="<?php echo e(url('kendoui/styles/kendo.metro.min.css')); ?>"  />

<script type="text/javascript" src="<?php echo e(url('kendoui/js/kendo.web.min.js')); ?>"></script> 
<script type="text/javascript">
	function gridDataBound(e) {
        var grid = e.sender;
        if (grid.dataSource.total() == 0) {
            var colCount = grid.columns.length;
            $(e.sender.wrapper)
            .find('tbody')
            .append('<tr class="kendo-data-row"><td colspan="' + colCount + '" class="no-data" style="text-align:center; font-family:Impact, Charcoal, sans-serif; font-size:19px;">There is no data to show in the grid.</td></tr>');
        }
    }

		$("#tabstrip").kendoTabStrip({
            animation: {
                open: {
                    effects: "fadeIn"
                }
            }
        });
</script>
<style>
    span.k-picker-wrap{ padding-bottom:1px; }
    span.k-dropdown-wrap{ margin-bottom:0px !important;  }
    .k-input{ margin:0px !important; }
    .k-dropdown-wrap .k-input{ height:26px !important; margin-bottom:-7px; border-bottom:1px #ccc solid !important; }
    .k-i-arrow-s{ margin-top:-3px !important; }
    .k-dropdown-wrap{ margin-bottom:4px !important; }
    .k-pager-refresh,.k-textbox,.k-widget{ margin-top:1px !important; }
    .k-grid-filter{ padding-top:0px !important; }
    .k-grouping-header{ padding-left:10px !important; }
    .k-i-clock,.k-add,.k-delete,.k-edit{ margin-top:0px !important; }
    button.k-button{ padding:5px; font-size:12px; font-weight:bolder; color:#292B29; }
</style>
<style type="text/css">
    span.k-i-calendar
    {
        margin-top: -7px !important;
    }
    
    .k-plus
    {
        margin-top: -3px !important;
    }

    .k-datepicker .k-picker-wrap
    {
        margin-top: -6px;
    }
</style>

<script type="text/javascript">
    $(document).ready(function () {

        $(".k-datepicker").kendoDatePicker({
            format: "yyyy-MM-dd",
            animation: false
        });
    });
</script>
