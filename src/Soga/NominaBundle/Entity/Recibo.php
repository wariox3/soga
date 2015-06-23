<?php

namespace Soga\NominaBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Table(name="recibo")
 * @ORM\Entity(repositoryClass="Soga\NominaBundle\Repository\ReciboRepository")
 */
class Recibo
{
    /**
     * @ORM\Id
     * @ORM\Column(name="id", type="integer")
     */ 
    private $Id;           

    /**
     * @ORM\Column(name="nrocaja", type="string", length=6, nullable=false)
     */    
    private $nroCaja;          

    /**
     * @ORM\Column(name="ciudad", type="string", length=20, nullable=false)
     */    
    private $ciudad;              
    
    /**
     * @ORM\Column(name="fechare", type="date", nullable=true)
     */    
    private $fechaRe; 

    /**
     * @ORM\Column(name="nrofactura", type="string", length=10, nullable=false)
     */    
    private $nroFactura;    

    /**
     * @ORM\Column(name="zona", type="string", length=60, nullable=false)
     */    
    private $zona;    

    /**
     * @ORM\Column(name="nit", type="string", length=15, nullable=false)
     */    
    private $nit;           
    
    /**
     * @ORM\Column(name="valor", type="integer", nullable=false)
     */    
    private $valor;
    
    /**
     * @ORM\Column(name="abono", type="integer", nullable=false)
     */    
    private $abono;
    
    /**
     * @ORM\Column(name="codbanco", type="string", length=10, nullable=false)
     */    
    private $codBanco;     

    /**
     * @ORM\Column(name="cuenta", type="string", length=20, nullable=false)
     */    
    private $cuenta;      
    
    /**
     * @ORM\Column(name="pago", type="string", length=20, nullable=false)
     */    
    private $pago;      
    
    /**
     * @ORM\Column(name="nuevosaldo", type="integer", nullable=false)
     */    
    private $nuevoSaldo;
    
    /**
     * @ORM\Column(name="codzona", type="string", length=3, nullable=false)
     */    
    private $codZona;      
       

    /**
     * Set Id
     *
     * @param integer $id
     * @return Recibo
     */
    public function setId($id)
    {
        $this->Id = $id;

        return $this;
    }

    /**
     * Get Id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->Id;
    }

    /**
     * Set nroCaja
     *
     * @param string $nroCaja
     * @return Recibo
     */
    public function setNroCaja($nroCaja)
    {
        $this->nroCaja = $nroCaja;

        return $this;
    }

    /**
     * Get nroCaja
     *
     * @return string 
     */
    public function getNroCaja()
    {
        return $this->nroCaja;
    }

    /**
     * Set ciudad
     *
     * @param string $ciudad
     * @return Recibo
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
     * Set fechaRe
     *
     * @param \DateTime $fechaRe
     * @return Recibo
     */
    public function setFechaRe($fechaRe)
    {
        $this->fechaRe = $fechaRe;

        return $this;
    }

    /**
     * Get fechaRe
     *
     * @return \DateTime 
     */
    public function getFechaRe()
    {
        return $this->fechaRe;
    }

    /**
     * Set nroFactura
     *
     * @param string $nroFactura
     * @return Recibo
     */
    public function setNroFactura($nroFactura)
    {
        $this->nroFactura = $nroFactura;

        return $this;
    }

    /**
     * Get nroFactura
     *
     * @return string 
     */
    public function getNroFactura()
    {
        return $this->nroFactura;
    }

    /**
     * Set zona
     *
     * @param string $zona
     * @return Recibo
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

    /**
     * Set nit
     *
     * @param string $nit
     * @return Recibo
     */
    public function setNit($nit)
    {
        $this->nit = $nit;

        return $this;
    }

    /**
     * Get nit
     *
     * @return string 
     */
    public function getNit()
    {
        return $this->nit;
    }

    /**
     * Set valor
     *
     * @param integer $valor
     * @return Recibo
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
     * Set abono
     *
     * @param integer $abono
     * @return Recibo
     */
    public function setAbono($abono)
    {
        $this->abono = $abono;

        return $this;
    }

    /**
     * Get abono
     *
     * @return integer 
     */
    public function getAbono()
    {
        return $this->abono;
    }

    /**
     * Set codBanco
     *
     * @param string $codBanco
     * @return Recibo
     */
    public function setCodBanco($codBanco)
    {
        $this->codBanco = $codBanco;

        return $this;
    }

    /**
     * Get codBanco
     *
     * @return string 
     */
    public function getCodBanco()
    {
        return $this->codBanco;
    }

    /**
     * Set cuenta
     *
     * @param string $cuenta
     * @return Recibo
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
     * Set pago
     *
     * @param string $pago
     * @return Recibo
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
     * Set nuevoSaldo
     *
     * @param integer $nuevoSaldo
     * @return Recibo
     */
    public function setNuevoSaldo($nuevoSaldo)
    {
        $this->nuevoSaldo = $nuevoSaldo;

        return $this;
    }

    /**
     * Get nuevoSaldo
     *
     * @return integer 
     */
    public function getNuevoSaldo()
    {
        return $this->nuevoSaldo;
    }

    /**
     * Set codZona
     *
     * @param string $codZona
     * @return Recibo
     */
    public function setCodZona($codZona)
    {
        $this->codZona = $codZona;

        return $this;
    }

    /**
     * Get codZona
     *
     * @return string 
     */
    public function getCodZona()
    {
        return $this->codZona;
    }
}
