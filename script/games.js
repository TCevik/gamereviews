function pasFooterAan() {
    const footer = document.querySelector('footer');
    const windowHoogte = window.innerHeight;
    const bodyHoogte = document.body.offsetHeight;

    if (bodyHoogte < windowHoogte) {
        footer.style.position = 'fixed';
        footer.style.bottom = '0';
        footer.style.width = '100%';
    } else {
        footer.style.position = 'static';
    }
}

window.addEventListener('load', pasFooterAan);
window.addEventListener('resize', pasFooterAan);

const zoekVeld = document.getElementById('search');
const genreSelect = document.getElementById('genre');
const platformSelect = document.getElementById('platform');
const alleKaarten = document.querySelectorAll('.card');
const paginatieLinks = document.querySelectorAll('.page-link');
let huidigePagina = 1;

function toonPagina(paginaNummer) {
    huidigePagina = paginaNummer;
    paginatieLinks.forEach(link => {
        link.classList.remove('active');
    });
    document.querySelector(`.page-link[data-page="${paginaNummer}"]`).classList.add('active');

    filterGames();
}

function filterGames() {
    const zoekTekst = zoekVeld.value.toLowerCase();
    const gekozenGenre = genreSelect.value.toLowerCase();
    const gekozenPlatform = platformSelect.value.toLowerCase();

    alleKaarten.forEach(kaart => {
        const kaartPagina = parseInt(kaart.getAttribute('data-page'));
        const titel = kaart.querySelector('h3').innerText.toLowerCase();
        const kaartGenres = kaart.getAttribute('data-genre').toLowerCase();
        const kaartPlatforms = kaart.getAttribute('data-platform').toLowerCase();

        const matchPagina = kaartPagina === huidigePagina;

        const matchZoek = titel.includes(zoekTekst);
        const matchGenre = gekozenGenre === 'alle' || kaartGenres.includes(gekozenGenre);
        const matchPlatform = gekozenPlatform === 'alle' || kaartPlatforms.includes(gekozenPlatform);

        if (matchPagina && matchZoek && matchGenre && matchPlatform) {
            kaart.style.display = 'block';
        } else {
            kaart.style.display = 'none';
        }
    });

    pasFooterAan();
}

zoekVeld.addEventListener('keyup', filterGames);
genreSelect.addEventListener('change', filterGames);
platformSelect.addEventListener('change', filterGames);

paginatieLinks.forEach(link => {
    link.addEventListener('click', (e) => {
        e.preventDefault();
        const pagina = parseInt(e.target.getAttribute('data-page'));
        toonPagina(pagina);
    });
});

document.addEventListener('DOMContentLoaded', () => {
    toonPagina(huidigePagina);
});