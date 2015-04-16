<?php

namespace Soga\NominaBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Table(name="eps")
 * @ORM\Entity(repositoryClass="Soga\NominaBundle\Repository\EpsRepository")
 */
class Eps
{
    /**
     * @ORM\Id
     * @ORM\Column(name="codeps", type="integer")
     */ 
    private $codeps;
    
    /**
     * @ORM\Column(name="eps", type="string", length=40, nullable=false)
     */    
    private $eps;      
    
    /**
     * @ORM\Column(name="nit", type="string", length=10, nullable=false)
     */    
    private $nit;




    /**
     * Set codeps
     *
     * @param integer $codeps
     * @return Eps
     */
    public function setCodeps($codeps)
    {
        $this->codeps = $codeps;

        return $this;
    }

    /**
     * Get codeps
     *
     * @return integer 
     */
    public function getCodeps()
    {
        return $this->codeps;
    }

    /**
     * Set eps
     *
     * @param string $eps
     * @return Eps
     */
    public function setEps($eps)
    {
        $this->eps = $eps;

        return $this;
    }

    /**
     * Get eps
     *
     * @return string 
     */
    public function getEps()
    {
        return $this->eps;
    }

    /**
     * Set nit
     *
     * @param string $nit
     * @return Eps
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
