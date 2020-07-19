
<?php $sitename = ""; ?>
<?php $sitedes = ""; ?>
<?php $sitekeyword = ""; ?>
@if(isset($seo))
    @if(!empty($seo))
    <?php $sitename = " | " . $seo[0]->name; ?>
    <?php $sitedes = $seo[0]->description; ?>
    <?php $sitekeyword = $seo[0]->meta; ?>
    @endif
@endif
@section('title')
<title>Welcome<?= $sitename ?></title> 
<meta name="author" content="Md Fahad Bhuyian, Md Mahamoudur Zaman Bhuyan">
<meta name="description" content="<?= html_entity_decode($sitedes) ?>">
<meta name="keywords" content="<?= $sitekeyword ?>">
@endsection


