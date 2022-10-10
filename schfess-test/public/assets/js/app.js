// Dom7
var $ = Dom7;

// Theme
var theme = 'md';
if (document.location.search.indexOf('theme=') >= 0) {
  theme = document.location.search.split('theme=')[1].split('&')[0];
}

// Preloader
setTimeout(function () {
    $('.loader-screen').hide();
}, 2000);

// Init App
var app = new Framework7({
  id: 'io.framework7.testapp',
  el: '#app',
  theme,
  view : {
	//pushState: true,
	browserHistory: true,
  },
  // store.js,
  store: store,
  
  // routes.js,
  routes: routes,
   
  popup:{
    closeOnEscape: true,
  },
  sheet: {
    closeOnEscape: true,
  },
  popover: {
    closeOnEscape: true,
  },
  actions: {
    closeOnEscape: true,
  },
  vi: {
    placementId: 'pltd4o7ibb9rc653x14',
  },
});

// Option 1. Using one 'page:init' handler for all pages
$(document).on('page:init', function (e) {
  app.panel.close();
}); 
