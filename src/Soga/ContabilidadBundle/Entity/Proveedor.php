<?php

namespace Soga\ContabilidadBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Table(name="provedor")
 * @ORM\Entity(repositoryClass="Soga\ContabilidadBundle\Repository\ProveedorRepository")
 */
class Proveedor
{
    /**
     * @ORM\Id
     * @ORM\Column(name="nitprove", type="string", length=15)
     */
    private $nitprove;

    /**
     * @ORM\Column(name="nomprove", type="string", length=40, nullable=false)
     */
    private $nomprove;
 

    /**
     * Set nitprove
     *
     * @param string $nitprove
     * @return Proveedor
     */
    public function setNitprove($nitprove)
    {
        $this->nitprove = $nitprove;

        return $this;
    }

    /**
     * Get nitprove
     *
     * @return string 
     */
    public function getNitprove()
    {
        return $this->nitprove;
    }

    /**
     * Set nomprove
     *
     * @param string $nomprove
     * @return Proveedor
     */
    public function setNomprove($nomprove)
    {
        $this->nomprove = $nomprove;

        return $this;
    }

    /**
     * Get nomprove
     *
     * @return string 
     */
    public function getNomprove()
    {
        return $this->nomprove;
    }
}
