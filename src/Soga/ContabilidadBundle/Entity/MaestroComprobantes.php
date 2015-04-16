<?php

namespace Soga\ContabilidadBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Table(name="maestrocomprobante")
 * @ORM\Entity(repositoryClass="Soga\ContabilidadBundle\Repository\MaestroComprobantesRepository")
 */
class MaestroComprobantes
{
    /**
     * @ORM\Id
     * @ORM\Column(name="nro", type="string", length=6)
     */ 
    private $nro;  
    
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
    private $fechapago;   
    
    /**
     * @ORM\Column(name="vlrpagado", type="integer", nullable=false)
     */    
    private $vlrpagado;
    
    /**
     * @ORM\Column(name="letras", type="string", length=200, nullable=false)
     */    
    private $letras;
    
    /**
     * @ORM\Column(name="tipop", type="string", length=20, nullable=false)
     */    
    private $tipop;     

    /**
     * @ORM\Column(name="exportado_contabilidad", type="integer", nullable=true)
     */    
    private $exportadoContabilidad;     
    
   

    /**
     * Set nro
     *
     * @param string $nro
     * @return MaestroComprobantes
     */
    public function setNro($nro)
    {
        $this->nro = $nro;

        return $this;
    }

    /**
     * Get nro
     *
     * @return string 
     */
    public function getNro()
    {
        return $this->nro;
    }

    /**
     * Set codmaestro
     *
     * @param string $codmaestro
     * @return MaestroComprobantes
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
     * @return MaestroComprobantes
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
     * @return MaestroComprobantes
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
     * Set fechapago
     *
     * @param \DateTime $fechapago
     * @return MaestroComprobantes
     */
    public function setFechapago($fechapago)
    {
        $this->fechapago = $fechapago;

        return $this;
    }

    /**
     * Get fechapago
     *
     * @return \DateTime 
     */
    public function getFechapago()
    {
        return $this->fechapago;
    }

    /**
     * Set vlrpagado
     *
     * @param integer $vlrpagado
     * @return MaestroComprobantes
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
     * Set letras
     *
     * @param string $letras
     * @return MaestroComprobantes
     */
    public function setLetras($letras)
    {
        $this->letras = $letras;

        return $this;
    }

    /**
     * Get letras
     *
     * @return string 
     */
    public function getLetras()
    {
        return $this->letras;
    }

    /**
     * Set tipop
     *
     * @param string $tipop
     * @return MaestroComprobantes
     */
    public function setTipop($tipop)
    {
        $this->tipop = $tipop;

        return $this;
    }

    /**
     * Get tipop
     *
     * @return string 
     */
    public function getTipop()
    {
        return $this->tipop;
    }

    /**
     * Set exportadoContabilidad
     *
     * @param integer $exportadoContabilidad
     * @return MaestroComprobantes
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
