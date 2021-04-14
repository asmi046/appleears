	<section class="checkout"> 
		<div class="inner">
			<div class = "SendetMsg" style = "display:none"> 
				Ваш заказ успешно оформлен!
			</div>
			<div class="headen_form_blk">
				<form class="checkout__form" action="#">
					<h3 id="checkout-title"><?php the_title();?></h3>
					<input type="text" id="form-nameM" name="name" placeholder="ФИО" class="checkout__form-input input">
					<input type="tel" id="form-telM" name="tel" placeholder="Телефон" class="checkout__form-input input">
					<input type="text" id="form-adrrM" name="adress" placeholder="Адрес доставки" class="checkout__form-input input">
					<input type="text" id="form-modelM" name="text" placeholder="Модель устройства" class="checkout__form-input input">
					<select id="form-sideM" class="checkout__form-input checkout__input-sel">
						<option class="sub">Обе стороны</option>
						<option class="sub">Передняя сторона</option>
						<option class="sub">Задняя сторона</option>
					</select>
					<button class="checkout__form-btn">Оформить заказ</button>
				</form> 
			</div>
		</div>
	</section>