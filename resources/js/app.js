require('./bootstrap');

//font awesome
require('../../node_modules/@fortawesome/fontawesome-free/js/all');

//Nostro script
require('./script');

document.Dropzone = require('dropzone');

Dropzone.autoDiscover = false;

require('./announcementImages');