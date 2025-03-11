import toastr from 'toastr';
import 'toastr/build/toastr.min.css';

window.toastr = toastr;
window.Alpine = Alpine;

Alpine.start();

// Personalização do Toastr
toastr.options = {
    "closeButton": true,
    "progressBar": true,
    "positionClass": "toast-top-center",
    "timeOut": 2000,
    "extendedTimeOut": 1000,
    "showEasing": "swing",
    "hideEasing": "linear",
    "showMethod": "fadeIn",
    "hideMethod": "fadeOut"
};
