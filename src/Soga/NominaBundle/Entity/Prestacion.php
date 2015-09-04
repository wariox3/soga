<?php

namespace Soga\NominaBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Table(name="prestacion")
 * @ORM\Entity(repositoryClass="Soga\NominaBundle\Repository\PrestacionRepository")
 */
class Prestacion
{
    /**
     * @ORM\Id
     * @ORM\Column(name="nropresta", type="string", length=6)
     */ 
    private $nroPresta;           

    /**
     * @ORM\Column(name="cedemple", type="string", length=15, nullable=false)
     */    
    private $cedulaEmpleado;          

    /**
     * @ORM\Column(name="nombres", type="string", length=50, nullable=false)
     */    
    private $nombres;              
    
    /**
     * @ORM\Column(name="fechapro", type="date", nullable=true)
     */    
    private $fechaPro; 

    /**
     * @ORM\Column(name="fechaini", type="date", nullable=true)
     */    
    private $fechaIni; 
    
    /**
     * @ORM\Column(name="fechacor", type="date", nullable=true)
     */    
    private $fechaCor;     
    
    /**
     * @ORM\Column(name="ibc", type="integer", nullable=false)
     */    
    private $ibc;
    
    /**
     * @ORM\Column(name="salario", type="integer", nullable=false)
     */    
    private $salario;
    
    /**
     * @ORM\Column(name="dias", type="integer", nullable=false)
     */    
    private $dias;
    
    /**
     * @ORM\Column(name="diasprima", type="integer", nullable=false)
     */    
    private $diasPrima;    
    
    /**
     * @ORM\Column(name="auxilio", type="integer", nullable=false)
     */    
    private $auxilio;     

    /**
     * @ORM\Column(name="prestamo", type="integer", nullable=false)
     */    
    private $prestamo; 
    
    /**
     * @ORM\Column(name="vestuario", type="integer", nullable=false)
     */    
    private $vestuario;     

    /**
     * @ORM\Column(name="otros", type="integer", nullable=false)
     */    
    private $otros;    
    
    /**
     * @ORM\Column(name="comfenalco", type="integer", nullable=false)
     */    
    private $comfenalco;    
    
    /**
     * @ORM\Column(name="empresa", type="integer", nullable=false)
     */    
    private $empresa;    
    
    /**
     * @ORM\Column(name="total", type="integer", nullable=false)
     */    
    private $total;    
    
    /**
     * @ORM\Column(name="totald", type="integer", nullable=false)
     */    
    private $totald;    
    
    /**
     * @ORM\Column(name="totalp", type="integer", nullable=false)
     */    
    private $totalp;    
    
    /**
     * @ORM\Column(name="cesantia", type="integer", nullable=false)
     */    
    private $cesantia;    
    
    /**
     * @ORM\Column(name="interes", type="integer", nullable=false)
     */    
    private $interes;    
    
    /**
     * @ORM\Column(name="prima", type="integer", nullable=false)
     */    
    private $prima; 
    
    /**
     * @ORM\Column(name="vacacion", type="integer", nullable=false)
     */    
    private $vacacion;    
    
    /**
     * @ORM\Column(name="estado", type="string", length=2, nullable=false)
     */    
    private $estado;    
    
    /**
     * @ORM\Column(name="control", type="string", length=15, nullable=false)
     */    
    private $control;    
    
    /**
     * @ORM\Column(name="exportado_contabilidad", type="integer", nullable=true)
     */    
    private $exportadoContabilidad;    
    



    /**
     * Set nroPresta
     *
     * @param string $nroPresta
     * @return Prestacion
     */
    public function setNroPresta($nroPresta)
    {
        $this->nroPresta = $nroPresta;

        return $this;
    }

    /**
     * Get nroPresta
     *
     * @return string 
     */
    public function getNroPresta()
    {
        return $this->nroPresta;
    }

    /**
     * Set cedulaEmpleado
     *
     * @param string $cedulaEmpleado
     * @return Prestacion
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
     * Set nombres
     *
     * @param string $nombres
     * @return Prestacion
     */
    public function setNombres($nombres)
    {
        $this->nombres = $nombres;

        return $this;
    }

    /**
     * Get nombres
     *
     * @return string 
     */
    public function getNombres()
    {
        return $this->nombres;
    }

    /**
     * Set fechaPro
     *
     * @param \DateTime $fechaPro
     * @return Prestacion
     */
    public function setFechaPro($fechaPro)
    {
        $this->fechaPro = $fechaPro;

        return $this;
    }

    /**
     * Get fechaPro
     *
     * @return \DateTime 
     */
    public function getFechaPro()
    {
        return $this->fechaPro;
    }

    /**
     * Set fechaIni
     *
     * @param \DateTime $fechaIni
     * @return Prestacion
     */
    public function setFechaIni($fechaIni)
    {
        $this->fechaIni = $fechaIni;

        return $this;
    }

    /**
     * Get fechaIni
     *
     * @return \DateTime 
     */
    public function getFechaIni()
    {
        return $this->fechaIni;
    }

    /**
     * Set fechaCor
     *
     * @param \DateTime $fechaCor
     * @return Prestacion
     */
    public function setFechaCor($fechaCor)
    {
        $this->fechaCor = $fechaCor;

        return $this;
    }

    /**
     * Get fechaCor
     *
     * @return \DateTime 
     */
    public function getFechaCor()
    {
        return $this->fechaCor;
    }

