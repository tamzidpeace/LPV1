require('./bootstrap');
import Echo from 'laravel-echo'

window.Echo = new Echo({
     broadcaster: 'pusher',
     key: 'ad979503ca10db7d98b2',
     cluster: 'ap2',
     forceTLS: true,
     authEndpoint: '/broadcasting/auth'
 });
