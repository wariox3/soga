<?php

namespace Soga\NominaBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Table(name="pension")
 * @ORM\Entity(repositoryClass="Soga\NominaBundle\Repository\PensionRepository")
 */
class Pension
{
    /**
     * @ORM\Id
     * @ORM\Column(name="codpension", type="integer")
     */ 
    private $codpension;
    
    /**
     * @ORM\Column(name="pension", type="string", length=40, nullable=false)
     */    
    private $pension;     
    
    /**
     * @ORM\Column(name="nit", type="string", length=10, nullable=false)
     */    
    private $nit;


    /**
     * Set codpension
     *
     * @param integer $codpension
     * @return Pension
     */
    public function setCodpension($codpension)
    {
        $this->codpension = $codpension;

        return $this;
    }

    /**
     * Get codpension
     *
     * @return integer 
     */
    public function getCodpension()
    {
        return $this->codpension;
    }

    /**
     * Set pension
     *
     * @param string $pension
     * @return Pension
     */
    public function setPension($pension)
    {
        $this->pension = $pension;

        return $this;
    }

    /**
     * Get pension
     *
     * @return string 
     */
    public function getPension()
    {
        return $this->pension;
    }

    /**
     * Set nit
     *
     * @param string $nit
     * @return Pension
     */
    public function setNit($nit)
    {
        $this->nit = $nit;

        return $this;
    }

    /**
     * Get nit
     *
     * @return string 
     */
    public function getNit()
    {
        return $this->nit;
    }
}
