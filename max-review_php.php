<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Game Review PHP - Game Stars</title>
    <meta name="author" content="Tamer Çevik">
    <link rel="stylesheet" href="style/style.css"> 
    <link href="https://fonts.googleapis.com/css2?family=Lexend:wght@300;400;600;700&display=swap" rel="stylesheet">
    
    <style>
        .logo-wrapper {
            display: flex;
            align-items: center;
        }

        .logo-img {
            max-width: 50px;
            margin-right: 20px;
        }

        .review-card {
            display: flex;
            flex-direction: column;
            max-width: 800px;
            margin: 0 auto;
        }

        .review-img {
            width: 100%;
            height: 400px;
            object-fit: cover;
        }

        .meta-row {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
        }

        .genre-tag {
            background: var(--brand-green);
            color: white;
            padding: 5px 15px;
            border-radius: 20px;
        }

        .price-tag {
            font-weight: bold;
            font-size: 1.2rem;
        }

        .details-box {
            background: var(--light-green-bg);
            padding: 15px;
            border-radius: 8px;
            margin-top: 20px;
        }

        .action-buttons {
            margin-top: 20px;
            display: flex;
            gap: 10px;
        }

        .btn-alt {
            background-color: #333;
        }
    </style>
</head>
<body>

    <?php
    $games = [
        1 => [
            "titel" => "Farm week",
            "genre" => "Simulatie ",
            "prijs" => 44,99,
            "pegi" => 7,
            "platform" => "PC, Mobile",
            "afbeelding" => "images/7.png",
            "beschrijving" => "Farm weekis een boeiende boerderijsimulatiegame die beschikbaar is voor zowel PC als consoles. 
            Spelers beginnen met een klein stukje land en de droom om een bloeiende boerderij op te bouwen. De game combineert
             de ontspannende elementen van het verbouwen van gewassen en het fokken van dieren met strategische beslissingen en uitdagingen.",
            "pluspunten" => "Goede customization, Makkelijk te begrijpen",
            "minpunten" => "Zware game"
        ],
        2 => [
            "titel" => "Military warfare",
            "genre" => "Strategie, Actie",
            "prijs" => 79,99,
            "pegi" => 7,
            "platform" => "PC, Console",
            "afbeelding" => "images/8.png",
            "beschrijving" => "Military Warfare is een intense, snelle strategie- en actiegame die beschikbaar is voor PC en consoles.
             Duik in een wereld vol adrenaline-pompende gevechten waar tactische beslissingen en bliksemsnelle reflexen
              het verschil maken tussen overwinning en nederlaag.",
            "pluspunten" => "Online multiplayer, Fast pased",
            "minpunten" => "Veel sweats"
        ]
    ];

    $huidigId = isset($_GET['game']) ? (int)$_GET['game'] : 1;

    if (!array_key_exists($huidigId, $games)) {
        $huidigId = 1;
    }

    $data = $games[$huidigId];

    $anderId = ($huidigId === 1) ? 2 : 1;
    $wisselLink = "?game=" . $anderId;
    ?>

    <header>
        <div class="nav-container">
            <article class="logo-wrapper">
                <img src="images/logo.png" class="logo-img" alt="logo">
                <a href="index.html" class="logo">Game Stars</a>
            </article>
            <nav class="nav-links">
                <ul>
                    <li><a href="index.html">Home</a></li>
                    <li><a href="games.html">Games</a></li>
                    <li><a href="merchandise.html">Merchandise</a></li>
                    <li><a href="contact.html">Contact</a></li>
                </ul>
            </nav>
        </div>
    </header>

    <main class="container">
        <h1 class="page-title">Review: <?php echo $data['titel']; ?></h1>

        <div class="card review-card">
            <img src="<?php echo $data['afbeelding']; ?>" alt="<?php echo $data['titel']; ?>" class="review-img">
            
            <div class="card-content">
                <div class="meta-row">
                    <span class="genre-tag">
                        <?php echo $data['genre']; ?>
                    </span>
                    <span class="price-tag">
                        €<?php echo number_format($data['prijs'], 2, ',', '.'); ?>
                    </span>
                </div>

                <h3>Het Oordeel</h3>
                <p><?php echo $data['beschrijving']; ?></p>

                <div class="details-box">
                    <h4>Details</h4>
                    <ul>
                        <li><strong>Platform:</strong> <?php echo $data['platform']; ?></li>
                        <li><strong>PEGI Rating:</strong> <?php echo $data['pegi']; ?>+</li>
                        <li><strong>Pluspunten:</strong> <?php echo $data['pluspunten']; ?></li>
                        <li><strong>Minpunten:</strong> <?php echo $data['minpunten']; ?></li>
                    </ul>
                </div>
                
                <div class="action-buttons">
                    <a href="games.html" class="btn">Terug naar overzicht</a>
                    <a href="<?php echo $wisselLink; ?>" class="btn btn-alt">Bekijk andere review</a>
                </div>
            </div>
        </div>
    </main>

    <footer>
        <div class="container">
            <p>&copy; 2025 Game Stars. Alle rechten voorbehouden.</p>
        </div>
    </footer>

</body>
</html>