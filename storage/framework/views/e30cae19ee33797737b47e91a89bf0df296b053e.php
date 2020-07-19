<?php if(count($inclusiveMeal)>0): ?>
    <?php $__currentLoopData = $inclusiveMeal; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="cell-12" id="im<?php echo e($row->id); ?>" style="clear: both; padding: 0px; padding-bottom: 5px; padding-top: 5px; border-bottom: 1px #ccc solid;">
            <div id="proName<?php echo e($row->id); ?>" class="cell-4" style="padding-left: 0px;">
                <div><strong><?php echo e($row->name); ?></strong></div>
                <p><?php echo e($row->description); ?></p>
            </div>
            <div class="cell-3">
                <div style="text-align: center;"><strong>Price : from £<span id="imp<?php echo e($row->id); ?>"><?php echo e($row->price); ?></span></strong></div>
            </div>
            <?php
                $optMenu=json_decode(unserialize($row->product_json));
                $k=1;
            ?>

            <div class="cell-5" style="padding-right: 0px;">
                <?php if(count($optMenu)>0): ?>
                    <?php $__currentLoopData = $optMenu; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $rw): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="cell-12" style="margin-bottom: 5px; padding: 0px;">
                            <div class="cell-6" style="text-align: right; line-height: 33px; padding-right: 0px; font-weight: 600;">
                                <?php echo e($rw->pro_opt_name); ?>

                            </div>
                            <div class="cell-6" style="padding-right: 0px;">
                                <select name="imjname<?php echo e($row->id); ?>_<?php echo e(str_replace('.','_',str_replace(' ','_',$rw->pro_opt_name))); ?>" data-opt-cond="<?php echo e($rw->pro_opt_name); ?>" class="form-control inmPrice imj<?php echo e($row->id); ?>" data-tag="<?php echo e($row->id); ?>" style="width: 100%;">
                                    <option value="0">Please Select</option>
                                    <?php if(count($rw->option_param)>0): ?>
                                        <?php $__currentLoopData = $rw->option_param; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $rr): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option data-price="<?php echo e($rr->price); ?>" value="<?php echo e($rr->name); ?>"><?php echo e($rr->name); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <?php endif; ?>
                                </select>
                            </div>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php endif; ?>

                <div class="cell-12" style="text-align: right;">
                    <div class="cell-6"></div>
                    <div class="cell-6" style="padding-right: 0px;">
                        <button data-pull="<?php echo e($row->id); ?>" class="btn btn-block btn-danger addtocartim" type="button">Add To Cart</button>
                    </div>
                </div>
                
            </div>
 
        </div>

    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php endif; ?>