<?php

/**
 * Description of DetalleAlimentoRepository
 *
 * @author Florencia
 */
class DetalleAlimentoRepository extends PDORepository {

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
            $detalle_alimento = new DetalleAlimento($row['id'], $row['alimento_codigo'], $row['fecha_vencimiento'], $row['contenido'], $row['peso_unitario'], $row['stock'], $row['reservado']);
            return $detalle_alimento;
        };

        $answer = $this->queryList(
                "select id, alimento_codigo, fecha_vencimiento, contenido, peso_unitario, stock, reservado from alimento;", ['BASE TABLE'], $mapper);

        return $answer;
    }

    public function addDetalleAlimento($id, $alimento_codigo, $fecha_vencimiento, $contenido, $peso_unitario, $stock, $reservado){
        $this->touch(
            "INSERT INTO `banco_alimentos`.`detalle_alimento` (`id`, `alimento_codigo`, `fecha_vencimiento`, `contenido`, `peso_unitario`, `stock`, `reservado`) 
            VALUES (?, ?, ?, ?, ?, ?, ?);",
            [$id, $alimento_codigo, $fecha_vencimiento, $contenido, $peso_unitario, $stock, $reservado]);
    }

    public function delDetalleAlimento($id){
        $this->touch(
            "DELETE FROM `banco_alimentos`.`detalle_alimento` WHERE `alimento`.`id` = ? ;",[$id]);
    }

    public function modDetalleAlimento($id, $alimento_codigo, $fecha_vencimiento, $contenido, $peso_unitario, $stock, $reservado){
        $this->touch("UPDATE `banco_alimentos`.`detalle_alimento`
         SET `alimento_codigo` = ?, `fecha_vencimiento` = ?, contenido = ?, peso_unitario = ?, stock = ?, `reservado` = ?
         WHERE `entidad_receptora`.`id` = ?;",
         [$alimento_codigo, $fecha_vencimiento, $contenido, $peso_unitario, $stock, $reservado, $id]
         )
    }   


}
