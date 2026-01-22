const WEBHOOK_URL = 'https://discordapp.com/api/webhooks/1444967219732680794/1CFTOCDKW9ywhuz-hobwtvt9eHGf9eFElhwTTarZjjQJPKgZATPkreDVyaO6bobVqANW';

const contactForm = document.querySelector('.contact-form');

contactForm.addEventListener('submit', async function (event) {
    event.preventDefault();

    const submitBtn = contactForm.querySelector('.btn');
    submitBtn.disabled = true;
    submitBtn.textContent = 'Verzenden...';

    const name = document.getElementById('name').value;
    const email = document.getElementById('email').value;
    const subject = document.getElementById('subject').value;
    const message = document.getElementById('message').value;

    const discordPayload = {
        content: "✨ **Nieuw Contactformulier Inzending** ✨",
        embeds: [{
            title: subject,
            color: 5814783,
            fields: [
                { name: "👤 Naam", value: name, inline: true },
                { name: "📧 E-mail", value: email, inline: true },
                { name: "💬 Bericht", value: message.substring(0, 1024), inline: false }
            ],
            timestamp: new Date().toISOString(),
            footer: { text: "Game Stars Contact" }
        }]
    };

    try {
        const response = await fetch(WEBHOOK_URL, {
            method: 'POST',
            headers: { 'Content-Type': 'application/json' },
            body: JSON.stringify(discordPayload),
        });

        if (response.ok) {
            alert('Bericht succesvol verzonden! We nemen zo snel mogelijk contact met je op.');
            contactForm.reset();
        } else {
            console.error('Fout bij versturen naar Discord:', response.status);
            alert('Er is een fout opgetreden bij het verzenden. Status: ' + response.status);
        }
    } catch (error) {
        console.error('Netwerkfout:', error);
        alert('Er is een netwerkfout opgetreden. Controleer je verbinding.');
    } finally {
        submitBtn.disabled = false;
        submitBtn.textContent = 'Verstuur Knop';
    }
});