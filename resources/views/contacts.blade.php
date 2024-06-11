@extends('layouts.base')
@section('page.title', 'Контакты')
@section('content')
<div class="main-container">
    <div class="contacts-container">
        <h1 class="gradient-header">Контакты</h1>
        <div class="contact-info">
            <div class="contact-block">
                <h2>Офис</h2>
                <b>Адрес офиса:</b> 
                <p>г. Брянск, ул. 2-ая Почепская, д. 45, оф. № 4,8,9</p>
                <b>Тел. офиса:</b>
                <p>+7 (4832) 30-80-30, 30-90-30,</p>
                <p>+7 (4832) 33-80-35,</p>
                <p>+7 (910) 294-80-80</p>
                <b>URL-адрес: </b> <a href="http://fenstertech.ru/index.htm">www.fenstertech.ru</a>
            </div>
            <script type="text/javascript" charset="utf-8" async src="https://api-maps.yandex.ru/services/constructor/1.0/js/?um=constructor%3A03307012faff16ac7ab933ee8f8d236b280e70cc6e9ef7cde0c6468fc1cc10e0&amp;width=644&amp;height=502&amp;lang=ru_RU&amp;scroll=true"></script>

            <div class="contact-block">
                <h2>Склад</h2>
                <b>Адрес склада:</b>
                <p>г. Брянск, ул. 2-ая Почепская, д. 45, склад № 7,8</p>
                <b>Тел. склада:</b>
                </p>+7 (910) 294-81-81</p>
                <b>E-mail: </b><a href="mailto:office@fenstertech.ru">office@fenstertech.ru</a>
            </div>
        </div>
    </div>

</div>
{{-- <p>ООО "Фенстер Техник"
			<br>Юридический адрес: 241037, г. Брянск, ул. Красноармейская, 156 а
			<br>Почтовый адрес: 241037, г. Брянск, ул. Красноармейская, 156 а
			<br>ОГРН 1103254015171
			<br>ИНН 3250516594, КПП 325001001
			<br>р/с 40702810508000004983 в Брянском ОСБ № 8605 г. Брянск, БИК 041501601, 
			<br>к/с 30101810400000000601
			<br>ОКПО 68504086, ОКОГУ 49013, ОКАТО 15401375000, ОКТМО 15701000, ОКФС 16, ОКОПФ 65, ОКВЭД-2001 51.53
			<br>Директор Медведев Артем Анатольевич, действует на основании Устава
			<br>Офис: г. Брянск, ул. Красноармейская, 156а, Телефон\факс: (4832) 41-56-91
			<br>Склад: г. Брянск, ул. 2-я Почепская, 45, склад 10 --}}
@endsection