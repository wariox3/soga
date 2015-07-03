<?php

namespace Soga\NominaBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Table(name="municipio")
 * @ORM\Entity(repositoryClass="Soga\NominaBundle\Repository\MunicipioRepository")
 */
class Municipio
{
    /**
     * @ORM\Id
     * @ORM\Column(name="codmuni", type="string", length=10)
     */ 
    private $codmuni;
    
    /**
     * @ORM\Column(name="municipio", type="string", length=50, nullable=false)
     */    
    private $municipio;     
    
    /**
     * @ORM\Column(name="codepart", type="string", length=2, nullable=false)
     */    
    private $codepart;    
    
    /**
     * Set codmuni
     *
     * @param string $codmuni
     * @return Municipio
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
     * Set municipio
     *
     * @param string $municipio
     * @return Municipio
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
     * Set codepart
     *
     * @param string $codepart
     * @return Municipio
     */
    public function setCodepart($codepart)
    {
        $this->codepart = $codepart;

        return $this;
    }

    /**
     * Get codepart
     *
     * @return string 
     */
    public function getCodepart()
    {
        return $this->codepart;
    }
}
