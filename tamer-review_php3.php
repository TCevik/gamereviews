<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Game Review PHP Final - Game Stars</title>
    <meta name="author" content="Tamer Çevik">
    <link rel="stylesheet" href="style/style.css">
    <link href="https://fonts.googleapis.com/css2?family=Lexend:wght@300;400;600;700&display=swap" rel="stylesheet">
    <style>
        .error-msg {
            background-color: #ffebee;
            color: #c62828;
            padding: 15px;
            border-radius: 8px;
            border: 1px solid #ef9a9a;
            text-align: center;
            margin-bottom: 20px;
            font-weight: bold;
        }
        .age-form {
            background-color: var(--light-green-bg);
            padding: 20px;
            border-radius: 8px;
            margin-bottom: 20px;
            text-align: center;
        }
        .gallery {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 10px;
            margin: 20px 0;
        }
        .gallery img {
            width: 100%;
            height: 150px;
            object-fit: cover;
            border-radius: 8px;
            border: 2px solid var(--brand-green);
        }
        .video-container {
            position: relative;
            padding-bottom: 56.25%;
            height: 0;
            overflow: hidden;
            border-radius: 8px;
            margin-top: 20px;
        }
        .video-container iframe {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
        }
        .badge {
            display: inline-block;
            background: var(--dark-green-text);
            color: white;
            padding: 5px 10px;
            border-radius: 15px;
            font-size: 0.9em;
            margin-right: 5px;
            margin-bottom: 5px;
        }
    </style>
</head>
<body id="reviewb">

<?php
$games = [
    "Boardwalk billionaires" => [
        "titel" => "Boardwalk billionaires",
        "genre" => ["Strategie", "Economische simulatie"],
        "fotos" => ["23.png", "23detail.png", ""],
        "pegi" => 3,
        "beschrijving" => "Boardwalk billionaires een moderne digitale versie van het vastgoed-handelsspel, waarbij spelers investeren in steden wereldwijd, met willekeurige 'marktschommelingen' en aanpasbare regels.",
        "rating" => 8.4,
        "trailer" => "https://www.youtube.com/embed/mkAcX4Lw7Is?si=jjsphed4erWKVOVu",
        "platform" => ["Playstation 5", "Xbox"],
        "maker" => "Paradox interactive"
    ],
    "Life weaver" => [
        "titel" => "Life weaver",
        "genre" => ["Levenssimulatie", "Management"],
        "fotos" => ["24.png", "24detail.png", ""],
        "pegi" => 12,
        "beschrijving" => "Life weaver Een diepere levenssimulatiegame waarin je niet alleen personages beheert, maar ook de wetten, economie en cultuur van hun kleine virtuele samenleving kunt aanpassen.",
        "rating" => 7.9,
        "trailer" => "https://www.youtube.com/embed/DyNv44QR14g?si=T8EWZYu9cseuSYKS",
        "platform" => ["PC", "Playstation 5"],
        "maker" => "EA"
    ]
];

$gebruikersLeeftijd = isset($_POST['leeftijd']) ? (int)$_POST['leeftijd'] : 0;
$leeftijdIngevuld = isset($_POST['leeftijd']);

$huidigeTitel = isset($_GET['titel']) ? $_GET['titel'] : "Life weaver";

$geselecteerdeGameData = null;

switch ($huidigeTitel) {
    case "Boardwalk billionaires":
        $geselecteerdeGameData = $games["Boardwalk billionaires"];
        break;
    case "Life weaver":
    default:
        $geselecteerdeGameData = $games["Life weaver"];
        $huidigeTitel = "Life weaver";
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
        
        <section class="age-form">
            <h3>Instellingen</h3>
            <form method="POST" action="tamer-review_php3.php?titel=<?= urlencode($huidigeTitel) ?>">
                <label for="leeftijd">Voer je leeftijd in om de review te bekijken:</label>
                <input type="number" id="leeftijd" name="leeftijd" value="<?= $leeftijdIngevuld ? $gebruikersLeeftijd : '' ?>" required min="0" max="120" style="padding: 5px;">
                <button type="submit" class="btn" style="padding: 5px 10px; font-size: 0.9rem;">Bevestig Leeftijd</button>
            </form>
            <br>
            <p>Kies een andere game:</p>
            <a href="?titel=Life weaver" class="btn" style="background-color: #333; font-size: 0.8rem;">Life weaver I</a>
            <a href="?titel=Boardwalk billionaires" class="btn" style="background-color: #333; font-size: 0.8rem;">Boardwalk billionaires</a>
        </section>

        <?php if ($leeftijdIngevuld): ?>
            
            <?php 
            if ($gebruikersLeeftijd >= $geselecteerdeGameData['pegi']): 
            ?>
                <h1 class="page-title">Review: <?= "{$geselecteerdeGameData['titel']}" ?></h1>

                <article class="card" id="review" style="max-width: 800px; margin: 0 auto; padding: 20px;">
                    
                    <div style="margin-bottom: 10px;">
                        <?php foreach($geselecteerdeGameData['genre'] as $g): ?>
                            <span class="badge" style="background-color: var(--brand-green);"><?= $g ?></span>
                        <?php endforeach; ?>
                    </div>

                    <div class="gallery">
                        <?php foreach($geselecteerdeGameData['fotos'] as $foto): ?>
                            <img src="<?= $foto ?>" alt="Game screenshot">
                        <?php endforeach; ?>
                    </div>

                    <div class="card-content">
                        <h3>Rating: <?= "{$geselecteerdeGameData['rating']}" ?>/10</h3>
                        <p><strong>Maker:</strong> <?= "{$geselecteerdeGameData['maker']}" ?></p>
                        <p><?= "{$geselecteerdeGameData['beschrijving']}" ?></p>
                        
                        <article style="background: var(--light-green-bg); padding: 15px; border-radius: 8px; margin-top: 20px;">
                            <h4>Details</h4>
                            <p><strong>PEGI Leeftijd:</strong> <?= "{$geselecteerdeGameData['pegi']}" ?>+</p>
                            <p><strong>Platforms:</strong> 
                                <?php 
                                    foreach($geselecteerdeGameData['platform'] as $index => $plat) {
                                        echo $plat;
                                        if ($index < count($geselecteerdeGameData['platform']) - 1) echo ", ";
                                    }
                                ?>
                            </p>
                        </article>

                        <?php if(!empty($geselecteerdeGameData['trailer'])): ?>
                            <div class="video-container">
                                <iframe src="<?= $geselecteerdeGameData['trailer'] ?>" frameborder="0" allowfullscreen></iframe>
                            </div>
                        <?php endif; ?>

                    </div>
                </article>

            <?php else: ?>
                <div class="error-msg">
                    <h2>Helaas!</h2>
                    <p>Je bent <?= $gebruikersLeeftijd ?> jaar oud.</p>
                    <p>Deze game heeft een PEGI-rating van <?= $geselecteerdeGameData['pegi'] ?>+. Je bent niet oud genoeg om deze content te bekijken.</p>
                </div>
                <h1 style="text-align:center; color: #666; filter: blur(2px);">Review: <?= $geselecteerdeGameData['titel'] ?></h1>
            <?php endif; ?>

        <?php else: ?>
            <p style="text-align: center;">Vul hierboven eerst je leeftijd in.</p>
        <?php endif; ?>

    </main>

    <footer>
        <article class="container">
            <p>&copy; 2025 Game Stars. Alle rechten voorbehouden.</p>
        </article>
    </footer>
</body>
</html>