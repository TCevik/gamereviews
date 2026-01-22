<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Latest Reviews - Game Stars</title>
    <meta name="author" content="Tamer Çevik">
    <link rel="stylesheet" href="style/style.css">
    <link href="https:
    .fonts.googleapis.com/css2?family=Lexend:wght@300;400;600;700&display=swap" rel="stylesheet">
    <style>
        .slideshow-container {
            position: relative;
            max-width: 900px;
            margin: 40px auto;
            overflow: hidden;
            min-height: 850px;
        }

        .review-slide {
            display: none;
            animation: fadeEffect 1s; 
        }

        .review-slide.active {
            display: block;
        }

        .video-container {
            position: relative;
            padding-bottom: 56.25%;
            height: 0;
            overflow: hidden;
            margin-top: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0,0,0,0.2);
        }

        .video-container iframe {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
        }

        .user-reviews-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 15px;
            margin-top: 20px;
        }

        .user-review-box {
            background-color: #f9f9f9;
            padding: 15px;
            border-radius: 8px;
            font-size: 0.9rem;
            border-left: 4px solid var(--brand-green, #2ecc71);
        }

        .badge-pegi {
            background-color: #333;
            color: white;
            padding: 5px 12px;
            border-radius: 5px;
            font-weight: bold;
        }
        
        .badge-pegi.red { background-color: #e74c3c; }
        .badge-pegi.green { background-color: #2ecc71; }

        @keyframes fadeEffect {
            from {opacity: 0.2}
            to {opacity: 1}
        }
    </style>
</head>
<body>

    <?php
    $latestReviews = [
        [
            "titel" => "Cyberzone 2077: Phantom",
            "genre" => ["Actie", "RPG"],
            "pegi" => 18,
            "beschrijving" => "Een duister toekomstbeeld waarin je vecht om te overleven in een stad vol technologie en gevaar. De graphics zijn verbluffend en het verhaal grijpt je bij de keel.",
            "rating" => 9.2,
            "platform" => ["PC", "PS5", "Xbox Series X"],
            "maker" => "CD Projekt Red",
            "trailer" => "https://www.youtube.com/embed/8X2kIfS6fb8",
            "user_reviews" => [
                ["naam" => "Kevin", "tekst" => "Geweldige sfeer, maar nog wel wat bugs.", "rating" => 4],
                ["naam" => "Sarah", "tekst" => "Het beste verhaal dat ik dit jaar heb gespeeld.", "rating" => 5],
                ["naam" => "Joris", "tekst" => "Actie is top, maar de stad voelt soms leeg.", "rating" => 3.5]
            ]
        ],
        [
            "titel" => "Zombie Survival: Dead City",
            "genre" => ["Horror", "Shooter"],
            "pegi" => 18,
            "beschrijving" => "Ren voor je leven in deze intense zombie-shooter. Munitie is schaars en de nacht is dodelijk. Durf jij het aan?",
            "rating" => 8.5,
            "platform" => ["PC", "PS5"],
            "maker" => "Undead Labs",
            "trailer" => "https://www.youtube.com/embed/qJc6j5_JzFw",
            "user_reviews" => [
                ["naam" => "Ali", "tekst" => "Doodeng, precies wat ik zocht!", "rating" => 5],
                ["naam" => "Lisa", "tekst" => "Iets te moeilijk naar mijn smaak.", "rating" => 3],
                ["naam" => "Tom", "tekst" => "Co-op modus is fantastisch met vrienden.", "rating" => 4.5]
            ]
        ],
        [
            "titel" => "Gangs of Liberty",
            "genre" => ["Open-world", "Misdaad"],
            "pegi" => 18,
            "beschrijving" => "Klim op van straatschoffie tot maffiabaas in de jaren '30. Een meeslepend verhaal over verraad, loyaliteit en macht.",
            "rating" => 8.8,
            "platform" => ["PC", "Xbox", "PS5"],
            "maker" => "Hangar 13",
            "trailer" => "https://www.youtube.com/embed/_MKW29N8N44",
            "user_reviews" => [
                ["naam" => "Mehmet", "tekst" => "Klassieker in wording.", "rating" => 5],
                ["naam" => "Sophie", "tekst" => "De auto's besturen wat zwaar, verder top.", "rating" => 4],
                ["naam" => "Daan", "tekst" => "Mooi tijdsbeeld neergezet.", "rating" => 4]
            ]
        ],
        [
            "titel" => "Super Kart Racers",
            "genre" => ["Racing", "Familie"],
            "pegi" => 3,
            "beschrijving" => "Scheur door kleurrijke banen met je favoriete karakters! Plezier voor het hele gezin met gekke power-ups.",
            "rating" => 7.9,
            "platform" => ["Switch", "Mobile"],
            "maker" => "Nintendo",
            "trailer" => "https://www.youtube.com/embed/tKlRN2YpxRE",
            "user_reviews" => [
                ["naam" => "Sem (8 jaar)", "tekst" => "Super leuk!", "rating" => 5],
                ["naam" => "Mama van Sem", "tekst" => "Leuk om samen te spelen.", "rating" => 4],
                ["naam" => "Opa", "tekst" => "Gaat iets te snel voor mij.", "rating" => 3]
            ]
        ]
    ];
    ?>

    <header>
        <article class="nav-container">
            <article style="display: flex; align-items: center;">
                <img src="images/logo.png" style="max-width: 50px; margin-right: 20px;" alt="logo">
                <a href="index.html" class="logo">Game Stars</a>
            </article>
            <nav class="nav-links">
                <ul>
                    <li><a href="index.html">Home</a></li>
                    <li><a href="games.html">Games</a></li>
                    <li><a href="latest-reviews.php" class="active">Latest Reviews</a></li>
                    <li><a href="merchandise.html">Merchandise</a></li>
                    <li><a href="contact.html">Contact</a></li>
                </ul>
            </nav>
        </article>
    </header>

    <main class="container">
        <h1 class="page-title" style="text-align: center; margin-top: 20px;">Laatste Reviews</h1>
        <p style="text-align: center;">Bekijk hier de nieuwste toevoegingen aan onze collectie.</p>

        <section class="slideshow-container">
            
            <?php foreach($latestReviews as $index => $review): 
                $pegiClass = ($review['pegi'] >= 16) ? 'red' : 'green';
            ?>

                <article class="card review-slide <?php echo ($index === 0) ? 'active' : ''; ?>" style="display: <?php echo ($index === 0) ? 'block' : 'none'; ?>">
                    <article class="card-content">
                        <article style="display: flex; justify-content: space-between; align-items: center;">
                            <h2 style="margin: 0;"><?= $review['titel'] ?></h2>
                            <span class="badge-pegi <?= $pegiClass ?>">PEGI <?= $review['pegi'] ?>+</span>
                        </article>

                        <article style="margin: 15px 0;">
                            <?php foreach($review['genre'] as $g): ?>
                                <span style="background: #2ecc71; color: white; padding: 4px 10px; border-radius: 15px; font-size: 0.8rem; margin-right: 5px;"><?= $g ?></span>
                            <?php endforeach; ?>
                        </article>

                        <p><strong>Maker:</strong> <?= $review['maker'] ?> | <strong>Platforms:</strong> <?= implode(", ", $review['platform']) ?></p>
                        
                        <p style="font-size: 1.1rem; line-height: 1.6;"><em>"<?= $review['beschrijving'] ?>"</em></p>
                        
                        <h3 style="color: #2c3e50;">Onze Score: <?= $review['rating'] ?>/10</h3>

                        <?php if(!empty($review['trailer'])): ?>
                        <article class="video-container">
                            <iframe src="<?= $review['trailer'] ?>" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                        </article>
                        <?php endif; ?>

                        <article style="margin-top: 30px;">
                            <h4>Wat zeggen spelers?</h4>
                            <article class="user-reviews-grid">
                                <?php foreach($review['user_reviews'] as $userRev): ?>
                                    <article class="user-review-box">
                                        <div style="display: flex; justify-content: space-between;">
                                            <strong style="color: #2c3e50;"><?= $userRev['naam'] ?></strong>
                                            <span style="color: #f1c40f;">★ <?= $userRev['rating'] ?></span>
                                        </div>
                                        <p style="margin-top: 8px; font-style: italic; margin-bottom: 0;">"<?= $userRev['tekst'] ?>"</p>
                                    </article>
                                <?php endforeach; ?>
                            </article>
                        </article>

                    </article>
                </article>

            <?php endforeach; ?>

        </section>

    </main>

    <footer>
        <article class="container" style="text-align: center; padding: 20px 0;">
            <p>&copy; 2025 Game Stars. Alle rechten voorbehouden.</p>
        </article>
    </footer>

    <script src="script/latestreviews.js"></script>

</body>
</html>