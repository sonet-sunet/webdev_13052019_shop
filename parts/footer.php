    </div>
    <?php foreach( $footerConfig['scripts'] as $jsPath ): ?>
        <script src="/scripts/<?=$jsPath?>"></script>
    <?php endforeach; ?>
        <footer>
            <div class="container">
                <div class="container-left">
                    <h1>Коллекции</h1>
                    <nav>
                        <a href="#">Женщинам(1725)</a>
                        <a href="#">Мужчинам(635)</a>
                        <a href="#">Детям(2514)</a>
                        <a href="#">Новинки(76)</a>
                    </nav>
                </div>
                <div class="container-center">
                    <h1>Магазин</h1>
                    <nav>
                        <a href="#">О нас</a>
                        <a href="#">Доставка</a>
                        <a href="#">Работай с нами</a>
                        <a href="#">Контакты</a>
                    </nav>
                </div>
                <div class="container-right">
                    <h1>Мы в соцеальных сетях</h1>
                    <p>Сайт разработан в inordic.ru</p>
                    <p>2018©Все права защищены</p>
                    <div class="container-right-sociall">
                        <div class="container-right-sociall-pic pic-twitter"></div>
                        <div class="container-right-sociall-pic pic-facebook"></div>
                        <div class="container-right-sociall-pic pic-instagram"></div>
                    </div>
                </div>
            </div>
        </footer>
        </div>
</body>
</html>