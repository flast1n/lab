<?php

require_once __DIR__ . '/House.php';

/*Завдання 3: Функція, яка формує та повертає HTML-розмітку блоку About*/
function renderAboutSection(): string
{
    return <<<HTML
    <section id="about" class="about-section">
        <div class="container about-grid">
            <div class="about-image">
                <img src="https://images.unsplash.com/photo-1600585154340-be6161a56a0c?auto=format&fit=crop&w=900&q=80"
                     alt="Сучасний житловий будинок">
            </div>
            <div class="about-content">
                <span class="section-subtitle">Про нашу компанію</span>
                <h2>Ми допомагаємо знайти дім вашої мрії</h2>
                <p>
                    Наша агенція нерухомості спеціалізується на підборі сучасних приватних будинків,
                    котеджів та таунхаусів. Кожен об’єкт проходить повну юридичну та технічну перевірку
                    перед публікацією в каталозі.
                </p>
                <ul class="about-list">
                    <li>Понад 10 років досвіду на ринку нерухомості</li>
                    <li>Прямі договори з перевіреними забудовниками та власниками</li>
                    <li>Повний юридичний супровід угоди купівлі-продажу</li>
                </ul>
                <a href="#properties" class="btn-primary">Переглянути каталог</a>
            </div>
        </div>
    </section>
HTML;
}

/* Завдання 8: Функція випадкового визначення акції та відсотка знижки (0–30%)*/
function getHouseDiscount(): array
{
    $isOnSale = (bool) random_int(0, 1);

    if (!$isOnSale) {
        return [
            'isOnSale' => false,
            'percent'  => 0,
        ];
    }

    $discountPercent = random_int(1, 30);

    return [
        'isOnSale' => true,
        'percent'  => $discountPercent,
    ];
}

/* Завдання 7: Створення масиву об'єктів класу House */
function getHousesList(): array
{
    return [
        new House(
            320000,
            'Вілла «Сонячний берег»',
            'м. Київ, вул. Озерна, 14',
            '+38 (067) 123-45-01',
            'https://images.unsplash.com/photo-1613490493576-7fde63acd811?auto=format&fit=crop&w=800&q=80',
            4,
            3
        ),
        new House(
            245000,
            'Котедж «Лісова казка»',
            'м. Львів, вул. Соснова, 8',
            '+38 (067) 123-45-02',
            'https://images.unsplash.com/photo-1512917774080-9991f1c4c750?auto=format&fit=crop&w=800&q=80',
            3,
            2
        ),
        new House(
            480000,
            'Резиденція «Панорама»',
            'м. Одеса, Французький бульвар, 42',
            '+38 (067) 123-45-03',
            'https://images.unsplash.com/photo-1600596542815-ffad4c1539a9?auto=format&fit=crop&w=800&q=80',
            5,
            4
        ),
        new House(
            185000,
            'Таунхаус «Затишний двір»',
            'м. Вінниця, вул. Келецька, 91',
            '+38 (067) 123-45-04',
            'https://images.unsplash.com/photo-1564013799919-ab600027ffc6?auto=format&fit=crop&w=800&q=80',
            3,
            2
        ),
        new House(
            390000,
            'Модерн Хаус «Хай-Тек»',
            'м. Дніпро, просп. Яворницького, 55',
            '+38 (067) 123-45-05',
            'https://images.unsplash.com/photo-1600607687939-ce8a6c25118c?auto=format&fit=crop&w=800&q=80',
            4,
            3
        ),
        new House(
            275000,
            'Будинок «Альпійський стиль»',
            'м. Івано-Франківськ, вул. Карпатська, 19',
            '+38 (067) 123-45-06',
            'https://images.unsplash.com/photo-1583608205776-bfd35f0d9f83?auto=format&fit=crop&w=800&q=80',
            4,
            2
        ),
    ];
}