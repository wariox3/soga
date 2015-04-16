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
}
