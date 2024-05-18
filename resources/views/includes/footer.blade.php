<footer>Бурков Никита ИСТ-401</footer></div>
</div>
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