    /**
     * Set ibc
     *
     * @param integer $ibc
     * @return Prestacion
     */
    public function setIbc($ibc)
    {
        $this->ibc = $ibc;

        return $this;
    }

    /**
     * Get ibc
     *
     * @return integer 
     */
    public function getIbc()
    {
        return $this->ibc;
    }

    /**
     * Set salario
     *
     * @param integer $salario
     * @return Prestacion
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
     * @return Prestacion
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
     * Set diasPrima
     *
     * @param integer $diasPrima
     * @return Prestacion
     */
    public function setDiasPrima($diasPrima)
    {
        $this->diasPrima = $diasPrima;

        return $this;
    }

    /**
     * Get diasPrima
     *
     * @return integer 
     */
    public function getDiasPrima()
    {
        return $this->diasPrima;
    }

    /**
     * Set auxilio
     *
     * @param integer $auxilio
     * @return Prestacion
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
     * Set prestamo
     *
     * @param integer $prestamo
     * @return Prestacion
     */
    public function setPrestamo($prestamo)
    {
        $this->prestamo = $prestamo;

        return $this;
    }

    /**
     * Get prestamo
     *
     * @return integer 
     */
    public function getPrestamo()
    {
        return $this->prestamo;
    }

    /**
     * Set vestuario
     *
     * @param integer $vestuario
     * @return Prestacion
     */
    public function setVestuario($vestuario)
    {
        $this->vestuario = $vestuario;

        return $this;
    }

    /**
     * Get vestuario
     *
     * @return integer 
     */
    public function getVestuario()
    {
        return $this->vestuario;
    }

    /**
     * Set otros
     *
     * @param integer $otros
     * @return Prestacion
     */
    public function setOtros($otros)
    {
        $this->otros = $otros;

        return $this;
    }

    /**
     * Get otros
     *
     * @return integer 
     */
    public function getOtros()
    {
        return $this->otros;
    }

    /**
     * Set comfenalco
     *
     * @param integer $comfenalco
     * @return Prestacion
     */
    public function setComfenalco($comfenalco)
    {
        $this->comfenalco = $comfenalco;

        return $this;
    }

    /**
     * Get comfenalco
     *
     * @return integer 
     */
    public function getComfenalco()
    {
        return $this->comfenalco;
    }

    /**
     * Set empresa
     *
     * @param integer $empresa
     * @return Prestacion
     */
    public function setEmpresa($empresa)
    {
        $this->empresa = $empresa;

        return $this;
    }

    /**
     * Get empresa
     *
     * @return integer 
     */
    public function getEmpresa()
    {
        return $this->empresa;
    }

    /**
     * Set total
     *
     * @param integer $total
     * @return Prestacion
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
     * Set totald
     *
     * @param integer $totald
     * @return Prestacion
     */
    public function setTotald($totald)
    {
        $this->totald = $totald;

        return $this;
    }

    /**
     * Get totald
     *
     * @return integer 
     */
    public function getTotald()
    {
        return $this->totald;
    }

    /**
     * Set totalp
     *
     * @param integer $totalp
     * @return Prestacion
     */
    public function setTotalp($totalp)
    {
        $this->totalp = $totalp;

        return $this;
    }

    /**
     * Get totalp
     *
     * @return integer 
     */
    public function getTotalp()
    {
        return $this->totalp;
    }

    /**
     * Set cesantias
     *
     * @param integer $cesantias
     * @return Prestacion
     */
    public function setCesantias($cesantias)
    {
        $this->cesantias = $cesantias;

        return $this;
    }

    /**
     * Get cesantias
     *
     * @return integer 
     */
    public function getCesantias()
    {
        return $this->cesantias;
    }

    /**
     * Set intereses
     *
     * @param integer $intereses
     * @return Prestacion
     */
    public function setIntereses($intereses)
    {
        $this->intereses = $intereses;

        return $this;
    }

    /**
     * Get intereses
     *
     * @return integer 
     */
    public function getIntereses()
    {
        return $this->intereses;
    }

    /**
     * Set prima
     *
     * @param integer $prima
     * @return Prestacion
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
     * Set vacacion
     *
     * @param integer $vacacion
     * @return Prestacion
     */
    public function setVacacion($vacacion)
    {
        $this->vacacion = $vacacion;

        return $this;
    }

    /**
     * Get vacacion
     *
     * @return integer 
     */
    public function getVacacion()
    {
        return $this->vacacion;
    }

    /**
     * Set estado
     *
     * @param string $estado
     * @return Prestacion
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
     * Set control
     *
     * @param string $control
     * @return Prestacion
     */
    public function setControl($control)
    {
        $this->control = $control;

        return $this;
    }

    /**
     * Get control
     *
     * @return string 
     */
    public function getControl()
    {
        return $this->control;
    }

    /**
     * Set exportadoContabilidad
     *
     * @param integer $exportadoContabilidad
     * @return Prestacion
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

    /**
     * Set cesantia
     *
     * @param integer $cesantia
     * @return Prestacion
     */
    public function setCesantia($cesantia)
    {
        $this->cesantia = $cesantia;

        return $this;
    }

    /**
     * Get cesantia
     *
     * @return integer 
     */
    public function getCesantia()
    {
        return $this->cesantia;
    }

    /**
     * Set interes
     *
     * @param integer $interes
     * @return Prestacion
     */
    public function setInteres($interes)
    {
        $this->interes = $interes;

        return $this;
    }

    /**
     * Get interes
     *
     * @return integer 
     */
    public function getInteres()
    {
        return $this->interes;
    }
}
