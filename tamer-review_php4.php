<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Game Review PHP 4 - Game Stars</title>
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
        .age-form, .review-form {
            background-color: var(--light-green-bg);
            padding: 20px;
            border-radius: 8px;
            margin-bottom: 20px;
            text-align: center;
        }
        .review-form {
            text-align: left;
            border: 1px solid var(--brand-green);
        }
        .review-form input, .review-form textarea {
            width: 100%;
            padding: 8px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        .review-form label {
            font-weight: bold;
            display: block;
            margin-bottom: 5px;
        }
        .user-review {
            background: #fff;
            border-left: 5px solid var(--brand-green);
            padding: 15px;
            margin-top: 20px;
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
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
    "The Chronicles of Eldoria: Shadowfall" => [
        "titel" => "The Chronicles of Eldoria: Shadowfall",
        "genre" => ["Open-world"],
        "pegi" => 12,
        "beschrijving" => "en uitgestrekte fantasy RPG waarin je een 'Waker' bent, een monsterjager die door een land vol politieke intriges en oude magie reist om een opkomende duisternis te stoppen.",
        "fotos" => ["images/27.png"]
        "rating" => 6.7,
        "trailer" => "https://www.youtube.com/embed/yWMu6JeT2g8?si=jEcoVfMCEmnhq5lp",
        "platform" => ["PS5" , "Xbox" , "PC"],
        "maker" => "CD projekt Red"
    ], 
    "Infinite Snare" => [
        "titel" => "Infinite Snare",
        "genre" => ["Actie"],
        "pegi" => 12,
        "beschrijving" => "Een online multiplayer game voor 8 spelers, vastzittend in een constant veranderende, dodelijke doolhof. Werk samen om te ontsnappen, maar pas op: twee spelers zijn 'Saboteurs' wiens enige doel het is om de rest uit te schakelen.",
        "fotos" ["images/28.png"]
        "rating" => 7.1,
        "trailer" => "https://www.youtube.com/embed/9pyYq9lpjls?si=unB7qQ6FSacmNUvL",
        "platform" => ["PC" , "Xbox" , "PS5" , "Mobile"],
        "maker" => "Innersloth"
    ]
];

$gebruikersLeeftijd = isset($_POST['leeftijd']) ? (int)$_POST['leeftijd'] : (isset($_GET['leeftijd']) ? (int)$_GET['leeftijd'] : 0);
$leeftijdIngevuld = isset($_POST['leeftijd']) || isset($_GET['leeftijd']);

$huidigeTitel = isset($_GET['titel']) ? $_GET['titel'] : "The Chronicles of Eldoria: Shadowfall";

if (!array_key_exists($huidigeTitel, $games)) {
    $huidigeTitel = "The Chronicles of Eldoria: Shadowfall";
}

$geselecteerdeGameData = $games[$huidigeTitel];

$reviewIngezonden = false;
$nieuweRating = $geselecteerdeGameData['rating'];
$userReviewData = [];

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submit_review'])) {
    $naam = htmlspecialchars($_POST['naam']);
    $beschrijving = htmlspecialchars($_POST['beschrijving']);
    $userRating = (float)$_POST['rating'];
    
    $nieuweRating = ($geselecteerdeGameData['rating'] + $userRating) / 2;
    
    $userReviewData = [
        'naam' => $naam,
        'beschrijving' => $beschrijving,
        'rating' => $userRating
    ];
    $reviewIngezonden = true;
    
    $gebruikersLeeftijd = (int)$_POST['hidden_leeftijd'];
    $leeftijdIngevuld = true;
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
        
        <?php if (!$leeftijdIngevuld): ?>
        <section class="age-form">
            <h3>Leeftijdscontrole</h3>
            <form method="POST" action="tamer-review_php4.php?titel=<?= urlencode($huidigeTitel) ?>">
                <label for="leeftijd">Voer je leeftijd in:</label>
                <input type="number" id="leeftijd" name="leeftijd" required min="0" max="120" style="padding: 5px;">
                <button type="submit" class="btn" style="padding: 5px 10px; font-size: 0.9rem;">Bevestig</button>
            </form>
        </section>
        <?php endif; ?>

        <section class="age-form">
             <p>Kies een game:</p>
            <a href="?titel=Infinite+Snare&leeftijd=<?= $gebruikersLeeftijd ?>" class="btn" style="background-color: #333; font-size: 0.8rem;">Infinite Snare</a>
            <a href="?titel=The+Chronicles+of+Eldoria%3A+Shadowfall&leeftijd=<?= $gebruikersLeeftijd ?>" class="btn" style="background-color: #333; font-size: 0.8rem;">The Chronicles of Eldoria: Shadowfall</a>
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


                    <div class="card-content">
                        <h3>Huidige Rating: <?= number_format($nieuweRating, 1) ?>/10</h3>
                        <p><strong>Maker:</strong> <?= "{$geselecteerdeGameData['maker']}" ?></p>
                        <p><?= "{$geselecteerdeGameData['beschrijving']}" ?></p>
                        
                        <article style="background: var(--light-green-bg); padding: 15px; border-radius: 8px; margin-top: 20px;">
                            <h4>Details</h4>
                            <p><strong>PEGI Leeftijd:</strong> <?= "{$geselecteerdeGameData['pegi']}" ?>+</p>
                            <p><strong>Platforms:</strong> 
                                <?php 
                                    echo implode(", ", $geselecteerdeGameData['platform']);
                                ?>
                            </p>
                        </article>

                        <?php if(!empty($geselecteerdeGameData['trailer'])): ?>
                            <div class="video-container">
                                <iframe src="<?= $geselecteerdeGameData['trailer'] ?>" frameborder="0" allowfullscreen></iframe>
                            </div>
                        <?php endif; ?>

                        <div style="margin-top: 30px;">
                            <h3>Schrijf een review</h3>
                            <form method="POST" class="review-form">
                                <input type="hidden" name="hidden_leeftijd" value="<?= $gebruikersLeeftijd ?>">
                                
                                <label for="naam">Naam:</label>
                                <input type="text" id="naam" name="naam" required placeholder="Je naam">

                                <label for="beschrijving">Beschrijving:</label>
                                <textarea id="beschrijving" name="beschrijving" rows="4" required placeholder="Wat vond je van de game?"></textarea>

                                <label>Rating (1-5):</label>
                                <div style="margin-bottom: 15px;">
                                    <input type="radio" id="r1" name="rating" value="1" required> <label for="r1" style="display:inline; font-weight:normal;">1</label>
                                    <input type="radio" id="r2" name="rating" value="2"> <label for="r2" style="display:inline; font-weight:normal;">2</label>
                                    <input type="radio" id="r3" name="rating" value="3"> <label for="r3" style="display:inline; font-weight:normal;">3</label>
                                    <input type="radio" id="r4" name="rating" value="4"> <label for="r4" style="display:inline; font-weight:normal;">4</label>
                                    <input type="radio" id="r5" name="rating" value="5"> <label for="r5" style="display:inline; font-weight:normal;">5</label>
                                </div>

                                <button type="submit" name="submit_review" class="btn">Verstuur Review</button>
                            </form>
                        </div>

                        <?php if ($reviewIngezonden): ?>
                            <div class="user-review">
                                <h4>Bedankt voor je review, <?= $userReviewData['naam'] ?>!</h4>
                                <p><strong>Jouw Score:</strong> <?= $userReviewData['rating'] ?>/5</p>
                                <p><em>"<?= $userReviewData['beschrijving'] ?>"</em></p>
                                <p style="color: var(--dark-green-text); font-weight: bold;">De nieuwe gemiddelde score van de game is nu: <?= number_format($nieuweRating, 1) ?>/10</p>
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
            <?php endif; ?>

        <?php endif; ?>

    </main>

    <footer>
        <article class="container">
            <p>&copy; 2025 Game Stars. Alle rechten voorbehouden.</p>
        </article>
    </footer>
</body>
</html>