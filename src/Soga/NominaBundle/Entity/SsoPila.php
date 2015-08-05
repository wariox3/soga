<?php

namespace Soga\NominaBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Table(name="sso_pila")
 * @ORM\Entity(repositoryClass="Soga\NominaBundle\Repository\SsoPilaRepository")
 */
class SsoPila {

    /**
     * @ORM\Id
     * @ORM\Column(name="codigo_pila_pk", type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $codigoPilaPk;

    /**
     * @ORM\Column(name="codigo_contrato_fk", type="string", length=6)
     */
    private $codigoContratoFk;     
    
    /**
     * @ORM\Column(name="codigo_periodo_fk", type="integer")
     */
    private $codigoPeriodoFk;    
    
    /**
     * @ORM\Column(name="codigo_periodo_detalle_fk", type="integer")
     */
    private $codigoPeriodoDetalleFk;

    /**
     * @ORM\Column(name="codigo_sucursal_fk", type="integer")
     */
    private $codigoSucursalFk;    
    
    /**
     * @ORM\Column(name="codigo_empleado_fk", type="string", length=5)
     */
    private $codigoEmpleadoFk;    
    
    /**
     * @ORM\Column(name="numero_identificacion", type="string", length=16)
     */
    private $numeroIdentificacion;    
    
    /**
     * @ORM\Column(name="tipo_registro", type="string", length=2)
     */
    private $tipoRegistro;
    
    /**
     * @ORM\Column(name="secuencia", type="string", length=5)
     */
    private $secuencia; 
    
    /**
     * @ORM\Column(name="tipo_documento", type="string", length=2)
     */
    private $tipoDocumento;    
    
    /**
     * @ORM\Column(name="tipo", type="string", length=2)
     */
    private $tipo;

    /**
     * @ORM\Column(name="subtipo", type="string", length=2)
     */
    private $subtipo;    

    /**
     * @ORM\Column(name="extranjero_no_obligado_cotizar_pensiones", type="string", length=1)
     */
    private $extranjeroNoObligadoCotizarPensiones;    
    
    /**
     * @ORM\Column(name="colombiano_residente_exterior", type="string", length=1)
     */
    private $colombianoResidenteExterior;
   
    /**
     * @ORM\Column(name="codigo_departamento", type="string", length=2)
     */
    private $codigoDepartamento;
    
    /**
     * @ORM\Column(name="codigo_municipio", type="string", length=3)
     */
    private $codigoMunicipio;    

    /**
     * @ORM\Column(name="primer_nombre", type="string", length=20)
     */
    private $primerNombre;     

    /**
     * @ORM\Column(name="segundo_nombre", type="string", length=30)
     */
    private $segundoNombre;    
    
    /**
     * @ORM\Column(name="primer_apellido", type="string", length=20)
     */
    private $primerApellido;

    /**
     * @ORM\Column(name="segundo_apellido", type="string", length=30)
     */
    private $segundoApellido;    

    /**
     * @ORM\Column(name="ingreso", type="string", length=1)
     */
    private $ingreso;    

    /**
     * @ORM\Column(name="retiro", type="string", length=1)
     */
    private $retiro;    
    
    /**
     * @ORM\Column(name="traslado_desde_otra_eps", type="string", length=1)
     */
    private $trasladoDesdeOtraEps;

    /**
     * @ORM\Column(name="traslado_a_otra_eps", type="string", length=1)
     */
    private $trasladoAOtraEps;    
    
    /**
     * @ORM\Column(name="traslado_desde_otra_pension", type="string", length=1)
     */
    private $trasladoDesdeOtraPension;

    /**
     * @ORM\Column(name="traslado_a_otra_pension", type="string", length=1)
     */
    private $trasladoAOtraPension;    

    /**
     * @ORM\Column(name="variacion_permanente_salario", type="string", length=1)
     */
    private $variacionPermanenteSalario;    
    
    /**
     * @ORM\Column(name="correcciones", type="string", length=1)
     */
    private $correcciones; 
    
    /**
     * @ORM\Column(name="variacion_transitoria_salario", type="string", length=1)
     */
    private $variacionTransitoriaSalario;      
    
    /**
     * @ORM\Column(name="suspension_temporal_contrato_licencia_servicios", type="string", length=1)
     */
    private $suspensionTemporalContratoLicenciaServicios;
    
    /**
     * @ORM\Column(name="dias_licencia_no_remunerada", type="integer")
     */
    private $diasLicenciaNoRemunerada = 0;    
    
    /**
     * @ORM\Column(name="incapacidad_general", type="string", length=1)
     */
    private $incapacidadGeneral;    
    
    /**
     * @ORM\Column(name="dias_incapacidad", type="integer")
     */
    private $diasIncapacidad;    
    
    /**
     * @ORM\Column(name="licencia_maternidad", type="string", length=1)
     */
    private $licenciaMaternidad;        

    /**
     * @ORM\Column(name="dias_licencia_maternidad", type="integer")
     */
    private $diasLicenciaMaternidad;    
    
    /**
     * @ORM\Column(name="vacaciones", type="string", length=1)
     */
    private $vacaciones;    

    /**
     * @ORM\Column(name="aporte_voluntario", type="string", length=1)
     */
    private $aporteVoluntario;     

    /**
     * @ORM\Column(name="variacion_centros_trabajo", type="string", length=1)
     */
    private $variacionCentrosTrabajo;         
    
    /**
     * @ORM\Column(name="incapacidad_accidente_trabajo_enfermedad_profesional", type="integer")
     */
    private $incapacidadAccidenteTrabajoEnfermedadProfesional;     
    
    /**
     * @ORM\Column(name="codigo_entidad_pension_pertenece", type="string", length=6)
     */
    private $codigoEntidadPensionPertenece;     
    
    /**
     * @ORM\Column(name="codigo_entidad_pension_traslada", type="string", length=6)
     */
    private $codigoEntidadPensionTraslada;    
    
    /**
     * @ORM\Column(name="codigo_entidad_salud_pertenece", type="string", length=6)
     */
    private $codigoEntidadSaludPertenece;     
    
    /**
     * @ORM\Column(name="codigo_entidad_salud_traslada", type="string", length=6)
     */
    private $codigoEntidadSaludTraslada;     

    /**
     * @ORM\Column(name="codigo_entidad_caja_pertenece", type="string", length=6)
     */
    private $codigoEntidadCajaPertenece;       

    /**
     * @ORM\Column(name="dias_cotizados_pension", type="integer")
     */
    private $diasCotizadosPension;
    
    /**
     * @ORM\Column(name="dias_cotizados_salud", type="integer")
     */
    private $diasCotizadosSalud;    

    /**
     * @ORM\Column(name="dias_cotizados_riesgos_profesionales", type="integer")
     */
    private $diasCotizadosRiesgosProfesionales;    
        
    /**
     * @ORM\Column(name="dias_cotizados_caja_compensacion", type="integer")
     */
    private $diasCotizadosCajaCompensacion;    
    
