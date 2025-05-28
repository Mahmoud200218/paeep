import './bootstrap';

import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();

window.Echo.channel('App.Models.Admin')
    .notification(data => {
        console.log(data.name);
        alert(data.name);
    });