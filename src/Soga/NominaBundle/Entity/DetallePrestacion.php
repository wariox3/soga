<?php

namespace Soga\NominaBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Table(name="detalleprestacion")
 * @ORM\Entity(repositoryClass="Soga\NominaBundle\Repository\DetallePrestacionRepository")
 */
class DetallePrestacion
{
    /**
     * @ORM\Id
     * @ORM\Column(name="id", type="integer")
     */ 
    private $id;           

    /**
     * @ORM\Column(name="codsala", type="string", length=10, nullable=false)
     */    
    private $codsala;         

    /**
     * @ORM\Column(name="concepto", type="string", length=50, nullable=false)
     */    
    private $concepto;                  
    
    /**
     * @ORM\Column(name="valorpago", type="integer", nullable=false)
     */    
    private $valorPago;
    
    /**
     * @ORM\Column(name="nropresta", type="string", length=50, nullable=false)
     */    
    private $nroPresta;    
    
    /**
     * @ORM\Column(name="fechap", type="date", nullable=true)
     */    
    private $fechap;
    
    /**
     * @ORM\Column(name="nrocredito", type="string", length=7, nullable=false)
     */    
    private $nroCredito;      

    /**
     * Set id
     *
     * @param integer $id
     * @return DetallePrestacion
     */
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set codsala
     *
     * @param string $codsala
     * @return DetallePrestacion
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
     * @return DetallePrestacion
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
     * @return DetallePrestacion
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
     * Set nroPresta
     *
     * @param string $nroPresta
     * @return DetallePrestacion
     */
    public function setNroPresta($nroPresta)
    {
        $this->nroPresta = $nroPresta;

        return $this;
    }

    /**
     * Get nroPresta
     *
     * @return string 
     */
    public function getNroPresta()
    {
        return $this->nroPresta;
    }

    /**
     * Set fechap
     *
     * @param \DateTime $fechap
     * @return DetallePrestacion
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
     * @return DetallePrestacion
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