    /**
     * @ORM\Column(name="salario_basico", type="float")
     */
    private $salarioBasico;
    
    /**
     * @ORM\Column(name="salario_integral", type="string", length=1)
     */
    private $salarioIntegral;    
    
    /**
     * @ORM\Column(name="tiempo_suplementario", type="float")
     */
    private $tiempoSuplementario;    
    
    /**
     * @ORM\Column(name="ibc_pension", type="float")
     */
    private $ibcPension;     

    /**
     * @ORM\Column(name="ibc_salud", type="float")
     */
    private $ibcSalud;    
    
    /**
     * @ORM\Column(name="ibc_riesgos_profesionales", type="float")
     */
    private $ibcRiesgosProfesionales;    
    
    /**
     * @ORM\Column(name="ibc_caja", type="float")
     */
    private $ibcCaja;    

    /**
     * @ORM\Column(name="tarifa_aportes_pensiones", type="string", length=7)
     */
    private $tarifaAportesPensiones;    
    
    /**
     * @ORM\Column(name="cotizacion_obligatoria", type="float")
     */
    private $cotizacionObligatoria;    
    
    /**
     * @ORM\Column(name="aporte_voluntario_fondo_pensiones_obligatorias", type="string", length=9)
     */
    private $aporteVoluntarioFondoPensionesObligatorias;    
    
    /**
     * @ORM\Column(name="cotizacion_voluntario_fondo_pensiones_obligatorias", type="string", length=9)
     */
    private $cotizacionVoluntarioFondoPensionesObligatorias;    
    
    /**
     * @ORM\Column(name="total_cotizacion", type="float")
     */
    private $totalCotizacion;    

    /**
     * @ORM\Column(name="aportes_fondo_solidaridad_pensional_solidaridad", type="float")
     */
    private $aportesFondoSolidaridadPensionalSolidaridad;    
    
    /**
     * @ORM\Column(name="aportes_fondo_solidaridad_pensional_subsistencia", type="float")
     */
    private $aportesFondoSolidaridadPensionalSubsistencia;     

    /**
     * @ORM\Column(name="valor_no_retenido_aportes_voluntarios", type="string", length=9)
     */
    private $valorNoRetenidoAportesVoluntarios;        
    
    /**
     * @ORM\Column(name="tarifa_aportes_salud", type="string", length=7)
     */
    private $tarifaAportesSalud;    

    /**
     * @ORM\Column(name="cotizacion_obligatoria_salud", type="float")
     */
    private $cotizacionObligatoriaSalud;        
    
    /**
     * @ORM\Column(name="valor_upc_adicional", type="string", length=9)
     */
    private $valorUpcAdicional;
    
    /**
     * @ORM\Column(name="numero_autorizacion_incapacidad_enfermedad_general", type="string", length=15)
     */
    private $numeroAutorizacionIncapacidadEnfermedadGeneral;    

    /**
     * @ORM\Column(name="valor_incapacidad_enfermedad_general", type="string", length=9)
     */
    private $valorIncapacidadEnfermedadGeneral;    
    
    /**
     * @ORM\Column(name="numero_autorizacion_licencia_maternidad_paternidad", type="string", length=15)
     */
    private $numeroAutorizacionLicenciaMaternidadPaternidad;    

    /**
     * @ORM\Column(name="valor_licencia_maternidad_paternidad", type="string", length=9)
     */
    private $valorLicenciaMaternidadPaternidad;     
    
    /**
     * @ORM\Column(name="tarifa_aportes_riesgos_profesionales", type="string", length=9)
     */
    private $tarifaAportesRiesgosProfesionales;    
    
    /**
     * @ORM\Column(name="centro_trabajo_codigo_ct", type="string", length=9)
     */
    private $centroTrabajoCodigoCt; 
    
    /**
     * @ORM\Column(name="cotizacion_obligatoria_riesgos", type="float")
     */
    private $cotizacionObligatoriaRiesgos;   
    
    /**
     * @ORM\Column(name="tarifa_aportes_ccf", type="string", length=7)
     */
    private $tarifaAportesCCF;     

    /**
     * @ORM\Column(name="valor_aporte_ccf", type="float")
     */
    private $valorAporteCCF;
    
    /**
     * @ORM\Column(name="tarifa_aportes_sena", type="string", length=7)
     */
    private $tarifaAportesSENA;    
    
    /**
     * @ORM\Column(name="valor_aportes_sena", type="string", length=9)
     */
    private $valorAportesSENA;
    
    /**
     * @ORM\Column(name="tarifa_aportes_icbf", type="string", length=7)
     */
    private $tarifaAportesICBF;
    
    /**
     * @ORM\Column(name="valor_aporte_icbf", type="string", length=9)
     */
    private $valorAporteICBF;
    
    /**
     * @ORM\Column(name="tarifa_aportes_esap", type="string", length=7)
     */
    private $tarifaAportesESAP;    
 
    /**
     * @ORM\Column(name="valor_aporte_esap", type="string", length=9)
     */
    private $valorAporteESAP;  
    
    /**
     * @ORM\Column(name="tarifa_aportes_men", type="string", length=7)
     */
    private $TarifaAportesMEN;
    
    /**
     * @ORM\Column(name="valor_aporte_men", type="string", length=9)
     */
    private $valorAporteMEN;    
    
    /**
     * @ORM\Column(name="tipo_documento_responsable_upc", type="string", length=2)
     */
    private $tipoDocumentoResponsableUPC;
    
    /**
     * @ORM\Column(name="numero_identificacion_responsable_upc_adicional", type="string", length=16)
     */
    private $numeroIdentificacionResponsableUPCAdicional;    
    
    /**
     * @ORM\Column(name="cotizante_exonerado_pago_aporte_parafiscales_salud", type="string", length=1)
     */
    private $cotizanteExoneradoPagoAporteParafiscalesSalud; 
    
    /**
     * @ORM\Column(name="codigo_administradora_riesgos_laborales", type="string", length=6)
     */
    private $codigoAdministradoraRiesgosLaborales; 
    
    /**
     * @ORM\Column(name="clase_riesgo_afiliado", type="string", length=1)
     */
    private $claseRiesgoAfiliado;     
      
    /**
     * @ORM\Column(name="valor_total_cotizacion", type="float")
     */
    private $valorTotalCotizacion;    
    

    

    /**
     * Get codigoPilaPk
     *
     * @return integer 
     */
    public function getCodigoPilaPk()
    {
        return $this->codigoPilaPk;
    }

    /**
     * Set codigoContratoFk
     *
     * @param string $codigoContratoFk
     * @return SsoPila
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
     * Set codigoPeriodoFk
     *
     * @param integer $codigoPeriodoFk
     * @return SsoPila
     */
    public function setCodigoPeriodoFk($codigoPeriodoFk)
    {
        $this->codigoPeriodoFk = $codigoPeriodoFk;

        return $this;
    }

    /**
     * Get codigoPeriodoFk
     *
     * @return integer 
     */
    public function getCodigoPeriodoFk()
    {
        return $this->codigoPeriodoFk;
    }

