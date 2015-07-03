<?php

namespace Soga\NominaBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Table(name="sso_subtipo_cotizante")
 * @ORM\Entity(repositoryClass="Soga\NominaBundle\Repository\SsoSubtipoCotizanteRepository")
 */
class SsoSubtipoCotizante {

    /**
     * @ORM\Id
     * @ORM\Column(name="codigo_subtipo_cotizante_pk", type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $codigoSubtipoCotizantePk;

    /**
     * @ORM\Column(name="nombre", type="string", length=200)
     */
    private $nombre;    

    /**
     * @ORM\Column(name="codigo_pila", type="string", length=2)
     */
    private $codigo_pila;    


    /**
     * Get codigoSubtipoCotizantePk
     *
     * @return integer 
     */
    public function getCodigoSubtipoCotizantePk()
    {
        return $this->codigoSubtipoCotizantePk;
    }

    /**
     * Set nombre
     *
     * @param string $nombre
     * @return SsoSubtipoCotizante
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
     * Set codigo_pila
     *
     * @param string $codigoPila
     * @return SsoSubtipoCotizante
     */
    public function setCodigoPila($codigoPila)
    {
        $this->codigo_pila = $codigoPila;

        return $this;
    }

    /**
     * Get codigo_pila
     *
     * @return string 
     */
    public function getCodigoPila()
    {
        return $this->codigo_pila;
    }
}
