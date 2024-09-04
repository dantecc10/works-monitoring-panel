function build_carousel(imgs) {
    const carousel = document.querySelector('.carousel#carousel-evidence');
    const slides = carousel.querySelectorAll('.carousel-item');
    if (slides.length !== 0) {
        carousel.querySelector('.carousel-inner').innerHTML = ''; // Limpiar el carrusel de lo que tenga anteriormente.
        carousel.querySelector('.carousel-indicators').innerHTML = ''; // Limpiar los indicadores de lo que tenga anteriormente.
    }
    if (imgs.length > 1) {
        for (let i = 0; i < imgs.length; i++) {
            const slide = document.createElement('div');
            slide.classList.add('carousel-item', 'text-center');
            slide.style.maxHeight = ("inherit !important;")
            if (i === 0) {
                slide.classList.add('active');
            }
            const img = document.createElement('img');
            img.src = imgs[i];
            img.classList.add('d-block', 'w-100');
            img.style.maxHeight = ("max-height: inherit;");
            img.style.width = ("auto !important;");
            img.style.display = ("inline-flex !important;")
            slide.appendChild(img);
            carousel.querySelector('.carousel-inner').appendChild(slide);

            const indicator = document.createElement('button');
            indicator.setAttribute('data-target', '#carousel-evidence');
            indicator.setAttribute('type', 'button');
            indicator.setAttribute('data-slide-to', i);
            if (i === 0) {
                indicator.classList.add('active');
            }
            carousel.querySelector('.carousel-indicators').appendChild(indicator);
        }
    }
}