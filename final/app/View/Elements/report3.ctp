
<table class="tables">
  <tr>
    <th>Codigo</th>
    <th>Descripcion</th> 
    <th>Cantidad</th>
  </tr>
  <?php foreach ($alimentos_vencidos as $item): ?>
    <tr>
        <td><?php echo $item['alimentos']['id'] ; ?></td>
        <td><?php echo $item['alimentos']['descripcion'] ; ?></td>
        <td><?php echo $item[0]['cantidad'] ; ?></td>
    </tr>
  <?php endforeach; ?>
</table>
<button id="imprimir2"> Generar PDF  </button>

<div id="vencidos" style="min-width: 310px; height: 400px; margin: 0"></div>

<script>
var headers2 =[{ text: 'Codigo', style: 'tableHeader' },
            { text: 'Descripcion', style: 'tableHeader'},
            { text: 'Cantidad', style: 'tableHeader' }]
var rows2 = [headers2, <?php foreach ($alimentos_vencidos as $item): ?>
[ <?php echo $item['alimentos']['id'] ; ?>, '<?php echo $item['alimentos']['descripcion'] ; ?>', <?php echo $item[0]['cantidad'] ; ?> ],
<?php endforeach; ?>]

 var dd2 = {
    content: [
                { text: 'Reporte', style: 'header' },
                'Listado de Alimentos vencidos.',
                { text: 'Período entre'+ '<?php echo $fecha_inicial; ?>'+' y '+'<?php echo $fecha_final; ?>', margin: [0, 20, 0, 8] },
                                {
                        style: 'tableExample',
                        table: {
                                headerRows: 1,
                                body: rows2
                        },
                        layout: {
                                                        hLineWidth: function(i, node) {
                                                                return (i === 0 || i === node.table.body.length) ? 2 : 1;
                                                        },
                                                        vLineWidth: function(i, node) {
                                                                return (i === 0 || i === node.table.widths.length) ? 2 : 1;
                                                        },
                                                        hLineColor: function(i, node) {
                                                                return (i === 0 || i === node.table.body.length) ? 'black' : 'gray';
                                                        },
                                                        vLineColor: function(i, node) {
                                                                return (i === 0 || i === node.table.widths.length) ? 'black' : 'gray';
                                                        },
                                                        // paddingLeft: function(i, node) { return 4; },
                                                        // paddingRight: function(i, node) { return 4; },
                                                        // paddingTop: function(i, node) { return 2; },
                                                        // paddingBottom: function(i, node) { return 2; }
                        }
                }
    ],
    styles: {
        header: {
            fontSize: 18,
            bold: true,
            margin: [0, 0, 0, 10]
        },
        subheader: {
            fontSize: 16,
            bold: true,
            margin: [0, 10, 0, 5]
        },
        tableExample: {
            margin: [0, 5, 0, 15]
        },
        tableHeader: {
            bold: true,
            fontSize: 13,
            color: 'black'
        }
    },
    defaultStyle: {
        // alignment: 'justify'
    }
    
}
$( "#imprimir2" ).click( function() {
pdfMake.createPdf(dd2).open();});


$(function () {
    $('#vencidos').highcharts({
        chart: {
            type: 'column'
        },
        title: {
            text: 'Cantidad de alimentos vencidos'
        },
        subtitle: {
            text: 'Período entre'+ '<?php echo $fecha_inicial; ?>'+' y '+'<?php echo $fecha_final; ?>'
        },
        xAxis: {
            categories: [
                <?php $last_key = end($alimentos_vencidos); ?>
<?php foreach ($alimentos_vencidos as $item): ?>
[  '<?php echo $item['alimentos']['descripcion'] ; ?>' ]<?php if ($item !=   $last_key) {echo ',';} ?>
<?php endforeach; ?>
            ]
        },
        yAxis: {
            min: 0,
            title: {
                text: 'Cantidad (Kg.)'
            }
        },
        tooltip: {
            headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
            pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
                '<td style="padding:0"><b>{point.y:f} Kg.</b></td></tr>',
            footerFormat: '</table>',
            shared: true,
            useHTML: true
        },
        plotOptions: {
            column: {
                pointPadding: 0.2,
                borderWidth: 0
            }
        },
        series: [{
            name: 'Kilogramos',
            data: [
<?php $last_key = end($alimentos_vencidos); ?>
<?php foreach ($alimentos_vencidos as $item): ?>
[ <?php echo $item['alimentos']['id'] ; ?>, <?php echo $item[0]['cantidad'] ; ?>,'<?php echo $item['alimentos']['descripcion'] ; ?>' ]<?php if ($item !=   $last_key) {echo ',';} ?>
<?php endforeach; ?>
            ]

        }]
    });
});
</script>