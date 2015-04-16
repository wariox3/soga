<?php

namespace Soga\NominaBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Table(name="prima")
 * @ORM\Entity(repositoryClass="Soga\NominaBundle\Repository\PrimaRepository")
 */
class Prima
{
    /**
     * @ORM\Id
     * @ORM\Column(name="nroprima", type="string", length=5)
     */ 
    private $nroPrima;           

    /**
     * @ORM\Column(name="cedemple", type="string", length=15, nullable=false)
     */    
    private $cedulaEmpleado;          

    /**
     * @ORM\Column(name="nombre", type="string", length=50, nullable=false)
     */    
    private $nombre;    
    
    /**
     * @ORM\Column(name="fechap", type="date", nullable=true)
     */    
    private $fechaP; 

    /**
     * @ORM\Column(name="fechai", type="date", nullable=true)
     */    
    private $fechaI; 
    
    /**
     * @ORM\Column(name="fechainicio", type="date", nullable=true)
     */    
    private $fechainicio;     

    /**
     * @ORM\Column(name="fechacorte", type="date", nullable=true)
     */    
    private $fechaCorte;     
    
    /**
     * @ORM\Column(name="salario", type="integer", nullable=false)
     */    
    private $salario;

    /**
     * @ORM\Column(name="dias", type="integer", nullable=false)
     */    
    private $dias;
    
    /**
     * @ORM\Column(name="auxilio", type="integer", nullable=false)
     */    
    private $auxilio;
    
    /**
     * @ORM\Column(name="total", type="integer", nullable=false)
     */    
    private $total;
    
    /**
     * @ORM\Column(name="prima", type="integer", nullable=false)
     */    
    private $prima;    
    
    /**
     * @ORM\Column(name="estado", type="string", length=10, nullable=true)
     */    
    private $estado;    

    /**
     * @ORM\Column(name="exportado_contabilidad", type="integer", nullable=true)
     */    
    private $exportadoContabilidad;     
    
    /**
     * Set nroPrima
     *
     * @param string $nroPrima
     * @return Prima
     */
    public function setNroPrima($nroPrima)
    {
        $this->nroPrima = $nroPrima;

        return $this;
    }

    /**
     * Get nroPrima
     *
     * @return string 
     */
    public function getNroPrima()
    {
        return $this->nroPrima;
    }

    /**
     * Set cedulaEmpleado
     *
     * @param string $cedulaEmpleado
     * @return Prima
     */
    public function setCedulaEmpleado($cedulaEmpleado)
    {
        $this->cedulaEmpleado = $cedulaEmpleado;

        return $this;
    }

    /**
     * Get cedulaEmpleado
     *
     * @return string 
     */
    public function getCedulaEmpleado()
    {
        return $this->cedulaEmpleado;
    }

    /**
     * Set nombre
     *
     * @param string $nombre
     * @return Prima
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
     * Set fechaP
     *
     * @param \DateTime $fechaP
     * @return Prima
     */
    public function setFechaP($fechaP)
    {
        $this->fechaP = $fechaP;

        return $this;
    }

    /**
     * Get fechaP
     *
     * @return \DateTime 
     */
    public function getFechaP()
    {
        return $this->fechaP;
    }

    /**
     * Set fechaI
     *
     * @param \DateTime $fechaI
     * @return Prima
     */
    public function setFechaI($fechaI)
    {
        $this->fechaI = $fechaI;

        return $this;
    }

    /**
     * Get fechaI
     *
     * @return \DateTime 
     */
    public function getFechaI()
    {
        return $this->fechaI;
    }

    /**
     * Set fechainicio
     *
     * @param \DateTime $fechainicio
     * @return Prima
     */
    public function setFechainicio($fechainicio)
    {
        $this->fechainicio = $fechainicio;

        return $this;
    }

    /**
     * Get fechainicio
     *
     * @return \DateTime 
     */
    public function getFechainicio()
    {
        return $this->fechainicio;
    }

    /**
     * Set fechaCorte
     *
     * @param \DateTime $fechaCorte
     * @return Prima
     */
    public function setFechaCorte($fechaCorte)
    {
        $this->fechaCorte = $fechaCorte;

        return $this;
    }

    /**
     * Get fechaCorte
     *
     * @return \DateTime 
     */
    public function getFechaCorte()
    {
        return $this->fechaCorte;
    }

    /**
     * Set salario
     *
     * @param integer $salario
     * @return Prima
     */
    public function setSalario($salario)
    {
        $this->salario = $salario;

        return $this;
    }

    /**
     * Get salario
     *
     * @return integer 
     */
    public function getSalario()
    {
        return $this->salario;
    }

    /**
     * Set dias
     *
     * @param integer $dias
     * @return Prima
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
     * Set auxilio
     *
     * @param integer $auxilio
     * @return Prima
     */
    public function setAuxilio($auxilio)
    {
        $this->auxilio = $auxilio;

        return $this;
    }

    /**
     * Get auxilio
     *
     * @return integer 
     */
    public function getAuxilio()
    {
        return $this->auxilio;
    }

    /**
     * Set total
     *
     * @param integer $total
     * @return Prima
     */
    public function setTotal($total)
    {
        $this->total = $total;

        return $this;
    }

    /**
     * Get total
     *
     * @return integer 
     */
    public function getTotal()
    {
        return $this->total;
    }

    /**
     * Set prima
     *
     * @param integer $prima
     * @return Prima
     */
    public function setPrima($prima)
    {
        $this->prima = $prima;

        return $this;
    }

    /**
     * Get prima
     *
     * @return integer 
     */
    public function getPrima()
    {
        return $this->prima;
    }

    /**
     * Set estado
     *
     * @param string $estado
     * @return Prima
     */
    public function setEstado($estado)
    {
        $this->estado = $estado;

        return $this;
    }

    /**
     * Get estado
     *
     * @return string 
     */
    public function getEstado()
    {
        return $this->estado;
    }

    /**
     * Set exportadoContabilidad
     *
     * @param integer $exportadoContabilidad
     * @return Prima
     */
    public function setExportadoContabilidad($exportadoContabilidad)
    {
        $this->exportadoContabilidad = $exportadoContabilidad;

        return $this;
    }

    /**
     * Get exportadoContabilidad
     *
     * @return integer 
     */
    public function getExportadoContabilidad()
    {
        return $this->exportadoContabilidad;
    }
}
