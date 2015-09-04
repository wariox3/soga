<?php

namespace Soga\ContabilidadBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Table(name="comprobante")
 * @ORM\Entity(repositoryClass="Soga\ContabilidadBundle\Repository\ComprobantesRepository")
 */
class Comprobantes
{
    /**
     * @ORM\Id
     * @ORM\Column(name="conse", type="integer")
     */
    private $conse;

    /**
     * @ORM\Column(name="nro", type="string", length=6, nullable=false)
     */
    private $nro;

    /**
     * @ORM\Column(name="nrofactura", type="string", length=6, nullable=false)
     */
    private $nrofactura;

    /**
     * @ORM\Column(name="nitprove", type="string", length=15, nullable=false)
     */
    private $nitprove;    
    
    /**
     * @ORM\Column(name="dv", type="string", length=1, nullable=false)
     */
    private $dv;    
    
    /**
     * @ORM\Column(name="cliente", type="string", length=50, nullable=false)
     */
    private $cliente;        

    /**
     * @ORM\Column(name="fecha", type="date", nullable=true)
     */
    private $fecha;
    
    /**
     * @ORM\Column(name="valor", type="integer", nullable=false)
     */    
    private $valor;    
    
    /**
     * @ORM\Column(name="letras", type="string", length=200, nullable=false)
     */
    private $letras;    
    
    /**
     * @ORM\Column(name="pago", type="string", length=15, nullable=false)
     */
    private $pago;    
    
    /**
     * @ORM\Column(name="ciudad", type="string", length=15, nullable=false)
     */
    private $ciudad;
    
    /**
     * @ORM\Column(name="cheque", type="string", length=15, nullable=false)
     */
    private $cheque;    
    
    /**
     * @ORM\Column(name="codbanco", type="string", length=10, nullable=false)
     */
    private $codbanco;    
    
    /**
     * @ORM\Column(name="cuenta", type="string", length=20, nullable=false)
     */
    private $cuenta;  
    
    /**
     * @ORM\Column(name="concepto", type="string", length=37, nullable=false)
     */
    private $concepto;    
    
    /**
     * @ORM\Column(name="nitzona", type="string", length=15, nullable=false)
     */
    private $nitzona;        
    
    /**
     * @ORM\Column(name="zona", type="string", length=40, nullable=false)
     */
    private $zona;        
    


    /**
     * Set conse
     *
     * @param integer $conse
     * @return Comprobantes
     */
    public function setConse($conse)
    {
        $this->conse = $conse;

        return $this;
    }

    /**
     * Get conse
     *
     * @return integer 
     */
    public function getConse()
    {
        return $this->conse;
    }

    /**
     * Set nro
     *
     * @param string $nro
     * @return Comprobantes
     */
    public function setNro($nro)
    {
        $this->nro = $nro;

        return $this;
    }

    /**
     * Get nro
     *
     * @return string 
     */
    public function getNro()
    {
        return $this->nro;
    }

    /**
     * Set nrofactura
     *
     * @param string $nrofactura
     * @return Comprobantes
     */
    public function setNrofactura($nrofactura)
    {
        $this->nrofactura = $nrofactura;

        return $this;
    }

    /**
     * Get nrofactura
     *
     * @return string 
     */
    public function getNrofactura()
    {
        return $this->nrofactura;
    }

    /**
     * Set nitprove
     *
     * @param string $nitprove
     * @return Comprobantes
     */
    public function setNitprove($nitprove)
    {
        $this->nitprove = $nitprove;

        return $this;
    }

    /**
     * Get nitprove
     *
     * @return string 
     */
    public function getNitprove()
    {
        return $this->nitprove;
    }

    /**
     * Set dv
     *
     * @param string $dv
     * @return Comprobantes
     */
    public function setDv($dv)
    {
        $this->dv = $dv;

        return $this;
    }

    /**
     * Get dv
     *
     * @return string 
     */
    public function getDv()
    {
        return $this->dv;
    }

