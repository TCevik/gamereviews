<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Game Review PHP 2 - Game Stars</title>
    <meta name="author" content="Tamer Çevik">
    <link rel="stylesheet" href="style/style.css"> 
    <link href="https://fonts.googleapis.com/css2?family=Lexend:wght@300;400;600;700&display=swap" rel="stylesheet">
</head>
<body id="reviewb">

    <?php
    // Catalogus array met de details van twee verschillende games
    $gamesCatalogus = [
        "game1" => [
            "titel" => "Toren verdediging",
            "genre" => "Strategie",
            "prijs" => 24.99,
            "pegi" => 7,
            "platform" => "PC",
            "cover" => "images/15.png",
            "screenshot" => "images/15detail.png",
            "beschrijving" => "Toren Verdediging is een meeslepende, middeleeuwse fantasy Tower Defense game waarin de speler de rol aanneemt van de Veldmaarschalk van Aethelgard. De laatste overgebleven stad, Ardentor, wordt voortdurend bedreigd door de dreigende legers van de Schaduwkoning – een eindeloze stroom van monsters, demonen en belegeringswapens die de verdedigingslinies willen doorbreken.",
            "developer" => "Ubisoft"
        ],
        "game2" => [
            "titel" => "Grand Prix 2026",
            "genre" => "Race",
            "prijs" => 54.99,
            "pegi" => 7,
            "platform" => "PC", "PS5",
            "cover" => "images/16.png",
            "screenshot" => "images/16detail.png",
            "beschrijving" => "Grand Prix 2026 is de ultieme race-simulatie die de speler onderdompelt in de toekomst van de single-seater motorsport. Het spel legt de nadruk op realisme, diepgaande technische afstellingen en de intense competitie van de topklasse racen in het jaar 2026. Met nieuwe aerodynamische reglementen en de nadruk op duurzame, krachtige hybride motoren, daagt GP 2026 je uit om niet alleen de snelste, maar ook de slimste coureur op de grid te zijn.",
            "developer" => "EA"
        ]
    ];

    // Kijk of er een keuze is gemaakt in de URL (?keuze=...), standaard is '1'
    $keuze = '1';
    if (isset($_GET['keuze'])) {
        $keuze = $_GET['keuze'];
    }
    
    $geselecteerdeGame = [];

    // Als het nummer 2 is, pakken we de tweede game
    if ($keuze == '2') {
        $geselecteerdeGame = $gamesCatalogus["game2"];
        $knopLink = "?keuze=1";
    } else {
        $geselecteerdeGame = $gamesCatalogus["game1"];
        $knopLink = "?keuze=2";
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
        <h1 style="text-shadow: 2px 2px 4px #000; color: white;" class="page-title">Review: <?= "{$geselecteerdeGame['titel']}" ?></h1>

        <article class="card" id="review" style="display: flex; flex-direction: column; max-width: 800px; margin: 0 auto; padding: 20px;">
            
            <article style="display: grid; grid-template-columns: 1fr 1fr; gap: 10px; margin-bottom: 20px;">
                <!-- Toon de cover en een screenshot naast elkaar -->
                <img src="<?= $geselecteerdeGame['cover'] ?>" alt="Cover" style="width: 100%; height: 250px; object-fit: cover; border-radius: 8px;">
                <img src="<?= $geselecteerdeGame['screenshot'] ?>" alt="Screenshot" style="width: 100%; height: 250px; object-fit: cover; border-radius: 8px; filter: grayscale(30%);">
            </article>
            
            <article class="card-content">
                <article style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 20px;">
                    <span style="background: var(--brand-green); color: white; padding: 5px 15px; border-radius: 20px;">
                        <?= "{$geselecteerdeGame['genre']}" ?>
                    </span>
                    <span style="font-weight: bold; font-size: 1.2rem;">
                        €<?= $geselecteerdeGame['prijs'] ?>
                    </span>
                </article>

                <h3>Over de Developer: <?= $geselecteerdeGame['developer'] ?></h3>
                <p><?= $geselecteerdeGame['beschrijving'] ?></p>

                <article style="background: var(--light-green-bg); padding: 15px; border-radius: 8px; margin-top: 20px;">
                    <!-- Lijstje met specifieke details zoals platform en PEGI -->
                    <h4>Specificaties</h4>
                    <ul>
                        <strong>Platform:</strong> <?= $geselecteerdeGame['platform'] ?>
                        <br><strong>PEGI Rating:</strong> <?= $geselecteerdeGame['pegi'] ?>+
                    </ul>
                </article>
                
                <article style="margin-top: 20px; display: flex; gap: 10px;">
                    <a href="games.html" class="btn">Terug naar overzicht</a>
                    <a href="<?= $knopLink ?>" class="btn" style="background-color: #333;">Bekijk volgende game</a>
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