<style type="text/css">
.micm
{
        position: absolute;
        right: 39px;
        font-weight: bold;
        top: 0px;

}

.micm::before
{
    content: '£';
}
</style>
<ul id="accordion" class="accordion">
    <?php if(count($inclusiveMeal)>0): ?>
        <?php $__currentLoopData = $inclusiveMeal; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            
            <li>
                <h3 class="skew-25">
                    
                    <a href="#" id="proMobileName<?php echo e($row->id); ?>">
                        <span style="width:80%; overflow:hidden;" class="skew25">
                            <?php echo e($row->name); ?>

                        </span>
                        <span class="micm" id="micm_<?php echo e($row->id); ?>">
                            <?php echo e($row->price); ?>

                        </span>
                    </a>
                </h3>
                <div class="accordion-panel active">
                    <table cellpadding="0" cellspacing="0" border="0">
                                <tbody id="place_pro_<?php echo e($row->id); ?>">
                                    <tr>
                                        <td colspan="3">
                                            <span class="proName"><?php echo e($row->name); ?></span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="3">
                                            <p class="proDes" style="text-transform: capitalize;  font-style: italic !important;">
                                                <?php echo $row->description;?>
                                            </p>
                                        </td>
                                    </tr>
                                    <?php
                                        $optMenu=json_decode(unserialize($row->product_json));
                                        $k=1;
                                    ?>
                                    <?php if(count($optMenu)>0): ?>
                                        <?php $__currentLoopData = $optMenu; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $rw): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <tr>
                                                <td colspan="3">
                                                    <div class="cell-12" style="margin-bottom: 5px; padding: 0px;">
                                                        <div class="cell-6" style="text-align: left; line-height: 33px; padding-left: 0px; font-weight: 600;">
                                                            <?php echo e($rw->pro_opt_name); ?>

                                                        </div>
                                                        <div class="cell-6" style="padding-left: 0px;">
                                                            <select name="imjnameMobile<?php echo e($row->id); ?>_<?php echo e(str_replace('.','_',str_replace(' ','_',$rw->pro_opt_name))); ?>" data-opt-cond="<?php echo e($rw->pro_opt_name); ?>" class="form-control inmPriceMobile imjMobile<?php echo e($row->id); ?>" data-tag="<?php echo e($row->id); ?>" style="width: 100%;">
                                                                <option value="0">Please Select</option>
                                                                <?php if(count($rw->option_param)>0): ?>
                                                                    <?php $__currentLoopData = $rw->option_param; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $rr): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                        <option data-price="<?php echo e($rr->price); ?>" value="<?php echo e($rr->name); ?>"><?php echo e($rr->name); ?></option>
                                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                                <?php endif; ?>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    
                                                </td>
                                            </tr>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <?php endif; ?>
                                    <tr>
                                        <td colspan="3">
                                            <div class="cell-12" style="text-align:left; padding-left:0px;">
                                                    <button data-pull="<?php echo e($row->id); ?>" class="btn btn-block btn-danger addtocartimMobile" type="button">Add To Cart</button>
                                            </div>
                                        </td>
                                    </tr>

                                </tbody>
                    </table>
                </div>
            </li>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    <?php endif; ?>
</ul>