<?php

namespace Soga\NominaBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Table(name="tiporecibo")
 * @ORM\Entity(repositoryClass="Soga\NominaBundle\Repository\TipoReciboRepository")
 */
class TipoRecibo
{

    /**
     * @ORM\Id
     * @ORM\Column(name="idrecibo", type="integer", nullable=false)
     */    
    private $idrecibo;          
            
    /**
     * @ORM\Column(name="descripcion", type="string", length=35, nullable=false)
     */    
    private $descripcion;    


    /**
     * Set idrecibo
     *
     * @param integer $idrecibo
     * @return TipoRecibo
     */
    public function setIdrecibo($idrecibo)
    {
        $this->idrecibo = $idrecibo;

        return $this;
    }

    /**
     * Get idrecibo
     *
     * @return integer 
     */
    public function getIdrecibo()
    {
        return $this->idrecibo;
    }

    /**
     * Set descripcion
     *
     * @param string $descripcion
     * @return TipoRecibo
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
}
