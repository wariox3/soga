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
     * @ORM\Column(name="codigo_empleado_fk", type="string", length=5)
     */    
    private $codigoEmpleadoFk;      
    
    /**
     * @ORM\Column(name="numero_identificacion", type="string", length=11)
     */    
    private $numeroIdentificacion;    
    
    /**
     * @ORM\Column(name="codigo_sucursal_fk", type="integer")
     */    
    private $codigoSucursalFk;    
    
    /**
     * @ORM\Column(name="anio", type="integer")
     */
    private $anio;

    /**
     * @ORM\Column(name="mes", type="integer")
     */
    private $mes;    



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
}
