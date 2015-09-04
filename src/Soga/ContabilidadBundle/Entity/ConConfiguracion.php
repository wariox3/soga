<?php

namespace Soga\ContabilidadBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Table(name="con_configuracion")
 * @ORM\Entity(repositoryClass="Soga\ContabilidadBundle\Repository\ConConfiguracionRepository")
 */
class ConConfiguracion {

    /**
     * @ORM\Id
     * @ORM\Column(name="codigo_configuracion_pk", type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $codigoConfiguracionPk;

    /**
     * @ORM\Column(name="cuenta_trabajadores_mision", type="string", length=10, nullable=false)
     */
    private $cuentaTrabajadoresMision;      

    /**
     * @ORM\Column(name="cuenta_trabajadores_planta", type="string", length=10, nullable=false)
     */
    private $cuentaTrabajadoresPlanta;          
    
    /**
     * @ORM\Column(name="comprobante_comprobantes", type="string", length=5, nullable=false)
     */
    private $comprobanteComprobantes;    
    
    /**
     * @ORM\Column(name="cuenta_prima_trabajadores_mision", type="string", length=10, nullable=false)
     */
    private $cuentaPrimaTrabajadoresMision;      

    /**
     * @ORM\Column(name="cuenta_prima_trabajadores_planta", type="string", length=10, nullable=false)
     */
    private $cuentaPrimaTrabajadoresPlanta;     
    
    /**
     * @ORM\Column(name="cuenta_prestacion_trabajadores_mision", type="string", length=10, nullable=false)
     */
    private $cuentaPrestacionTrabajadoresMision;      

    /**
     * @ORM\Column(name="cuenta_prestacion_trabajadores_planta", type="string", length=10, nullable=false)
     */
    private $cuentaPrestacionTrabajadoresPlanta;     
    
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
     * Set cuentaTrabajadoresMision
     *
     * @param string $cuentaTrabajadoresMision
     * @return ConConfiguracion
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
     * @return ConConfiguracion
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
     * Set comprobanteComprobantes
     *
     * @param string $comprobanteComprobantes
     * @return ConConfiguracion
     */
    public function setComprobanteComprobantes($comprobanteComprobantes)
    {
        $this->comprobanteComprobantes = $comprobanteComprobantes;

        return $this;
    }

    /**
     * Get comprobanteComprobantes
     *
     * @return string 
     */
    public function getComprobanteComprobantes()
    {
        return $this->comprobanteComprobantes;
    }

    /**
     * Set cuentaPrimaTrabajadoresMision
     *
     * @param string $cuentaPrimaTrabajadoresMision
     * @return ConConfiguracion
     */
    public function setCuentaPrimaTrabajadoresMision($cuentaPrimaTrabajadoresMision)
    {
        $this->cuentaPrimaTrabajadoresMision = $cuentaPrimaTrabajadoresMision;

        return $this;
    }

    /**
     * Get cuentaPrimaTrabajadoresMision
     *
     * @return string 
     */
    public function getCuentaPrimaTrabajadoresMision()
    {
        return $this->cuentaPrimaTrabajadoresMision;
    }

    /**
     * Set cuentaPrimaTrabajadoresPlanta
     *
     * @param string $cuentaPrimaTrabajadoresPlanta
     * @return ConConfiguracion
     */
    public function setCuentaPrimaTrabajadoresPlanta($cuentaPrimaTrabajadoresPlanta)
    {
        $this->cuentaPrimaTrabajadoresPlanta = $cuentaPrimaTrabajadoresPlanta;

        return $this;
    }

    /**
     * Get cuentaPrimaTrabajadoresPlanta
     *
     * @return string 
     */
    public function getCuentaPrimaTrabajadoresPlanta()
    {
        return $this->cuentaPrimaTrabajadoresPlanta;
    }

    /**
     * Set cuentaPrestacionTrabajadoresMision
     *
     * @param string $cuentaPrestacionTrabajadoresMision
     * @return ConConfiguracion
     */
    public function setCuentaPrestacionTrabajadoresMision($cuentaPrestacionTrabajadoresMision)
    {
        $this->cuentaPrestacionTrabajadoresMision = $cuentaPrestacionTrabajadoresMision;

        return $this;
    }

    /**
     * Get cuentaPrestacionTrabajadoresMision
     *
     * @return string 
     */
    public function getCuentaPrestacionTrabajadoresMision()
    {
        return $this->cuentaPrestacionTrabajadoresMision;
    }

    /**
     * Set cuentaPrestacionTrabajadoresPlanta
     *
     * @param string $cuentaPrestacionTrabajadoresPlanta
     * @return ConConfiguracion
     */
    public function setCuentaPrestacionTrabajadoresPlanta($cuentaPrestacionTrabajadoresPlanta)
    {
        $this->cuentaPrestacionTrabajadoresPlanta = $cuentaPrestacionTrabajadoresPlanta;

        return $this;
    }

    /**
     * Get cuentaPrestacionTrabajadoresPlanta
     *
     * @return string 
     */
    public function getCuentaPrestacionTrabajadoresPlanta()
    {
        return $this->cuentaPrestacionTrabajadoresPlanta;
    }
}
