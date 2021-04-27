<?php

define("COMPANY_NAME", "Магазин Appleears");
define("MAIL_RESEND", "noreaply@appleears.ru");

//----Подключене carbon fields
//----Инструкции по подключению полей см. в комментариях themes-fields.php
include "carbon-fields/carbon-fields-plugin.php";

use Carbon_Fields\Container;
use Carbon_Fields\Field;

add_action( 'carbon_fields_register_fields', 'crb_attach_theme_options' ); 
function crb_attach_theme_options() {
	require_once __DIR__ . "/themes-fields.php";
}

add_action( 'after_setup_theme', 'crb_load' );
function crb_load() {
	require_once( 'carbon-fields/vendor/autoload.php' );
	\Carbon_Fields\Carbon_Fields::boot();
} 

//-----Блок описания вывода меню
// 1. Осмысленные названия для алиаса и для описания на русском.
// если это меню в подвали пишем - Меню в подвале 
// если в шапке то пишем - Меню в шапке 
// если 2 меню в шапке пишем  - Меню в шапке (верхняя часть)

add_action( 'after_setup_theme', function(){
	register_nav_menus( [
		'menu_hot' => 'Меню актуальных предложений (рядом с каталогом)',
		'menu_cat' => 'Меню каталога', 
		'menu_main' => 'Меню основное',
		'menu_corp' => 'Общекорпоративное меню (верхняя шапка)', 
	] );
} ); 

// Добавление стилей к пунктам меню
// add_filter( 'nav_menu_css_class', 'change_menu_item_css_classes', 10, 4 );

// function change_menu_item_css_classes( $classes, $item, $args, $depth ) {
// 	if( 30 === $item->ID  && 'menu_corp' === $args->theme_location ){
// 		$classes[] = 'link__drop-down';
// 	}

// 	if( 34 === $item->ID  && 'menu_main' === $args->theme_location ){
// 		$classes[] = 'menu__catalogy';
// 	}

// 	return $classes;
// }

add_theme_support( 'post-thumbnails' );
set_post_thumbnail_size( 185, 185 ); 

add_post_type_support( 'page', 'excerpt' );

// Подключение стилей и nonce для Ajax в админку 
add_action('admin_head', 'my_assets_admin');
function my_assets_admin(){
	wp_enqueue_style("style-adm",get_template_directory_uri()."/style-admin.css");
	
	wp_localize_script( 'jquery', 'allAjax', array(
			'nonce'   => wp_create_nonce( 'NEHERTUTLAZIT' )
		) );
}

define("ALL_VERSION", "1.0.14");

