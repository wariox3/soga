<?php

namespace Soga\NominaBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Table(name="sso_periodo_empleado_contrato")
 * @ORM\Entity(repositoryClass="Soga\NominaBundle\Repository\SsoPeriodoEmpleadoContratoRepository")
 */
class SsoPeriodoEmpleadoContrato {

    /**
     * @ORM\Id
     * @ORM\Column(name="codigo_periodo_empleado_contrato_pk", type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $codigoPeriodoEmpleadoContratoPk;  
    
    /**
     * @ORM\Column(name="codigo_periodo_detalle_fk", type="integer")
     */    
    private $codigoPeriodoDetalleFk;             
    
    /**
     * @ORM\Column(name="codigo_empleado_fk", type="string", length=5)
     */    
    private $codigoEmpleadoFk;      
    
    /**
     * @ORM\Column(name="numero_identificacion", type="string", length=11)
     */    
    private $numeroIdentificacion;           
    
    /**
     * @ORM\Column(name="codigo_contrato_fk", type="string", length=5)
     */    
    private $codigoContratoFk;

    /**
     * @ORM\Column(name="vr_salario", type="float")
     */    
    private $vrSalario = 0;    
    
    /**
     * @ORM\Column(name="fecha_desde", type="date")
     */
    private $fechaDesde;

    /**
     * @ORM\Column(name="fecha_hasta", type="date")
     */
    private $fechaHasta;    
    
    /**
     * @ORM\Column(name="dias_incapacidad_general", type="integer")
     */    
    private $diasIncapacidadGeneral = 0;    

    /**
     * @ORM\Column(name="dias_incapacidad_laboral", type="integer")
     */    
    private $diasIncapacidadLaboral = 0;     
    
    /**
     * @ORM\Column(name="dias", type="integer")
     */    
    private $dias = 0;    
    
    /**
     * @ORM\Column(name="vr_tiempo_suplementario", type="float")
     */
    private $vrTiempoSuplementario;     
    
    /**
     * @ORM\Column(name="variacion_permanente_salario", type="string", length=1)
     */    
    private $variacionPermanenteSalario;    

    /**
     * @ORM\Column(name="ingreso", type="string", length=1)
     */    
    private $ingreso;    

    /**
     * @ORM\Column(name="retiro", type="string", length=1)
     */    
    private $retiro;        
    
    /**
     * @ORM\Column(name="codigo_caja_fk", type="integer")
     */    
    private $codigoCajaFk;    
    
    /**
     * Get codigoPeriodoEmpleadoContratoPk
     *
     * @return integer 
     */
    public function getCodigoPeriodoEmpleadoContratoPk()
    {
        return $this->codigoPeriodoEmpleadoContratoPk;
    }

    /**
     * Set codigoPeriodoDetalleFk
     *
     * @param integer $codigoPeriodoDetalleFk
     * @return SsoPeriodoEmpleadoContrato
     */
    public function setCodigoPeriodoDetalleFk($codigoPeriodoDetalleFk)
    {
        $this->codigoPeriodoDetalleFk = $codigoPeriodoDetalleFk;

        return $this;
    }

    /**
     * Get codigoPeriodoDetalleFk
     *
     * @return integer 
     */
    public function getCodigoPeriodoDetalleFk()
    {
        return $this->codigoPeriodoDetalleFk;
    }

    /**
     * Set codigoEmpleadoFk
     *
     * @param string $codigoEmpleadoFk
     * @return SsoPeriodoEmpleadoContrato
     */
    public function setCodigoEmpleadoFk($codigoEmpleadoFk)
    {
        $this->codigoEmpleadoFk = $codigoEmpleadoFk;

        return $this;
    }

    /**
     * Get codigoEmpleadoFk
     *
     * @return string 
     */
    public function getCodigoEmpleadoFk()
    {
        return $this->codigoEmpleadoFk;
    }

    /**
     * Set numeroIdentificacion
     *
     * @param string $numeroIdentificacion
     * @return SsoPeriodoEmpleadoContrato
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
     * Set codigoContratoFk
     *
     * @param string $codigoContratoFk
     * @return SsoPeriodoEmpleadoContrato
     */
    public function setCodigoContratoFk($codigoContratoFk)
    {
        $this->codigoContratoFk = $codigoContratoFk;

        return $this;
    }

