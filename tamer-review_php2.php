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
    $gamesCatalogus = [
        "game1" => [
            "titel" => "Industie Magneet",
            "genre" => "Strategie",
            "prijs" => 24,99,
            "pegi" => 12,
            "platform" => " PC",
            "cover" => "images/11.png",
            "screenshot" => "images/11detail.png",
            "beschrijving" => "Industrie Magneet is een diepgaande en uitdagende management-simulatie waarin de speler de leiding krijgt over een startend industrieel conglomeraat in een dynamische, post-industriële wereld. De planeet kampt met extreme grondstofschaarste en hoge milieuvervuiling. Jouw doel is om een onstuitbare, duurzame en winstgevende productielijn te bouwen die de wereld domineert, terwijl je de complexe logistiek en economische markten in balans houdt.",
            "developer" => "Nintendo"
        ],
        "game2" => [
            "titel" => "Grot van Vergetelheid",
            "genre" => "Avontuur",
            "prijs" => 49,99,
            "pegi" => 16,
            "platform" => "Xbox",
             "cover" => "images/12.png",
            "screenshot" => "images/12detail.png",
            "beschrijving" => "Grot van Vergetelheid is een duistere en meedogenloze dungeon crawler die de speler meeneemt naar de diepten van de aarde. Deze Grot is niet zomaar een tunnelstelsel, maar een levend, ademend doolhof dat de herinneringen en angsten van degenen die erin verdwalen, gebruikt.",
            "developer" => "Rockstar Games"
        ]
    ];

    $keuze = isset($_GET['keuze']) ? $_GET['keuze'] : '1';
    
    $geselecteerdeGame = [];

    switch ($keuze) {
        case '2':
            $geselecteerdeGame = $gamesCatalogus["game2"];
            $knopLink = "?keuze=1";
            break;
        case '1':
        default:
            $geselecteerdeGame = $gamesCatalogus["game1"];
            $knopLink = "?keuze=2";
            break;
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
            
            <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 10px; margin-bottom: 20px;">
                <img src="<?= $geselecteerdeGame['cover'] ?>" alt="Cover" style="width: 100%; height: 250px; object-fit: cover; border-radius: 8px;">
                <img src="<?= $geselecteerdeGame['screenshot'] ?>" alt="Screenshot" style="width: 100%; height: 250px; object-fit: cover; border-radius: 8px; filter: grayscale(30%);">
            </div>
            
            <article class="card-content">
                <article style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 20px;">
                    <span style="background: var(--brand-green); color: white; padding: 5px 15px; border-radius: 20px;">
                        <?= "{$geselecteerdeGame['genre']}" ?>
                    </span>
                    <span style="font-weight: bold; font-size: 1.2rem;">
                        €<?= number_format($geselecteerdeGame['prijs'], 2, ',', '.') ?>
                    </span>
                </article>

                <h3>Over de Developer: <?= $geselecteerdeGame['developer'] ?></h3>
                <p><?= $geselecteerdeGame['beschrijving'] ?></p>

                <article style="background: var(--light-green-bg); padding: 15px; border-radius: 8px; margin-top: 20px;">
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