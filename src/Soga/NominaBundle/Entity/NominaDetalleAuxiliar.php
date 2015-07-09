<?php

namespace Soga\NominaBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Table(name="nomina_detalle_auxiliar")
 * @ORM\Entity(repositoryClass="Soga\NominaBundle\Repository\NominaDetalleAuxiliarRepository")
 */
class NominaDetalleAuxiliar {

    /**
     * @ORM\Id
     * @ORM\Column(name="codigo_nomina_detalle_auxiliar_pk", type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $codigoNominaDetalleAuxiliarPk;

    /**
     * @ORM\Column(name="codigo_nomina_fk", type="string", length=10)
     */    
    private $codigoNominaFk;    
    
    /**
     * @ORM\Column(name="numero_identificacion", type="string", length=11)
     */    
    private $numeroIdentificacion;    
    
    /**
     * @ORM\Column(name="anio", type="integer")
     */
    private $anio;

    /**
     * @ORM\Column(name="mes", type="integer")
     */
    private $mes;
    
    /**
     * @ORM\Column(name="dias", type="integer")
     */
    private $dias;        

    /**
     * @ORM\Column(name="fecha_desde", type="date")
     */
    private $fechaDesde;

    /**
     * @ORM\Column(name="fecha_hasta", type="date")
     */
    private $fechaHasta;    

    /**
     * @ORM\Column(name="ingreso_base_cotizacion", type="float")
     */
    private $ingresoBaseCotizacion;     
    

    /**
     * Get codigoNominaDetalleAuxiliarPk
     *
     * @return integer 
     */
    public function getCodigoNominaDetalleAuxiliarPk()
    {
        return $this->codigoNominaDetalleAuxiliarPk;
    }

    /**
     * Set codigoNominaFk
     *
     * @param string $codigoNominaFk
     * @return NominaDetalleAuxiliar
     */
    public function setCodigoNominaFk($codigoNominaFk)
    {
        $this->codigoNominaFk = $codigoNominaFk;

        return $this;
    }

    /**
     * Get codigoNominaFk
     *
     * @return string 
     */
    public function getCodigoNominaFk()
    {
        return $this->codigoNominaFk;
    }

    /**
     * Set anio
     *
     * @param integer $anio
     * @return NominaDetalleAuxiliar
     */
    public function setAnio($anio)
    {
        $this->anio = $anio;

        return $this;
    }

    /**
     * Get anio
     *
     * @return integer 
     */
    public function getAnio()
    {
        return $this->anio;
    }

    /**
     * Set mes
     *
     * @param integer $mes
     * @return NominaDetalleAuxiliar
     */
    public function setMes($mes)
    {
        $this->mes = $mes;

        return $this;
    }

    /**
     * Get mes
     *
     * @return integer 
     */
    public function getMes()
    {
        return $this->mes;
    }

    /**
     * Set dias
     *
     * @param integer $dias
     * @return NominaDetalleAuxiliar
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
     * Set fechaDesde
     *
     * @param \DateTime $fechaDesde
     * @return NominaDetalleAuxiliar
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
     * @return NominaDetalleAuxiliar
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
     * Set ingresoBaseCotizacion
     *
     * @param float $ingresoBaseCotizacion
     * @return NominaDetalleAuxiliar
     */
    public function setIngresoBaseCotizacion($ingresoBaseCotizacion)
    {
        $this->ingresoBaseCotizacion = $ingresoBaseCotizacion;

        return $this;
    }

    /**
     * Get ingresoBaseCotizacion
     *
     * @return float 
     */
    public function getIngresoBaseCotizacion()
    {
        return $this->ingresoBaseCotizacion;
    }

    /**
     * Set numeroIdentificacion
     *
     * @param string $numeroIdentificacion
     * @return NominaDetalleAuxiliar
     */
    public function setNumeroIdentificacion($numeroIdentificacion)
    {
        $this->numeroIdentificacion = $numeroIdentificacion;

        return $this;
    }

    /**
     * Get numeroIdentificacion
     *
     * @return string 
     */
    public function getNumeroIdentificacion()
    {
        return $this->numeroIdentificacion;
    }
}
