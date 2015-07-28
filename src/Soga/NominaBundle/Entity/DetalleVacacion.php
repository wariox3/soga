<?php

namespace Soga\NominaBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Table(name="detallevacacion")
 * @ORM\Entity(repositoryClass="Soga\NominaBundle\Repository\DetalleVacacionRepository")
 */
class DetalleVacacion
{
    /**
     * @ORM\Id
     * @ORM\Column(name="idvaca", type="integer")
     */ 
    private $idvaca;           

    /**
     * @ORM\Column(name="codsala", type="string", length=10, nullable=false)
     */    
    private $codsala;         

    /**
     * @ORM\Column(name="concepto", type="string", length=40, nullable=false)
     */    
    private $concepto;                  
    
    /**
     * @ORM\Column(name="valorpago", type="integer", nullable=false)
     */    
    private $valorPago;
    
    /**
     * @ORM\Column(name="codvaca", type="string", length=5, nullable=false)
     */    
    private $codvaca;    
    
    /**
     * @ORM\Column(name="fechap", type="date", nullable=true)
     */    
    private $fechap;
    
    /**
     * @ORM\Column(name="nrocredito", type="string", length=7, nullable=false)
     */    
    private $nroCredito;      


    /**
     * Set idvaca
     *
     * @param integer $idvaca
     * @return DetalleVacacion
     */
    public function setIdvaca($idvaca)
    {
        $this->idvaca = $idvaca;

        return $this;
    }

    /**
     * Get idvaca
     *
     * @return integer 
     */
    public function getIdvaca()
    {
        return $this->idvaca;
    }

    /**
     * Set codsala
     *
     * @param string $codsala
     * @return DetalleVacacion
     */
    public function setCodsala($codsala)
    {
        $this->codsala = $codsala;

        return $this;
    }

    /**
     * Get codsala
     *
     * @return string 
     */
    public function getCodsala()
    {
        return $this->codsala;
    }

    /**
     * Set concepto
     *
     * @param string $concepto
     * @return DetalleVacacion
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
     * Set valorPago
     *
     * @param integer $valorPago
     * @return DetalleVacacion
     */
    public function setValorPago($valorPago)
    {
        $this->valorPago = $valorPago;

        return $this;
    }

    /**
     * Get valorPago
     *
     * @return integer 
     */
    public function getValorPago()
    {
        return $this->valorPago;
    }

    /**
     * Set codvaca
     *
     * @param string $codvaca
     * @return DetalleVacacion
     */
    public function setCodvaca($codvaca)
    {
        $this->codvaca = $codvaca;

        return $this;
    }

    /**
     * Get codvaca
     *
     * @return string 
     */
    public function getCodvaca()
    {
        return $this->codvaca;
    }

    /**
     * Set fechap
     *
     * @param \DateTime $fechap
     * @return DetalleVacacion
     */
    public function setFechap($fechap)
    {
        $this->fechap = $fechap;

        return $this;
    }

    /**
     * Get fechap
     *
     * @return \DateTime 
     */
    public function getFechap()
    {
        return $this->fechap;
    }

    /**
     * Set nroCredito
     *
     * @param string $nroCredito
     * @return DetalleVacacion
     */
    public function setNroCredito($nroCredito)
    {
        $this->nroCredito = $nroCredito;

        return $this;
    }

    /**
     * Get nroCredito
     *
     * @return string 
     */
    public function getNroCredito()
    {
        return $this->nroCredito;
    }
}
