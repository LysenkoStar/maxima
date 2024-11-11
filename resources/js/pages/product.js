import Swiper from 'swiper';
import { Navigation, Thumbs } from 'swiper/modules';
import 'swiper/swiper-bundle.css';

// Window ready
document.addEventListener('DOMContentLoaded', () => {
    let mainSwiperBlock = document.querySelector('.product__image-main');
    let thumbsSwiperBlock = document.querySelector('.product__image-secondary');

    if (mainSwiperBlock && thumbsSwiperBlock) {
        const thumbsSwiper = new Swiper('.product__image-secondary', {
            slidesPerView: 3,
            spaceBetween: 10,
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

});
