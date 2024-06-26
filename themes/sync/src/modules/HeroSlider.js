import Glide from "@glidejs/glide"

class HeroSlider {
  constructor() {
    if (document.querySelector(".hero-slider")) {

      const dotCount = document.querySelectorAll(".hero-slider__slide").length


      let dotHTML = ""
      for (let i = 0; i < dotCount; i++) {
        dotHTML += `<button class="slider__bullet glide__bullet" data-glide-dir="=${i}"></button>`
      }


      document.querySelector(".glide__bullets").insertAdjacentHTML("beforeend", dotHTML)


      var glide = new Glide(".hero-slider", {
        type: "carousel",
        perView: 1,
        autoplay: 3000
      })

      glide.mount()
    }
  }
}

export default HeroSlider
