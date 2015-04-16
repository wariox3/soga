<?php

namespace Soga\NominaBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Table(name="zona")
 * @ORM\Entity(repositoryClass="Soga\NominaBundle\Repository\ZonaRepository")
 */
class Zona
{
    /**
     * @ORM\Id
     * @ORM\Column(name="codzona", type="string", length=3)
     */ 
    private $codzona;
  
    /**
     * @ORM\Column(name="zona", type="string", length=60, nullable=false)
     */    
    private $zona;     
    
    /**
     * @ORM\Column(name="nitzona", type="string", length=15, nullable=false)
     */    
    private $nitzona; 

    /**
     * @ORM\Column(name="tipoempresa", type="string", length=2, nullable=false)
     */    
    private $tipoempresa;     
    
    /**
     * Set codzona
     *
     * @param string $codzona
     * @return Zona
     */
    public function setCodzona($codzona)
    {
        $this->codzona = $codzona;

        return $this;
    }

    /**
     * Get codzona
     *
     * @return string 
     */
    public function getCodzona()
    {
        return $this->codzona;
    }

    /**
     * Set nitzona
     *
     * @param string $nitzona
     * @return Zona
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
     * Set tipoempresa
     *
     * @param string $tipoempresa
     * @return Zona
     */
    public function setTipoempresa($tipoempresa)
    {
        $this->tipoempresa = $tipoempresa;

        return $this;
    }

    /**
     * Get tipoempresa
     *
     * @return string 
     */
    public function getTipoempresa()
    {
        return $this->tipoempresa;
    }

    /**
     * Set zona
     *
     * @param string $zona
     *
     * @return Zona
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