    /**
     * Set codigoPeriodoDetalleFk
     *
     * @param integer $codigoPeriodoDetalleFk
     * @return SsoPila
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
     * Set codigoSucursalFk
     *
     * @param integer $codigoSucursalFk
     * @return SsoPila
     */
    public function setCodigoSucursalFk($codigoSucursalFk)
    {
        $this->codigoSucursalFk = $codigoSucursalFk;

        return $this;
    }

    /**
     * Get codigoSucursalFk
     *
     * @return integer 
     */
    public function getCodigoSucursalFk()
    {
        return $this->codigoSucursalFk;
    }

    /**
     * Set codigoEmpleadoFk
     *
     * @param string $codigoEmpleadoFk
     * @return SsoPila
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
     * @return SsoPila
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
     * Set tipoRegistro
     *
     * @param string $tipoRegistro
     * @return SsoPila
     */
    public function setTipoRegistro($tipoRegistro)
    {
        $this->tipoRegistro = $tipoRegistro;

        return $this;
    }

    /**
     * Get tipoRegistro
     *
     * @return string 
     */
    public function getTipoRegistro()
    {
        return $this->tipoRegistro;
    }

    /**
     * Set secuencia
     *
     * @param string $secuencia
     * @return SsoPila
     */
    public function setSecuencia($secuencia)
    {
        $this->secuencia = $secuencia;

        return $this;
    }

    /**
     * Get secuencia
     *
     * @return string 
     */
    public function getSecuencia()
    {
        return $this->secuencia;
    }

    /**
     * Set tipoDocumento
     *
     * @param string $tipoDocumento
     * @return SsoPila
     */
    public function setTipoDocumento($tipoDocumento)
    {
        $this->tipoDocumento = $tipoDocumento;

        return $this;
    }

    /**
     * Get tipoDocumento
     *
     * @return string 
     */
    public function getTipoDocumento()
    {
        return $this->tipoDocumento;
    }

    /**
     * Set tipo
     *
     * @param string $tipo
     * @return SsoPila
     */
    public function setTipo($tipo)
    {
        $this->tipo = $tipo;

        return $this;
    }

    /**
     * Get tipo
     *
     * @return string 
     */
    public function getTipo()
    {
        return $this->tipo;
    }

    /**
     * Set subtipo
     *
     * @param string $subtipo
     * @return SsoPila
     */
    public function setSubtipo($subtipo)
    {
        $this->subtipo = $subtipo;

        return $this;
    }

    /**
     * Get subtipo
     *
     * @return string 
     */
    public function getSubtipo()
    {
        return $this->subtipo;
    }

    /**
     * Set extranjeroNoObligadoCotizarPensiones
     *
     * @param string $extranjeroNoObligadoCotizarPensiones
     * @return SsoPila
     */
    public function setExtranjeroNoObligadoCotizarPensiones($extranjeroNoObligadoCotizarPensiones)
    {
        $this->extranjeroNoObligadoCotizarPensiones = $extranjeroNoObligadoCotizarPensiones;

        return $this;
    }

    /**
     * Get extranjeroNoObligadoCotizarPensiones
     *
     * @return string 
     */
    public function getExtranjeroNoObligadoCotizarPensiones()
    {
        return $this->extranjeroNoObligadoCotizarPensiones;
    }

    /**
     * Set colombianoResidenteExterior
     *
     * @param string $colombianoResidenteExterior
     * @return SsoPila
     */
    public function setColombianoResidenteExterior($colombianoResidenteExterior)
    {
        $this->colombianoResidenteExterior = $colombianoResidenteExterior;

        return $this;
    }

    /**
     * Get colombianoResidenteExterior
     *
     * @return string 
     */
    public function getColombianoResidenteExterior()
    {
        return $this->colombianoResidenteExterior;
    }

    /**
     * Set codigoDepartamento
     *
     * @param string $codigoDepartamento
     * @return SsoPila
     */
    public function setCodigoDepartamento($codigoDepartamento)
    {
        $this->codigoDepartamento = $codigoDepartamento;

        return $this;
    }

    /**
     * Get codigoDepartamento
     *
     * @return string 
     */
    public function getCodigoDepartamento()
    {
        return $this->codigoDepartamento;
    }

    /**
     * Set codigoMunicipio
     *
     * @param string $codigoMunicipio
     * @return SsoPila
     */
    public function setCodigoMunicipio($codigoMunicipio)
    {
        $this->codigoMunicipio = $codigoMunicipio;

        return $this;
    }

    /**
     * Get codigoMunicipio
     *
     * @return string 
     */
    public function getCodigoMunicipio()
    {
        return $this->codigoMunicipio;
    }

    /**
     * Set primerNombre
     *
     * @param string $primerNombre
     * @return SsoPila
     */
    public function setPrimerNombre($primerNombre)
    {
        $this->primerNombre = $primerNombre;

        return $this;
    }

    /**
     * Get primerNombre
     *
     * @return string 
     */
    public function getPrimerNombre()
    {
        return $this->primerNombre;
    }

    /**
     * Set segundoNombre
     *
     * @param string $segundoNombre
     * @return SsoPila
     */
    public function setSegundoNombre($segundoNombre)
    {
        $this->segundoNombre = $segundoNombre;

        return $this;
    }

    /**
     * Get segundoNombre
     *
     * @return string 
     */
    public function getSegundoNombre()
    {
        return $this->segundoNombre;
    }

    /**
     * Set primerApellido
     *
     * @param string $primerApellido
     * @return SsoPila
     */
    public function setPrimerApellido($primerApellido)
    {
        $this->primerApellido = $primerApellido;

        return $this;
    }

    /**
     * Get primerApellido
     *
     * @return string 
     */
    public function getPrimerApellido()
    {
        return $this->primerApellido;
    }

    /**
     * Set segundoApellido
     *
     * @param string $segundoApellido
     * @return SsoPila
     */
    public function setSegundoApellido($segundoApellido)
    {
        $this->segundoApellido = $segundoApellido;

        return $this;
    }

    /**
     * Get segundoApellido
     *
     * @return string 
     */
    public function getSegundoApellido()
    {
        return $this->segundoApellido;
    }

    /**
     * Set ingreso
     *
     * @param string $ingreso
     * @return SsoPila
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
     * @return SsoPila
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
     * Set trasladoDesdeOtraEps
     *
     * @param string $trasladoDesdeOtraEps
     * @return SsoPila
     */
    public function setTrasladoDesdeOtraEps($trasladoDesdeOtraEps)
    {
        $this->trasladoDesdeOtraEps = $trasladoDesdeOtraEps;

        return $this;
    }

    /**
     * Get trasladoDesdeOtraEps
     *
     * @return string 
     */
    public function getTrasladoDesdeOtraEps()
    {
        return $this->trasladoDesdeOtraEps;
    }

    /**
     * Set trasladoAOtraEps
     *
     * @param string $trasladoAOtraEps
     * @return SsoPila
     */
    public function setTrasladoAOtraEps($trasladoAOtraEps)
    {
        $this->trasladoAOtraEps = $trasladoAOtraEps;

        return $this;
    }