// Подключение стилей и nonce для Ajax и скриптов во фронтенд 
add_action( 'wp_enqueue_scripts', 'my_assets' );
	function my_assets() {

		// Подключение стилей 

		
		// wp_enqueue_style("style-modal", get_template_directory_uri()."/css/jquery.arcticmodal-0.3.css", array(), ALL_VERSION, 'all'); 
		wp_enqueue_style("style-lightbox", get_template_directory_uri()."/css/lightbox.min.js", array(), ALL_VERSION, 'all'); //Лайтбокс (стили)
		wp_enqueue_style("style-slik", get_template_directory_uri()."/css/slick.css", array(), ALL_VERSION, 'all'); //Слайдер (стили)

		wp_enqueue_style("main-style", get_stylesheet_uri(), array(), ALL_VERSION, 'all' ); // Подключение основных стилей в самом конце

		// Подключение скриптов
		
		wp_enqueue_script( 'jquery');


		wp_enqueue_script( 'imasc', get_template_directory_uri().'/js/imask.js', array(), ALL_VERSION , true);
		


		// wp_enqueue_script( 'amodal', get_template_directory_uri().'/js/jquery.arcticmodal-0.3.min.js', array(), ALL_VERSION , true); 
		wp_enqueue_script( 'mask', get_template_directory_uri().'/js/jquery.inputmask.bundle.js', array(), ALL_VERSION , true); //маска для инпутов
		wp_enqueue_script( 'lightbox', get_template_directory_uri().'/js/lightbox.min.js', array(), ALL_VERSION , true); //Лайтбокс
		wp_enqueue_script( 'slick', get_template_directory_uri().'/js/slick.min.js', array(), ALL_VERSION , true); //Слайдер

		wp_enqueue_script( 'main', get_template_directory_uri().'/js/main.js', array(), ALL_VERSION , true); // Подключение основного скрипта в самом конце
		
		if ( is_page(13))
		{
			wp_enqueue_script( 'vue', get_template_directory_uri().'/js/vue.js', array(), ALL_VERSION , true);
			wp_enqueue_script( 'axios', get_template_directory_uri().'/js/axios.min.js', array(), ALL_VERSION , true);
			wp_enqueue_script( 'bascet', get_template_directory_uri().'/js/bascet.js', array(), ALL_VERSION , true);
		}

		
		wp_localize_script( 'main', 'allAjax', array(
			'ajaxurl' => admin_url( 'admin-ajax.php' ),
			'nonce'   => wp_create_nonce( 'NEHERTUTLAZIT' )
		) );
	}



	// Заготовка для вызова ajax
	add_action( 'wp_ajax_aj_fnc', 'aj_fnc' );
	add_action( 'wp_ajax_nopriv_aj_fnc', 'aj_fnc' );

	function aj_fnc() {
		if ( empty( $_REQUEST['nonce'] ) ) {
			wp_die( '0' );
		}
		
		if ( check_ajax_referer( 'NEHERTUTLAZIT', 'nonce', false ) ) {


			
		} else {
			wp_die( 'НО-НО-НО!', '', 403 );
		}
	}
	



// Отправка корзины
	
add_action( 'wp_ajax_send_cart', 'send_cart' );
add_action( 'wp_ajax_nopriv_send_cart', 'send_cart' );

function send_cart() {
	if ( empty( $_REQUEST['nonce'] ) ) {
		wp_die( '0' );
	}
	
	if ( check_ajax_referer( 'NEHERTUTLAZIT', 'nonce', false ) ) {

		$headers = array(
			'From: Сайт '.COMPANY_NAME.' <'.MAIL_RESEND.'>',
			'content-type: text/html',
		);
	
		add_filter('wp_mail_content_type', create_function('', 'return "text/html";'));
		
		$adr_to_send = carbon_get_theme_option("mail_to_send");
		$adr_to_send = (empty($adr_to_send))?"asmi046@gmail.com":$adr_to_send;
		
		$zak_number = "LS-".date("H").date("s").date("s")."-".rand(100,999);

		$mail_content = "<h1>Заказ на сайте №".$zak_number."</h1>";
		
		$bscet_dec = json_decode(stripcslashes ($_REQUEST["bascet"]));
		
		$mail_content .= "<table style = 'text-align: left;' width = '100%'>";
			$mail_content .= "<tr>";
				$mail_content .= "<th></th>";
				$mail_content .= "<th>ТОВАР</th>";
				$mail_content .= "<th>КОЛЛИЧЕСТВО</th>";
				$mail_content .= "<th>СУММА</th>";
			$mail_content .= "</tr>";

			for ($i = 0; $i<count($bscet_dec); $i++) {
				$mail_content .= "<tr>";
					$mail_content .= "<td><img src = '".$bscet_dec[$i]->picture."' width = '70' height = '70'></td>";
					$mail_content .= "<td><a href = '".$bscet_dec[$i]->lnk."'>".$bscet_dec[$i]->name." / ".$bscet_dec[$i]->sku."</a></td>";
					$mail_content .= "<td>".$bscet_dec[$i]->count."</td>";
					$mail_content .= "<td>".$bscet_dec[$i]->subtotal." р.</td>";
				$mail_content .= "</tr>";
			}

		$mail_content .= "</table>";
		$mail_content .= "<h2>Сумма: ".$_REQUEST["bascetsumm"]." р.</h2>";

		
		$mail_content .= "<strong>Имя:</strong> ".$_REQUEST["name"]."<br/>";
		$mail_content .= "<strong>Телефон:</strong> ".$_REQUEST["phone"]."<br/>";
		$mail_content .= "<strong>Адрес:</strong> ".$_REQUEST["adres"]."<br/>";
		$mail_content .= "<strong>Модель устройства:</strong> ".$_REQUEST["model"]."<br/>";
		$mail_content .= "<strong>Сторона:</strong> ".$_REQUEST["storona"]."<br/>";
		
		$mail_them = "Заказ на сайте appleears.ru";

		$uploaddir = __DIR__.'/uploads/';
		$uploadfile = $uploaddir . basename($_FILES['design']['name']);
		$attach = "";	

		if (move_uploaded_file($_FILES['design']['tmp_name'], $uploadfile)) 
			$attach = $uploadfile;

		$mail_content .= "<strong>Дизайн:</strong> ".print_r($attach,true)."<br/>";


		if (wp_mail($adr_to_send, $mail_them, $mail_content, $headers,$attach)) {
			wp_die(json_encode(array("send" => true,  "price" => $_REQUEST["bascetsumm"], "n" => $_REQUEST["name"], "phone" =>$_REQUEST["phone"] , "adres" => $_REQUEST["adres"] , "zn" => $zak_number)));
		}
		else {
			wp_die( 'Ошибка отправки!', '', 403 );
		}
		
	} else {
		wp_die( 'НО-НО-НО!', '', 403 );
	}
}