    /**
     * Set cliente
     *
     * @param string $cliente
     * @return Comprobantes
     */
    public function setCliente($cliente)
    {
        $this->cliente = $cliente;

        return $this;
    }

    /**
     * Get cliente
     *
     * @return string 
     */
    public function getCliente()
    {
        return $this->cliente;
    }

    /**
     * Set fecha
     *
     * @param \DateTime $fecha
     * @return Comprobantes
     */
    public function setFecha($fecha)
    {
        $this->fecha = $fecha;

        return $this;
    }

    /**
     * Get fecha
     *
     * @return \DateTime 
     */
    public function getFecha()
    {
        return $this->fecha;
    }

    /**
     * Set valor
     *
     * @param integer $valor
     * @return Comprobantes
     */
    public function setValor($valor)
    {
        $this->valor = $valor;

        return $this;
    }

    /**
     * Get valor
     *
     * @return integer 
     */
    public function getValor()
    {
        return $this->valor;
    }

    /**
     * Set letras
     *
     * @param string $letras
     * @return Comprobantes
     */
    public function setLetras($letras)
    {
        $this->letras = $letras;

        return $this;
    }

    /**
     * Get letras
     *
     * @return string 
     */
    public function getLetras()
    {
        return $this->letras;
    }

    /**
     * Set pago
     *
     * @param string $pago
     * @return Comprobantes
     */
    public function setPago($pago)
    {
        $this->pago = $pago;

        return $this;
    }

    /**
     * Get pago
     *
     * @return string 
     */
    public function getPago()
    {
        return $this->pago;
    }

    /**
     * Set ciudad
     *
     * @param string $ciudad
     * @return Comprobantes
     */
    public function setCiudad($ciudad)
    {
        $this->ciudad = $ciudad;

        return $this;
    }

    /**
     * Get ciudad
     *
     * @return string 
     */
    public function getCiudad()
    {
        return $this->ciudad;
    }

    /**
     * Set cheque
     *
     * @param string $cheque
     * @return Comprobantes
     */
    public function setCheque($cheque)
    {
        $this->cheque = $cheque;

        return $this;
    }

    /**
     * Get cheque
     *
     * @return string 
     */
    public function getCheque()
    {
        return $this->cheque;
    }

    /**
     * Set codbanco
     *
     * @param string $codbanco
     * @return Comprobantes
     */
    public function setCodbanco($codbanco)
    {
        $this->codbanco = $codbanco;

        return $this;
    }

    /**
     * Get codbanco
     *
     * @return string 
     */
    public function getCodbanco()
    {
        return $this->codbanco;
    }

    /**
     * Set cuenta
     *
     * @param string $cuenta
     * @return Comprobantes
     */
    public function setCuenta($cuenta)
    {
        $this->cuenta = $cuenta;

        return $this;
    }

    /**
     * Get cuenta
     *
     * @return string 
     */
    public function getCuenta()
    {
        return $this->cuenta;
    }

    /**
     * Set concepto
     *
     * @param string $concepto
     * @return Comprobantes
     */
    public function setConcepto($concepto)
    {
        $this->concepto = $concepto;

        return $this;
    }

    /**
     * Get concepto
     *
     * @return string 
     */
    public function getConcepto()
    {
        return $this->concepto;
    }

    /**
     * Set nitzona
     *
     * @param string $nitzona
     * @return Comprobantes
     */
    public function setNitzona($nitzona)
    {
        $this->nitzona = $nitzona;

        return $this;
    }

    /**
     * Get nitzona
     *
     * @return string 
     */
    public function getNitzona()
    {
        return $this->nitzona;
    }

    /**
     * Set zona
     *
     * @param string $zona
     * @return Comprobantes
     */
    public function setZona($zona)
    {
        $this->zona = $zona;

        return $this;
    }

    /**
     * Get zona
     *
     * @return string 
     */
    public function getZona()
    {
        return $this->zona;
    }
}
