<?php

namespace Soga\NominaBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Table(name="trasladoeps")
 * @ORM\Entity(repositoryClass="Soga\NominaBundle\Repository\TrasladoEpsRepository")
 */
class TrasladoEps
{
    /**
     * @ORM\Id
     * @ORM\Column(name="id", type="integer")
     */ 
    private $id;           

    /**
     * @ORM\Column(name="cedemple", type="string", length=15, nullable=false)
     */    
    private $cedemple;          

    /**
     * @ORM\Column(name="codigo_eps_actual_fk", type="integer")
     */    
    private $codigoEpsActualFk;             
    
    /**
     * @ORM\Column(name="codigo_eps_nueva_fk", type="integer")
     */    
    private $codigoEpsNuevaFk;                 
    
    /**
     * @ORM\Column(name="fecha_inicio_traslado", type="date", nullable=true)
     */    
    private $fechaInicioTraslado; 
   
    /**
     * @ORM\Column(name="fecha_aplicacion_traslado", type="date", nullable=true)
     */    
    private $fechaAplicacionTraslado;     

    /**
     * Set id
     *
     * @param integer $id
     * @return TrasladoEps
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
     * Set cedemple
     *
     * @param string $cedemple
     * @return TrasladoEps
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
     * Set codigoEpsActualFk
     *
     * @param integer $codigoEpsActualFk
     * @return TrasladoEps
     */
    public function setCodigoEpsActualFk($codigoEpsActualFk)
    {
        $this->codigoEpsActualFk = $codigoEpsActualFk;

        return $this;
    }

    /**
     * Get codigoEpsActualFk
     *
     * @return integer 
     */
    public function getCodigoEpsActualFk()
    {
        return $this->codigoEpsActualFk;
    }

    /**
     * Set codigoEpsNuevaFk
     *
     * @param integer $codigoEpsNuevaFk
     * @return TrasladoEps
     */
    public function setCodigoEpsNuevaFk($codigoEpsNuevaFk)
    {
        $this->codigoEpsNuevaFk = $codigoEpsNuevaFk;

        return $this;
    }

    /**
     * Get codigoEpsNuevaFk
     *
     * @return integer 
     */
    public function getCodigoEpsNuevaFk()
    {
        return $this->codigoEpsNuevaFk;
    }

    /**
     * Set fechaInicioTraslado
     *
     * @param \DateTime $fechaInicioTraslado
     * @return TrasladoEps
     */
    public function setFechaInicioTraslado($fechaInicioTraslado)
    {
        $this->fechaInicioTraslado = $fechaInicioTraslado;

        return $this;
    }

    /**
     * Get fechaInicioTraslado
     *
     * @return \DateTime 
     */
    public function getFechaInicioTraslado()
    {
        return $this->fechaInicioTraslado;
    }

    /**
     * Set fechaAplicacionTraslado
     *
     * @param \DateTime $fechaAplicacionTraslado
     * @return TrasladoEps
     */
    public function setFechaAplicacionTraslado($fechaAplicacionTraslado)
    {
        $this->fechaAplicacionTraslado = $fechaAplicacionTraslado;

        return $this;
    }

    /**
     * Get fechaAplicacionTraslado
     *
     * @return \DateTime 
     */
    public function getFechaAplicacionTraslado()
    {
        return $this->fechaAplicacionTraslado;
    }
}
