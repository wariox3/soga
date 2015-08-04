<?php

namespace Soga\NominaBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Table(name="vacacionprogramada")
 * @ORM\Entity(repositoryClass="Soga\NominaBundle\Repository\VacacionProgramadaRepository")
 */
class VacacionProgramada
{
    /**
     * @ORM\Id
     * @ORM\Column(name="codigo_vacacion_programada_pk", type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */ 
    private $codigoVacacionProgramadaPk;
       
    /**
     * @ORM\Column(name="desde", type="date")
     */
    private $desde;

    /**
     * @ORM\Column(name="hasta", type="date")
     */
    private $hasta; 
    
    /**
     * @ORM\Column(name="fecha_proceso", type="date")
     */
    private $fechaProceso;
    
    /**
     * @ORM\Column(name="cedemple", type="string", length=15)
     */    
    private $cedemple;  
    
    /**
     * @ORM\Column(name="codzona", type="string", length=3, nullable=false)
     */    
    private $codzona;     


    /**
     * Get codigoVacacionProgramadaPk
     *
     * @return integer 
     */
    public function getCodigoVacacionProgramadaPk()
    {
        return $this->codigoVacacionProgramadaPk;
    }

    /**
     * Set desde
     *
     * @param \DateTime $desde
     * @return VacacionProgramada
     */
    public function setDesde($desde)
    {
        $this->desde = $desde;

        return $this;
    }

    /**
     * Get desde
     *
     * @return \DateTime 
     */
    public function getDesde()
    {
        return $this->desde;
    }

    /**
     * Set hasta
     *
     * @param \DateTime $hasta
     * @return VacacionProgramada
     */
    public function setHasta($hasta)
    {
        $this->hasta = $hasta;

        return $this;
    }

    /**
     * Get hasta
     *
     * @return \DateTime 
     */
    public function getHasta()
    {
        return $this->hasta;
    }

    /**
     * Set fechaProceso
     *
     * @param \DateTime $fechaProceso
     * @return VacacionProgramada
     */
    public function setFechaProceso($fechaProceso)
    {
        $this->fechaProceso = $fechaProceso;

        return $this;
    }

    /**
     * Get fechaProceso
     *
     * @return \DateTime 
     */
    public function getFechaProceso()
    {
        return $this->fechaProceso;
    }

    /**
     * Set cedemple
     *
     * @param string $cedemple
     * @return VacacionProgramada
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
     * Set codzona
     *
     * @param string $codzona
     * @return VacacionProgramada
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
}
