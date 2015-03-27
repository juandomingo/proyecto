
<table class="tables">
  <tr>

    <th>total_kilos</th> 
    <th>razon_social</th>
  </tr>
  <?php foreach ($alimentos_entidad as $item): ?>
    <tr>
      <td><?php echo $item[0]['total_kilos'] ; ?></td>
	  <td><?php echo $item['entidad_receptoras']['razon_social'] ; ?></td>
    </tr>
  <?php endforeach; ?>
</table>
<button id="imprimir1"> Generar PDF </button>

<div id="entidades" style="min-width: 310px; height: 400px; max-width: 600px; margin: 0 auto">
</div>

<script>
var headers1 =[{ text: 'total_kilos', style: 'tableHeader' },
            { text: 'razon_social', style: 'tableHeader'},]
var rows1 = [headers1,
 <?php foreach ($alimentos_entidad as $item): ?>
[ <?php echo $item['total_kilos'] ; ?>, <?php echo $item['razon_social'] ; ?> ],
<?php endforeach; ?>

 var dd1 = {
    content: [
                { text: 'Reporte', style: 'header' },
                'Listado de Alimentos entregados a Entidades.',
                { text: <?php echo 'Período entre'. $fecha_inicial.' y '. $fecha_final ;  ?>,
                 margin: [0, 20, 0, 8] },
                                {
                        style: 'tableExample',
                        table: {
                                headerRows: 1,
                                body: rows1
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
$( "#imprimir1" ).click( function() {
pdfMake.createPdf(dd1).open();});


$(function () {
    $(document).ready(function () {

        // Build the chart
        $('#entidades').highcharts({
            chart: {
                plotBackgroundColor: null,
                plotBorderWidth: null,
                plotShadow: false
            },
            title: {
                text: 'Kilogramos de alimentos entregados a cada Entidad'
            },
            subtitle: {
            text: <?php echo 'Período entre'. $fecha_inicial.' y '. $fecha_final ; ?>
            },
            tooltip: {
                pointFormat: '{series.name}: <b>{point.percentage:.1f} %</b>'
            },
            plotOptions: {
                pie: {
                    allowPointSelect: true,
                    cursor: 'pointer',
                    dataLabels: {
                      enabled: true,
                    format: '<b>{point.name}</b>: {point.y} Kg.',
                    },
                    showInLegend: true
                }
            },
            series: [{
                type: 'pie',
                name: 'Kilogramos ',
                data: [


<?php $last_key = end(array_keys($alimentos_entidad));?>
<?php foreach ($alimentos_entidad as $item): ?>
    [ <?php echo $item['razon_social'] ; ?>, <?php echo $item['total_kilos'] ; ?> ] <?php if ($item !=   $last_key) {echo ',';} ?>
<?php endforeach; ?>



                ]
            }]
        });
    });

});
</script>