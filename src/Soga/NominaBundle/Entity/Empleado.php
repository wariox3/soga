<?php

namespace Soga\NominaBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Table(name="empleado")
 * @ORM\Entity(repositoryClass="Soga\NominaBundle\Repository\EmpleadoRepository")
 */
class Empleado
{
    /**
     * @ORM\Id
     * @ORM\Column(name="codemple", type="string", length=5)
     */ 
    private $codemple;

    /**
     * @ORM\Column(name="cedemple", type="string", length=15, nullable=false)
     */    
    private $cedemple;    

    /**
     * @ORM\Column(name="nomemple", type="string", length=25, nullable=false)
     */    
    private $nomemple;    
    
    /**
     * @ORM\Column(name="nomemple1", type="string", length=25, nullable=false)
     */    
    private $nomemple1;

    /**
     * @ORM\Column(name="apemple", type="string", length=25, nullable=false)
     */    
    private $apemple;    

    /**
     * @ORM\Column(name="apemple1", type="string", length=25, nullable=false)
     */    
    private $apemple1;    
    
    /**
     * @ORM\Column(name="cuenta", type="string", length=20, nullable=false)
     */    
    private $cuenta;    
    
    /**
     * @ORM\Column(name="codeps", type="string", length=10, nullable=false)
     */    
    private $codeps;
    
    /**
     * @ORM\Column(name="codpension", type="string", length=10, nullable=false)
     */    
    private $codpension;    

    /**
     * @ORM\Column(name="codzona", type="string", length=3, nullable=false)
     */    
    private $codzona;    

    /**
     * @ORM\Column(name="comercial", type="string", length=2, nullable=false)
     */    
    private $comercial;     
    
    /**
     * @ORM\Column(name="nivel", type="integer", nullable=false)
     */    
    private $nivel;     

    /**
     * @ORM\Column(name="tipod", type="string", length=5, nullable=false)
     */    
    private $tipod;    

    /**
     * @ORM\Column(name="diremple", type="string", length=40, nullable=false)
     */    
    private $diremple;  
    
    /**
     * @ORM\Column(name="codmuni", type="string", length=10, nullable=false)
     */    
    private $codmuni;      
    
    /**
     * @ORM\Column(name="telemple", type="string", length=7, nullable=false)
     */    
    private $telemple;  
    
    /**
     * @ORM\Column(name="municipio", type="string", length=20, nullable=false)
     */    
    private $municipio; 

    /**
     * @ORM\Column(name="email", type="string", length=40, nullable=false)
     */    
    private $email;    
    
    /**
     * @ORM\Column(name="celular", type="string", length=15, nullable=false)
     */    
    private $celular;    
    
    /**
     * @ORM\Column(name="exportado_contabilidad", type="integer", nullable=true)
     */    
    private $exportadoContabilidad;     
    
    /**
     * Set codemple
     *
     * @param string $codemple
     * @return Empleado
     */
    public function setCodemple($codemple)
    {
        $this->codemple = $codemple;

        return $this;
    }

    /**
     * Get codemple
     *
     * @return string 
     */
    public function getCodemple()
    {
        return $this->codemple;
    }

    /**
     * Set codeps
     *
     * @param string $codeps
     * @return Empleado
     */
    public function setCodeps($codeps)
    {
        $this->codeps = $codeps;

        return $this;
    }

    /**
     * Get codeps
     *
     * @return string 
     */
    public function getCodeps()
    {
        return $this->codeps;
    }

    /**
     * Set codpension
     *
     * @param string $codpension
     * @return Empleado
     */
    public function setCodpension($codpension)
    {
        $this->codpension = $codpension;

        return $this;
    }

    /**
     * Get codpension
     *
     * @return string 
     */
    public function getCodpension()
    {
        return $this->codpension;
    }

    /**
     * Set cedemple
     *
     * @param string $cedemple
     * @return Empleado
     */
    public function setCedemple($cedemple)
    {
        $this->cedemple = $cedemple;

        return $this;
    }

    /**
     * Get cedemple
     *
     * @return string 
     */
    public function getCedemple()
    {
        return $this->cedemple;
    }

    /**
     * Set codzona
     *
     * @param string $codzona
     * @return Empleado
     */
    public function setCodzona($codzona)
    {
        $this->codzona = $codzona;

        return $this;
    }

    /**
     * Get codzona
     *
     * @return string 
     */
    public function getCodzona()
    {
        return $this->codzona;
    }