    /**
     * Get codigoContratoFk
     *
     * @return string 
     */
    public function getCodigoContratoFk()
    {
        return $this->codigoContratoFk;
    }

    /**
     * Set fechaDesde
     *
     * @param \DateTime $fechaDesde
     * @return SsoPeriodoEmpleadoContrato
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
     * @return SsoPeriodoEmpleadoContrato
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
     * Set vrSalario
     *
     * @param float $vrSalario
     * @return SsoPeriodoEmpleadoContrato
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
     * Set diasIncapacidadGeneral
     *
     * @param integer $diasIncapacidadGeneral
     * @return SsoPeriodoEmpleadoContrato
     */
    public function setDiasIncapacidadGeneral($diasIncapacidadGeneral)
    {
        $this->diasIncapacidadGeneral = $diasIncapacidadGeneral;

        return $this;
    }

    /**
     * Get diasIncapacidadGeneral
     *
     * @return integer 
     */
    public function getDiasIncapacidadGeneral()
    {
        return $this->diasIncapacidadGeneral;
    }

    /**
     * Set diasIncapacidadLaboral
     *
     * @param integer $diasIncapacidadLaboral
     * @return SsoPeriodoEmpleadoContrato
     */
    public function setDiasIncapacidadLaboral($diasIncapacidadLaboral)
    {
        $this->diasIncapacidadLaboral = $diasIncapacidadLaboral;

        return $this;
    }

    /**
     * Get diasIncapacidadLaboral
     *
     * @return integer 
     */
    public function getDiasIncapacidadLaboral()
    {
        return $this->diasIncapacidadLaboral;
    }

    /**
     * Set dias
     *
     * @param integer $dias
     * @return SsoPeriodoEmpleadoContrato
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
     * Set vrTiempoSuplementario
     *
     * @param float $vrTiempoSuplementario
     * @return SsoPeriodoEmpleadoContrato
     */
    public function setVrTiempoSuplementario($vrTiempoSuplementario)
    {
        $this->vrTiempoSuplementario = $vrTiempoSuplementario;

        return $this;
    }

    /**
     * Get vrTiempoSuplementario
     *
     * @return float 
     */
    public function getVrTiempoSuplementario()
    {
        return $this->vrTiempoSuplementario;
    }

    /**
     * Set variacionPermanenteSalario
     *
     * @param string $variacionPermanenteSalario
     * @return SsoPeriodoEmpleadoContrato
     */
    public function setVariacionPermanenteSalario($variacionPermanenteSalario)
    {
        $this->variacionPermanenteSalario = $variacionPermanenteSalario;

        return $this;
    }

    /**
     * Get variacionPermanenteSalario
     *
     * @return string 
     */
    public function getVariacionPermanenteSalario()
    {
        return $this->variacionPermanenteSalario;
    }

    /**
     * Set ingreso
     *
     * @param string $ingreso
     * @return SsoPeriodoEmpleadoContrato
     */
    public function setIngreso($ingreso)
    {
        $this->ingreso = $ingreso;

        return $this;
    }

    /**
     * Get ingreso
     *
     * @return string 
     */
    public function getIngreso()
    {
        return $this->ingreso;
    }

    /**
     * Set retiro
     *
     * @param string $retiro
     * @return SsoPeriodoEmpleadoContrato
     */
    public function setRetiro($retiro)
    {
        $this->retiro = $retiro;

        return $this;
    }

    /**
     * Get retiro
     *
     * @return string 
     */
    public function getRetiro()
    {
        return $this->retiro;
    }

    /**
     * Set codigoCajaFk
     *
     * @param integer $codigoCajaFk
     * @return SsoPeriodoEmpleadoContrato
     */
    public function setCodigoCajaFk($codigoCajaFk)
    {
        $this->codigoCajaFk = $codigoCajaFk;

        return $this;
    }

    /**
     * Get codigoCajaFk
     *
     * @return integer 
     */
    public function getCodigoCajaFk()
    {
        return $this->codigoCajaFk;
    }
}
