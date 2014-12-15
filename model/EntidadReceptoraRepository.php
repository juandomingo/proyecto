<?php

/**
 * Description of EntidadReceptoraRepository
 *
 * @author Florencia
 */
class EntidadReceptoraRepository extends PDORepository {

    private static $instance;

    public static function getInstance() {

        if (!isset(self::$instance)) {
            self::$instance = new self();
        }

        return self::$instance;
    }

    private function __construct() {
        
    }

    public function listAll() {

        $mapper = function($row) {
            $entidad_receptora = new EntidadReceptora($row['id'], $row['razon_social'], $row['telefono'], $row['domicilio'], $row['estado_entidad_id'], $row['necesidad_entidad_id'], $row['servicio_prestado_id'], $row['latitud'], $row['longitud']);
            return $entidad_receptora;
        };

        $answer = $this->queryList(
                "select id, razon_social, telefono, domicilio, estado_entidad_id, necesidad_entidad_id, servicio_prestado_id, latitud, longitud from entidad_receptora;", ['BASE TABLE'], $mapper);

        return $answer;
    }

    public function addEntidadReceptora($razon_social,$telefono,$domicilio,$estado_entidad_id,$necesidad_entidad_id,$servicio_prestado_id,$latitud,$longitud){
        $this->touch(
            "INSERT INTO `entidad_receptora` 
            (`id`, `razon_social`, `telefono`, `domicilio`, `estado_entidad_id`, `necesidad_entidad_id`, `servicio_prestado_id`, `latitud`, `longitud`) 
            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?);",
             [null,$razon_social,$telefono,$domicilio,$estado_entidad_id,$necesidad_entidad_id,$servicio_prestado_id,$latitud,$longitud]);
    }

    public function delEntidadReceptora($codigo){
        $this->touch(
            "DELETE FROM `entidad_receptora` WHERE `entidad_receptora`.`id` = ? ;",[$codigo]);
    }

    public function modEntidadReceptora($id,$razon_social,$telefono,$domicilio,$estado_entidad_id,$necesidad_entidad_id,$servicio_prestado_id,$latitud,$longitud){
        $this->touch("UPDATE `entidad_receptora`
         SET `razon_social` = ?, `telefono` = ?, `domicilio` = ?, estado_entidad_id = ?, necesidad_entidad_id = ?, servicio_prestado_id = ?, latitud = ?, longitud = ?
         WHERE `entidad_receptora`.`id` = ?;",
         [$razon_social,$telefono,$domicilio,$estado_entidad_id,$necesidad_entidad_id,$servicio_prestado_id,$latitud,$longitud,$id]
         );
    }

    public function listPorId($entidad_receptora_id){
        $mapper = function($row) {
            $entidad_receptora = new EntidadReceptora($row['id'], $row['razon_social'], $row['telefono'], $row['domicilio'], $row['estado_entidad_id'], $row['necesidad_entidad_id'], $row['servicio_prestado_id'], $row['latitud'], $row['longitud']);
            return $entidad_receptora;
        };

        $answer = $this->queryList(
                "select id, razon_social, telefono, domicilio, estado_entidad_id, necesidad_entidad_id, servicio_prestado_id, latitud, longitud from entidad_receptora where id = ?;", [$entidad_receptora_id], $mapper);

        return $answer;
    }

    public function listAlimentosPorEntidadEntre($fecha_inicial, $fecha_final){
        $mapper = function($row) {
            $entidad_reporte = new ReporteEntidades($row['id'], $row['total_kilos'], $row['razon_social']);
            return $entidad_reporte;
        };
        //selecciona aquellos pedidos cuya fecha de vencimiento esté entre las ingresadas por 
        //parámetro, las agrupa según la entidad que hizo el pdido y luego obtiene el total
        //en kilo de alimentos que pidió la entidad
        $answer = $this->queryList(
                "SELECT `entidad_receptora`.id as id, IFNULL(t2.total,0) as total_kilos, `entidad_receptora`.razon_social as razon_social
                FROM `entidad_receptora`         
                LEFT JOIN   
                (
                SELECT `pedido`.entidad_receptora_id as entidad_id, SUM(`alimento_pedido`.cantidad) as total
                FROM `turno_entrega`,`pedido`,`alimento_pedido`,`detalle_alimento`,`alimento`
                WHERE `alimento_pedido`.pedido_numero = `pedido`.numero 
                AND `turno_entrega`.id = `pedido`.turno_entrega_id
                AND `alimento_pedido`.detalle_alimento_id = `detalle_alimento`.id
                AND `alimento`.codigo = `detalle_alimento`.alimento_codigo
                AND `turno_entrega`.fecha BETWEEN ? AND ?
                GROUP BY `pedido`.entidad_receptora_id
                ) AS t2
                ON t2.entidad_id = `entidad_receptora`.ID",
                [$fecha_inicial, $fecha_final], $mapper);
        return $answer;
    }


/* MYSQL
    SELECT `pedido`.entidad_receptora_id, SUM(`alimento_pedido`.cantidad)
    FROM `turno_entrega`,`pedido`,`alimento_pedido`,`detalle_alimento`,`alimento`
    WHERE `alimento_pedido`.pedido_numero = `pedido`.numero 
    AND `turno_entrega`.id = `pedido`.turno_entrega_id
    AND `alimento_pedido`.detalle_alimento_id = `detalle_alimento`.id
    AND `alimento`.codigo = `detalle_alimento`.alimento_codigo
    AND `turno_entrega`.fecha BETWEEN '2014-5-1' AND '2015-10-10'
    GROUP BY `pedido`.entidad_receptora_id

    SELECT `pedido`.entidad_receptora_id, sum(`alimento_pedido`.cantidad), `entidad_receptora`.razon_social
    FROM `turno_entrega`,`alimento_pedido`,`detalle_alimento`,`alimento`,`pedido`
    RIGHT JOIN `entidad_receptora` ON `entidad_receptora`.id = `pedido`.entidad_receptora_id
    WHERE `alimento_pedido`.pedido_numero = `pedido`.numero 
    AND `turno_entrega`.id = `pedido`.turno_entrega_id
    AND `alimento_pedido`.detalle_alimento_id = `detalle_alimento`.id
    AND `alimento`.codigo = `detalle_alimento`.alimento_codigo
    AND `turno_entrega`.fecha BETWEEN '2014-5-1' AND '2015-10-10'
    GROUP BY `pedido`.entidad_receptora_id
*/
}