    /**
     * Set comercial
     *
     * @param string $comercial
     * @return Empleado
     */
    public function setComercial($comercial)
    {
        $this->comercial = $comercial;

        return $this;
    }

    /**
     * Get comercial
     *
     * @return string 
     */
    public function getComercial()
    {
        return $this->comercial;
    }

    /**
     * Set nomemple
     *
     * @param string $nomemple
     *
     * @return Empleado
     */
    public function setNomemple($nomemple)
    {
        $this->nomemple = $nomemple;

        return $this;
    }

    /**
     * Get nomemple
     *
     * @return string
     */
    public function getNomemple()
    {
        return $this->nomemple;
    }

    /**
     * Set nomemple1
     *
     * @param string $nomemple1
     *
     * @return Empleado
     */
    public function setNomemple1($nomemple1)
    {
        $this->nomemple1 = $nomemple1;

        return $this;
    }

    /**
     * Get nomemple1
     *
     * @return string
     */
    public function getNomemple1()
    {
        return $this->nomemple1;
    }

    /**
     * Set cuenta
     *
     * @param string $cuenta
     *
     * @return Empleado
     */
    public function setCuenta($cuenta)
    {
        $this->cuenta = $cuenta;

        return $this;
    }

    /**
     * Get cuenta
     *
     * @return string
     */
    public function getCuenta()
    {
        return $this->cuenta;
    }

    /**
     * Set nivel
     *
     * @param integer $nivel
     *
     * @return Empleado
     */
    public function setNivel($nivel)
    {
        $this->nivel = $nivel;

        return $this;
    }

    /**
     * Get nivel
     *
     * @return integer
     */
    public function getNivel()
    {
        return $this->nivel;
    }

    /**
     * Set exportadoContabilidad
     *
     * @param integer $exportadoContabilidad
     * @return Empleado
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
     * Set apemple
     *
     * @param string $apemple
     * @return Empleado
     */
    public function setApemple($apemple)
    {
        $this->apemple = $apemple;

        return $this;
    }

    /**
     * Get apemple
     *
     * @return string 
     */
    public function getApemple()
    {
        return $this->apemple;
    }

    /**
     * Set apemple1
     *
     * @param string $apemple1
     * @return Empleado
     */
    public function setApemple1($apemple1)
    {
        $this->apemple1 = $apemple1;

        return $this;
    }

    /**
     * Get apemple1
     *
     * @return string 
     */
    public function getApemple1()
    {
        return $this->apemple1;
    }

    /**
     * Set tipod
     *
     * @param string $tipod
     * @return Empleado
     */
    public function setTipod($tipod)
    {
        $this->tipod = $tipod;

        return $this;
    }

    /**
     * Get tipod
     *
     * @return string 
     */
    public function getTipod()
    {
        return $this->tipod;
    }

    /**
     * Set diremple
     *
     * @param string $diremple
     * @return Empleado
     */
    public function setDiremple($diremple)
    {
        $this->diremple = $diremple;

        return $this;
    }

    /**
     * Get diremple
     *
     * @return string 
     */
    public function getDiremple()
    {
        return $this->diremple;
    }

    /**
     * Set codmuni
     *
     * @param string $codmuni
     * @return Empleado
     */
    public function setCodmuni($codmuni)
    {
        $this->codmuni = $codmuni;

        return $this;
    }

    /**
     * Get codmuni
     *
     * @return string 
     */
    public function getCodmuni()
    {
        return $this->codmuni;
    }

    /**
     * Set telemple
     *
     * @param string $telemple
     * @return Empleado
     */
    public function setTelemple($telemple)
    {
        $this->telemple = $telemple;

        return $this;
    }

    /**
     * Get telemple
     *
     * @return string 
     */
    public function getTelemple()
    {
        return $this->telemple;
    }

    /**
     * Set municipio
     *
     * @param string $municipio
     * @return Empleado
     */
    public function setMunicipio($municipio)
    {
        $this->municipio = $municipio;

        return $this;
    }

    /**
     * Get municipio
     *
     * @return string 
     */
    public function getMunicipio()
    {
        return $this->municipio;
    }

    /**
     * Set email
     *
     * @param string $email
     * @return Empleado
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get email
     *
     * @return string 
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set celular
     *
     * @param string $celular
     * @return Empleado
     */
    public function setCelular($celular)
    {
        $this->celular = $celular;

        return $this;
    }

    /**
     * Get celular
     *
     * @return string 
     */
    public function getCelular()
    {
        return $this->celular;
    }
}
