/** import exter
 * nal dependencies */
import 'jquery';


require('jquery-easing');
require("velocity-animate");
require("wowjs/dist/wow");

require("materialize-css/js/animation.js");

require("materialize-css/js/init.js");
require("materialize-css/js/global.js");
require("materialize-css/js/jquery.hammer.js");
require("materialize-css/js/collapsible.js");
require("materialize-css/js/dropdown.js");
// require("materialize-css/js/leanModal.js");
require("materialize-css/js/materialbox.js");
require("materialize-css/js/parallax.js");
require("materialize-css/js/tabs.js");
require("materialize-css/js/tooltip.js");
require("materialize-css/js/waves.js");
require("materialize-css/js/toasts.js");
require("materialize-css/js/sideNav.js");
require("materialize-css/js/scrollspy.js");
require("materialize-css/js/forms.js");
require("materialize-css/js/slider.js");
require("materialize-css/js/cards.js");
require("materialize-css/js/chips.js");
require("materialize-css/js/pushpin.js");
require("materialize-css/js/buttons.js");
require("materialize-css/js/transitions.js");
require("materialize-css/js/scrollFire.js");
require("materialize-css/js/character_counter.js");

// require('materialize-css/js/date_picker/picker.js');
// require('materialize-css/js/date_picker/picker.date.js');


/** import local dependencies */
import Router from './util/Router';
import common from './routes/common';
import home from './routes/home';
import aboutUs from './routes/about';

/**
 * Populate Router instance with DOM routes
 * @type {Router} routes - An instance of our router
 */
const routes = new Router({
  /** All pages */
  common,
  /** Home page */
  home,
  /** About Us page, note the change from about-us to aboutUs. */
  aboutUs,
});

/** Load Events */
jQuery(document).ready(() => routes.loadEvents());



// Materialize CSS Edits

  $('.button-collapse').sideNav({
      menuWidth: 300, // Default is 300
      edge: 'left', // Choose the horizontal origin
      closeOnClick: true, // Closes side-nav on <a> clicks, useful for Angular/Meteor
      draggable: true, // Choose whether you can drag to open on touch screens
    }
  );

$('.dropdown-button').dropdown({
      inDuration: 300,
      outDuration: 225,
      hover: true, // Activate on hover
      belowOrigin: true, // Displays dropdown below the button
      alignment: 'right', // Displays dropdown with edge aligned to the left of button
    }
);


