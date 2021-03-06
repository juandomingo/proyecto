<?php

/**
 * Description of AlimentoPedidoRepository
 *
 * @author Tino
 */
class AlimentoPedidoRepository extends PDORepository {

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
            $alimentoPedido = new AlimentoPedido($row['id'], $row['pedido_numero'], $row['detalle_alimento_id'],$row['cantidad']);
            return $alimentoPedido;
        };

        $answer = $this->queryList(
                "select id ,pedido_numero, detalle_alimento_id, cantidad from alimento_pedido;", [], $mapper);

        return $answer;
    }

    public function addAlimentoPedido($cantidad, $detalle_alimento_id ,$pedido_numero){
        $this->touch(
            "INSERT INTO `alimento_pedido` (`id`, `cantidad`, `detalle_alimento_id`, `pedido_numero`) VALUES (?,?, ?, ?);",[null, $cantidad, $detalle_alimento_id ,$pedido_numero]);
    }

    public function delAlimentoPedido($id){
        $this->touch(
            "DELETE FROM `alimento_pedido` WHERE `id` = ?;",[$id]);
    }
    public function modAlimentoPedido($id ,$cantidad, $detalle_alimento_id ,$pedido_numero){
        $this->touch(
            "UPDATE `alimento_pedido` SET `cantidad` = ?,`detalle_alimento_id` = ?, `pedido_numero` = ? WHERE `alimento_pedido`.`id` = ?;",[$cantidad, $detalle_alimento_id ,$pedido_numero,$id]);
    }
    
    public function getAlimentosPedido($numero){
        $mapper = function($row) {
            $alimentoPedido = new AlimentoPedido($row['id'], $row['pedido_numero'], $row['detalle_alimento_id'],$row['cantidad']);
            return $alimentoPedido;
        };

        $answer = $this->queryList(
                "select id, pedido_numero, detalle_alimento_id, cantidad from alimento_pedido where pedido_numero = ?;", [$numero], $mapper);

        return $answer;
    }

        public function getAlimentosPedidoPorPedidoYDetalle($numero, $detalle_id){
        $mapper = function($row) {
            $alimentoPedido = new AlimentoPedido($row['id'],$row['pedido_numero'], $row['detalle_alimento_id'],$row['cantidad']);
            return $alimentoPedido;
        };

        $answer = $this->queryList(
                "SELECT id, pedido_numero, detalle_alimento_id, cantidad FROM `alimento_pedido` WHERE `alimento_pedido`.pedido_numero = ? and `alimento_pedido`.detalle_alimento_id = ?", [$numero,$detalle_id], $mapper);
                
        return $answer;
    }

    public function delAlimentosPedidosPor($numero){
        $this->touch(
            "DELETE FROM alimento_pedido WHERE pedido_numero = ?;", [$numero]);

    }
    public function getAlimentosPedidosEntreDosFechas($dia_inicial, $dia_final)
    {

        $mapper = function($row) {
            $alimentoPedido = new AlimentoPedido($row['pedido_numero'], $row['detalle_alimento_id'],$row['cantidad']);
            return $alimentoPedido;
        };

        $answer = $this->queryList(
                "SELECT `alimento_pedido`.* FROM `turno_entrega`,`pedido`,`alimento_pedido`
                WHERE `alimento_pedido`.pedido_numero = `pedido`.numero 
                AND `turno_entrega`.id = `pedido`.turno_entrega_id
                AND `turno_entrega`.fecha BETWEEN ? AND ?;", [$dia_inicial, $dia_final], $mapper);

        return $answer;
    }


    public function getAlimentosTotalesPedidosEntreDosFechas($dia_inicial, $dia_final){
            
        $mapper = function($row) {
            $reporteAlimento = new ReporteAlimentos($row['codigo'], $row['descripcion'],$row['cantidad']);
            return $reporteAlimento;
        };

        $answer = $this->queryList(
                "SELECT `alimento`.codigo as codigo,`alimento`.descripcion as descripcion, IFNULL(T2.total,0) as cantidad
                FROM `alimento`
                LEFT JOIN (
                    SELECT `alimento`.codigo as codigo, SUM(`alimento_pedido`.cantidad) as total,`alimento`.descripcion
                    FROM `turno_entrega`,`pedido`,`alimento_pedido`,`detalle_alimento`,`alimento`
                    WHERE `alimento_pedido`.pedido_numero = `pedido`.numero 
                    AND `turno_entrega`.id = `pedido`.turno_entrega_id
                    AND `alimento_pedido`.detalle_alimento_id = `detalle_alimento`.id
                    AND `alimento`.codigo = `detalle_alimento`.alimento_codigo
                    AND `turno_entrega`.fecha BETWEEN ? AND ?
                    GROUP BY `alimento`.descripcion
                ) as T2
                on `alimento`.codigo = T2.codigo", [$dia_inicial, $dia_final], $mapper);
        return $answer;
        }


/*  getAlimentosTotalesPedidosEntreDosFechas
SELECT `alimento`.codigo,`alimento`.descripcion ,IFNULL(T2.total,0) as total
FROM `alimento`
LEFT JOIN (
    SELECT `alimento`.codigo as codigo, SUM(`alimento_pedido`.cantidad) as total,`alimento`.descripcion
    FROM `turno_entrega`,`pedido`,`alimento_pedido`,`detalle_alimento`,`alimento`
                WHERE `alimento_pedido`.pedido_numero = `pedido`.numero 
                AND `turno_entrega`.id = `pedido`.turno_entrega_id
                AND `alimento_pedido`.detalle_alimento_id = `detalle_alimento`.id
                AND `alimento`.codigo = `detalle_alimento`.alimento_codigo
                AND `turno_entrega`.fecha BETWEEN '2014-5-1' AND '2015-10-10'
                GROUP BY `alimento`.descripcion
    ) as T2
    on `alimento`.codigo = T2.codigo
*/

public function getAlimentosTotalesVencidosSinEntregarEntreDosFechas($dia_inicial, $dia_final){
            
        $mapper = function($row) {
            $reporteAlimento = new ReporteAlimentos($row['codigo'], $row['descripcion'],$row['cantidad']);
            return $reporteAlimento;
        };

        $answer = $this->queryList(
                "SELECT `alimento`.codigo as codigo,`alimento`.descripcion as descripcion, IFNULL(T2.total,0) as cantidad
                FROM `alimento`
                LEFT JOIN (
                    SELECT `alimento`.codigo as codigo, SUM(`alimento_pedido`.cantidad) as total,`alimento`.descripcion
                    FROM `turno_entrega`,`pedido`,`alimento_pedido`,`detalle_alimento`,`alimento`
                    WHERE `turno_entrega`.fecha BETWEEN ? AND ?
                        AND `pedido`.estado_pedido_id = 0
                        AND `turno_entrega`.id = `pedido`.turno_entrega_id
                        AND `pedido`.numero = `alimento_pedido`.pedido_numero
                        AND `alimento_pedido`.detalle_alimento_id = `detalle_alimento`.id
                        AND `alimento`.codigo = `detalle_alimento`.alimento_codigo
                    GROUP BY `alimento`.descripcion
                ) as T2
                on `alimento`.codigo = T2.codigo", [$dia_inicial, $dia_final], $mapper);

        return $answer;
        }
}

    /*
SELECT `alimento`.codigo,`alimento`.descripcion ,IFNULL(T2.total,0) as total
FROM `alimento`
LEFT JOIN (
    SELECT `alimento`.codigo as codigo, SUM(`alimento_pedido`.cantidad) as total,`alimento`.descripcion
    FROM `turno_entrega`,`pedido`,`alimento_pedido`,`detalle_alimento`,`alimento`
                WHERE `turno_entrega`.fecha BETWEEN '2014-5-1' AND '2015-10-10'
                AND `pedido`.estado_pedido_id = 0
                AND `turno_entrega`.id = `pedido`.turno_entrega_id
                AND `pedido`.numero = `alimento_pedido`.pedido_numero
                AND `alimento_pedido`.detalle_alimento_id = `detalle_alimento`.id
                AND `alimento`.codigo = `detalle_alimento`.alimento_codigo
                GROUP BY `alimento`.descripcion
    ) as T2
    on `alimento`.codigo = T2.codigo
    */