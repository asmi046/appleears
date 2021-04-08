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
    ->add_tab('Социальные сети', array(
        // Field::make( 'text', 'as_company', __( 'Название' ) ) 
        //   ->set_width(50),
        // Field::make( 'text', 'as_phones_1', __( 'Телефон' ) )
        //   ->set_width(50),
        // Field::make( 'text', 'as_address', __( 'Адрес' ) )
        //   ->set_width(50),
        // Field::make( 'text', 'as_ur-address', __( 'Юридический Адрес' ) ) 
        //   ->set_width(50),
        // Field::make( 'text', 'as_email', __( 'Email' ) )
        //   ->set_width(50),
        // Field::make( 'text', 'as_email_send', __( 'Email для отправки' ) )
        //   ->set_width(50),
        // // Field::make( 'text', 'as_phone_2', __( 'Телефон дополнительный' ) )
        // //   ->set_width(50),
        // Field::make( 'text', 'as_inn', __( 'ИНН' ) )
        //   ->set_width(50),
        // Field::make( 'text', 'as_kpp', __( 'КПП' ) )
        //   ->set_width(50),
        // Field::make( 'text', 'as_orgn', __( 'ОРГН' ) )
        //   ->set_width(50),
        // Field::make( 'text', 'as_rs', __( 'Р/С' ) )
        //   ->set_width(50),
        // Field::make( 'text', 'as_bik', __( 'БИК' ) )
        //   ->set_width(50),
        // Field::make( 'text', 'as_ks', __( 'К/С' ) )
        //   ->set_width(50),
        Field::make( 'text', 'as_inst', __( 'instagram' ) )
          ->set_width(50),
        Field::make( 'text', 'as_whatsapp', __( 'whatsapp' ) )
          ->set_width(50),
        Field::make( 'text', 'as_telegram', __( 'telegram' ) )
          ->set_width(50),
    ) );
Container::make('post_meta', 'ultra_product_cr', 'Характеристики товара')
    ->show_on_post_type(array( 'ultra'))
      ->add_fields(array(   
      Field::make('textarea', 'offer_smile_descr', 'Краткое описание')->set_width(100),
      // Field::make('text', 'offer_name', 'Название товара')->set_width(30),
      // Field::make('text', 'offer_label', 'Метка на товаре')->set_width(30),
      Field::make('text', 'offer_manufact', 'Производитель')->set_width(50),
      // Field::make('text', 'offer_allsearch', 'Все артикулы для поиска')->set_width(50),
      // Field::make('text', 'offer_siries', 'Серия (для сопутствующих)')->set_width(30),

      // Field::make('text', 'offer_sku', 'Артикул (Базовый)')->set_width(50),
      Field::make('text', 'offer_nal', 'Наличие на складе')->set_default_value( '0')->set_width(50), 
        // Field::make('select', 'rev_reiting', 'Оценка' )->add_options( array(
        //   '0' => '0',
        //   '1' => '1',
        //   '2' => '2',
        //   '3' => '3',
        //   '4' => '4',
        //   '5' => '5'
        // ) )->set_width(20),

      Field::make('text', 'offer_price', 'Цена')->set_width(50),
      Field::make('text', 'mod_vendor', 'Артикул')->set_width(50),
      // Field::make('text', 'offer_benefit', 'Выгода')->set_width(50),
      Field::make( 'complex', 'offer_cherecter', "Характеристики товара табы, левая колонка" )
      ->add_fields( array(
        Field::make( 'text', 'tab_name', 'Наименование параметра' )->set_width(50),
        Field::make( 'text', 'tab_val',  'Значение' )->set_width(50),
      ) ),
      Field::make( 'complex', 'offer_cherecter-r', "Характеристики товара табы, правая колонка" )
      ->add_fields( array(
        Field::make( 'text', 'tab_name-r', 'Наименование параметра' )->set_width(50),
        Field::make( 'text', 'tab_val-r',  'Значение' )->set_width(50),
      ) ),
      Field::make('rich_text', 'options_text', 'Дополнительные опции')->set_width(100),
      Field::make('rich_text', 'acses_text', 'Аксесуары')->set_width(100),
      
      // Field::make('text', 'offer_old_price', 'Старая цена (Базовая)')->set_width(50),
      
      // Field::make( 'complex', 'offer_modification', "Модификация товара" )
      // ->add_fields( array(
      //   Field::make('text', 'mod_name', 'Наименование модификации' )->set_width(20),
      //   Field::make('text', 'mod_sku', 'Артикул модификации')->set_width(20),
      //   Field::make('text', 'mod_price', 'Цена модификации')->set_width(20),
      //   Field::make('text', 'mod_old_price', 'Старая цена модификации')->set_width(20),
      //   Field::make('text', 'mod_picture_id', 'Изображения модификации')->set_width(20),
      // ) ),
        
      Field::make( 'complex', 'offer_picture', "Галерея товара" )
      ->add_fields( array(
        Field::make('image', 'gal_img', 'Изображение' )->set_width(30),
        Field::make('text', 'gal_img_sku', 'ID для модификации')->set_width(30),
        Field::make('text', 'gal_img_alt', 'alt и title')->set_width(30)        
      ) ),

      Field::make('complex', 'complex_analogs', 'Ближайшие аналоги')
        ->set_max(4) // Можно будет выбрать только 5 постов
      ->add_fields(array(
        Field::make('image', 'img_analogs', 'Фото')
          ->set_width(33),
        Field::make('text', 'price_analogs', 'Цена') 
          ->set_width(33),
        Field::make('text', 'link_analogs', 'Ссылка на товар') 
          ->set_width(33),
    ))

  ));

?>