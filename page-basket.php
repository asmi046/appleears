<?php get_header();

/*
Template Name: Шаблон страницы корзина
WP Post Template: Шаблон окно покупки
Template Post Type: page
*/

?>

<main class="main main-basket">

	<template id = "bascet">
		<section class="basket-section"> 
			<div class="inner">
				<div class="header-window__inner">
					<h1><?php the_title();?></h1> 
					<a onclick="event.preventDefault(); window.history.back()" href="#" class="header-window__link-back"></a>
				</div>
				<div class="red-line"></div>

				<div v-if = "bascet.length > 0" class="basket-section__col d-flex">
					
					<div v-for = "(item, index, key) in bascet" class="product__block d-flex">
						<div class="product__img">
							<img :src = "item.picture" :alt="item.name" :title="item.name">
						</div>
						<div class="product__choice d-flex">
							<h3>{{item.name}}</h3>
							<a @click.prevent = "item.count = 0; recalcBascet()" href="#" class="product__close"></a>
							<div class="number d-flex">
								<span @click.prevent = "item.count--; recalcBascet()" class="minus">-</span>
								<input id="pageNumeric" type="text" v-model="item.count" min = "0"  size="5">
								<span  @click.prevent = "item.count++; recalcBascet()" class="plus">+</span>
							</div>
							<div class="product__price-block d-flex">
								<div class="product__price-new">{{item.price}} ₽</div>
								<div class="product__price-old"><span>{{item.priceold}}</span> ₽</div>
							</div>
						</div>
					</div>


					<div class="basket-section__total">
						Итого: <span>{{bascetSumm}}</span> ₽ <br/>

						<?
							$textAction = carbon_get_theme_option("index_action_title");
							if (!empty($textAction) ) {
						?>
							<span class = "actionClass"><? echo $textAction; ?></span>
						<?	
							}
						?>
					</div>

				</div>
				<strong v-else>Ваша корзина пуста</strong>
			</div>
		</section>
	</template>
	
	<template id = "bascet-form">
		<section v-show = "shoved" class="basket-form" id = "basket-form">
			<div class="inner">
				<h2>Оформить заказ</h2>
				<div class="red-line"></div>
				<form class="checkout__form" action="#">
					<input type="text" v-model="name" name="name" placeholder="ФИО" class="checkout__form-input input">
					<input type="tel" v-model="phone" name="tel" placeholder="Телефон" class="checkout__form-input input">
					<input type="text" @click.prevent = "toPostPuncts" v-model="adres" name="adress" placeholder="Выберите пункт выдачи" class="checkout__form-input input">
					<input type="text" v-model="model" name="text" placeholder="Модель устройства" class="checkout__form-input input">
					<input type="text" v-model="storona" name="text" placeholder="Сторона" class="checkout__form-input input">
					

						<label for="designFile" class="input__file-button">
							<span v-if="filename != '' " class="input__file-button-text file-path" id = "file-p">{{filename.name}}</span>
							<span v-else class="input__file-button-text file-path" id = "file-p">Файл с дизайном</span>
						</label>	
						<input @change="handleFileUpload($event)" type="file" id="designFile" ref="designFile" name="designFile" placeholder="Фото дизайна чехла" class="checkout__form-input input">
						
					
					<button @click.prevent = "sendBascet" class="checkout__form-btn-bascet">Оформить заказ</button>
					<div v-show = "formNoValid" class = "no_feild">
                        Заполните все обязательные поля помеченные "*"
                    </div>
				</form>
			</div>
		</section>
	</template>

	<div id = "bascet_vue">
		<bascet ref = "bascetTovs" ></bascet>
		<bascetform  ref = "bascetComponent"></bascetform>
	</div>

	<section id = "map_section">
        <div class = "inner">
            <h2>Выберите пункт доставки</h2>
			<div class="red-line"></div>
			
			<div id="ecom-widget" style="height: 350px">
                <script src="https://widget.pochta.ru/map/widget/widget.js"></script>
                <script>
                    function pcallbacfn(elem) {
						
						bascet.$refs.bascetTovs.delPrice = parseFloat(elem.cashOfDelivery) / 100;
						bascet.$refs.bascetComponent.delPrice = parseFloat(elem.cashOfDelivery) / 100;
						bascet.$refs.bascetComponent.adres = elem.deliveryDescription.description+", пункт выдачи: "+elem.indexTo+", "+elem.cityTo+", "+elem.addressTo;
            			window.location.hash="basket-form";
					}

					ecomStartWidget({
                    id: 13459,
                    callbackFunction: pcallbacfn,
                    containerId: 'ecom-widget'
                    });
                </script>
            </div>
        </div>
    </section>

</main>


<?php get_footer(); ?> 