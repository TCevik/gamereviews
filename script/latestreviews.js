        const slides = document.querySelectorAll('.review-slide');
        let currentSlide = 0;
        const slideIntervalTime = 8000;

        function nextSlide() {
            slides[currentSlide].classList.remove('active');
            slides[currentSlide].style.display = 'none';

            currentSlide = (currentSlide + 1) % slides.length;

            slides[currentSlide].style.display = 'block';
            
            setTimeout(() => {
                slides[currentSlide].classList.add('active');
            }, 50);
        }

        if(slides.length > 0) {
            setInterval(nextSlide, slideIntervalTime);
            console.log("Slideshow actief met " + slides.length + " games.");
        }
