<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Game Review PHP - Game Stars</title>
    <meta name="author" content="Tamer Çevik">
    <link rel="stylesheet" href="style/style.css"> <link href="https://fonts.googleapis.com/css2?family=Lexend:wght@300;400;600;700&display=swap" rel="stylesheet">
</head>
<body>

    <?php
    $game1 = [
        "id" => 1,
        "titel" => "Farm week",
        "genre" => "Simulatie",
        "prijs" => 44,99,
        "pegi" => 7,
        "platform" => "PC, Mobile",
        "afbeelding" => "images/7.png",
        "beschrijving" => "Farm weekis een boeiende boerderijsimulatiegame die beschikbaar is voor zowel PC als consoles. 
        Spelers beginnen met een klein stukje land en de droom om een bloeiende boerderij op te bouwen. De game combineert
         de ontspannende elementen van het verbouwen van gewassen en het fokken van dieren met strategische beslissingen en uitdagingen.",
        "pluspunten" => "Goede customization, Makkelijk te begrijpen",
       "minpunten" => "Zware game"
    ];

    $game2 = [
        "id" => 2,
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
    ];

    if (isset($_GET['game']) && $_GET['game'] == '2') {
        $geselecteerdeGame = $game2;
        $andereGameLink = "?game=1";
    } else {
        $geselecteerdeGame = $game1;
        $andereGameLink = "?game=2";
    }
    ?>

    <header>
        <div class="nav-container">
            <article style="display: flex;">
                <img src="images/logo.png" style="max-width: 50px; margin-right: 20px;" alt="logo">
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
        <h1 class="page-title">Review: <?= $geselecteerdeGame['titel'] ?></h1>

        <div class="card" style="display: flex; flex-direction: column; max-width: 800px; margin: 0 auto;">
            <img src="<?= $geselecteerdeGame['afbeelding'] ?>" alt="<?= $geselecteerdeGame['titel'] ?>" style="width: 100%; height: 400px; object-fit: cover;">
            
            <div class="card-content">
                <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 20px;">
                    <span style="background: var(--brand-green); color: white; padding: 5px 15px; border-radius: 20px;">
                        <?= $geselecteerdeGame['genre'] ?>
                    </span>
                    <span style="font-weight: bold; font-size: 1.2rem;">
                        €<?= number_format($geselecteerdeGame['prijs'], 2, ',', '.') ?>
                    </span>
                </div>

                <h3>Het Oordeel</h3>
                <p><?= $geselecteerdeGame['beschrijving'] ?></p>

                <div style="background: var(--light-green-bg); padding: 15px; border-radius: 8px; margin-top: 20px;">
                    <h4>Details</h4>
                    <ul>
                        <li><strong>Platform:</strong> <?= $geselecteerdeGame['platform'] ?></li>
                        <li><strong>PEGI Rating:</strong> <?= $geselecteerdeGame['pegi'] ?>+</li>
                        <li><strong>Pluspunten:</strong> <?= $geselecteerdeGame['pluspunten'] ?></li>
                        <li><strong>Minpunten:</strong> <?= $geselecteerdeGame['minpunten'] ?></li>
                    </ul>
                </div>
                
                <div style="margin-top: 20px; display: flex; gap: 10px;">
                    <a href="games.html" class="btn">Terug naar overzicht</a>
                    <a href="<?= $andereGameLink ?>" class="btn" style="background-color: #333;">Bekijk andere review</a>
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