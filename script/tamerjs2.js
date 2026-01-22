const gameCollectie = [
    {
        id: 0,
        titel: "Draken Vlucht",
        genre: "RPG",
        prijs: "57,99",
        pegi: 12,
        platform: "PS5, Xbox",
        afbeeldingen: ["images/9.png", "images/9detail.png"],
        beschrijving: "Drakenvlucht is een epische open-wereld Action-RPG waarin de speler de laatste drakenrijder van de uitgestorven Orde van de Aether-Wachters bestuurt. Het spel speelt zich af in het immense, verticaal ontworpen continent Aerthos, een wereld die bestaat uit zwevende eilanden, majestueuze bergketens en gevaarlijke onderwereldse ravijnen.",
        score: "7,9"
    },
    {
        id: 1,
        titel: "Nachtelijke Schaduw",
        genre: "Actie",
        prijs: "39,99",
        pegi: 16,
        platform: "PC, PS5",
        afbeeldingen: ["images/10.png", "images/10detail.png"],
        beschrijving: "Nachtelijk Schaduw dompelt de speler onder in de neon-doordrenkte, corrupte metropool Neo-Kyoto. Je bent Kage, een begenadigde huurmoordenaar en meester in parkour, die werkt voor een geheime ondergrondse organisatie genaamd 'De Enkels'. De stad wordt in de greep gehouden door vijf machtige megacorporaties, elk met hun eigen privélegers en donkere geheimen",
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
                                <strong>Platform:</strong> ${game.platform}
                                <br><strong>PEGI Rating:</strong> ${game.pegi}+     
                            </ul>
                        </article>
                        
                        <article style="margin-top: 20px;">
                            <a href="games.html" class="btn">Terug naar overzicht</a>
                        </article>
                    </article>
                </article>
            `;
}
