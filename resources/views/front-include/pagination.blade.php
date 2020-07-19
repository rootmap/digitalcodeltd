<div class="content_sortPagiBar block">
    <div class="bottom-pagination-content sortPagiBar clearfix">
        <ul class="display hidden-xs">
            <li class="display-title">View as:</li>
            <li id="grid"><a rel="nofollow" href="#" title="Grid"><i class="icon-th-large"></i></a></li>
        </ul>
        <form id="productsSortForm" action="12-shop" class="productsSortForm">
            <div class="select selector1">
                <label for="selectProductSort">Sort by</label>
                    <?php 
                    $arrayFilter=array('position:asc'=>'Position','price:asc'=>'Price: Lowest first','price:desc'=>'Price: Highest first','name:asc'=>'Product Name: A to Z','name:desc'=>'Product Name: Z to A','quantity:desc'=>'In stock');
                    ?>
                <select id="selectProductSort" onchange="pageFilterAssign(this.value)" class="selectProductSort form-control">
                    <?php 
                    foreach ($arrayFilter as $key => $value) {
                        $selectedText='';
                        if(session::has('filter')){ if(session::get('filter')==$key){ $selectedText=' selected="selected"'; } }
                        ?>
                        <option value="<?=$key?>"<?=$selectedText?>><?=$value?></option>
                        <?php
                    }
                    ?>
                </select>
            </div>
        </form>
        <form action="12-shop" method="get" class="nbrItemPage">
            <div class="clearfix selector1">
                <label for="nb_item"> Show </label>
                <input type="hidden" name="id_category" value="12" />
                        <?php 
                        $arrayLimitLoop=array(3,9,18,72,100);
                        ?>
                        <select name="n" id="nb_item"  onchange="pageLimitAssign(this.value)" class="form-control">
                            <?php 
                            foreach ($arrayLimitLoop as $value) {
                                $selectedTextLimit='';
                                if(session::has('pagination_limit')){ if(session::get('pagination_limit')==$value){ $selectedTextLimit=' selected="selected"'; } }
                                ?>
                                <option value="<?=$value?>"<?=$selectedTextLimit?>><?=$value?></option>
                                <?php
                            }
                            ?>
                           
                        </select> 
                        <span>per page</span></div>
                       </form>
                       <div id="pagination_bottom" class="pagination clearfix"> 
                        <?php 
                        if(!empty(trim($product_info->links()))){ 
                            ?>
                            <span class="ft_page"> Page: </span>
                            {!!$product_info->links()!!}
                            <?php }else{ ?>
                            <span class="ft_page"> Page: </span> 
                            <ul class="pagination">
                                <li class="disabled"><span>«</span></li>
                                <li class="active"><span>1</span></li>
                                <li class="disabled"><span>»</span></li>
                            </ul>
                            <?php }  ?>

                            <form class="showall" action="12-shop" method="get">
                                <div>
                                    <button type="submit" class="btn btn-default button exclusive-medium"> <span>Show all</span> </button>
                                    <input type="hidden" name="id_category" value="12" />
                                    <input name="n" id="nb_item" class="hidden" value="13" />
                                </div>
                            </form>
                        </div>
                    </div>
                </div>