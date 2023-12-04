window._ = require('lodash');

try {
    window.Popper = require('@popperjs/core').default;
    window.$ = window.jQuery = require('jquery');
    require('overlayscrollbars');
    require('bootstrap');

    require('jquery-validation/dist/jquery.validate')
    require('jquery-validation/dist/additional-methods.min')
    require('chart.js')
    require('chartjs-plugin-datalabels/dist/chartjs-plugin-datalabels.min')
    require('owl.carousel')
    require('dropify')

    window.Swal = require('sweetalert2');
    require('select2/dist/js/select2');

    require( 'datatables.net-bs5' )($);
    require( 'datatables.net-buttons-bs5' )($);
    require( 'datatables.net-responsive' )($);
    require( 'datatables.net-responsive-bs5' )($);
} catch (e) {}

window.axios = require('axios');

window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';
/**
 * Echo exposes an expressive API for subscribing to channels and listening
 * for events that are broadcast by Laravel. Echo and event broadcasting
 * allows your team to easily build robust real-time web applications.
 */

// import Echo from 'laravel-echo';

// import Pusher from 'pusher-js';
// window.Pusher = Pusher;

// window.Echo = new Echo({
//     broadcaster: 'pusher',
//     key: import.meta.env.VITE_PUSHER_APP_KEY,
//     wsHost: import.meta.env.VITE_PUSHER_HOST ?? `ws-${import.meta.env.VITE_PUSHER_APP_CLUSTER}.pusher.com`,
//     wsPort: import.meta.env.VITE_PUSHER_PORT ?? 80,
//     wssPort: import.meta.env.VITE_PUSHER_PORT ?? 443,
//     forceTLS: (import.meta.env.VITE_PUSHER_SCHEME ?? 'https') === 'https',
//     enabledTransports: ['ws', 'wss'],
// });
jQuery.extend(jQuery.validator.messages, {
    required: "กรุณากรอกข้อมูล.",
    remote: "กรุณากรอกตรวจสอบให้ถูกต้อง.",
    email: "กรุณากรอกรูปแบบอีเมลให้ถูกต้อง.",
    url: "กรุณากรอก URL ให้ถูกต้อง.",
    date: "กรุณากรอกวันที่ให้ถูกต้อง.",
    dateISO: "กรุณากรอกวันที่ (ISO) ให้ถูกต้อง.",
    number: "Please enter a valid number.",
    digits: "Please enter only digits.",
    creditcard: "Please enter a valid credit card number.",
    equalTo: "Please enter the same value again.",
    accept: "Please enter a value with a valid extension.",
    maxlength: jQuery.validator.format("จำกัด {0} ตัวอักษร."),
    minlength: jQuery.validator.format("Please enter at least {0} characters."),
    rangelength: jQuery.validator.format("Please enter a value between {0} and {1} characters long."),
    range: jQuery.validator.format("Please enter a value between {0} and {1}."),
    max: jQuery.validator.format("Please enter a value less than or equal to {0}."),
    min: jQuery.validator.format("Please enter a value greater than or equal to {0}.")
});
