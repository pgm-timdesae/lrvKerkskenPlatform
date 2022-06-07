require('./bootstrap');

(() => {
  const app = {
    initialize:function () {
      this.cacheElements();
      this.buildUI();
    },

    cacheElements: function () {
      this.$menuIcon = document.querySelector('.hamburger-btn')
      this.$menu = document.querySelector('.site-header')
    },

    buildUI: function () {
      this.generateClickEventMenu();
      this.generateAnimationHamburger();  
    },

    generateClickEventMenu: function (){
      this.$menuIcon.addEventListener('click', (event) => {
        if(this.$menu.classList.contains('open')){
          this.$menu.classList.remove('open')
        } else {
          this.$menu.classList.add('open');
        }
      });
    },
    generateAnimationHamburger: function (){
      this.$menuIcon.addEventListener('click', (event) => {
        if(this.$menuIcon.classList.contains('open')){
          this.$menuIcon.classList.remove('open')
        } else {
          this.$menuIcon.classList.add('open');
        }
      });
    },
  };
  app.initialize();

})();