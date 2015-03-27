<h2>Selecciones fechas para los reportes</h2>
<?php
echo $this->Form->create('reportes', array(
    'url' => array('controller' => 'reportes', 'action' => 'view')));
echo $this->Form->input('fecha_inicial', array('type' => 'date'));
echo $this->Form->input('fecha_final', array('type' => 'date'));
echo $this->Form->end('ver');
?>