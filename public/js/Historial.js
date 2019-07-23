

var today = new Date(new Date().getFullYear(), new Date().getMonth(), new Date().getDate());
var datepicker, configdesde, confighasta;
configdesde = {
    locale: 'es-es',
    format: 'yyyy-mm-dd',
    uiLibrary: 'bootstrap4',
    maxDate: function () {
        if ($('#Hasta').val() != '')
            return new Date( $('#Hasta').val());
        else
            return today;
    }
};
confighasta = {
    locale: 'es-es',
    format: 'yyyy-mm-dd',
    uiLibrary: 'bootstrap4',
    maxDate: function () {
        return today;
    },
    minDate: function () {
        return new Date( $('#Desde').val());
    }
};
$('#Desde').datepicker(configdesde);
$('#Hasta').datepicker(confighasta);

function updateTable()
{   
    var precio;
    var total=0;
    var table = $('#example').DataTable();
    var data = table.rows().data();

    var token1 = $('#Desde').val().split("-");
    var min = new Date(token1[0],token1[1],token1[2]);
    var token2 = $('#Hasta').val().split("-");
    var max = new Date(token2[0],token2[1],token2[2]);

    var date;
    var toAdd = [];
    console.log('min: '+min);
    console.log('max: '+max);
   
    data.each(function(value,index){
        var token3 = value[0].split("-");
        date = new Date(token3[0],token3[1],token3[2]);
        if(min <= date && date <=max)
        {
            console.log('date: '+date);
            precio = value[4].replace("$",'');
            total+=parseInt(precio.replace('.',''));
            console.log('index: '+index+' precio: '+precio);
            toAdd.push(value);
        }
       
    });
    
    table.clear();
    table.draw();
    toAdd.forEach(function(e)
    {
        table.row.add(e).draw();
    })
    $("#Ganancias").text("Ganancias total por periodo: $"+total.toLocaleString()+".-");
    console.log(total);
}

$(document).ready(function () {
    $('#example').DataTable({
        "order":[ 0, "desc" ],
        "columnDefs": [
            { "orderable": false, "targets": [1, 2, 3, 4, 5] },
            { "orderable": true, "targets": [0] }
        ],
        "searching": false

    });
});

$('#Desde').change(function(){
    if($('#Hasta').val()!='')
    {
        updateTable();
    }
});

$('#Hasta').change(function(){
    if($('#Desde').val()!='')
    {
        updateTable();
    }
});