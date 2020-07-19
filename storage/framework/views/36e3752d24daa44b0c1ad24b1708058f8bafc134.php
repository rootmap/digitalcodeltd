<div class="productmbl">
        <ul id="accordion" class="accordion">
            <?php 
            $modal='';
            ?>
            <?php if(count($category)>0): ?>
                <?php $__currentLoopData = $category; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <li>
                <h3 class="skew-25">
                    <a href="#">
                        <span class="skew25">
                            <?php echo e($cat['name']); ?>

                            
                        </span>
                    </a>
                </h3>
                
                <div class="accordion-panel active">

                    <?php
                    if($cat['layout']==1 || $cat['layout']==4){
                        if(isset($cat['product_row']))
                        {
                            ?>
                            <table cellpadding="0" cellspacing="0" border="0">
                                <tbody id="place_pro_<?php echo e($cat['id']); ?>">
                                    <?php if(!empty($cat['description'])): ?>
                                        <tr>
                                            <td colspan="3">
                                                <p class="proDes" style="text-transform: capitalize;  font-style: italic !important;">
                                                    <?php echo $cat['description'];?>
                                                </p>
                                            </td>
                                        </tr>
                                    <?php endif; ?>
                                    <?php 
                                    foreach ($cat['product_row'] as $key => $row) 
                                    {
                                        $interface=$row['interface'];
                                        ?>
                                        <tr>
                                                    <td width="80%">
                                                        <span class="proName"><?php echo e($row['name']); ?></span>
                                                    </td>
                                                    <td><span style="font-weight: 900;">
                                                    <?php if($interface==3): ?>
                                                    <?php 
                                                    $min_prince_row=0; 
                                                    foreach($row['modal'] as $key=>$mod):
                                                        if($min_prince_row>0)
                                                        {
                                                            if($min_prince_row>$mod['price'])
                                                            {
                                                                $min_prince_row=$mod['price'];
                                                            }
                                                        }
                                                        else
                                                        {
                                                            $min_prince_row=$mod['price'];
                                                        }
                                                    endforeach;
                                                    echo "£".$min_prince_row;
                                                    ?>
                                                    <?php else: ?>
                                                        £<?php echo e($row['price']); ?>

                                                    <?php endif; ?>
                                                    </span></td>
                                                    <td align="right">
                                                        <div class="prosec" style="width: 42px;">
                                                            <?php if($interface==5): ?>
                                                                <a href="javascript:void(0);" class="button-cart_wop button proButton modal-trigger" data-modal="pizza_modal_name_<?php echo e($row['id']); ?>"><i class="fa fa-plus"></i></a>
                                                            <?php elseif($interface==4): ?>
                                                                <a href="javascript:void(0);" class="button-cart_wop button proButton modal-trigger" data-modal="ex_modal-name_<?php echo e($row['id']); ?>"><i class="fa fa-plus"></i></a>
                                                            <?php elseif($interface==3): ?>
                                                                <a href="javascript:void(0);" class="button-cart_wop button proButton modal-trigger" data-modal="other_modal_name_<?php echo e($row['id']); ?>"><i class="fa fa-plus"></i></a>
                                                            <?php elseif($interface==2): ?>
                                                                &nbsp;
                                                            <?php else: ?>
                                                            <p class="proPrice">
                                                                
                                                                <div style="height: 0px; width: 0px; overflow: hidden;">
                                                                    <img src="<?php echo e(url('front-theme/images/cart-icon.png')); ?>">
                                                                </div>
                                                                <a href="javascript:void(0);" data-id="<?php echo e($row['id']); ?>" class="proButton add-cart"><i class="fa fa-plus"></i></a>
                                                            </p>
                                                            <?php endif; ?>
                                                        </div>
                                                    </td>
                                                </tr>

                                                <?php if(!empty($row['description'])): ?>
                                                    <tr>

                                                        <td colspan="3"><p class="proDes" style=" font-style: italic !important;"><?php echo e(strip_tags(html_entity_decode($row['description']))); ?></p></td>
                                                    </tr>
                                                <?php endif; ?>


                                                <?php if($interface==2): ?>

                                                    <?php $__currentLoopData = $row['ProductOneSubLevel']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $dt): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <tr>
                                                        <td>
                                                            <span class="proName"><?php echo e($dt['name']); ?></span>
                                                        </td>
                                                        <td><span>£<?php echo e($dt['price']); ?></span></td>
                                                        <td align="right">
                                                            <div class="prosec">
                                                                <p class="proPrice">
                                                                    
                                                                    <div style="height: 0px; width: 0px; overflow: hidden;">
                                                                        <img src="<?php echo e(url('front-theme/images/cart-icon.png')); ?>">
                                                                    </div>
                                                                    <a  href="javascript:void(0);" data-name-snd="<?php echo e($dt['name']); ?>"  data-id="<?php echo e($row['id']); ?>" snd-data-id="<?php echo e($dt['id']); ?>" snd-data-price="<?php echo e($dt['price']); ?>" ex-class="add-snd-subcat-cart" name="dddd"  class="add-snd-cart proButton">
                                                                       <i class="fa fa-plus"></i>
                                                                   </a>
                                                                </p>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                                <?php endif; ?>
                                        <?php
                                    }
                                    ?>
                                    

                                             
                                </tbody>
                            </table>


                            <?php
                        }
                    }
                    elseif($cat['layout']==2)
                    {
                        if(isset($cat['product_row']))
                        {
                            ?>
                            <table cellpadding="0" cellspacing="0" border="0" width="100%">
                                <tbody id="place_pro_<?php echo e($cat['id']); ?>">
                                    <?php if(!empty($cat['description'])): ?>
                                        <tr>
                                            <td colspan="3">
                                                <p class="proDes" style="text-transform: capitalize;  font-style: italic !important;">
                                                    <?php echo $cat['description'];?>
                                                </p>
                                            </td>
                                        </tr>
                                    <?php endif; ?>
                                    <?php 

                                    foreach ($cat['product_row'] as $key => $sc) 
                                    {
                                        ?>
                                        <tr>
                                            <td colspan="3">
                                                <span class="proName"><?php echo e($sc['name']); ?></span><br>
                                                <i><?php echo e($sc['description']); ?></i>
                                            </td>
                                        </tr>
                                        <?php 
                                        foreach ($sc['sub_product_row'] as $key => $row) 
                                        {
                                        
                                        $interface=$row['interface'];
                                        ?>
                                        <?php if($interface!=2): ?>
                                        <tr>
                                            <td width="80%">
                                                <p class="proDes"><?php echo e($row['name']); ?>

                                                    <i><?php echo $row['description']?'<br>'.$row['description']:'';?></i>
                                                </p>
                                            </td>
                                            <td>
                                            <span style="font-weight: 900;">
                                            <?php if($interface==3): ?>
                                            <?php 
                                            $min_prince_row=0; 
                                            foreach($row['modal'] as $key=>$mod):
                                                if($min_prince_row>0)
                                                {
                                                    if($min_prince_row>$mod['price'])
                                                    {
                                                        $min_prince_row=$mod['price'];
                                                    }
                                                }
                                                else
                                                {
                                                    $min_prince_row=$mod['price'];
                                                }
                                            endforeach;
                                                echo "£".$min_prince_row;
                                            ?>
                                            <?php else: ?>
                                                <?php if(!empty($row['price'])): ?>
                                                    £<?php echo e($row['price']); ?>

                                                <?php endif; ?>
                                            <?php endif; ?>
                                            </span>
                                            </td>
                                            <td align="right">

                                                <div class="prosec">
                                                    <?php if($interface==5): ?>
                                                        <a href="javascript:void(0);" class="button-cart_wop button proButton modal-trigger" data-modal="pizza_modal_name_<?php echo e($row['id']); ?>"><i class="fa fa-plus"></i></a>
                                                    <?php elseif($interface==4): ?>
                                                        <a href="javascript:void(0);" class="button-cart_wop button proButton modal-trigger" data-modal="ex_modal-name_<?php echo e($row['id']); ?>"><i class="fa fa-plus"></i></a>
                                                    <?php elseif($interface==3): ?>
                                                        <a href="javascript:void(0);" class="button-cart_wop button proButton modal-trigger" data-modal="other_modal_name_<?php echo e($row['id']); ?>"><i class="fa fa-plus"></i></a>
                                                    <?php elseif($interface==2): ?>
                                                        &nbsp;
                                                    <?php else: ?>
                                                    <p class="proPrice">
                                                        
                                                        <div style="height: 0px; width: 0px; overflow: hidden;">
                                                            <img src="<?php echo e(url('front-theme/images/cart-icon.png')); ?>">
                                                        </div>
                                                        <a href="javascript:void(0);" data-sub-name="<?php echo e($sc['name']); ?>"  data-id="<?php echo e($row['id']); ?>" class="proButton add-cart"><i class="fa fa-plus"></i></a>
                                                    </p>
                                                    <?php endif; ?>
                                                </div>
                                            </td>
                                        </tr>
                                        <?php endif; ?>
                                        <?php if($interface==2): ?>
                                            <?php $__currentLoopData = $row['ProductOneSubLevel']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $dt): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <tr>
                                                <td width="60%" align="left" valign="top">
                                                    <span class="proName" style="font-weight: 100 !important;"><?php echo e($dt['name']); ?></span>
                                                </td>
                                                <td align="right" style="font-weight: bold;"><span>£<?php echo e($dt['price']); ?></span></td>
                                                <td width="20%" align="right" valign="top">
                                                    <div class="prosec">
                                                        <p class="proPrice">
                                                            
                                                            <div style="height: 0px; width: 0px; overflow: hidden;">
                                                                <img src="<?php echo e(url('front-theme/images/cart-icon.png')); ?>">
                                                            </div>
                                                            <a href="javascript:void(0);"  data-extra-id="<?php echo e($dt['id']); ?>" data-id="<?php echo e($row['id']); ?>" data-sub-name="<?php echo e($sc['name']); ?>"  class="proButton add-subcat-cart"><i class="fa fa-plus"></i></a>
                                                        </p>
                                                    </div>
                                                </td>
                                            </tr>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        <?php endif; ?>
                                    <?php
                                        
                                    }

                                    }
                                    ?>         
                                </tbody>
                            </table>
                            <?php
                        }
                    }
                    ?>


                </div>
            </li>



            
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php endif; ?>





            <?php /*
            <li>
                <h3 class="skew-25"><a href="#"><span class="skew25">MAIN COURSES</span></a></h3>
                
                <div class="accordion-panel">
                    <table cellpadding="0" cellspacing="0" border="0">
                        <tbody>
                            <?php 
                            for($i=1; $i<=5; $i++){
                                ?>
                                <tr>
                                    <td width="60%">
                                        <span class="proName"> Salmon-Ka-Tukra </span>
                                        <p class="proDes">
                                            Salmon Steak tempered with roasted spices then grilled.
                                        </p>
                                    </td>
                                    <td width="20%"></td>
                                    <td width="20%" align="right">

                                        <div class="prosec">
                                            <p class="proPrice">
                                                <span>£5.50</span>
                                                <div style="height: 0px; width: 0px; overflow: hidden;">
                                                    <img src="{{url('front-theme/images/cart-icon.png')}}">
                                                </div>
                                                <a href="javascript:void(0);" class="proButton add-cart"><i class="fa fa-plus"></i></a>
                                            </p>
                                        </div>
                                    </td>
                                </tr>
                                <?php
                            }
                            ?>
                            
                                     
                        </tbody>
                    </table>
                </div>
            </li>
            <li>
                <h3 class="skew-25"><a href="#"><span class="skew25">SPECIAL PRESENTATION</span></a></h3>
                
                <div class="accordion-panel">
                    <table cellpadding="0" cellspacing="0" border="0">
                        <tbody>
                            <?php 
                            for($i=1; $i<=5; $i++){
                                ?>
                                <tr>
                                    <td width="60%">
                                        <span class="proName"> Salmon-Ka-Tukra </span>
                                        <p class="proDes">
                                            Salmon Steak tempered with roasted spices then grilled.
                                        </p>
                                    </td>
                                    <td width="20%"></td>
                                    <td width="20%" align="right">

                                        <div class="prosec">
                                            <p class="proPrice">
                                                <span>£5.50</span>
                                                <div style="height: 0px; width: 0px; overflow: hidden;">
                                                    <img src="{{url('front-theme/images/cart-icon.png')}}">
                                                </div>
                                                <a href="javascript:void(0);" class="proButton add-cart"><i class="fa fa-plus"></i></a>
                                            </p>
                                        </div>
                                    </td>
                                </tr>
                                <?php
                            }
                            ?>
                            
                                     
                        </tbody>
                    </table>
                </div>
            </li> */ ?>
           
        </ul>
    </div>