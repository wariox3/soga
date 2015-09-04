<?php

namespace Soga\FacturacionBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Table(name="defactura")
 * @ORM\Entity(repositoryClass="Soga\FacturacionBundle\Repository\DeFacturasRepository")
 */
class DeFacturas
{
    /**
     * @ORM\Id
     * @ORM\Column(name="remision", type="integer")
     */ 
    private $remision;  
    
    /**
     * @ORM\Column(name="nrofactura", type="string", length=10, nullable=false)
     */    
    private $nrofactura;
    
    /**
     * @ORM\Column(name="codcom", type="string", length=10, nullable=false)
     */    
    private $codcom;
    
    /**
     * @ORM\Column(name="cantidad", type="integer", nullable=false)
     */    
    private $cantidad;
    
    /**
     * @ORM\Column(name="vlruni", type="integer", nullable=false)
     */    
    private $vlruni;    
    
    /**
     * @ORM\Column(name="total", type="integer", nullable=true)
     */    
    private $total;     
    

    /**
     * Set remision
     *
     * @param integer $remision
     * @return DeFacturas
     */
    public function setRemision($remision)
    {
        $this->remision = $remision;

        return $this;
    }

    /**
     * Get remision
     *
     * @return integer 
     */
    public function getRemision()
    {
        return $this->remision;
    }

    /**
     * Set nrofactura
     *
     * @param string $nrofactura
     * @return DeFacturas
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
     * Set codcom
     *
     * @param string $codcom
     * @return DeFacturas
     */
    public function setCodcom($codcom)
    {
        $this->codcom = $codcom;

        return $this;
    }

    /**
     * Get codcom
     *
     * @return string 
     */
    public function getCodcom()
    {
        return $this->codcom;
    }

    /**
     * Set cantidad
     *
     * @param integer $cantidad
     * @return DeFacturas
     */
    public function setCantidad($cantidad)
    {
        $this->cantidad = $cantidad;

        return $this;
    }

    /**
     * Get cantidad
     *
     * @return integer 
     */
    public function getCantidad()
    {
        return $this->cantidad;
    }

    /**
     * Set vlruni
     *
     * @param integer $vlruni
     * @return DeFacturas
     */
    public function setVlruni($vlruni)
    {
        $this->vlruni = $vlruni;

        return $this;
    }

    /**
     * Get vlruni
     *
     * @return integer 
     */
    public function getVlruni()
    {
        return $this->vlruni;
    }

    /**
     * Set total
     *
     * @param integer $total
     * @return DeFacturas
     */
    public function setTotal($total)
    {
        $this->total = $total;

        return $this;
    }

    /**
     * Get total
     *
     * @return integer 
     */
    public function getTotal()
    {
        return $this->total;
    }
}
