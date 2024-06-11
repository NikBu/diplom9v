</div>
<!-- Footer -->
<footer>
    <div>
        <table>
            <tr>
                <td>
                    <div >
                        <h4>О нас </h4>
                        <p> Компания ООО «Фенстер Техник» достаточно молодая, но динамично развивающаяся компания, зарекомендовавшая себя надежным поставщиком комплектующих элементов и материалов для производства и монтажа светопрозрачных конструкций.</p>
                    </div>
                </td>
                <td class="footer-column">
                    <div >
                        <h4>Компания</h4>
                        <ul>
                            <li><a href="{{ route('index') }}">Домашняя страницы</a></li>
                            <li><a href="{{ route('about') }}">О нас</a></li>
                            <li><a href="{{ route('contacts') }}">Контакты</a></li>
                            <li><a href="{{ route('vacancies') }}">Вакансии</a></li>
                        </ul>
                    </div>
                </td>
                <td class="footer-column">
                    <div >
                        <h4>Полезные ссылка</h4>
                        <ul>
                            <li><a href="{{ route('main.news.index') }}">Новости</a></li>
                            <li><a href="{{ route('main.special_offers.index') }}">Акции</a></li>
                            <li><a href="{{ route('orders.index') }}">Ваши заказы</a></li>
                            <li><a href="{{ route('profile.edit') }}">Личный кабинет</a></li>
                        </ul>
                    </div>
                </td>
                <td class="footer-column">
                    <div >
                        <b>Адрес офиса:</b> 
                        <p>г. Брянск, ул. 2-ая Почепская, д. 45, оф. № 4,8,9</p>
                        <b>Тел. офиса:</b>
                        <p>+7 (4832) 30-80-30, 30-90-30,</p>
                        <p>+7 (4832) 33-80-35,</p>
                        <p>+7 (910) 294-80-80</p>
                        <b>E-mail: </b><a href="mailto:office@fenstertech.ru">office@fenstertech.ru</a>
                    </div>
                </td>
            </tr>
        </table>
    </div>
</footer>
<!-- End Footer -->
<script>
// Sidebar script
	document.querySelector(".hamburger").addEventListener("click", function() {
    document.querySelector(".wrapper").classList.toggle("collapse");});
// Accordion script
document.querySelectorAll('.accordion-item').forEach(item => {
    const header = item.querySelector('.accordion-header');
    const subCategories = item.querySelector('.sub-categories');
    const arrow = item.querySelector('.arrow');
    const selection_area = item.querySelector('.selection-area');

    if (subCategories.children.length > 0) {
        arrow.classList.add('show'); // Show arrow if sub-categories exist

        item.addEventListener('mouseenter', () => {
            header.classList.add('selected'); // Add selected class on hover
        });

        item.addEventListener('mouseleave', () => {
            header.classList.remove('selected'); // Remove selected class on mouse leave
        });
    }

    header.addEventListener('mouseenter', () => {
        subCategories.style.display ='inline-block';
        var rect = item.getBoundingClientRect();
        subCategories.style.top = rect.top + 'px';
        console.log(item.offsetTop);
        console.log(item.offsetHeight)
    });
    item.addEventListener('mouseleave', () => {
        subCategories.style.display ='none';
    });
});
</script>
</body>
</html>