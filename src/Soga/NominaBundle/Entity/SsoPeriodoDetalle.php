<?php

namespace Soga\NominaBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Table(name="sso_periodo_detalle")
 * @ORM\Entity(repositoryClass="Soga\NominaBundle\Repository\SsoPeriodoDetalleRepository")
 */
class SsoPeriodoDetalle {

    /**
     * @ORM\Id
     * @ORM\Column(name="codigo_periodo_detalle_pk", type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $codigoPeriodoDetallePk;

    /**
     * @ORM\Column(name="nombre", type="string", length=150)
     */    
    private $nombre;    
    
    /**
     * @ORM\Column(name="codigo_periodo_fk", type="integer", nullable=true)
     */    
    private $codigoPeriodoFk;    
    
    /**
     * @ORM\Column(name="anio", type="integer")
     */
    private $anio;

    /**
     * @ORM\Column(name="anio_salud", type="integer")
     */
    private $anioSalud;    
    
    /**
     * @ORM\Column(name="mes", type="integer")
     */
    private $mes;
    
    /**
     * @ORM\Column(name="mes_salud", type="integer")
     */
    private $mesSalud;    

    /**
     * @ORM\Column(name="fecha_desde", type="date")
     */
    private $fechaDesde;

    /**
     * @ORM\Column(name="fecha_hasta", type="date")
     */
    private $fechaHasta;    

    /**     
     * @ORM\Column(name="estado_generado", type="boolean")
     */    
    private $estadoGenerado = 0;     

    /**     
     * @ORM\Column(name="estado_cerrado", type="boolean")
     */    
    private $estadoCerrado = 0;    
    
    /**
     * @ORM\Column(name="codigo_sucursal_fk", type="integer", nullable=true)
     */    
    private $codigoSucursalFk;    

    /**
     * @ORM\Column(name="fecha_pago", type="date")
     */
    private $fechaPago;    

    /**
     * @ORM\Column(name="numero_empleados", type="integer")
     */    
    private $numeroEmpleados = 0;
    
    /**
     * @ORM\Column(name="vr_nomina", type="float")
     */    
    private $vrNomina = 0;    
    
    /**
     * @ORM\Column(name="generar_empleados", type="boolean")
     */    
    private $generarEmpleados = 0;       
    
    /**
     * @ORM\ManyToOne(targetEntity="SsoSucursal", inversedBy="periodosSucursalRel")
     * @ORM\JoinColumn(name="codigo_sucursal_fk", referencedColumnName="codigo_sucursal_pk")
     */
    protected $sucursalRel;    




    /**
     * Get codigoPeriodoDetallePk
     *
     * @return integer 
     */
    public function getCodigoPeriodoDetallePk()
    {
        return $this->codigoPeriodoDetallePk;
    }

    /**
     * Set anio
     *
     * @param integer $anio
     * @return SsoPeriodoDetalle
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
     * @return SsoPeriodoDetalle
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
     * Set mesSalud
     *
     * @param integer $mesSalud
     * @return SsoPeriodoDetalle
     */
    public function setMesSalud($mesSalud)
    {
        $this->mesSalud = $mesSalud;

        return $this;
    }

    /**
     * Get mesSalud
     *
     * @return integer 
     */
    public function getMesSalud()
    {
        return $this->mesSalud;
    }

    /**
     * Set fechaDesde
     *
     * @param \DateTime $fechaDesde
     * @return SsoPeriodoDetalle
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
     * @return SsoPeriodoDetalle
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
     * Set estadoGenerado
     *
     * @param boolean $estadoGenerado
     * @return SsoPeriodoDetalle
     */
    public function setEstadoGenerado($estadoGenerado)
    {
        $this->estadoGenerado = $estadoGenerado;

        return $this;
    }

    /**
     * Get estadoGenerado
     *
     * @return boolean 
     */
    public function getEstadoGenerado()
    {
        return $this->estadoGenerado;
    }

    /**
     * Set estadoCerrado
     *
     * @param boolean $estadoCerrado
     * @return SsoPeriodoDetalle
     */
    public function setEstadoCerrado($estadoCerrado)
    {
        $this->estadoCerrado = $estadoCerrado;

        return $this;
    }

    /**
     * Get estadoCerrado
     *
     * @return boolean 
     */
    public function getEstadoCerrado()
    {
        return $this->estadoCerrado;
    }

    /**
     * Set codigoSucursalFk
     *
     * @param integer $codigoSucursalFk
     * @return SsoPeriodoDetalle
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
     * Set fechaPago
     *
     * @param \DateTime $fechaPago
     * @return SsoPeriodoDetalle
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
     * Set numeroEmpleados
     *
     * @param integer $numeroEmpleados
     * @return SsoPeriodoDetalle
     */
    public function setNumeroEmpleados($numeroEmpleados)
    {
        $this->numeroEmpleados = $numeroEmpleados;

        return $this;
    }

    /**
     * Get numeroEmpleados
     *
     * @return integer 
     */
    public function getNumeroEmpleados()
    {
        return $this->numeroEmpleados;
    }

    /**
     * Set vrNomina
     *
     * @param float $vrNomina
     * @return SsoPeriodoDetalle
     */
    public function setVrNomina($vrNomina)
    {
        $this->vrNomina = $vrNomina;

        return $this;
    }

    /**
     * Get vrNomina
     *
     * @return float 
     */
    public function getVrNomina()
    {
        return $this->vrNomina;
    }

    /**
     * Set generarEmpleados
     *
     * @param boolean $generarEmpleados
     * @return SsoPeriodoDetalle
     */
    public function setGenerarEmpleados($generarEmpleados)
    {
        $this->generarEmpleados = $generarEmpleados;

        return $this;
    }

    /**
     * Get generarEmpleados
     *
     * @return boolean 
     */
    public function getGenerarEmpleados()
    {
        return $this->generarEmpleados;
    }

    /**
     * Set sucursalRel
     *
     * @param \Soga\NominaBundle\Entity\SsoSucursal $sucursalRel
     * @return SsoPeriodoDetalle
     */
    public function setSucursalRel(\Soga\NominaBundle\Entity\SsoSucursal $sucursalRel = null)
    {
        $this->sucursalRel = $sucursalRel;

        return $this;
    }

    /**
     * Get sucursalRel
     *
     * @return \Soga\NominaBundle\Entity\SsoSucursal 
     */
    public function getSucursalRel()
    {
        return $this->sucursalRel;
    }

    /**
     * Set codigoPeriodoFk
     *
     * @param integer $codigoPeriodoFk
     * @return SsoPeriodoDetalle
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
     * Set nombre
     *
     * @param string $nombre
     * @return SsoPeriodoDetalle
     */
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;

        return $this;
    }

    /**
     * Get nombre
     *
     * @return string 
     */
    public function getNombre()
    {
        return $this->nombre;
    }

    /**
     * Set anioSalud
     *
     * @param integer $anioSalud
     * @return SsoPeriodoDetalle
     */
    public function setAnioSalud($anioSalud)
    {
        $this->anioSalud = $anioSalud;

        return $this;
    }

    /**
     * Get anioSalud
     *
     * @return integer 
     */
    public function getAnioSalud()
    {
        return $this->anioSalud;
    }
}
