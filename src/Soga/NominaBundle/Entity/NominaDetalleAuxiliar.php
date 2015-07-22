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
     * @ORM\Column(name="vr_salario", type="float")
     */
    private $vrSalario; 
    
    /**
     * @ORM\Column(name="vr_suplementario", type="float")
     */
    private $vrSuplementario;    

    /**
     * @ORM\Column(name="vr_licencia", type="float")
     */
    private $vrLicencia; 
    
    /**
     * @ORM\Column(name="vr_incapacidad", type="float")
     */
    private $vrIncapacidad;

    /**
     * @ORM\Column(name="vr_adicional", type="float")
     */
    private $vrAdicional;    
    
    
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

    /**
     * Set ingresoBaseCotizacionAdicional
     *
     * @param float $ingresoBaseCotizacionAdicional
     * @return NominaDetalleAuxiliar
     */
    public function setIngresoBaseCotizacionAdicional($ingresoBaseCotizacionAdicional)
    {
        $this->ingresoBaseCotizacionAdicional = $ingresoBaseCotizacionAdicional;

        return $this;
    }

    /**
     * Get ingresoBaseCotizacionAdicional
     *
     * @return float 
     */
    public function getIngresoBaseCotizacionAdicional()
    {
        return $this->ingresoBaseCotizacionAdicional;
    }

    /**
     * Set vrSalario
     *
     * @param float $vrSalario
     * @return NominaDetalleAuxiliar
     */
    public function setVrSalario($vrSalario)
    {
        $this->vrSalario = $vrSalario;

        return $this;
    }

    /**
     * Get vrSalario
     *
     * @return float 
     */
    public function getVrSalario()
    {
        return $this->vrSalario;
    }

    /**
     * Set vrSuplementario
     *
     * @param float $vrSuplementario
     * @return NominaDetalleAuxiliar
     */
    public function setVrSuplementario($vrSuplementario)
    {
        $this->vrSuplementario = $vrSuplementario;

        return $this;
    }

    /**
     * Get vrSuplementario
     *
     * @return float 
     */
    public function getVrSuplementario()
    {
        return $this->vrSuplementario;
    }

    /**
     * Set vrLicencia
     *
     * @param float $vrLicencia
     * @return NominaDetalleAuxiliar
     */
    public function setVrLicencia($vrLicencia)
    {
        $this->vrLicencia = $vrLicencia;

        return $this;
    }

    /**
     * Get vrLicencia
     *
     * @return float 
     */
    public function getVrLicencia()
    {
        return $this->vrLicencia;
    }

    /**
     * Set vrIncapacidad
     *
     * @param float $vrIncapacidad
     * @return NominaDetalleAuxiliar
     */
    public function setVrIncapacidad($vrIncapacidad)
    {
        $this->vrIncapacidad = $vrIncapacidad;

        return $this;
    }

    /**
     * Get vrIncapacidad
     *
     * @return float 
     */
    public function getVrIncapacidad()
    {
        return $this->vrIncapacidad;
    }

    /**
     * Set vrAdicional
     *
     * @param float $vrAdicional
     * @return NominaDetalleAuxiliar
     */
    public function setVrAdicional($vrAdicional)
    {
        $this->vrAdicional = $vrAdicional;

        return $this;
    }

    /**
     * Get vrAdicional
     *
     * @return float 
     */
    public function getVrAdicional()
    {
        return $this->vrAdicional;
    }
}
