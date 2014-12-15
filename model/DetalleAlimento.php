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
        return $this->id;
    }

    public function getAlimento_codigo() {
        return $this->alimento_codigo;
    }

    public function getFecha_vencimiento() {
        return $this->fecha_vencimiento;
    }

    public function getContenido() {
        return $this->contenido;
    }

    public function getPeso_unitario() {
        return $this->peso_unitario;
    }

    public function getStock() {
        return $this->stock;
    }

    public function getReservado() {
        return $this->reservado;
    }

    public function getStockDisponible(){
        return $this->stock - $this->reservado;
    }

    public function hayStock()
    {
        return $this->stock > $this->reservado;
    }

    public function getAlimento()
    {
        $alimento = AlimentoRepository::getInstance()->listAlimentoPorCodigo($this->alimento_codigo);
        return $alimento[0];
    }

    public function serializar()
    {
        $serialized = array(
                "id" => $this->id,
                "alimento_codigo" => $this->alimento_codigo,
                "fecha_vencimiento" => $this->fecha_vencimiento,
                "contenido" => $this->contenido,
                "peso_unitario" => $this->peso_unitario,
                "stock" => $this->stock,
                "reservado" => $this->reservado,
                "descripcion" => $this->getAlimento()->getDescripcion(),
            );
        return $serialized;
    }
}