    /**
     * Get trasladoAOtraEps
     *
     * @return string 
     */
    public function getTrasladoAOtraEps()
    {
        return $this->trasladoAOtraEps;
    }

    /**
     * Set trasladoDesdeOtraPension
     *
     * @param string $trasladoDesdeOtraPension
     * @return SsoPila
     */
    public function setTrasladoDesdeOtraPension($trasladoDesdeOtraPension)
    {
        $this->trasladoDesdeOtraPension = $trasladoDesdeOtraPension;

        return $this;
    }

    /**
     * Get trasladoDesdeOtraPension
     *
     * @return string 
     */
    public function getTrasladoDesdeOtraPension()
    {
        return $this->trasladoDesdeOtraPension;
    }

    /**
     * Set trasladoAOtraPension
     *
     * @param string $trasladoAOtraPension
     * @return SsoPila
     */
    public function setTrasladoAOtraPension($trasladoAOtraPension)
    {
        $this->trasladoAOtraPension = $trasladoAOtraPension;

        return $this;
    }

    /**
     * Get trasladoAOtraPension
     *
     * @return string 
     */
    public function getTrasladoAOtraPension()
    {
        return $this->trasladoAOtraPension;
    }

    /**
     * Set variacionPermanenteSalario
     *
     * @param string $variacionPermanenteSalario
     * @return SsoPila
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
     * Set correcciones
     *
     * @param string $correcciones
     * @return SsoPila
     */
    public function setCorrecciones($correcciones)
    {
        $this->correcciones = $correcciones;

        return $this;
    }

    /**
     * Get correcciones
     *
     * @return string 
     */
    public function getCorrecciones()
    {
        return $this->correcciones;
    }

    /**
     * Set variacionTransitoriaSalario
     *
     * @param string $variacionTransitoriaSalario
     * @return SsoPila
     */
    public function setVariacionTransitoriaSalario($variacionTransitoriaSalario)
    {
        $this->variacionTransitoriaSalario = $variacionTransitoriaSalario;

        return $this;
    }

    /**
     * Get variacionTransitoriaSalario
     *
     * @return string 
     */
    public function getVariacionTransitoriaSalario()
    {
        return $this->variacionTransitoriaSalario;
    }

    /**
     * Set suspensionTemporalContratoLicenciaServicios
     *
     * @param string $suspensionTemporalContratoLicenciaServicios
     * @return SsoPila
     */
    public function setSuspensionTemporalContratoLicenciaServicios($suspensionTemporalContratoLicenciaServicios)
    {
        $this->suspensionTemporalContratoLicenciaServicios = $suspensionTemporalContratoLicenciaServicios;

        return $this;
    }

    /**
     * Get suspensionTemporalContratoLicenciaServicios
     *
     * @return string 
     */
    public function getSuspensionTemporalContratoLicenciaServicios()
    {
        return $this->suspensionTemporalContratoLicenciaServicios;
    }

    /**
     * Set diasLicenciaNoRemunerada
     *
     * @param integer $diasLicenciaNoRemunerada
     * @return SsoPila
     */
    public function setDiasLicenciaNoRemunerada($diasLicenciaNoRemunerada)
    {
        $this->diasLicenciaNoRemunerada = $diasLicenciaNoRemunerada;

        return $this;
    }

    /**
     * Get diasLicenciaNoRemunerada
     *
     * @return integer 
     */
    public function getDiasLicenciaNoRemunerada()
    {
        return $this->diasLicenciaNoRemunerada;
    }

    /**
     * Set incapacidadGeneral
     *
     * @param string $incapacidadGeneral
     * @return SsoPila
     */
    public function setIncapacidadGeneral($incapacidadGeneral)
    {
        $this->incapacidadGeneral = $incapacidadGeneral;

        return $this;
    }

    /**
     * Get incapacidadGeneral
     *
     * @return string 
     */
    public function getIncapacidadGeneral()
    {
        return $this->incapacidadGeneral;
    }

    /**
     * Set diasIncapacidad
     *
     * @param integer $diasIncapacidad
     * @return SsoPila
     */
    public function setDiasIncapacidad($diasIncapacidad)
    {
        $this->diasIncapacidad = $diasIncapacidad;

        return $this;
    }

    /**
     * Get diasIncapacidad
     *
     * @return integer 
     */
    public function getDiasIncapacidad()
    {
        return $this->diasIncapacidad;
    }

    /**
     * Set licenciaMaternidad
     *
     * @param string $licenciaMaternidad
     * @return SsoPila
     */
    public function setLicenciaMaternidad($licenciaMaternidad)
    {
        $this->licenciaMaternidad = $licenciaMaternidad;

        return $this;
    }

    /**
     * Get licenciaMaternidad
     *
     * @return string 
     */
    public function getLicenciaMaternidad()
    {
        return $this->licenciaMaternidad;
    }

    /**
     * Set diasLicenciaMaternidad
     *
     * @param integer $diasLicenciaMaternidad
     * @return SsoPila
     */
    public function setDiasLicenciaMaternidad($diasLicenciaMaternidad)
    {
        $this->diasLicenciaMaternidad = $diasLicenciaMaternidad;

        return $this;
    }

    /**
     * Get diasLicenciaMaternidad
     *
     * @return integer 
     */
    public function getDiasLicenciaMaternidad()
    {
        return $this->diasLicenciaMaternidad;
    }

    /**
     * Set vacaciones
     *
     * @param string $vacaciones
     * @return SsoPila
     */
    public function setVacaciones($vacaciones)
    {
        $this->vacaciones = $vacaciones;

        return $this;
    }

    /**
     * Get vacaciones
     *
     * @return string 
     */
    public function getVacaciones()
    {
        return $this->vacaciones;
    }

    /**
     * Set aporteVoluntario
     *
     * @param string $aporteVoluntario
     * @return SsoPila
     */
    public function setAporteVoluntario($aporteVoluntario)
    {
        $this->aporteVoluntario = $aporteVoluntario;

        return $this;
    }

    /**
     * Get aporteVoluntario
     *
     * @return string 
     */
    public function getAporteVoluntario()
    {
        return $this->aporteVoluntario;
    }

    /**
     * Set variacionCentrosTrabajo
     *
     * @param string $variacionCentrosTrabajo
     * @return SsoPila
     */
    public function setVariacionCentrosTrabajo($variacionCentrosTrabajo)
    {
        $this->variacionCentrosTrabajo = $variacionCentrosTrabajo;

        return $this;
    }

    /**
     * Get variacionCentrosTrabajo
     *
     * @return string 
     */
    public function getVariacionCentrosTrabajo()
    {
        return $this->variacionCentrosTrabajo;
    }

