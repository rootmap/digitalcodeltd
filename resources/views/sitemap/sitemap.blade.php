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
	@if(isset($category))
		@foreach($category as $cat)
		<url>
			<loc><?php echo url('order-item#pro'.$cat->id); ?></loc>
		</url>
		@endforeach
	@endif
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