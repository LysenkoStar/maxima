import Swiper from 'swiper';
import { Navigation, Thumbs } from 'swiper/modules';
import 'swiper/swiper-bundle.css';

// Window ready
document.addEventListener('DOMContentLoaded', () => {
    let mainSwiperBlock = document.querySelector('.product__image-main');
    let thumbsSwiperBlock = document.querySelector('.product__image-secondary');

    if (mainSwiperBlock && thumbsSwiperBlock) {
        const thumbsSwiper = new Swiper('.product__image-secondary', {
            slidesPerView: 4,
            spaceBetween: 20,
            freeMode: true,
            watchSlidesProgress: true,
        });

        const mainSwiper = new Swiper('.product__image-main', {
            modules: [Navigation, Thumbs],
            spaceBetween: 10,
            navigation: false,
            thumbs: {
                swiper: thumbsSwiper,
            },
        });
    }

    let relatedSwiper = document.querySelector('.product__image-main');

    if (relatedSwiper) {
        new Swiper('.page__product-related-slider', {
            modules: [Navigation],
            slidesPerView: 5,
            spaceBetween: 20,
            centeredSlides: true,
            loop: true,
            navigation: {
                nextEl: ".swiper-button-next",
                prevEl: ".swiper-button-prev",
            },
            breakpoints: {
                // when window width is >= 320px
                320: {
                    slidesPerView: 1,
                },
                // when window width is >= 640px
                640: {
                    slidesPerView: 2,
                },
                768: {
                    slidesPerView: 3,
                },
                1024: {
                    slidesPerView: 4,
                },
                1280: {
                    slidesPerView: 5,
                },
            }
        });
    }

});
