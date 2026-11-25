<?php
require_once __DIR__ . '/functions.php';

// Завдання 4: Змінна поточної дати у форматі року для футера
$currentYear = date('Y');

// Завдання 5: Змінна з локацією для лівої частини футера
$location = 'Україна, м. Київ, вул. Хрещатик, 22, офіс 405';

$houses = getHousesList();
?>
<!DOCTYPE html>
<html lang="uk">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>STATED — Каталог нерухомості</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

    <header class="site-header">
        <div class="container header-inner">
            <a href="#" class="logo">STATED.</a>
            <nav class="main-nav">
                <a href="#home">Головна</a>
                <a href="#properties">Будинки</a>
                <a href="#about">Про нас</a>
                <a href="#footer">Контакти</a>
            </nav>
        </div>
    </header>

    <section id="home" class="hero">
        <div class="hero-overlay">
            <div class="container hero-content">
                <h1>Купуйте та продавайте нерухомість легко</h1>
                <p>Актуальна база приватних будинків та заміських котеджів із сезонними знижками.</p>
                <a href="#properties" class="btn-primary">Переглянути пропозиції</a>
            </div>
        </div>
    </section>

    <!-- Завдання 7 та 8: Секція будинків, виведена в циклі з перевіркою акції -->
    <section id="properties" class="properties-section">
        <div class="container">
            <div class="section-header">
                <h2>Актуальні будинки</h2>
                <p>Оберіть найкращий варіант для комфортного життя</p>
            </div>

            <div class="houses-grid">
                <?php foreach ($houses as $house): ?>
                    <?php
                        $discount = getHouseDiscount();
                    ?>
                    <article class="house-card">
                        <div class="house-image-wrapper">
                            <img src="<?= htmlspecialchars($house->image); ?>"
                                 alt="<?= htmlspecialchars($house->title); ?>"
                                 onerror="this.src='https:\/\/placehold.co\/800x500?text=House+Photo';">

                            <?php if ($discount['isOnSale']): ?>
                                <span class="sale-badge">Акція -<?= $discount['percent']; ?>%</span>
                            <?php endif; ?>
                        </div>

                        <div class="house-body">
                            <div class="house-price-box">
                                <?php if ($discount['isOnSale']): ?>
                                    <span class="old-price"><?= $house->getFormattedPrice(); ?></span>
                                    <span class="sale-price"><?= $house->getDiscountedPrice($discount['percent']); ?></span>
                                <?php else: ?>
                                    <span class="regular-price"><?= $house->getFormattedPrice(); ?></span>
                                <?php endif; ?>
                            </div>

                            <h3 class="house-title"><?= htmlspecialchars($house->title); ?></h3>
                            <p class="house-address">📍 <?= htmlspecialchars($house->address); ?></p>
                            <p class="house-phone">📞 <?= htmlspecialchars($house->phone); ?></p>

                            <div class="house-specs">
                                <span>🛏 Спалень: <strong><?= $house->bedrooms; ?></strong></span>
                                <span>🛁 Ванних кімнат: <strong><?= $house->bathrooms; ?></strong></span>
                            </div>
                        </div>
                    </article>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <!-- Завдання 3: Вивід блоку About з боку PHP -->
    <?= renderAboutSection(); ?>

    <!-- Завдання 4 та 5: Футер зі змінною локації зліва та поточним роком -->
    <footer id="footer" class="site-footer">
        <div class="container footer-grid">
            <div class="footer-left">
                <h3>Наша локація</h3>
                <p><?= htmlspecialchars($location); ?></p>
            </div>
            <div class="footer-right">
                <p>&copy; <?= $currentYear; ?> STATED Real Estate. Всі права захищено.</p>
            </div>
        </div>
    </footer>

</body>
</html>