<?php

namespace Soga\NominaBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Table(name="sso_tipo_cotizante")
 * @ORM\Entity(repositoryClass="Soga\NominaBundle\Repository\SsoTipoCotizanteRepository")
 */
class SsoTipoCotizante {

    /**
     * @ORM\Id
     * @ORM\Column(name="codigo_tipo_cotizante_pk", type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $codigoTipoCotizantePk;

    /**
     * @ORM\Column(name="nombre", type="string", length=200)
     */
    private $nombre;    

    /**
     * @ORM\Column(name="codigo_pila", type="string", length=2)
     */
    private $codigo_pila;    


    /**
     * Get codigoTipoCotizantePk
     *
     * @return integer 
     */
    public function getCodigoTipoCotizantePk()
    {
        return $this->codigoTipoCotizantePk;
    }

    /**
     * Set nombre
     *
     * @param string $nombre
     * @return SsoTipoCotizante
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
     * @return SsoTipoCotizante
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
