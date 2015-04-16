<?php

namespace Soga\NominaBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Table(name="nom_configuracion")
 * @ORM\Entity(repositoryClass="Soga\NominaBundle\Repository\NomConfiguracionRepository")
 */
class NomConfiguracion {

    /**
     * @ORM\Id
     * @ORM\Column(name="codigo_configuracion_pk", type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $codigoConfiguracionPk;

    /**
     * @ORM\Column(name="comprobante_interface", type="string", length=5, nullable=false)
     */
    private $comprobanteInterface;

    /**
     * @ORM\Column(name="comprobante_prestaciones", type="string", length=5, nullable=false)
     */
    private $comprobantePrestaciones;    
    
    /**
     * @ORM\Column(name="ruta_exportacion", type="string", length=500, nullable=false)
     */
    private $rutaExportacion;


    /**
     * @ORM\Column(name="cuenta_trabajadores_mision", type="string", length=10, nullable=false)
     */
    private $cuentaTrabajadoresMision;      

    /**
     * @ORM\Column(name="cuenta_trabajadores_planta", type="string", length=10, nullable=false)
     */
    private $cuentaTrabajadoresPlanta;          

    /**
     * @ORM\Column(name="fecha_desde_exportar_nomina", type="string", length=12, nullable=false)
     */
    private $fechaDesdeExportarNomina;    

    /**
     * @ORM\Column(name="fecha_hasta_exportar_nomina", type="string", length=12, nullable=false)
     */
    private $fechaHastaExportarNomina;    

    /**
     * @ORM\Column(name="fecha_pago", type="string", length=12, nullable=false)
     */
    private $fechaPago;
    
    /**
     * @ORM\Column(name="fecha_aplicacion_pago", type="string", length=12, nullable=false)
     */
    private $fechaAplicacionPago;     

    /**
     * @ORM\Column(name="cuenta_debitar", type="string", length=20, nullable=false)
     */
    private $cuentaDebitar;    
    
    /**
     * Get codigoConfiguracionPk
     *
     * @return integer 
     */
    public function getCodigoConfiguracionPk()
    {
        return $this->codigoConfiguracionPk;
    }

    /**
     * Set comprobanteInterface
     *
     * @param string $comprobanteInterface
     * @return NomConfiguracion
     */
    public function setComprobanteInterface($comprobanteInterface)
    {
        $this->comprobanteInterface = $comprobanteInterface;

        return $this;
    }

    /**
     * Get comprobanteInterface
     *
     * @return string 
     */
    public function getComprobanteInterface()
    {
        return $this->comprobanteInterface;
    }

    /**
     * Set rutaExportacion
     *
     * @param string $rutaExportacion
     * @return NomConfiguracion
     */
    public function setRutaExportacion($rutaExportacion)
    {
        $this->rutaExportacion = $rutaExportacion;

        return $this;
    }

    /**
     * Get rutaExportacion
     *
     * @return string 
     */
    public function getRutaExportacion()
    {
        return $this->rutaExportacion;
    }

    /**
     * Set cuentaTrabajadoresMision
     *
     * @param string $cuentaTrabajadoresMision
     * @return NomConfiguracion
     */
    public function setCuentaTrabajadoresMision($cuentaTrabajadoresMision)
    {
        $this->cuentaTrabajadoresMision = $cuentaTrabajadoresMision;

        return $this;
    }

    /**
     * Get cuentaTrabajadoresMision
     *
     * @return string 
     */
    public function getCuentaTrabajadoresMision()
    {
        return $this->cuentaTrabajadoresMision;
    }

    /**
     * Set cuentaTrabajadoresPlanta
     *
     * @param string $cuentaTrabajadoresPlanta
     * @return NomConfiguracion
     */
    public function setCuentaTrabajadoresPlanta($cuentaTrabajadoresPlanta)
    {
        $this->cuentaTrabajadoresPlanta = $cuentaTrabajadoresPlanta;

        return $this;
    }

    /**
     * Get cuentaTrabajadoresPlanta
     *
     * @return string 
     */
    public function getCuentaTrabajadoresPlanta()
    {
        return $this->cuentaTrabajadoresPlanta;
    }

    /**
     * Set comprobantePrestaciones
     *
     * @param string $comprobantePrestaciones
     * @return NomConfiguracion
     */
    public function setComprobantePrestaciones($comprobantePrestaciones)
    {
        $this->comprobantePrestaciones = $comprobantePrestaciones;

        return $this;
    }

    /**
     * Get comprobantePrestaciones
     *
     * @return string 
     */
    public function getComprobantePrestaciones()
    {
        return $this->comprobantePrestaciones;
    }

    /**
     * Set fechaDesdeExportarNomina
     *
     * @param string $fechaDesdeExportarNomina
     * @return NomConfiguracion
     */
    public function setFechaDesdeExportarNomina($fechaDesdeExportarNomina)
    {
        $this->fechaDesdeExportarNomina = $fechaDesdeExportarNomina;

        return $this;
    }

    /**
     * Get fechaDesdeExportarNomina
     *
     * @return string 
     */
    public function getFechaDesdeExportarNomina()
    {
        return $this->fechaDesdeExportarNomina;
    }

    /**
     * Set fechaHastaExportarNomina
     *
     * @param string $fechaHastaExportarNomina
     * @return NomConfiguracion
     */
    public function setFechaHastaExportarNomina($fechaHastaExportarNomina)
    {
        $this->fechaHastaExportarNomina = $fechaHastaExportarNomina;

        return $this;
    }

    /**
     * Get fechaHastaExportarNomina
     *
     * @return string 
     */
    public function getFechaHastaExportarNomina()
    {
        return $this->fechaHastaExportarNomina;
    }

    /**
     * Set fechaPago
     *
     * @param string $fechaPago
     * @return NomConfiguracion
     */
    public function setFechaPago($fechaPago)
    {
        $this->fechaPago = $fechaPago;

        return $this;
    }

    /**
     * Get fechaPago
     *
     * @return string 
     */
    public function getFechaPago()
    {
        return $this->fechaPago;
    }

    /**
     * Set fechaAplicacionPago
     *
     * @param string $fechaAplicacionPago
     * @return NomConfiguracion
     */
    public function setFechaAplicacionPago($fechaAplicacionPago)
    {
        $this->fechaAplicacionPago = $fechaAplicacionPago;

        return $this;
    }

    /**
     * Get fechaAplicacionPago
     *
     * @return string 
     */
    public function getFechaAplicacionPago()
    {
        return $this->fechaAplicacionPago;
    }

    /**
     * Set cuentaDebitar
     *
     * @param string $cuentaDebitar
     * @return NomConfiguracion
     */
    public function setCuentaDebitar($cuentaDebitar)
    {
        $this->cuentaDebitar = $cuentaDebitar;

        return $this;
    }

    /**
     * Get cuentaDebitar
     *
     * @return string 
     */
    public function getCuentaDebitar()
    {
        return $this->cuentaDebitar;
    }
}
