<?php

namespace Soga\NominaBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Table(name="denomina")
 * @ORM\Entity(repositoryClass="Soga\NominaBundle\Repository\DenominaRepository")
 */
class Denomina
{
    /**
     * @ORM\Id
     * @ORM\Column(name="conse", type="integer")
     */ 
    private $conse;
    
    /**
     * @ORM\Column(name="consecutivo", type="string", length=10, nullable=false)
     */    
    private $consecutivo;  
    
    /**
     * @ORM\Column(name="codsala", type="string", length=10, nullable=false)
     */    
    private $codsala;   

    /**
     * @ORM\Column(name="salario", type="integer")
     */    
    private $salario;       

    /**
     * @ORM\Column(name="deduccion", type="integer")
     */    
    private $deduccion;           
    
    /**
     * @ORM\Column(name="ibcprestacional", type="float")
     */    
    private $ibcprestacional;    

    /**
     * @ORM\Column(name="nrohora", type="integer")
     */    
    private $nrohora;     
    
    /**
     * Set conse
     *
     * @param integer $conse
     * @return Denomina
     */
    public function setConse($conse)
    {
        $this->conse = $conse;

        return $this;
    }

    /**
     * Get conse
     *
     * @return integer 
     */
    public function getConse()
    {
        return $this->conse;
    }

    /**
     * Set consecutivo
     *
     * @param string $consecutivo
     * @return Denomina
     */
    public function setConsecutivo($consecutivo)
    {
        $this->consecutivo = $consecutivo;

        return $this;
    }

    /**
     * Get consecutivo
     *
     * @return string 
     */
    public function getConsecutivo()
    {
        return $this->consecutivo;
    }

    /**
     * Set codsala
     *
     * @param string $codsala
     * @return Denomina
     */
    public function setCodsala($codsala)
    {
        $this->codsala = $codsala;

        return $this;
    }

    /**
     * Get codsala
     *
     * @return string 
     */
    public function getCodsala()
    {
        return $this->codsala;
    }

    /**
     * Set salario
     *
     * @param integer $salario
     * @return Denomina
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
     * Set deduccion
     *
     * @param integer $deduccion
     * @return Denomina
     */
    public function setDeduccion($deduccion)
    {
        $this->deduccion = $deduccion;

        return $this;
    }

    /**
     * Get deduccion
     *
     * @return integer 
     */
    public function getDeduccion()
    {
        return $this->deduccion;
    }

    /**
     * Set ibcprestacional
     *
     * @param float $ibcprestacional
     * @return Denomina
     */
    public function setIbcprestacional($ibcprestacional)
    {
        $this->ibcprestacional = $ibcprestacional;

        return $this;
    }

    /**
     * Get ibcprestacional
     *
     * @return float 
     */
    public function getIbcprestacional()
    {
        return $this->ibcprestacional;
    }

    /**
     * Set nrohora
     *
     * @param integer $nrohora
     * @return Denomina
     */
    public function setNrohora($nrohora)
    {
        $this->nrohora = $nrohora;

        return $this;
    }

    /**
     * Get nrohora
     *
     * @return integer 
     */
    public function getNrohora()
    {
        return $this->nrohora;
    }
}
