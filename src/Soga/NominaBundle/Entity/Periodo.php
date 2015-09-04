<?php

namespace Soga\NominaBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Table(name="periodo")
 * @ORM\Entity(repositoryClass="Soga\NominaBundle\Repository\PeriodoRepository")
 */
class Periodo
{
    /**
     * @ORM\Id
     * @ORM\Column(name="codigo", type="string", length=6)
     */ 
    private $codigo;
  
    /**
     * @ORM\Column(name="codzona", type="string", length=3, nullable=false)
     */    
    private $codzona;     
     
    /**
     * @ORM\Column(name="pagado", type="string", length=2, nullable=false)
     */    
    private $pagado;    
    
    /**
     * @ORM\Column(name="desde", type="date", nullable=true)
     */    
    private $desde;
        
    /**
     * @ORM\Column(name="hasta", type="date", nullable=true)
     */    
    private $hasta;     



    /**
     * Set codigo
     *
     * @param string $codigo
     * @return Periodo
     */
    public function setCodigo($codigo)
    {
        $this->codigo = $codigo;

        return $this;
    }

    /**
     * Get codigo
     *
     * @return string 
     */
    public function getCodigo()
    {
        return $this->codigo;
    }

    /**
     * Set codzona
     *
     * @param string $codzona
     * @return Periodo
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
     * Set pagado
     *
     * @param string $pagado
     * @return Periodo
     */
    public function setPagado($pagado)
    {
        $this->pagado = $pagado;

        return $this;
    }

    /**
     * Get pagado
     *
     * @return string 
     */
    public function getPagado()
    {
        return $this->pagado;
    }

    /**
     * Set desde
     *
     * @param \DateTime $desde
     * @return Periodo
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
     * @return Periodo
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
}
