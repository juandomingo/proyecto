<?php



/**
 * Description of DetalleAlimento
 *
 * @author Florencia
 */
class DetalleAlimento {
    
    private $id;
    private $alimento_codigo;
    private $fecha_vencimiento;
    private $contenido;
    private $peso_unitario;
    private $stock;
    private $reservado;
    
    public function __construct($id, $alimento_codigo, $fecha_vencimiento, $contenido, $peso_unitario, $stock, $reservado) {
        $this->id = $id;
        $this->alimento_codigo = $alimento_codigo;
        $this->fecha_vencimiento = $fecha_vencimiento;
        $this->contenido = $contenido;
        $this->peso_unitario = $peso_unitario;
        $this->stock = $stock;
        $this->reservado = $reservado;
    }

    public function getId() {
        echo $this->id;
    }

    public function getAlimento_codigo() {
        echo $this->alimento_codigo;
    }

    public function getFecha_vencimiento() {
        echo $this->fecha_vencimiento;
    }

    public function getContenido() {
        echo $this->contenido;
    }

    public function getPeso_unitario() {
        echo $this->peso_unitario;
    }

    public function getStock() {
        echo $this->stock;
    }

    public function getReservado() {
        echo $this->reservado;
    }
}
