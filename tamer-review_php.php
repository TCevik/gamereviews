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
        "titel" => "Epische Reis I",
        "genre" => "RPG",
        "prijs" => 59.99,
        "pegi" => 12,
        "platform" => "PC, PS5",
        "afbeelding" => "images/1.png",
        "beschrijving" => "Een meeslepend avontuur door magische landschappen. Ontdek verborgen schatten en vecht tegen mythische wezens in deze open-world RPG.",
        "pluspunten" => "Geweldig verhaal, Prachtige graphics",
        "minpunten" => "Lange laadtijden"
    ];

    $game2 = [
        "id" => 2,
        "titel" => "Middeleeuws Beleg",
        "genre" => "Strategie",
        "prijs" => 44.50,
        "pegi" => 12,
        "platform" => "PC",
        "afbeelding" => "images/6.png",
        "beschrijving" => "Bouw je kasteel en verdedig het tegen indringers. Beheer grondstoffen en train je legers in deze tactische simulatie waarbij elke beslissing telt.",
        "pluspunten" => "Diepe strategie, Realistische physics",
        "minpunten" => "Steile leercurve"
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
        <article class="nav-container">
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
        </article>
    </header>

    <main class="container">
        <h1 class="page-title">Review: <?= $geselecteerdeGame['titel'] ?></h1>

        <article class="card" style="display: flex; flex-direction: column; max-width: 800px; margin: 0 auto;">
            <img src="<?= $geselecteerdeGame['afbeelding'] ?>" alt="<?= $geselecteerdeGame['titel'] ?>" style="width: 100%; height: 400px; object-fit: cover;">
            
            <article class="card-content">
                <article style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 20px;">
                    <span style="background: var(--brand-green); color: white; padding: 5px 15px; border-radius: 20px;">
                        <?= $geselecteerdeGame['genre'] ?>
                    </span>
                    <span style="font-weight: bold; font-size: 1.2rem;">
                        €<?= number_format($geselecteerdeGame['prijs'], 2, ',', '.') ?>
                    </span>
                </article>

                <h3>Het Oordeel</h3>
                <p><?= $geselecteerdeGame['beschrijving'] ?></p>

                <article style="background: var(--light-green-bg); padding: 15px; border-radius: 8px; margin-top: 20px;">
                    <h4>Details</h4>
                    <ul>
                        <strong>Platform:</strong> <?= $geselecteerdeGame['platform'] ?>
                        <br><strong>PEGI Rating:</strong> <?= $geselecteerdeGame['pegi'] ?>+
                        <br><strong>Pluspunten:</strong> <?= $geselecteerdeGame['pluspunten'] ?>
                        <br><strong>Minpunten:</strong> <?= $geselecteerdeGame['minpunten'] ?>
                    </ul>
                </article>
                
                <article style="margin-top: 20px; display: flex; gap: 10px;">
                    <a href="games.html" class="btn">Terug naar overzicht</a>
                    <a href="<?= $andereGameLink ?>" class="btn" style="background-color: #333;">Bekijk andere review</a>
                </article>
            </article>
        </article>
    </main>

    <footer>
        <article class="container">
            <p>&copy; 2025 Game Stars. Alle rechten voorbehouden.</p>
        </article>
    </footer>

</body>
</html>