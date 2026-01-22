        const game1 = {
            id: 1,
            titel: "Stadsbouw Simulatie",
            genre: "Strategie",
            prijs: 49.99,
            pegi: 7,
            platform: "PC",
            afbeelding: "images/2.png",
            beschrijving: "Stadsbouw Simulatie is een uitgebreide en diepgaande simulatiegame voor PC en consoles, waarin je de ultieme controle krijgt over het creëren en beheren van je eigen bruisende metropool. Van de eerste steenlegging tot de skyline van wolkenkrabbers, elke beslissing die je neemt, vormt de toekomst van je stad.",
            score: 8.5
        };

        const game2 = {
            id: 2,
            titel: "Oude Mysteriën",
            genre: "Actie",
            prijs: 14.99,
            pegi: 7,
            platform: "PC",
            afbeelding: "images/4.png",
            beschrijving: "Oude Mysteriën is een meeslepende avonturengame voor PC en consoles, die spelers meeneemt op een epische reis vol ontdekkingen, intriges en verborgen geheimen. Duik in vergeten beschavingen, verken adembenemende landschappen en ontrafel puzzels die eeuwenlang verborgen zijn gebleven.",
            score: 9.0
        };

        const urlParams = new URLSearchParams(window.location.search);
        let urlGameId = urlParams.get('game');

        if (urlGameId !== '1' && urlGameId !== '2') {
            urlGameId = '1';
        }

        let huidigeGameId = parseInt(urlGameId);

        toonGame(huidigeGameId);

        function wisselGame() {
            let nieuwId = (huidigeGameId === 1) ? 2 : 1;
            window.location.search = '?game=' + nieuwId;
        }

        function toonGame(kiesId) {
            let gekozenGame;

            switch (kiesId) {
                case 1:
                    gekozenGame = game1;
                    break;
                case 2:
                    gekozenGame = game2;
                    break;
                default:
                    gekozenGame = game1;
            }

            console.log("Huidige game getoond: " + gekozenGame.titel);

            const contentArticle = document.getElementById('game-content');

            contentArticle.innerHTML = `
                <h1 class="page-title" id="reviewt">Review: ${gekozenGame.titel}</h1>
                
                <article class="card" id="review" style="display: flex; flex-direction: column; max-width: 800px; margin: 0 auto; transition: all 0.3s ease;">
                    <img src="${gekozenGame.afbeelding}" alt="${gekozenGame.titel}" style="width: 100%; height: 400px; object-fit: cover;">
                    
                    <article class="card-content">
                        <article style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 20px;">
                            <span style="background: var(--brand-green); color: white; padding: 5px 15px; border-radius: 20px;">
                                ${gekozenGame.genre}
                            </span>
                            <span style="font-weight: bold; font-size: 1.2rem;">
                                €${gekozenGame.prijs}
                            </span>
                        </article>

                        <h3>Review Score: ${gekozenGame.score}/10</h3>
                        <p>${gekozenGame.beschrijving}</p>

                        <article style="background: var(--light-green-bg); padding: 15px; border-radius: 8px; margin-top: 20px;">
                            <h4>Specificaties</h4>
                            <ul>
                                <strong>Platform:</strong> ${gekozenGame.platform}
                                <br><strong>PEGI Rating:</strong> ${gekozenGame.pegi}+
                            </ul>
                        </article>
                        
                        <article style="margin-top: 20px;">
                            <a href="games.html" class="btn">Terug naar overzicht</a>
                        </article>
                    </article>
                </article>
            `;
        }
