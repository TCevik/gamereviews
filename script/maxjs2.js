const gameCollectie = [
    {
        id: 0,
        titel: "Elementaire Kracht",
        genre: "RPG",
        prijs: "36,99",
        pegi: 12,
        platform: "Alle",
        afbeeldingen: ["images/13.png", "images/13detail.png"],
        beschrijving: "Elemataire Kracht is een grootschalige, turn-based fantasy RPG die zich afspeelt in de verwoeste wereld van Aethelos. Jaren geleden werd Aethelos verscheurd door de Grote Cataclysme, een gebeurtenis waarbij de oeroude elementaire geesten de bron van alle magie  in een blinde razernij de planeet overspoelden.",
        score: "7,8"
    },
    {
        id: 1,
        titel: "Jungle Overleving de wilde roep",
        genre: "Actie, Avontuur",
        prijs: "45,99",
        pegi: 16,
        platform: "PS5, Xbox",
        afbeeldingen: ["images/14.png", "images/14detail.png"],
        beschrijving: "Jungle Overleving: De Wilde Roep dompelt spelers onder in de meedogenloze, maar adembenemende, Amazon-achtige jungle van Veridia. Je speelt als Elias, een onderzoeker die na een noodlottige vliegtuigcrash gestrand is in een onbekend en onontdekt deel van het oerwoud. Je enige doel is overleven, ontsnappen, en de geheimen van de jungle ontrafelen die de beschaving al millennia heeft gemeden.",
        score: "8,7"
    }
];

const urlParams = new URLSearchParams(window.location.search);
let urlIndex = parseInt(urlParams.get('index'));

if (isNaN(urlIndex) || (urlIndex !== 0 && urlIndex !== 1)) {
    urlIndex = 0;
}

let actieveGameIndex = urlIndex;

toonGame(actieveGameIndex);

function wisselGame() {
    let nieuweIndex;

    if (actieveGameIndex === 0) {
        nieuweIndex = 1;
    } else {
        nieuweIndex = 0;
    }

    window.location.search = '?index=' + nieuweIndex;
}

function toonGame(index) {
    const game = gameCollectie[index];

    console.log(`Huidige game geladen: ${game.titel} (PEGI ${game.pegi})`);

    const contentArticle = document.getElementById('game-content');

    contentArticle.innerHTML = `
                <h1 class="page-title" id="reviewt">Review: ${game.titel}</h1>
                
                <article class="card" id="review" style="display: flex; flex-direction: column; max-width: 800px; margin: 0 auto; padding: 20px;">
                    
                    <!-- EIS: We willen van elke game 2 foto's -->
                    <!-- Omdat we afbeeldingen in een array hebben (afbeeldingen[0] en [1]) is dit een array in een array gebruik -->
                    <article style="display: grid; grid-template-columns: 1fr 1fr; gap: 10px; margin-bottom: 20px;">
                         <img src="${game.afbeeldingen[0]}" alt="Main Cover" style="width: 100%; height: 250px; object-fit: cover; border-radius: 8px;">
                         <img src="${game.afbeeldingen[1]}" alt="Gameplay" style="width: 100%; height: 250px; object-fit: cover; border-radius: 8px;">
                    </article>

                    <article class="card-content">
                        <article style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 20px;">
                            <span style="background: var(--brand-green); color: white; padding: 5px 15px; border-radius: 20px;">
                                ${game.genre}
                            </span>
                            <span style="font-weight: bold; font-size: 1.2rem;">
                                €${game.prijs}
                            </span>
                        </article>

                        <h3>Review Score: ${game.score}/10</h3>
                        <p>${game.beschrijving}</p>

                        <article style="background: var(--light-green-bg); padding: 15px; border-radius: 8px; margin-top: 20px;">
                            <h4>Details</h4>
                            <ul>
                                <li><strong>Platform:</strong> ${game.platform}</li>
                                <li><strong>PEGI Rating:</strong> ${game.pegi}+ </li>
                            </ul>
                        </article>
                        
                        <article style="margin-top: 20px;">
                            <a href="games.html" class="btn">Terug naar overzicht</a>
                        </article>
                    </article>
                </article>
            `;
}