    /**
     * Set incapacidadAccidenteTrabajoEnfermedadProfesional
     *
     * @param integer $incapacidadAccidenteTrabajoEnfermedadProfesional
     * @return SsoPila
     */
    public function setIncapacidadAccidenteTrabajoEnfermedadProfesional($incapacidadAccidenteTrabajoEnfermedadProfesional)
    {
        $this->incapacidadAccidenteTrabajoEnfermedadProfesional = $incapacidadAccidenteTrabajoEnfermedadProfesional;

        return $this;
    }

    /**
     * Get incapacidadAccidenteTrabajoEnfermedadProfesional
     *
     * @return integer 
     */
    public function getIncapacidadAccidenteTrabajoEnfermedadProfesional()
    {
        return $this->incapacidadAccidenteTrabajoEnfermedadProfesional;
    }

    /**
     * Set codigoEntidadPensionPertenece
     *
     * @param string $codigoEntidadPensionPertenece
     * @return SsoPila
     */
    public function setCodigoEntidadPensionPertenece($codigoEntidadPensionPertenece)
    {
        $this->codigoEntidadPensionPertenece = $codigoEntidadPensionPertenece;

        return $this;
    }

    /**
     * Get codigoEntidadPensionPertenece
     *
     * @return string 
     */
    public function getCodigoEntidadPensionPertenece()
    {
        return $this->codigoEntidadPensionPertenece;
    }

    /**
     * Set codigoEntidadPensionTraslada
     *
     * @param string $codigoEntidadPensionTraslada
     * @return SsoPila
     */
    public function setCodigoEntidadPensionTraslada($codigoEntidadPensionTraslada)
    {
        $this->codigoEntidadPensionTraslada = $codigoEntidadPensionTraslada;

        return $this;
    }

    /**
     * Get codigoEntidadPensionTraslada
     *
     * @return string 
     */
    public function getCodigoEntidadPensionTraslada()
    {
        return $this->codigoEntidadPensionTraslada;
    }

    /**
     * Set codigoEntidadSaludPertenece
     *
     * @param string $codigoEntidadSaludPertenece
     * @return SsoPila
     */
    public function setCodigoEntidadSaludPertenece($codigoEntidadSaludPertenece)
    {
        $this->codigoEntidadSaludPertenece = $codigoEntidadSaludPertenece;

        return $this;
    }

    /**
     * Get codigoEntidadSaludPertenece
     *
     * @return string 
     */
    public function getCodigoEntidadSaludPertenece()
    {
        return $this->codigoEntidadSaludPertenece;
    }

    /**
     * Set codigoEntidadSaludTraslada
     *
     * @param string $codigoEntidadSaludTraslada
     * @return SsoPila
     */
    public function setCodigoEntidadSaludTraslada($codigoEntidadSaludTraslada)
    {
        $this->codigoEntidadSaludTraslada = $codigoEntidadSaludTraslada;

        return $this;
    }

    /**
     * Get codigoEntidadSaludTraslada
     *
     * @return string 
     */
    public function getCodigoEntidadSaludTraslada()
    {
        return $this->codigoEntidadSaludTraslada;
    }

    /**
     * Set codigoEntidadCajaPertenece
     *
     * @param string $codigoEntidadCajaPertenece
     * @return SsoPila
     */
    public function setCodigoEntidadCajaPertenece($codigoEntidadCajaPertenece)
    {
        $this->codigoEntidadCajaPertenece = $codigoEntidadCajaPertenece;

        return $this;
    }

    /**
     * Get codigoEntidadCajaPertenece
     *
     * @return string 
     */
    public function getCodigoEntidadCajaPertenece()
    {
        return $this->codigoEntidadCajaPertenece;
    }

    /**
     * Set diasCotizadosPension
     *
     * @param integer $diasCotizadosPension
     * @return SsoPila
     */
    public function setDiasCotizadosPension($diasCotizadosPension)
    {
        $this->diasCotizadosPension = $diasCotizadosPension;

        return $this;
    }

    /**
     * Get diasCotizadosPension
     *
     * @return integer 
     */
    public function getDiasCotizadosPension()
    {
        return $this->diasCotizadosPension;
    }

    /**
     * Set diasCotizadosSalud
     *
     * @param integer $diasCotizadosSalud
     * @return SsoPila
     */
    public function setDiasCotizadosSalud($diasCotizadosSalud)
    {
        $this->diasCotizadosSalud = $diasCotizadosSalud;

        return $this;
    }

    /**
     * Get diasCotizadosSalud
     *
     * @return integer 
     */
    public function getDiasCotizadosSalud()
    {
        return $this->diasCotizadosSalud;
    }

    /**
     * Set diasCotizadosRiesgosProfesionales
     *
     * @param integer $diasCotizadosRiesgosProfesionales
     * @return SsoPila
     */
    public function setDiasCotizadosRiesgosProfesionales($diasCotizadosRiesgosProfesionales)
    {
        $this->diasCotizadosRiesgosProfesionales = $diasCotizadosRiesgosProfesionales;

        return $this;
    }

    /**
     * Get diasCotizadosRiesgosProfesionales
     *
     * @return integer 
     */
    public function getDiasCotizadosRiesgosProfesionales()
    {
        return $this->diasCotizadosRiesgosProfesionales;
    }

    /**
     * Set diasCotizadosCajaCompensacion
     *
     * @param integer $diasCotizadosCajaCompensacion
     * @return SsoPila
     */
    public function setDiasCotizadosCajaCompensacion($diasCotizadosCajaCompensacion)
    {
        $this->diasCotizadosCajaCompensacion = $diasCotizadosCajaCompensacion;

        return $this;
    }

    /**
     * Get diasCotizadosCajaCompensacion
     *
     * @return integer 
     */
    public function getDiasCotizadosCajaCompensacion()
    {
        return $this->diasCotizadosCajaCompensacion;
    }

    /**
     * Set salarioBasico
     *
     * @param float $salarioBasico
     * @return SsoPila
     */
    public function setSalarioBasico($salarioBasico)
    {
        $this->salarioBasico = $salarioBasico;

        return $this;
    }

    /**
     * Get salarioBasico
     *
     * @return float 
     */
    public function getSalarioBasico()
    {
        return $this->salarioBasico;
    }

    /**
     * Set salarioIntegral
     *
     * @param string $salarioIntegral
     * @return SsoPila
     */
    public function setSalarioIntegral($salarioIntegral)
    {
        $this->salarioIntegral = $salarioIntegral;

        return $this;
    }

    /**
     * Get salarioIntegral
     *
     * @return string 
     */
    public function getSalarioIntegral()
    {
        return $this->salarioIntegral;
    }

    /**
     * Set tiempoSuplementario
     *
     * @param float $tiempoSuplementario
     * @return SsoPila
     */
    public function setTiempoSuplementario($tiempoSuplementario)
    {
        $this->tiempoSuplementario = $tiempoSuplementario;

        return $this;
    }

    /**
     * Get tiempoSuplementario
     *
     * @return float 
     */
    public function getTiempoSuplementario()
    {
        return $this->tiempoSuplementario;
    }

    /**
     * Set ibcPension
     *
     * @param float $ibcPension
     * @return SsoPila
     */
    public function setIbcPension($ibcPension)
    {
        $this->ibcPension = $ibcPension;

        return $this;
    }

