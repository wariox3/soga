<?php

namespace Soga\NominaBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Table(name="centro")
 * @ORM\Entity(repositoryClass="Soga\NominaBundle\Repository\CentroRepository")
 */
class Centro
{
    /**
     * @ORM\Id
     * @ORM\Column(name="codcentro", type="string", length=6)
     */ 
    private $codcentro;     

    /**
     * @ORM\Column(name="cedemple", type="string", length=15)
     */    
    private $cedemple;          


    /**
     * Set codcentro
     *
     * @param string $codcentro
     * @return Centro
     */
    public function setCodcentro($codcentro)
    {
        $this->codcentro = $codcentro;

        return $this;
    }

    /**
     * Get codcentro
     *
     * @return string 
     */
    public function getCodcentro()
    {
        return $this->codcentro;
    }

    /**
     * Set cedemple
     *
     * @param string $cedemple
     * @return Centro
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
}
