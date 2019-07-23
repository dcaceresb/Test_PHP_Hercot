function addDots(num) {
    if (num == "") {
        return "0";
    }

    var numero = parseInt(num);

    var str = "";
    var cont = 0;
    while (numero != 0) {
        if (cont == 3) {
            str = "." + str;
            cont = 0;
        }
        str = (numero % 10) + str;
        cont++;
        numero = parseInt(numero / 10);

    }
    return str;
}

var today = new Date(new Date().getFullYear(), new Date().getMonth(), new Date().getDate());
var datepicker, config;
config = {
    locale: 'es-es',
    format: 'yyyy-mm-dd',
    uiLibrary: 'bootstrap4',
    minDate: function () {
        return today;
    }
};

$(document).ready(function () {
    $('#Date').datepicker(config);

    $('#service_id').change(function () {
        var index = $("#service_id").prop('selectedIndex');
        var list = document.getElementById("prices");
        var precio = list.options[index].text;

        while (precio.includes('.'))
            precio = precio.replace('.', '');
        precio = addDots(precio);
        $('#price').val(precio);

    });

    $('#price').on("change paste keyup", function () {
        var numero = $('#price').val();
        while (numero.includes('.'))
            numero = numero.replace('.', '');

        var result = addDots(numero);
        $('#price').val(result);
    });

});