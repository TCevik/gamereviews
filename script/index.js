       
const slides = document.querySelectorAll('.slide');

let currentSlide = 0;
 
slides[currentSlide].classList.add('active');
 
function goToNextSlide() {
   
    slides[currentSlide].classList.remove('active');
   
    if (currentSlide === slides.length - 1) {
        currentSlide = 0;
    } else {
        currentSlide = currentSlide + 1;
       
    } 
    slides[currentSlide].classList.add('active');
}
 
setInterval(goToNextSlide, 4000);

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
