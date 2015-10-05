<?php

namespace Soga\NominaBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Table(name="contrato")
 * @ORM\Entity(repositoryClass="Soga\NominaBundle\Repository\ContratoRepository")
 */
class Contrato
{
    /**
     * @ORM\Id
     * @ORM\Column(name="contrato", type="string", length=6)
     */ 
    private $contrato;
    
    /**
     * @ORM\Column(name="fechainic", type="date", nullable=true)
     */    
    private $fechainic; 

    /**
     * @ORM\Column(name="fechater", type="date", nullable=true)
     */    
    private $fechater;    
    
    /**
     * @ORM\Column(name="codemple", type="string", length=5)
     */
    private $codemple;     
    
    /**
     * @ORM\Column(name="salario", type="string", length=10)
     */
    private $salario; 

    /**
     * @ORM\Column(name="salario_ibc", type="integer")
     */
    private $salarioIbc;    

    /**
     * @ORM\Column(name="salario_anterior", type="integer")
     */
    private $salarioAnterior;    

    /**
     * @ORM\Column(name="salario_fecha_desde", type="date", nullable=true)
     */    
    private $salarioFechaDesde;    

    /**
     * @ORM\Column(name="codigo_caja_pk", type="integer")
     */
    private $codigoCajaPk;     
    
    /**
     * Set contrato
     *
     * @param string $contrato
     * @return Contrato
     */
    public function setContrato($contrato)
    {
        $this->contrato = $contrato;

        return $this;
    }

    /**
     * Get contrato
     *
     * @return string 
     */
    public function getContrato()
    {
        return $this->contrato;
    }

    /**
     * Set fechainic
     *
     * @param \DateTime $fechainic
     * @return Contrato
     */
    public function setFechainic($fechainic)
    {
        $this->fechainic = $fechainic;

        return $this;
    }

    /**
     * Get fechainic
     *
     * @return \DateTime 
     */
    public function getFechainic()
    {
        return $this->fechainic;
    }

    /**
     * Set fechater
     *
     * @param \DateTime $fechater
     * @return Contrato
     */
    public function setFechater($fechater)
    {
        $this->fechater = $fechater;

        return $this;
    }

    /**
     * Get fechater
     *
     * @return \DateTime 
     */
    public function getFechater()
    {
        return $this->fechater;
    }

    /**
     * Set codemple
     *
     * @param string $codemple
     * @return Contrato
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
     * Set salario
     *
     * @param string $salario
     * @return Contrato
     */
    public function setSalario($salario)
    {
        $this->salario = $salario;

        return $this;
    }

    /**
     * Get salario
     *
     * @return string 
     */
    public function getSalario()
    {
        return $this->salario;
    }

    /**
     * Set salarioIbc
     *
     * @param integer $salarioIbc
     * @return Contrato
     */
    public function setSalarioIbc($salarioIbc)
    {
        $this->salarioIbc = $salarioIbc;

        return $this;
    }

    /**
     * Get salarioIbc
     *
     * @return integer 
     */
    public function getSalarioIbc()
    {
        return $this->salarioIbc;
    }

    /**
     * Set salarioAnterior
     *
     * @param integer $salarioAnterior
     * @return Contrato
     */
    public function setSalarioAnterior($salarioAnterior)
    {
        $this->salarioAnterior = $salarioAnterior;

        return $this;
    }

    /**
     * Get salarioAnterior
     *
     * @return integer 
     */
    public function getSalarioAnterior()
    {
        return $this->salarioAnterior;
    }

    /**
     * Set salarioFechaDesde
     *
     * @param \DateTime $salarioFechaDesde
     * @return Contrato
     */
    public function setSalarioFechaDesde($salarioFechaDesde)
    {
        $this->salarioFechaDesde = $salarioFechaDesde;

        return $this;
    }

    /**
     * Get salarioFechaDesde
     *
     * @return \DateTime 
     */
    public function getSalarioFechaDesde()
    {
        return $this->salarioFechaDesde;
    }

    /**
     * Set codigoCajaPk
     *
     * @param integer $codigoCajaPk
     * @return Contrato
     */
    public function setCodigoCajaPk($codigoCajaPk)
    {
        $this->codigoCajaPk = $codigoCajaPk;

        return $this;
    }

    /**
     * Get codigoCajaPk
     *
     * @return integer 
     */
    public function getCodigoCajaPk()
    {
        return $this->codigoCajaPk;
    }
}
