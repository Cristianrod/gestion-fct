//Importa bootstrap y fontawesome
require('../images/user.png');
import 'bootstrap';
import 'chosen-js';
import fontawesome from '@fortawesome/fontawesome';
import solid from '@fortawesome/fontawesome-free-solid'

fontawesome.library.add(solid);

$(document).ready(function () {
    $("select[multiple]").chosen({
        placeholder_text_multiple: 'Selecciona el/los ciclo(s)'
    });
});
