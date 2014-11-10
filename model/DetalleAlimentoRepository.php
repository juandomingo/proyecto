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
                "select id, alimento_codigo, fecha_vencimiento, contenido, peso_unitario, stock, reservado from detalle_alimento;", ['BASE TABLE'], $mapper);

        return $answer;
    }

    public function addDetalleAlimento($alimento_codigo, $fecha_vencimiento, $contenido, $peso_unitario, $stock, $reservado){
        $this->touch(
            "INSERT INTO `detalle_alimento` (`id`, `alimento_codigo`, `fecha_vencimiento`, `contenido`, `peso_unitario`, `stock`, `reservado`) 
            VALUES (?, ?, ?, ?, ?, ?, ?);",
            [null, $alimento_codigo, $fecha_vencimiento, $contenido, $peso_unitario, $stock, $reservado]);
    }

    public function delDetalleAlimento($id){
        $this->touch(
            "DELETE FROM `detalle_alimento` WHERE `detalle_alimento`.`id` = ? ;",[$id]);
    }

    public function modDetalleAlimento($id, $alimento_codigo, $fecha_vencimiento, $contenido, $peso_unitario, $stock, $reservado){
        $this->touch("UPDATE `detalle_alimento`
         SET `alimento_codigo` = ?, `fecha_vencimiento` = ?, contenido = ?, peso_unitario = ?, stock = ?, `reservado` = ?
         WHERE `detalle_alimento`.`id` = ?;",
         [$alimento_codigo, $fecha_vencimiento, $contenido, $peso_unitario, $stock, $reservado, $id]
         );
    }
    public function listAlimentoPorVencerEn($numero_de_dias)
    {

        $mapper = function($row) {
            $detalle_alimento = new DetalleAlimento($row['id'], $row['alimento_codigo'], $row['fecha_vencimiento'], $row['contenido'], $row['peso_unitario'], $row['stock'], $row['reservado']);
            return $detalle_alimento;
        };
        $date1 = date("Y-m-d");
        $date2 = date("Y-m-d",strtotime("+ $numero_de_dias days"));

        $answer = $this->queryList(

                "select id, alimento_codigo, fecha_vencimiento, contenido, peso_unitario, stock, reservado from detalle_alimento where (fecha_vencimiento BETWEEN ? AND ?);", [$date1,$date2], $mapper);

        return $answer;
    }
    public function listAllporID($id) {

        $mapper = function($row) {
            $detalle_alimento = new DetalleAlimento($row['id'], $row['alimento_codigo'], $row['fecha_vencimiento'], $row['contenido'], $row['peso_unitario'], $row['stock'], $row['reservado']);
            return $detalle_alimento;
        };

        $answer = $this->queryList(
                "select id, alimento_codigo, fecha_vencimiento, contenido, peso_unitario, stock, reservado from detalle_alimento where id = ?;", [$id], $mapper);

        return $answer[0];
    }

}