add_action( 'wp_ajax_sendpay', 'sendpay' );
add_action( 'wp_ajax_nopriv_sendpay', 'sendpay' );

  function sendpay() {
    if ( empty( $_REQUEST['nonce'] ) ) {
      wp_die( '0' );
    }
    
    if ( check_ajax_referer( 'NEHERTUTLAZIT', 'nonce', false ) ) {
      
      $headers = array(
        'From: Сайт '.COMPANY_NAME.' <'.MAIL_RESEND.'>', 
        'content-type: text/html',
      );

	  $zak_number = "LS-".date("H").date("s").date("s")."-".rand(100,999);
    
	  $uploaddir = __DIR__.'/uploads/';
	  $uploadfile = $uploaddir . basename($_FILES['design']['name']);
	  $attach = "";	

	  if (move_uploaded_file($_FILES['design']['tmp_name'], $uploadfile)) 
			$attach = $uploadfile;

      add_filter('wp_mail_content_type', create_function('', 'return "text/html";'));
       if (wp_mail(carbon_get_theme_option( 'as_email_send' ), 'Заявка с формы: «Оформить заказ»', '<strong>Товар:</strong> '.$_REQUEST["titleM"]. ' <br/> <strong>Имя:</strong> '.$_REQUEST["nameM"]. ' <br/> <strong>Телефон:</strong> '.$_REQUEST["telM"]. ' <br/> <strong>Адрес доставки:</strong> '.$_REQUEST["adrrM"]. ' <br/> <strong>Модель устройства:</strong> '.$_REQUEST["modelM"]. ' <br/> <strong>Сторона:</strong> '.$_REQUEST["sideM"].print_r($_FILES['design'],true), $headers,$attach))
       	wp_die(json_encode(array("send" => true,  "price" => $_REQUEST["price"], "n" => $_REQUEST["nameM"], "phone" =>$_REQUEST["telM"] , "adres" => $_REQUEST["adrrM"] , "zn" => $zak_number)));
      else 
	  	wp_die(json_encode(array("send" => false)));

    } else {
      wp_die( 'НО-НО-НО!', '', 403 );
    }
  }



?>