    /**
     * Get ibcPension
     *
     * @return float 
     */
    public function getIbcPension()
    {
        return $this->ibcPension;
    }

    /**
     * Set ibcSalud
     *
     * @param float $ibcSalud
     * @return SsoPila
     */
    public function setIbcSalud($ibcSalud)
    {
        $this->ibcSalud = $ibcSalud;

        return $this;
    }

    /**
     * Get ibcSalud
     *
     * @return float 
     */
    public function getIbcSalud()
    {
        return $this->ibcSalud;
    }

    /**
     * Set ibcRiesgosProfesionales
     *
     * @param float $ibcRiesgosProfesionales
     * @return SsoPila
     */
    public function setIbcRiesgosProfesionales($ibcRiesgosProfesionales)
    {
        $this->ibcRiesgosProfesionales = $ibcRiesgosProfesionales;

        return $this;
    }

    /**
     * Get ibcRiesgosProfesionales
     *
     * @return float 
     */
    public function getIbcRiesgosProfesionales()
    {
        return $this->ibcRiesgosProfesionales;
    }

    /**
     * Set ibcCaja
     *
     * @param float $ibcCaja
     * @return SsoPila
     */
    public function setIbcCaja($ibcCaja)
    {
        $this->ibcCaja = $ibcCaja;

        return $this;
    }

    /**
     * Get ibcCaja
     *
     * @return float 
     */
    public function getIbcCaja()
    {
        return $this->ibcCaja;
    }

    /**
     * Set tarifaAportesPensiones
     *
     * @param string $tarifaAportesPensiones
     * @return SsoPila
     */
    public function setTarifaAportesPensiones($tarifaAportesPensiones)
    {
        $this->tarifaAportesPensiones = $tarifaAportesPensiones;

        return $this;
    }

    /**
     * Get tarifaAportesPensiones
     *
     * @return string 
     */
    public function getTarifaAportesPensiones()
    {
        return $this->tarifaAportesPensiones;
    }

    /**
     * Set cotizacionObligatoria
     *
     * @param float $cotizacionObligatoria
     * @return SsoPila
     */
    public function setCotizacionObligatoria($cotizacionObligatoria)
    {
        $this->cotizacionObligatoria = $cotizacionObligatoria;

        return $this;
    }

    /**
     * Get cotizacionObligatoria
     *
     * @return float 
     */
    public function getCotizacionObligatoria()
    {
        return $this->cotizacionObligatoria;
    }

    /**
     * Set aporteVoluntarioFondoPensionesObligatorias
     *
     * @param string $aporteVoluntarioFondoPensionesObligatorias
     * @return SsoPila
     */
    public function setAporteVoluntarioFondoPensionesObligatorias($aporteVoluntarioFondoPensionesObligatorias)
    {
        $this->aporteVoluntarioFondoPensionesObligatorias = $aporteVoluntarioFondoPensionesObligatorias;

        return $this;
    }

    /**
     * Get aporteVoluntarioFondoPensionesObligatorias
     *
     * @return string 
     */
    public function getAporteVoluntarioFondoPensionesObligatorias()
    {
        return $this->aporteVoluntarioFondoPensionesObligatorias;
    }

    /**
     * Set cotizacionVoluntarioFondoPensionesObligatorias
     *
     * @param string $cotizacionVoluntarioFondoPensionesObligatorias
     * @return SsoPila
     */
    public function setCotizacionVoluntarioFondoPensionesObligatorias($cotizacionVoluntarioFondoPensionesObligatorias)
    {
        $this->cotizacionVoluntarioFondoPensionesObligatorias = $cotizacionVoluntarioFondoPensionesObligatorias;

        return $this;
    }

    /**
     * Get cotizacionVoluntarioFondoPensionesObligatorias
     *
     * @return string 
     */
    public function getCotizacionVoluntarioFondoPensionesObligatorias()
    {
        return $this->cotizacionVoluntarioFondoPensionesObligatorias;
    }

    /**
     * Set totalCotizacion
     *
     * @param float $totalCotizacion
     * @return SsoPila
     */
    public function setTotalCotizacion($totalCotizacion)
    {
        $this->totalCotizacion = $totalCotizacion;

        return $this;
    }

    /**
     * Get totalCotizacion
     *
     * @return float 
     */
    public function getTotalCotizacion()
    {
        return $this->totalCotizacion;
    }

    /**
     * Set aportesFondoSolidaridadPensionalSolidaridad
     *
     * @param float $aportesFondoSolidaridadPensionalSolidaridad
     * @return SsoPila
     */
    public function setAportesFondoSolidaridadPensionalSolidaridad($aportesFondoSolidaridadPensionalSolidaridad)
    {
        $this->aportesFondoSolidaridadPensionalSolidaridad = $aportesFondoSolidaridadPensionalSolidaridad;

        return $this;
    }

    /**
     * Get aportesFondoSolidaridadPensionalSolidaridad
     *
     * @return float 
     */
    public function getAportesFondoSolidaridadPensionalSolidaridad()
    {
        return $this->aportesFondoSolidaridadPensionalSolidaridad;
    }

    /**
     * Set aportesFondoSolidaridadPensionalSubsistencia
     *
     * @param float $aportesFondoSolidaridadPensionalSubsistencia
     * @return SsoPila
     */
    public function setAportesFondoSolidaridadPensionalSubsistencia($aportesFondoSolidaridadPensionalSubsistencia)
    {
        $this->aportesFondoSolidaridadPensionalSubsistencia = $aportesFondoSolidaridadPensionalSubsistencia;

        return $this;
    }

    /**
     * Get aportesFondoSolidaridadPensionalSubsistencia
     *
     * @return float 
     */
    public function getAportesFondoSolidaridadPensionalSubsistencia()
    {
        return $this->aportesFondoSolidaridadPensionalSubsistencia;
    }

    /**
     * Set valorNoRetenidoAportesVoluntarios
     *
     * @param string $valorNoRetenidoAportesVoluntarios
     * @return SsoPila
     */
    public function setValorNoRetenidoAportesVoluntarios($valorNoRetenidoAportesVoluntarios)
    {
        $this->valorNoRetenidoAportesVoluntarios = $valorNoRetenidoAportesVoluntarios;

        return $this;
    }

    /**
     * Get valorNoRetenidoAportesVoluntarios
     *
     * @return string 
     */
    public function getValorNoRetenidoAportesVoluntarios()
    {
        return $this->valorNoRetenidoAportesVoluntarios;
    }

    /**
     * Set tarifaAportesSalud
     *
     * @param string $tarifaAportesSalud
     * @return SsoPila
     */
    public function setTarifaAportesSalud($tarifaAportesSalud)
    {
        $this->tarifaAportesSalud = $tarifaAportesSalud;

        return $this;
    }

    /**
     * Get tarifaAportesSalud
     *
     * @return string 
     */
    public function getTarifaAportesSalud()
    {
        return $this->tarifaAportesSalud;
    }

