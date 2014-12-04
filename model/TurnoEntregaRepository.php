<?php

/**
 * Description of PedidoRepository
 *
 * @author Tino
 */
class TurnoEntregaRepository extends PDORepository {

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
            $turnoEntrega = new TurnoEntrega($row['id'], $row['fecha'], $row['hora']);
            return $turnoEntrega;
        };

        $answer = $this->queryList(
                "select id, fecha, hora from turno_entrega;", [], $mapper);

        return $answer;
    }

    public function addTurnoEntrega( $fecha, $hora){
        $return = $this->touch(
            "INSERT INTO `turno_entrega` (`id`, `fecha`, `hora`) VALUES (?, ?, ?);",[null, $fecha, $hora]);
        return $return;
    }

    public function delTurnoEntrega($id){
        $this->touch(
            "DELETE FROM `turno_entrega` WHERE `turno_entrega`.`id` = ? ;",[$id]);
    }
    public function modTurnoEntrega($id,$fecha, $hora){
        $this->touch(
            "UPDATE `turno_entrega` SET `fecha` = ?, `hora` = ? WHERE `turno_entrega`.`id` = ?;",[ $fecha, $hora, $id]);
    }

    public function listAllParaHoy()
    {
        $mapper = function($row) {
            $turnoEntrega = new TurnoEntrega($row['id'], $row['fecha'], $row['hora']);
            return $turnoEntrega;
        };
        $date = date("Y-m-d");
        $answer = $this->queryList(
                "select id, fecha, hora from turno_entrega where fecha = ?;", [$date], $mapper);

        return $answer;
    }

    public function listPorId($turno_entrega_id)
    {
        $mapper = function($row) {
            $turnoEntrega = new TurnoEntrega($row['id'], $row['fecha'], $row['hora']);
            return $turnoEntrega;
        };
        $answer = $this->queryList(
                "select id, fecha, hora from turno_entrega where id = ?;", [$turno_entrega_id], $mapper);

        return $answer;
    }

    public function listPorDia($date)
    {
        $mapper = function($row) {
            $turnoEntrega = new TurnoEntrega($row['id'], $row['fecha'], $row['hora']);
            return $turnoEntrega;
        };
        $answer = $this->queryList(
                "select id, fecha, hora from turno_entrega where fecha = ?;", [$date], $mapper);

        return $answer;
    }


}
