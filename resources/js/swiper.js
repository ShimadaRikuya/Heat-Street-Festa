// core version + navigation, pagination modules:
import Swiper, { Navigation, Pagination, Autoplay } from 'swiper';

// import Swiper and modules styles
import 'swiper/css';
import 'swiper/css/navigation';
import 'swiper/css/pagination';

// configure Swiper to use modules
Swiper.use([Navigation, Pagination, Autoplay]);

// init Swiper:
const swiper = new Swiper('.swiper-container', {
  // Optional parameters
  direction: 'horizontal',
  centeredSlides: true,
  effect: 'fade', // フェードモードにする（デフォルトは 'slide'）
  fadeEffect: {
    crossFade: true, // クロスフェードを有効にする（フェードモードの場合 true 推奨）
  },

  loop: true,
  roundLengths: true, //スライドの横幅・高さの小数点以下を四捨五入して、中の画像や文字がぼやけないようにする
  centeredSlides: true, // アクティブなスライドを中央に配置する
  
   // If we need pagination
  pagination: {
    el: '.swiper-pagination',
    type: 'bullets'
  },
  
  // Navigation arrows
  navigation: {
    nextEl: '.swiper-button-next',
    prevEl: '.swiper-button-prev',
  },
  
  // And if we need scrollbar
  scrollbar: {
    el: '.swiper-scrollbar',
  },

  autoplay: { 
    delay:3000 
  }, 

  breakpoints: {
    1024: {
      slidesPerView: 2,
      spaceBetween: 32,
    },
  },
});