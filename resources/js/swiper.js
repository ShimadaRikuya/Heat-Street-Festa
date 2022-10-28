// core version + navigation, pagination modules:
import Swiper, { Navigation, Pagination, Autoplay } from 'swiper';

// import Swiper and modules styles
import 'swiper/css';
import 'swiper/css/navigation';
import 'swiper/css/pagination';
import 'swiper/css/autoplay';

// configure Swiper to use modules
Swiper.use([Navigation, Pagination, Autoplay]);

// init Swiper:
const swiper = new Swiper('.card01 .swiper', {
  // Optional parameters
  // direction: 'vertical',
  loop: true,

  centeredSlides: true, // アクティブなスライドを中央に配置する
  
   // If we need pagination
  pagination: {
  el: '.card01 .swiper-pagination',
  },
  
  // Navigation arrows
  navigation: {
  nextEl: '.card01 .swiper-button-next',
  prevEl: '.card01 .swiper-button-prev',
  },
  
  // And if we need scrollbar
  scrollbar: {
  el: '.card01 .swiper-scrollbar',
  },

  autoplay: { 
    delay:3000 
  }, 

  breakpoints: {
    600: {
      slidesPerView: 2,
    },
    1025: {
      slidesPerView: 3,
      spaceBetween: 5,
    }
  },
});