

<div id="page">


    <div class="columns-container" style="padding-top: 20px;">
        <div id="columns" class="container">
            <div id="slider_row" class="row"></div>
            <div class="row">
                <div id="center_column" class="center_column col-xs-12 col-sm-12 col-md-12">
                    <h1 class="page-heading">Terms & Condition</h1>
                    @include('front-include.msg')
                    <div class="row">
                        <div class="col-md-12">
                            <?=nl2br($csudet[0]->site_terms_condition)?>
                        </div>
                    </div>
                </div>
                
            </div>
        </div>
    </div>
</div>

