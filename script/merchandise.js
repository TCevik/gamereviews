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
