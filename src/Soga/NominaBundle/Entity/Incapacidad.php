<?php

namespace Soga\NominaBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Table(name="incapacidad")
 * @ORM\Entity(repositoryClass="Soga\NominaBundle\Repository\IncapacidadRepository")
 */
class Incapacidad
{
    /**
     * @ORM\Id
     * @ORM\Column(name="nroinca", type="string", length=20)
     */ 
    private $nroinca;

    /**
     * @ORM\Column(name="cedemple", type="string", length=11, nullable=false)
     */    
    private $cedemple;      
    
    /**
     * @ORM\Column(name="fechaini", type="date", nullable=true)
     */    
    private $fechaini; 

    /**
     * @ORM\Column(name="fechater", type="date", nullable=true)
     */    
    private $fechater;
    
    /**
     * @ORM\Column(name="tipoinca", type="string", length=40)
     */    
    private $tipoinca;      

    /**
     * Set nroinca
     *
     * @param string $nroinca
     * @return Incapacidad
     */
    public function setNroinca($nroinca)
    {
        $this->nroinca = $nroinca;

        return $this;
    }

    /**
     * Get nroinca
     *
     * @return string 
     */
    public function getNroinca()
    {
        return $this->nroinca;
    }

    /**
     * Set fechaini
     *
     * @param \DateTime $fechaini
     * @return Incapacidad
     */
    public function setFechaini($fechaini)
    {
        $this->fechaini = $fechaini;

        return $this;
    }

    /**
     * Get fechaini
     *
     * @return \DateTime 
     */
    public function getFechaini()
    {
        return $this->fechaini;
    }

    /**
     * Set fechater
     *
     * @param \DateTime $fechater
     * @return Incapacidad
     */
    public function setFechater($fechater)
    {
        $this->fechater = $fechater;

        return $this;
    }

    /**
     * Get fechater
     *
     * @return \DateTime 
     */
    public function getFechater()
    {
        return $this->fechater;
    }

    /**
     * Set cedemple
     *
     * @param string $cedemple
     * @return Incapacidad
     */
    public function setCedemple($cedemple)
    {
        $this->cedemple = $cedemple;

        return $this;
    }

    /**
     * Get cedemple
     *
     * @return string 
     */
    public function getCedemple()
    {
        return $this->cedemple;
    }

    /**
     * Set tipoinca
     *
     * @param string $tipoinca
     * @return Incapacidad
     */
    public function setTipoinca($tipoinca)
    {
        $this->tipoinca = $tipoinca;

        return $this;
    }

    /**
     * Get tipoinca
     *
     * @return string 
     */
    public function getTipoinca()
    {
        return $this->tipoinca;
    }
}
