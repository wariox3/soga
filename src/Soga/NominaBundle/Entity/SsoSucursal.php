<?php

namespace Soga\NominaBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Table(name="sso_sucursal")
 * @ORM\Entity(repositoryClass="Soga\NominaBundle\Repository\SsoSucursalRepository")
 */
class SsoSucursal {

    /**
     * @ORM\Id
     * @ORM\Column(name="codigo_sucursal_pk", type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $codigoSucursalPk;

    /**
     * @ORM\Column(name="nombre", type="string", length=50, nullable=false)
     */    
    private $nombre;

    /**
     * @ORM\Column(name="codigo_pila", type="string", length=10, nullable=false)
     */    
    private $codigoPila;    
    

    /**
     * Get codigoSucursalPk
     *
     * @return integer 
     */
    public function getCodigoSucursalPk()
    {
        return $this->codigoSucursalPk;
    }

    /**
     * Set nombre
     *
     * @param string $nombre
     * @return SsoSucursal
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
     * Set codigoPila
     *
     * @param string $codigoPila
     * @return SsoSucursal
     */
    public function setCodigoPila($codigoPila)
    {
        $this->codigoPila = $codigoPila;

        return $this;
    }

    /**
     * Get codigoPila
     *
     * @return string 
     */
    public function getCodigoPila()
    {
        return $this->codigoPila;
    }
}
