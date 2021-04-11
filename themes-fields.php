<?

// Описание полей для Carbon_Fields производим только в этом файле
// 1. В начале идет описание полей - Настройки темы  далее категорий (если необходимо) в конце аблонов страниц и записей
// 2. Префиксы проставляем каждый раз новые осмысленно по имени проекта 
// 3. Для Полей которые входят в состав составново схема именования следующая <Общий префикс>_<название составного поля>_<имя поля>
// 4. Название секций Так же придумываем осмысленные на русском языке чтобы небыло сплошных Доп. полей
// 5. Каждый блок комментируем


use Carbon_Fields\Container;
use Carbon_Fields\Field;

Container::make( 'theme_options', __( 'Настройки темы', 'crb' ) )
    ->add_tab('Главная', array(
      Field::make('text', 'index_title', 'Заголовок главной страницы')->set_width(100),
      Field::make('rich_text', 'index_subtitle', 'Текст главной страницы')->set_width(100),
    ))
    ->add_tab('Отзывы', array(
      Field::make( 'complex', 'reviews_complex', "Карточка отзыва" )
      ->add_fields( array(
        Field::make('image', 'reviews_img', 'Картинка' )->set_width(30),
        Field::make( 'text', 'reviews_title', 'Имя' )->set_width(30),
        Field::make( 'text', 'reviews_link',  'Ссылка на отзыв' )->set_width(30),
        Field::make( 'text', 'reviews_text',  'Текст отзыва' )->set_width(100),
    ) ),
) )
    ->add_tab('Контакты', array(
        Field::make( 'text', 'as_inst', __( 'instagram' ) )
          ->set_width(50),
        Field::make( 'text', 'as_whatsapp', __( 'whatsapp' ) )
          ->set_width(50),
        Field::make( 'text', 'as_telegram', __( 'telegram' ) )
          ->set_width(50),
    ) );
Container::make('post_meta', 'excurs_post', 'Доп поля') 
		->show_on_template('page-okno-pokupki.php') 
      ->add_fields(array(   
			Field::make( 'complex', 'offer_picture', "Галерея товара" )
			->add_fields( array(
				Field::make('image', 'gal_img', 'Изображение' )->set_width(30),
				Field::make('text', 'gal_img_sku', 'ID для модификации')->set_width(30),
				Field::make('text', 'gal_img_alt', 'alt и title')->set_width(30)				
	) ),
      Field::make( 'text', 'offer_sku',  'Артикул' )->set_width(33),
      Field::make( 'text', 'sticker',  'Стикер' )->set_width(33),
			Field::make('text', 'offer_price', 'Цена новая')->set_width(33),
			Field::make('text', 'offer_old_price', 'Цена старая')->set_width(33),
      Field::make('rich_text', 'specifications', 'Технические характеристики')->set_width(100),
      Field::make('rich_text', 'equipment', 'Комплектация')->set_width(100),
  ));

?>