        const games = [
            {
                titel: "Poly-Shift: The Temporal Stack",
                genre: ["Puzzel", "Arcade"],
                fotos: ["images/19.png", "images/19detail.png", "images/19detail2.png"],
                pegi: 3,
                beschrijving: "Een snelle puzzelgame waarbij spelers vallende, driedimensionale blokken moeten rangschikken. De game introduceert een 'tijd-manipulatie' mechanisme om fouten te herstellen.",
                rating: 6.9,
                trailer: "https://www.youtube.com/embed/PFVL6t8IHE8?si=3M-q5EJfMTaR4hvi",
                platform: ["Mobiel", "PC", "Nintendo Switch"],
                maker: "Bandai Namco"
            },
            {
                titel: "Metropolis Vice: Underworld Echoes",
                genre: ["Open-world", "Action"],
                fotos: ["images/20.png", "images/20detail.png", "images/20detail2.png"],
                pegi: 18,
                beschrijving: "Een open-wereld actie-avontuur gesitueerd in een fictieve megastad, met de nadruk op het opbouwen van een crimineel imperium door middel van voertuigachtervolgingen en overvallen.",
                rating: 8.7,
                trailer: "https://www.youtube.com/embed/QkkoHAzjnUs?si=TLYKLHM2ruxHai4A",
                platform: ["PC", "Playstion 5", "Xbox"],
                maker: "Rockstar Games"
            }
        ];

        let slideIndex = 1;

        function plusSlides(n) {
            showSlides(slideIndex += n);
        }

        function currentSlide(n) {
            showSlides(slideIndex = n);
        }

        function showSlides(n) {
            let i;
            let slides = document.getElementsByClassName("mySlides");
            
            if (!slides || slides.length === 0) return;

            if (n > slides.length) {slideIndex = 1}    
            if (n < 1) {slideIndex = slides.length}
            
            for (i = 0; i < slides.length; i++) {
                slides[i].style.display = "none";  
            }
            
            slides[slideIndex-1].style.display = "block";  
        }

        function verwerkKeuze() {
            const leeftijdInput = document.getElementById('ageInput').value;
            const gekozenTitel = document.getElementById('gameSelector').value;
            const resultaatGebied = document.getElementById('resultaatGebied');

            resultaatGebied.innerHTML = "";

            if (!leeftijdInput) {
                alert("Vul alsjeblieft eerst je leeftijd in.");
                return;
            }

            const leeftijd = parseInt(leeftijdInput);
            const gekozenGame = games.find(game => game.titel === gekozenTitel);

            if (!gekozenGame) {
                console.error("Game niet gevonden");
                return;
            }

            if (leeftijd >= gekozenGame.pegi) {
                let genresHTML = "";
                gekozenGame.genre.forEach(g => {
                    genresHTML += `<span class="tag">${g}</span>`;
                });

                let slidesHTML = "";
                gekozenGame.fotos.forEach(foto => {
                    slidesHTML += `
                        <article class="mySlides fade">
                            <img src="${foto}" alt="${gekozenGame.titel}">
                        </article>
                    `;
                });

                let slideshowHTML = `
                    <article class="slideshow-container">
                        ${slidesHTML}
                        <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
                        <a class="next" onclick="plusSlides(1)">&#10095;</a>
                    </article>
                `;

                let platformHTML = "";
                gekozenGame.platform.forEach(p => {
                    platformHTML += `${p} `;
                });

                const htmlContent = `
                    <h1 class="page-title">Review: ${gekozenGame.titel}</h1>
                    <article class="card" id="review" style="max-width: 800px; margin: 0 auto; padding: 20px;">
                        
                        <article style="margin-bottom: 15px;">
                            ${genresHTML}
                        </article>

                        ${slideshowHTML}

                        <article class="card-content">
                            <article style="display:flex; justify-content:space-between; align-items:center;">
                                <h3>Score: ${gekozenGame.rating}/10</h3>
                                <span style="font-size: 0.9em; color: #555;">Maker: ${gekozenGame.maker}</span>
                            </article>
                            
                            <p>${gekozenGame.beschrijving}</p>

                            <article style="background: var(--light-green-bg); padding: 15px; border-radius: 8px; margin-top: 20px;">
                                <h4>Game Info</h4>
                                <p><strong>PEGI:</strong> ${gekozenGame.pegi}+</p>
                                <p><strong>Platforms:</strong> ${platformHTML}</p>
                            </article>

                            <article class="video-wrapper">
                                <iframe src="${gekozenGame.trailer}" frameborder="0" allowfullscreen></iframe>
                            </article>
                        </article>
                    </article>
                `;
                resultaatGebied.innerHTML = htmlContent;

                slideIndex = 1;
                showSlides(slideIndex);
                setInterval(() => {
                    plusSlides(1)
                }, 5000);

            } else {
                resultaatGebied.innerHTML = `
                    <article class="error-box">
                        <h3>Toegang Geweigerd</h3>
                        <p>Je bent ${leeftijd} jaar oud.</p>
                        <p>De game <strong>${gekozenGame.titel}</strong> heeft een PEGI-leeftijd van <strong>${gekozenGame.pegi}+</strong>.</p>
                        <p>Je bent helaas te jong om deze review te bekijken.</p>
                    </article>
                `;
            }
        }

        function getUrlParameter(name) {
            name = name.replace(/[\[]/, '\\[').replace(/[\]]/, '\\]');
            var regex = new RegExp('[\\?&]' + name + '=([^&#]*)');
            var results = regex.exec(location.search);
            return results === null ? '' : decodeURIComponent(results[1].replace(/\+/g, ' '));
        }

        function initialiseerGameSelector() {
            const gameSelector = document.getElementById('gameSelector');
            const gekozenTitel = getUrlParameter('game');
            
            if (gekozenTitel) {
                const gameExists = games.some(game => game.titel === gekozenTitel);

                if (gameExists) {
                    gameSelector.value = gekozenTitel;
                }
            }
        }

        window.onload = initialiseerGameSelector;
