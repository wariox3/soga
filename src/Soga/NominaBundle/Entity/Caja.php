<?php

namespace Soga\NominaBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Table(name="caja")
 * @ORM\Entity(repositoryClass="Soga\NominaBundle\Repository\CajaRepository")
 */
class Caja
{
    /**
     * @ORM\Id
     * @ORM\Column(name="codigo_caja_pk", type="integer")
     */ 
    private $codigoCajaPk;
    
    /**
     * @ORM\Column(name="nombre", type="string", length=40, nullable=false)
     */    
    private $nombre;         

    /**
     * @ORM\Column(name="codigo_interface_pila", type="string", length=6)
     */    
    private $codigoInterfacePila;    


    /**
     * Set codigoCajaPk
     *
     * @param integer $codigoCajaPk
     * @return Caja
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

    /**
     * Set nombre
     *
     * @param string $nombre
     * @return Caja
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
     * Set codigoInterfacePila
     *
     * @param string $codigoInterfacePila
     * @return Caja
     */
    public function setCodigoInterfacePila($codigoInterfacePila)
    {
        $this->codigoInterfacePila = $codigoInterfacePila;

        return $this;
    }

    /**
     * Get codigoInterfacePila
     *
     * @return string 
     */
    public function getCodigoInterfacePila()
    {
        return $this->codigoInterfacePila;
    }
}