    /**
     * Set cotizacionObligatoriaSalud
     *
     * @param float $cotizacionObligatoriaSalud
     * @return SsoPila
     */
    public function setCotizacionObligatoriaSalud($cotizacionObligatoriaSalud)
    {
        $this->cotizacionObligatoriaSalud = $cotizacionObligatoriaSalud;

        return $this;
    }

    /**
     * Get cotizacionObligatoriaSalud
     *
     * @return float 
     */
    public function getCotizacionObligatoriaSalud()
    {
        return $this->cotizacionObligatoriaSalud;
    }

    /**
     * Set valorUpcAdicional
     *
     * @param string $valorUpcAdicional
     * @return SsoPila
     */
    public function setValorUpcAdicional($valorUpcAdicional)
    {
        $this->valorUpcAdicional = $valorUpcAdicional;

        return $this;
    }

    /**
     * Get valorUpcAdicional
     *
     * @return string 
     */
    public function getValorUpcAdicional()
    {
        return $this->valorUpcAdicional;
    }

    /**
     * Set numeroAutorizacionIncapacidadEnfermedadGeneral
     *
     * @param string $numeroAutorizacionIncapacidadEnfermedadGeneral
     * @return SsoPila
     */
    public function setNumeroAutorizacionIncapacidadEnfermedadGeneral($numeroAutorizacionIncapacidadEnfermedadGeneral)
    {
        $this->numeroAutorizacionIncapacidadEnfermedadGeneral = $numeroAutorizacionIncapacidadEnfermedadGeneral;

        return $this;
    }

    /**
     * Get numeroAutorizacionIncapacidadEnfermedadGeneral
     *
     * @return string 
     */
    public function getNumeroAutorizacionIncapacidadEnfermedadGeneral()
    {
        return $this->numeroAutorizacionIncapacidadEnfermedadGeneral;
    }

    /**
     * Set valorIncapacidadEnfermedadGeneral
     *
     * @param string $valorIncapacidadEnfermedadGeneral
     * @return SsoPila
     */
    public function setValorIncapacidadEnfermedadGeneral($valorIncapacidadEnfermedadGeneral)
    {
        $this->valorIncapacidadEnfermedadGeneral = $valorIncapacidadEnfermedadGeneral;

        return $this;
    }

    /**
     * Get valorIncapacidadEnfermedadGeneral
     *
     * @return string 
     */
    public function getValorIncapacidadEnfermedadGeneral()
    {
        return $this->valorIncapacidadEnfermedadGeneral;
    }

    /**
     * Set numeroAutorizacionLicenciaMaternidadPaternidad
     *
     * @param string $numeroAutorizacionLicenciaMaternidadPaternidad
     * @return SsoPila
     */
    public function setNumeroAutorizacionLicenciaMaternidadPaternidad($numeroAutorizacionLicenciaMaternidadPaternidad)
    {
        $this->numeroAutorizacionLicenciaMaternidadPaternidad = $numeroAutorizacionLicenciaMaternidadPaternidad;

        return $this;
    }

    /**
     * Get numeroAutorizacionLicenciaMaternidadPaternidad
     *
     * @return string 
     */
    public function getNumeroAutorizacionLicenciaMaternidadPaternidad()
    {
        return $this->numeroAutorizacionLicenciaMaternidadPaternidad;
    }

    /**
     * Set valorLicenciaMaternidadPaternidad
     *
     * @param string $valorLicenciaMaternidadPaternidad
     * @return SsoPila
     */
    public function setValorLicenciaMaternidadPaternidad($valorLicenciaMaternidadPaternidad)
    {
        $this->valorLicenciaMaternidadPaternidad = $valorLicenciaMaternidadPaternidad;

        return $this;
    }

    /**
     * Get valorLicenciaMaternidadPaternidad
     *
     * @return string 
     */
    public function getValorLicenciaMaternidadPaternidad()
    {
        return $this->valorLicenciaMaternidadPaternidad;
    }

    /**
     * Set tarifaAportesRiesgosProfesionales
     *
     * @param string $tarifaAportesRiesgosProfesionales
     * @return SsoPila
     */
    public function setTarifaAportesRiesgosProfesionales($tarifaAportesRiesgosProfesionales)
    {
        $this->tarifaAportesRiesgosProfesionales = $tarifaAportesRiesgosProfesionales;

        return $this;
    }

    /**
     * Get tarifaAportesRiesgosProfesionales
     *
     * @return string 
     */
    public function getTarifaAportesRiesgosProfesionales()
    {
        return $this->tarifaAportesRiesgosProfesionales;
    }

    /**
     * Set centroTrabajoCodigoCt
     *
     * @param string $centroTrabajoCodigoCt
     * @return SsoPila
     */
    public function setCentroTrabajoCodigoCt($centroTrabajoCodigoCt)
    {
        $this->centroTrabajoCodigoCt = $centroTrabajoCodigoCt;

        return $this;
    }

    /**
     * Get centroTrabajoCodigoCt
     *
     * @return string 
     */
    public function getCentroTrabajoCodigoCt()
    {
        return $this->centroTrabajoCodigoCt;
    }

    /**
     * Set cotizacionObligatoriaRiesgos
     *
     * @param float $cotizacionObligatoriaRiesgos
     * @return SsoPila
     */
    public function setCotizacionObligatoriaRiesgos($cotizacionObligatoriaRiesgos)
    {
        $this->cotizacionObligatoriaRiesgos = $cotizacionObligatoriaRiesgos;

        return $this;
    }

    /**
     * Get cotizacionObligatoriaRiesgos
     *
     * @return float 
     */
    public function getCotizacionObligatoriaRiesgos()
    {
        return $this->cotizacionObligatoriaRiesgos;
    }

    /**
     * Set tarifaAportesCCF
     *
     * @param string $tarifaAportesCCF
     * @return SsoPila
     */
    public function setTarifaAportesCCF($tarifaAportesCCF)
    {
        $this->tarifaAportesCCF = $tarifaAportesCCF;

        return $this;
    }

    /**
     * Get tarifaAportesCCF
     *
     * @return string 
     */
    public function getTarifaAportesCCF()
    {
        return $this->tarifaAportesCCF;
    }

    /**
     * Set valorAporteCCF
     *
     * @param float $valorAporteCCF
     * @return SsoPila
     */
    public function setValorAporteCCF($valorAporteCCF)
    {
        $this->valorAporteCCF = $valorAporteCCF;

        return $this;
    }

    /**
     * Get valorAporteCCF
     *
     * @return float 
     */
    public function getValorAporteCCF()
    {
        return $this->valorAporteCCF;
    }

    /**
     * Set tarifaAportesSENA
     *
     * @param string $tarifaAportesSENA
     * @return SsoPila
     */
    public function setTarifaAportesSENA($tarifaAportesSENA)
    {
        $this->tarifaAportesSENA = $tarifaAportesSENA;

        return $this;
    }

