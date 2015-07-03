<?php

namespace Soga\NominaBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Table(name="vacacion")
 * @ORM\Entity(repositoryClass="Soga\NominaBundle\Repository\VacacionRepository")
 */
class Vacacion
{
    /**
     * @ORM\Id
     * @ORM\Column(name="codvaca", type="string", length=5)
     */ 
    private $codvaca;           

    /**
     * @ORM\Column(name="cedemple", type="string", length=15, nullable=false)
     */    
    private $cedemple;          

    /**
     * @ORM\Column(name="nombre", type="string", length=50, nullable=false)
     */    
    private $nombre;              
    
    /**
     * @ORM\Column(name="fechap", type="date", nullable=true)
     */    
    private $fechap; 

    /**
     * @ORM\Column(name="fechai", type="date", nullable=true)
     */    
    private $fechai; 
    
    /**
     * @ORM\Column(name="fechac", type="date", nullable=true)
     */    
    private $fechac;     
    
    /**
     * @ORM\Column(name="ibc", type="integer", nullable=false)
     */    
    private $ibc;   
    
    /**
     * @ORM\Column(name="dias", type="integer", nullable=false)
     */    
    private $dias;    
    
    /**
     * @ORM\Column(name="valor", type="integer", nullable=false)
     */    
    private $valor;     
    
    /**
     * @ORM\Column(name="control", type="string", length=15, nullable=false)
     */    
    private $control;    
    
    /**
     * @ORM\Column(name="exportado_contabilidad", type="integer", nullable=true)
     */    
    private $exportadoContabilidad;    
    

    /**
     * Set codvaca
     *
     * @param string $codvaca
     * @return Vacacion
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
     * Set cedemple
     *
     * @param string $cedemple
     * @return Vacacion
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
     * Set nombre
     *
     * @param string $nombre
     * @return Vacacion
     */
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;

        return $this;
    }

    /**
     * Get nombre
     *
     * @return string 
     */
    public function getNombre()
    {
        return $this->nombre;
    }

    /**
     * Set fechap
     *
     * @param \DateTime $fechap
     * @return Vacacion
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
     * Set fechai
     *
     * @param \DateTime $fechai
     * @return Vacacion
     */
    public function setFechai($fechai)
    {
        $this->fechai = $fechai;

        return $this;
    }

    /**
     * Get fechai
     *
     * @return \DateTime 
     */
    public function getFechai()
    {
        return $this->fechai;
    }

    /**
     * Set fechac
     *
     * @param \DateTime $fechac
     * @return Vacacion
     */
    public function setFechac($fechac)
    {
        $this->fechac = $fechac;

        return $this;
    }

    /**
     * Get fechac
     *
     * @return \DateTime 
     */
    public function getFechac()
    {
        return $this->fechac;
    }

    /**
     * Set ibc
     *
     * @param integer $ibc
     * @return Vacacion
     */
    public function setIbc($ibc)
    {
        $this->ibc = $ibc;

        return $this;
    }

    /**
     * Get ibc
     *
     * @return integer 
     */
    public function getIbc()
    {
        return $this->ibc;
    }

    /**
     * Set dias
     *
     * @param integer $dias
     * @return Vacacion
     */
    public function setDias($dias)
    {
        $this->dias = $dias;

        return $this;
    }

    /**
     * Get dias
     *
     * @return integer 
     */
    public function getDias()
    {
        return $this->dias;
    }

    /**
     * Set valor
     *
     * @param integer $valor
     * @return Vacacion
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
     * Set control
     *
     * @param string $control
     * @return Vacacion
     */
    public function setControl($control)
    {
        $this->control = $control;

        return $this;
    }

    /**
     * Get control
     *
     * @return string 
     */
    public function getControl()
    {
        return $this->control;
    }

    /**
     * Set exportadoContabilidad
     *
     * @param integer $exportadoContabilidad
     * @return Vacacion
     */
    public function setExportadoContabilidad($exportadoContabilidad)
    {
        $this->exportadoContabilidad = $exportadoContabilidad;

        return $this;
    }

    /**
     * Get exportadoContabilidad
     *
     * @return integer 
     */
    public function getExportadoContabilidad()
    {
        return $this->exportadoContabilidad;
    }
}
