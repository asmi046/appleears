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
					<div class="checkout__form-file">
						<input type="file" name="file" multiple="multiple" accept=".txt,image/*" id="input__file" class="checkout__form-input-file input"> 
						<label for="input__file" class="input__file-button">
							<span id="file-path" class="input__file-button-text file-path">Файл с дизайном</span>
						</label>
					</div>
					<input name = "filleserv" type="hidden" id="file-path-serv" value = "">
					<button class="checkout__form-btn">Оформить заказ</button>
				</form> 
			</div>
		</div>
	</section>