    /**
     * Get tarifaAportesSENA
     *
     * @return string 
     */
    public function getTarifaAportesSENA()
    {
        return $this->tarifaAportesSENA;
    }

    /**
     * Set valorAportesSENA
     *
     * @param string $valorAportesSENA
     * @return SsoPila
     */
    public function setValorAportesSENA($valorAportesSENA)
    {
        $this->valorAportesSENA = $valorAportesSENA;

        return $this;
    }

    /**
     * Get valorAportesSENA
     *
     * @return string 
     */
    public function getValorAportesSENA()
    {
        return $this->valorAportesSENA;
    }

    /**
     * Set tarifaAportesICBF
     *
     * @param string $tarifaAportesICBF
     * @return SsoPila
     */
    public function setTarifaAportesICBF($tarifaAportesICBF)
    {
        $this->tarifaAportesICBF = $tarifaAportesICBF;

        return $this;
    }

    /**
     * Get tarifaAportesICBF
     *
     * @return string 
     */
    public function getTarifaAportesICBF()
    {
        return $this->tarifaAportesICBF;
    }

    /**
     * Set valorAporteICBF
     *
     * @param string $valorAporteICBF
     * @return SsoPila
     */
    public function setValorAporteICBF($valorAporteICBF)
    {
        $this->valorAporteICBF = $valorAporteICBF;

        return $this;
    }

    /**
     * Get valorAporteICBF
     *
     * @return string 
     */
    public function getValorAporteICBF()
    {
        return $this->valorAporteICBF;
    }

    /**
     * Set tarifaAportesESAP
     *
     * @param string $tarifaAportesESAP
     * @return SsoPila
     */
    public function setTarifaAportesESAP($tarifaAportesESAP)
    {
        $this->tarifaAportesESAP = $tarifaAportesESAP;

        return $this;
    }

    /**
     * Get tarifaAportesESAP
     *
     * @return string 
     */
    public function getTarifaAportesESAP()
    {
        return $this->tarifaAportesESAP;
    }

    /**
     * Set valorAporteESAP
     *
     * @param string $valorAporteESAP
     * @return SsoPila
     */
    public function setValorAporteESAP($valorAporteESAP)
    {
        $this->valorAporteESAP = $valorAporteESAP;

        return $this;
    }

    /**
     * Get valorAporteESAP
     *
     * @return string 
     */
    public function getValorAporteESAP()
    {
        return $this->valorAporteESAP;
    }

    /**
     * Set TarifaAportesMEN
     *
     * @param string $tarifaAportesMEN
     * @return SsoPila
     */
    public function setTarifaAportesMEN($tarifaAportesMEN)
    {
        $this->TarifaAportesMEN = $tarifaAportesMEN;

        return $this;
    }

    /**
     * Get TarifaAportesMEN
     *
     * @return string 
     */
    public function getTarifaAportesMEN()
    {
        return $this->TarifaAportesMEN;
    }

    /**
     * Set valorAporteMEN
     *
     * @param string $valorAporteMEN
     * @return SsoPila
     */
    public function setValorAporteMEN($valorAporteMEN)
    {
        $this->valorAporteMEN = $valorAporteMEN;

        return $this;
    }

    /**
     * Get valorAporteMEN
     *
     * @return string 
     */
    public function getValorAporteMEN()
    {
        return $this->valorAporteMEN;
    }

    /**
     * Set tipoDocumentoResponsableUPC
     *
     * @param string $tipoDocumentoResponsableUPC
     * @return SsoPila
     */
    public function setTipoDocumentoResponsableUPC($tipoDocumentoResponsableUPC)
    {
        $this->tipoDocumentoResponsableUPC = $tipoDocumentoResponsableUPC;

        return $this;
    }

    /**
     * Get tipoDocumentoResponsableUPC
     *
     * @return string 
     */
    public function getTipoDocumentoResponsableUPC()
    {
        return $this->tipoDocumentoResponsableUPC;
    }

    /**
     * Set numeroIdentificacionResponsableUPCAdicional
     *
     * @param string $numeroIdentificacionResponsableUPCAdicional
     * @return SsoPila
     */
    public function setNumeroIdentificacionResponsableUPCAdicional($numeroIdentificacionResponsableUPCAdicional)
    {
        $this->numeroIdentificacionResponsableUPCAdicional = $numeroIdentificacionResponsableUPCAdicional;

        return $this;
    }

    /**
     * Get numeroIdentificacionResponsableUPCAdicional
     *
     * @return string 
     */
    public function getNumeroIdentificacionResponsableUPCAdicional()
    {
        return $this->numeroIdentificacionResponsableUPCAdicional;
    }

    /**
     * Set cotizanteExoneradoPagoAporteParafiscalesSalud
     *
     * @param string $cotizanteExoneradoPagoAporteParafiscalesSalud
     * @return SsoPila
     */
    public function setCotizanteExoneradoPagoAporteParafiscalesSalud($cotizanteExoneradoPagoAporteParafiscalesSalud)
    {
        $this->cotizanteExoneradoPagoAporteParafiscalesSalud = $cotizanteExoneradoPagoAporteParafiscalesSalud;

        return $this;
    }

    /**
     * Get cotizanteExoneradoPagoAporteParafiscalesSalud
     *
     * @return string 
     */
    public function getCotizanteExoneradoPagoAporteParafiscalesSalud()
    {
        return $this->cotizanteExoneradoPagoAporteParafiscalesSalud;
    }

    /**
     * Set codigoAdministradoraRiesgosLaborales
     *
     * @param string $codigoAdministradoraRiesgosLaborales
     * @return SsoPila
     */
    public function setCodigoAdministradoraRiesgosLaborales($codigoAdministradoraRiesgosLaborales)
    {
        $this->codigoAdministradoraRiesgosLaborales = $codigoAdministradoraRiesgosLaborales;

        return $this;
    }

    /**
     * Get codigoAdministradoraRiesgosLaborales
     *
     * @return string 
     */
    public function getCodigoAdministradoraRiesgosLaborales()
    {
        return $this->codigoAdministradoraRiesgosLaborales;
    }

    /**
     * Set claseRiesgoAfiliado
     *
     * @param string $claseRiesgoAfiliado
     * @return SsoPila
     */
    public function setClaseRiesgoAfiliado($claseRiesgoAfiliado)
    {
        $this->claseRiesgoAfiliado = $claseRiesgoAfiliado;

        return $this;
    }

    /**
     * Get claseRiesgoAfiliado
     *
     * @return string 
     */
    public function getClaseRiesgoAfiliado()
    {
        return $this->claseRiesgoAfiliado;
    }

    /**
     * Set valorTotalCotizacion
     *
     * @param float $valorTotalCotizacion
     * @return SsoPila
     */
    public function setValorTotalCotizacion($valorTotalCotizacion)
    {
        $this->valorTotalCotizacion = $valorTotalCotizacion;

        return $this;
    }

    /**
     * Get valorTotalCotizacion
     *
     * @return float 
     */
    public function getValorTotalCotizacion()
    {
        return $this->valorTotalCotizacion;
    }
}
