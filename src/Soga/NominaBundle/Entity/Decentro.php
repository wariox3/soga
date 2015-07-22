<?php

namespace Soga\NominaBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Table(name="decentro")
 * @ORM\Entity(repositoryClass="Soga\NominaBundle\Repository\DecentroRepository")
 */
class Decentro
{
    /**
     * @ORM\Id
     * @ORM\Column(name="conse", type="integer")
     */ 
    private $conse;
    
    /**
     * @ORM\Column(name="codcentro", type="string", length=6)
     */    
    private $codcentro;  
    
    /**
     * @ORM\Column(name="codsala", type="string", length=10)
     */    
    private $codsala;             

    /**
     * @ORM\Column(name="porcentaje", type="float")
     */    
    private $porcentaje; 
    
    /**
     * @ORM\Column(name="activo", type="string", length=2)
     */    
    private $activo;    
    

    /**
     * Set conse
     *
     * @param integer $conse
     * @return Decentro
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
     * Set codcentro
     *
     * @param string $codcentro
     * @return Decentro
     */
    public function setCodcentro($codcentro)
    {
        $this->codcentro = $codcentro;

        return $this;
    }

    /**
     * Get codcentro
     *
     * @return string 
     */
    public function getCodcentro()
    {
        return $this->codcentro;
    }

    /**
     * Set codsala
     *
     * @param string $codsala
     * @return Decentro
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
     * Set porcentaje
     *
     * @param float $porcentaje
     * @return Decentro
     */
    public function setPorcentaje($porcentaje)
    {
        $this->porcentaje = $porcentaje;

        return $this;
    }

    /**
     * Get porcentaje
     *
     * @return float 
     */
    public function getPorcentaje()
    {
        return $this->porcentaje;
    }

    /**
     * Set activo
     *
     * @param string $activo
     * @return Decentro
     */
    public function setActivo($activo)
    {
        $this->activo = $activo;

        return $this;
    }

    /**
     * Get activo
     *
     * @return string 
     */
    public function getActivo()
    {
        return $this->activo;
    }
}
