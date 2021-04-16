<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd"> 
<html xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes(); ?>> 
<head profile="http://gmpg.org/xfn/11"> 
    <meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
    
    <meta name="viewport" content="minimum-scale=1.0, target-densitydpi=device-dpi, width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <meta name="HandheldFriendly" content="true">
    <meta name="MobileOptimized" content="320">

    <link rel="icon" type="image/png" sizes="256x256" href="<?php echo get_template_directory_uri();?>/img/favicons/icon256.png">
    <link rel="icon" type="image/png" sizes="128x128" href="<?php echo get_template_directory_uri();?>/img/favicons/icon128.png">
    <link rel="icon" type="image/png" sizes="64x64" href="<?php echo get_template_directory_uri();?>/img/favicons/icon64.png">
    <link rel="icon" type="image/png" sizes="32x32" href="<?php echo get_template_directory_uri();?>/img/favicons/icon32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="<?php echo get_template_directory_uri();?>/img/favicons/icon16.png">
    <link rel="icon" type="image/svg+xml" sizes="any" href="<?php echo get_template_directory_uri();?>/img/favicons/airpods.svg"> 

    <script src="https://securepayments.sberbank.ru/payment/docsite/assets/js/ipay.js"></script>
	<script>
		var ipay = new IPAY({api_token: '1vkpic9blj0mm7f01d1mh7ae63'});
	</script>

    <title><?php wp_title(); ?></title>
    	
    <?php wp_head();?> 
	
</head>

<body>

<script>  
    let bascet_page = "<?echo get_the_permalink(13); ?>";
    let thencs_page = "<?echo get_the_permalink(42); ?>";
    let nophoto_page = "<?echo get_bloginfo("template_url");?>/img/no-photo.jpg";
</script>  

<!-- Скрипт для вывода яндекс карт Подключать непосредственно перед вызовом скрипта инициализации карты-->
<!-- <script src="//api-maps.yandex.ru/2.1/?lang=ru_RU" type="text/javascript"></script> -->



<!-- Подключение  модальных окон-->
<? include "modal-win.php";?>
<div id="wrapper">


