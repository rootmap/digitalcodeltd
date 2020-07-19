<?php print '<?xml version="1.0" encoding="UTF-8" ?>'; ?>
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
    <url>
        <loc><?php echo url(); ?></loc>
    </url>
	<url>
        <loc><?php echo url('home'); ?></loc>
    </url>
    <url>
        <loc><?php echo url('order-item'); ?></loc>
    </url>
	<?php if(isset($category)): ?>
		<?php $__currentLoopData = $category; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
		<url>
			<loc><?php echo url('order-item#pro'.$cat->id); ?></loc>
		</url>
		<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
	<?php endif; ?>
    <url>
        <loc><?php echo url('our-offer'); ?></loc>
    </url>
	<url>
        <loc><?php echo url('gallery'); ?></loc>
    </url>
	<url>
        <loc><?php echo url('reviews'); ?></loc>
    </url>
    <url>
        <loc><?php echo url('contact-us'); ?></loc>
    </url>
   
</urlset>