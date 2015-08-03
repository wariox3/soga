<?php

namespace Soga\NominaBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Table(name="sso_periodo_empleado")
 * @ORM\Entity(repositoryClass="Soga\NominaBundle\Repository\SsoPeriodoEmpleadoRepository")
 */
class SsoPeriodoEmpleado {

    /**
     * @ORM\Id
     * @ORM\Column(name="codigo_periodo_empleado_pk", type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $codigoPeriodoEmpleadoPk; 

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
     * @ORM\Column(name="numero_identificacion", type="string", length=11)
     */    
    private $numeroIdentificacion;           
    
    /**
     * @ORM\Column(name="nombre", type="string", length=200)
     */    
    private $nombre;    
    
    /**
     * @ORM\Column(name="anio", type="integer")
     */
    private $anio;

    /**
     * @ORM\Column(name="mes", type="integer")
     */
    private $mes;    

    /**
     * @ORM\Column(name="codigo_zona_fk", type="string", length=3)
     */    
    private $codigoZonaFk;
    
    /**
     * @ORM\Column(name="nombre_zona", type="string", length=60)
     */    
    private $nombreZona;     




    /**
     * Get codigoPeriodoEmpleadoPk
     *
     * @return integer 
     */
    public function getCodigoPeriodoEmpleadoPk()
    {
        return $this->codigoPeriodoEmpleadoPk;
    }

    /**
     * Set codigoPeriodoFk
     *
     * @param integer $codigoPeriodoFk
     * @return SsoPeriodoEmpleado
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
     * @return SsoPeriodoEmpleado
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
     * @return SsoPeriodoEmpleado
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
     * @return SsoPeriodoEmpleado
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
     * @return SsoPeriodoEmpleado
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
     * Set anio
     *
     * @param integer $anio
     * @return SsoPeriodoEmpleado
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
     * @return SsoPeriodoEmpleado
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
     * Set codigoZonaFk
     *
     * @param string $codigoZonaFk
     * @return SsoPeriodoEmpleado
     */
    public function setCodigoZonaFk($codigoZonaFk)
    {
        $this->codigoZonaFk = $codigoZonaFk;

        return $this;
    }

    /**
     * Get codigoZonaFk
     *
     * @return string 
     */
    public function getCodigoZonaFk()
    {
        return $this->codigoZonaFk;
    }

    /**
     * Set nombreZona
     *
     * @param string $nombreZona
     * @return SsoPeriodoEmpleado
     */
    public function setNombreZona($nombreZona)
    {
        $this->nombreZona = $nombreZona;

        return $this;
    }

    /**
     * Get nombreZona
     *
     * @return string 
     */
    public function getNombreZona()
    {
        return $this->nombreZona;
    }

    /**
     * Set nombre
     *
     * @param string $nombre
     * @return SsoPeriodoEmpleado
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
}
