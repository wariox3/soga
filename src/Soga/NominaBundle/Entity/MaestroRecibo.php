<?php

namespace Soga\NominaBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Table(name="maestrorecibo")
 * @ORM\Entity(repositoryClass="Soga\NominaBundle\Repository\MaestroReciboRepository")
 */
class MaestroRecibo
{

    /**
     * @ORM\Id
     * @ORM\Column(name="nrocaja", type="string", length=6, nullable=false)
     */    
    private $nroCaja;          
            
    /**
     * @ORM\Column(name="codmaestro", type="string", length=15, nullable=false)
     */    
    private $codmaestro;    

    /**
     * @ORM\Column(name="codmuni", type="string", length=15, nullable=false)
     */    
    private $codmuni;    
    
    /**
     * @ORM\Column(name="fechaRa", type="date", nullable=true)
     */    
    private $fechaRa; 

    /**
     * @ORM\Column(name="fechapago", type="date", nullable=true)
     */    
    private $fechaPago;    
    
    /**
     * @ORM\Column(name="vlrpagado", type="integer", nullable=false)
     */    
    private $vlrpagado;    

    /**
     * @ORM\Column(name="idrecibo", type="string", length=15, nullable=false)
     */    
    private $idrecibo;    

    /**
     * @ORM\Column(name="estado", type="string", length=15, nullable=false)
     */    
    private $estado;     
    
    /**
     * @ORM\Column(name="exportado_contabilidad", type="integer", nullable=true)
     */    
    private $exportadoContabilidad;         




    /**
     * Set nroCaja
     *
     * @param string $nroCaja
     * @return MaestroRecibo
     */
    public function setNroCaja($nroCaja)
    {
        $this->nroCaja = $nroCaja;

        return $this;
    }

    /**
     * Get nroCaja
     *
     * @return string 
     */
    public function getNroCaja()
    {
        return $this->nroCaja;
    }

    /**
     * Set codmaestro
     *
     * @param string $codmaestro
     * @return MaestroRecibo
     */
    public function setCodmaestro($codmaestro)
    {
        $this->codmaestro = $codmaestro;

        return $this;
    }

    /**
     * Get codmaestro
     *
     * @return string 
     */
    public function getCodmaestro()
    {
        return $this->codmaestro;
    }

    /**
     * Set codmuni
     *
     * @param string $codmuni
     * @return MaestroRecibo
     */
    public function setCodmuni($codmuni)
    {
        $this->codmuni = $codmuni;

        return $this;
    }

    /**
     * Get codmuni
     *
     * @return string 
     */
    public function getCodmuni()
    {
        return $this->codmuni;
    }

    /**
     * Set fechaRa
     *
     * @param \DateTime $fechaRa
     * @return MaestroRecibo
     */
    public function setFechaRa($fechaRa)
    {
        $this->fechaRa = $fechaRa;

        return $this;
    }

    /**
     * Get fechaRa
     *
     * @return \DateTime 
     */
    public function getFechaRa()
    {
        return $this->fechaRa;
    }

    /**
     * Set fechaPago
     *
     * @param \DateTime $fechaPago
     * @return MaestroRecibo
     */
    public function setFechaPago($fechaPago)
    {
        $this->fechaPago = $fechaPago;

        return $this;
    }

    /**
     * Get fechaPago
     *
     * @return \DateTime 
     */
    public function getFechaPago()
    {
        return $this->fechaPago;
    }

    /**
     * Set vlrpagado
     *
     * @param integer $vlrpagado
     * @return MaestroRecibo
     */
    public function setVlrpagado($vlrpagado)
    {
        $this->vlrpagado = $vlrpagado;

        return $this;
    }

    /**
     * Get vlrpagado
     *
     * @return integer 
     */
    public function getVlrpagado()
    {
        return $this->vlrpagado;
    }

    /**
     * Set idrecibo
     *
     * @param string $idrecibo
     * @return MaestroRecibo
     */
    public function setIdrecibo($idrecibo)
    {
        $this->idrecibo = $idrecibo;

        return $this;
    }

    /**
     * Get idrecibo
     *
     * @return string 
     */
    public function getIdrecibo()
    {
        return $this->idrecibo;
    }

    /**
     * Set estado
     *
     * @param string $estado
     * @return MaestroRecibo
     */
    public function setEstado($estado)
    {
        $this->estado = $estado;

        return $this;
    }

    /**
     * Get estado
     *
     * @return string 
     */
    public function getEstado()
    {
        return $this->estado;
    }

    /**
     * Set exportadoContabilidad
     *
     * @param integer $exportadoContabilidad
     * @return MaestroRecibo
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
