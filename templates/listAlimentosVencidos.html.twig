
<table class="tables">
  <tr>
    <th>Codigo</th>
    <th>Descripcion</th> 
    <th>Cantidad</th>
  </tr>
  {% for item in alimentos_vencidos %}
    <tr>
      <td>{{ item.codigo }}</td>
      <td>{{ item.descripcion }}</td>
	  <td>{{ item.cantidad }}</td>
    </tr>
  {% endfor %}
</table>
<button id="imprimir2"> Generar PDF  </button>

<div id="vencidos" style="min-width: 310px; height: 400px; margin: 0"></div>

<script>
var headers2 =[{ text: 'Codigo', style: 'tableHeader' },
            { text: 'Descripcion', style: 'tableHeader'},
            { text: 'Cantidad', style: 'tableHeader' }]
var rows2 = [headers2, {% for item in alimentos_vencidos %}
[ '{{ item.codigo }}', '{{ item.descripcion }}', '{{ item.cantidad }}' ],
{% endfor %}]

 var dd2 = {
    content: [
                { text: 'Reporte', style: 'header' },
                'Listado de Alimentos vencidos.',
                { text: 'Período entre {{fecha_inicial[0]}} y {{ fecha_final[0]}}', margin: [0, 20, 0, 8] },
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
            text: 'Período entre {{fecha_inicial[0]}} y {{ fecha_final[0]}}'
        },
        xAxis: {
            categories: [
                {% for item in alimentos_vencidos %}
                  '{{ item.descripcion }}'{% if not loop.last %},{% endif %}

                {% endfor %}
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
            {% for item in alimentos_vencidos %}
                  {{ item.cantidad }}{% if not loop.last %},{% endif %}

            {% endfor %}
            ]

        }]
    });
});
</script>