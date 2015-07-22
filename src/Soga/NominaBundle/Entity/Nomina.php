<?php

namespace Soga\NominaBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Table(name="nomina")
 * @ORM\Entity(repositoryClass="Soga\NominaBundle\Repository\NominaRepository")
 */
class Nomina
{
    /**
     * @ORM\Id
     * @ORM\Column(name="consecutivo", type="string", length=10)
     */ 
    private $consecutivo;  
    
    /**
     * @ORM\Column(name="codigo", type="string", length=6, nullable=false)
     */    
    private $codigo;      

    /**
     * @ORM\Column(name="cedemple", type="string", length=15, nullable=false)
     */    
    private $cedulaEmpleado;          

    /**
     * @ORM\Column(name="fechap", type="date", nullable=true)
     */    
    private $fechaP; 

    /**
     * @ORM\Column(name="desde", type="date", nullable=true)
     */    
    private $fechaDesde; 
    
    /**
     * @ORM\Column(name="hasta", type="date", nullable=true)
     */    
    private $fechaHasta;     
    
    /**
     * @ORM\Column(name="devengado", type="integer", nullable=false)
     */    
    private $devengado;
    
    /**
     * @ORM\Column(name="deduccion", type="integer", nullable=false)
     */    
    private $deduccion;
    
    /**
     * @ORM\Column(name="neto", type="integer", nullable=false)
     */    
    private $neto;
    
    /**
     * @ORM\Column(name="presta", type="integer", nullable=false)
     */    
    private $presta;    
    
    /**
     * @ORM\Column(name="periodo", type="string", length=20, nullable=false)
     */    
    private $periodo;     

    /**
     * @ORM\Column(name="basico", type="integer", nullable=false)
     */    
    private $basico; 
    
    /**
     * @ORM\Column(name="pagado", type="integer", nullable=false)
     */    
    private $pagado;     
    
    /**
     * @ORM\Column(name="tiempo", type="string", length=20, nullable=false)
     */    
    private $tiempo;      
    
    /**
     * @ORM\Column(name="horap", type="string", length=14, nullable=false)
     */    
    private $horaP;  
    
    /**
     * @ORM\Column(name="estado", type="string", length=15, nullable=false)
     */    
    private $estado;     
    
    /**
     * @ORM\Column(name="exportado_contabilidad", type="integer", nullable=true)
     */    
    private $exportadoContabilidad;    

    /**
     * @ORM\Column(name="proceso_auxiliar", type="integer", nullable=true)
     */    
    private $procesoAuxiliar;      

    /**
     * @ORM\Column(name="ibc_tiempo_suple", type="integer", nullable=true)
     */    
    private $ibcTiempoSuple;      
    
    /**
     * Set consecutivo
     *
     * @param string $consecutivo
     * @return Nomina
     */
    public function setConsecutivo($consecutivo)
    {
        $this->consecutivo = $consecutivo;

        return $this;
    }

    /**
     * Get consecutivo
     *
     * @return string 
     */
    public function getConsecutivo()
    {
        return $this->consecutivo;
    }

    /**
     * Set codigo
     *
     * @param string $codigo
     * @return Nomina
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
     * Set cedulaEmpleado
     *
     * @param string $cedulaEmpleado
     * @return Nomina
     */
    public function setCedulaEmpleado($cedulaEmpleado)
    {
        $this->cedulaEmpleado = $cedulaEmpleado;

        return $this;
    }

    /**
     * Get cedulaEmpleado
     *
     * @return string 
     */
    public function getCedulaEmpleado()
    {
        return $this->cedulaEmpleado;
    }

    /**
     * Set fechaP
     *
     * @param \DateTime $fechaP
     * @return Nomina
     */
    public function setFechaP($fechaP)
    {
        $this->fechaP = $fechaP;

        return $this;
    }

    /**
     * Get fechaP
     *
     * @return \DateTime 
     */
    public function getFechaP()
    {
        return $this->fechaP;
    }

    /**
     * Set fechaDesde
     *
     * @param \DateTime $fechaDesde
     * @return Nomina
     */
    public function setFechaDesde($fechaDesde)
    {
        $this->fechaDesde = $fechaDesde;

        return $this;
    }

    /**
     * Get fechaDesde
     *
     * @return \DateTime 
     */
    public function getFechaDesde()
    {
        return $this->fechaDesde;
    }

