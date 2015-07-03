<?php

namespace Soga\ContabilidadBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Table(name="tipocomprobante")
 * @ORM\Entity(repositoryClass="Soga\ContabilidadBundle\Repository\TipoComprobanteRepository")
 */
class TipoComprobante
{
    /**
     * @ORM\Id
     * @ORM\Column(name="id", type="integer")
     */ 
    private $id;  
    
    /**
     * @ORM\Column(name="descripcion", type="string", length=38, nullable=false)
     */    
    private $descripcion;      

    /**
     * @ORM\Column(name="cuenta", type="string", length=15, nullable=false)
     */    
    private $cuenta;      
    

    /**
     * Set id
     *
     * @param integer $id
     * @return TipoComprobante
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
     * Set descripcion
     *
     * @param string $descripcion
     * @return TipoComprobante
     */
    public function setDescripcion($descripcion)
    {
        $this->descripcion = $descripcion;

        return $this;
    }

    /**
     * Get descripcion
     *
     * @return string 
     */
    public function getDescripcion()
    {
        return $this->descripcion;
    }

    /**
     * Set cuenta
     *
     * @param string $cuenta
     * @return TipoComprobante
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
}
