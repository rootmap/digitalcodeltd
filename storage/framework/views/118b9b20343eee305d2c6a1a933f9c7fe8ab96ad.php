<?php print '<?xml version="1.0" encoding="UTF-8" ?>'; ?>
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
    <url>
        <loc>http://lovegoldenbengal.co.uk</loc>
    </url>
	<url>
        <loc>http://lovegoldenbengal.co.uk/home</loc>
    </url>
    <url>
        <loc>http://lovegoldenbengal.co.uk/order-item</loc>
    </url>
	<?php if(isset($category)): ?>
		<?php $__currentLoopData = $category; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
		<url>
			<loc>http://lovegoldenbengal.co.uk/order-item#pro<?php echo e($cat->id); ?></loc>
		</url>
		<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
	<?php endif; ?>
    <url>
        <loc>http://lovegoldenbengal.co.uk/our-offer</loc>
    </url>
	<url>
        <loc>http://lovegoldenbengal.co.uk/gallery</loc>
    </url>
	<url>
        <loc>http://lovegoldenbengal.co.uk/reviews</loc>
    </url>
	<url>
        <loc>http://lovegoldenbengal.co.uk/reviews</loc>
    </url>
    <url>
        <loc>http://lovegoldenbengal.co.uk/contact-us</loc>
    </url>
   
</urlset>