    /**
     * Set fechaHasta
     *
     * @param \DateTime $fechaHasta
     * @return Nomina
     */
    public function setFechaHasta($fechaHasta)
    {
        $this->fechaHasta = $fechaHasta;

        return $this;
    }

    /**
     * Get fechaHasta
     *
     * @return \DateTime 
     */
    public function getFechaHasta()
    {
        return $this->fechaHasta;
    }

    /**
     * Set devengado
     *
     * @param integer $devengado
     * @return Nomina
     */
    public function setDevengado($devengado)
    {
        $this->devengado = $devengado;

        return $this;
    }

    /**
     * Get devengado
     *
     * @return integer 
     */
    public function getDevengado()
    {
        return $this->devengado;
    }

    /**
     * Set deduccion
     *
     * @param integer $deduccion
     * @return Nomina
     */
    public function setDeduccion($deduccion)
    {
        $this->deduccion = $deduccion;

        return $this;
    }

    /**
     * Get deduccion
     *
     * @return integer 
     */
    public function getDeduccion()
    {
        return $this->deduccion;
    }

    /**
     * Set neto
     *
     * @param integer $neto
     * @return Nomina
     */
    public function setNeto($neto)
    {
        $this->neto = $neto;

        return $this;
    }

    /**
     * Get neto
     *
     * @return integer 
     */
    public function getNeto()
    {
        return $this->neto;
    }

    /**
     * Set presta
     *
     * @param integer $presta
     * @return Nomina
     */
    public function setPresta($presta)
    {
        $this->presta = $presta;

        return $this;
    }

    /**
     * Get presta
     *
     * @return integer 
     */
    public function getPresta()
    {
        return $this->presta;
    }

    /**
     * Set periodo
     *
     * @param string $periodo
     * @return Nomina
     */
    public function setPeriodo($periodo)
    {
        $this->periodo = $periodo;

        return $this;
    }

    /**
     * Get periodo
     *
     * @return string 
     */
    public function getPeriodo()
    {
        return $this->periodo;
    }

    /**
     * Set basico
     *
     * @param integer $basico
     * @return Nomina
     */
    public function setBasico($basico)
    {
        $this->basico = $basico;

        return $this;
    }

    /**
     * Get basico
     *
     * @return integer 
     */
    public function getBasico()
    {
        return $this->basico;
    }

    /**
     * Set pagado
     *
     * @param integer $pagado
     * @return Nomina
     */
    public function setPagado($pagado)
    {
        $this->pagado = $pagado;

        return $this;
    }

    /**
     * Get pagado
     *
     * @return integer 
     */
    public function getPagado()
    {
        return $this->pagado;
    }

    /**
     * Set tiempo
     *
     * @param string $tiempo
     * @return Nomina
     */
    public function setTiempo($tiempo)
    {
        $this->tiempo = $tiempo;

        return $this;
    }

    /**
     * Get tiempo
     *
     * @return string 
     */
    public function getTiempo()
    {
        return $this->tiempo;
    }

    /**
     * Set horaP
     *
     * @param string $horaP
     * @return Nomina
     */
    public function setHoraP($horaP)
    {
        $this->horaP = $horaP;

        return $this;
    }

    /**
     * Get horaP
     *
     * @return string 
     */
    public function getHoraP()
    {
        return $this->horaP;
    }

    /**
     * Set estado
     *
     * @param string $estado
     * @return Nomina
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
     * @return Nomina
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

    /**
     * Set procesoAuxiliar
     *
     * @param integer $procesoAuxiliar
     * @return Nomina
     */
    public function setProcesoAuxiliar($procesoAuxiliar)
    {
        $this->procesoAuxiliar = $procesoAuxiliar;

        return $this;
    }

    /**
     * Get procesoAuxiliar
     *
     * @return integer 
     */
    public function getProcesoAuxiliar()
    {
        return $this->procesoAuxiliar;
    }

    /**
     * Set ibcTiempoSuple
     *
     * @param integer $ibcTiempoSuple
     * @return Nomina
     */
    public function setIbcTiempoSuple($ibcTiempoSuple)
    {
        $this->ibcTiempoSuple = $ibcTiempoSuple;

        return $this;
    }

    /**
     * Get ibcTiempoSuple
     *
     * @return integer 
     */
    public function getIbcTiempoSuple()
    {
        return $this->ibcTiempoSuple;
    }
}
