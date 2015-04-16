<?php

namespace Soga\FacturacionBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Table(name="fac_configuracion")
 * @ORM\Entity(repositoryClass="Soga\FacturacionBundle\Repository\FacConfiguracionRepository")
 */
class FacConfiguracion {

    /**
     * @ORM\Id
     * @ORM\Column(name="codigo_configuracion_pk", type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $codigoConfiguracionPk;       
    
    /**
     * @ORM\Column(name="comprobante_facturas", type="string", length=5, nullable=false)
     */
    private $comprobanteFacturas;    
    
    /**
     * @ORM\Column(name="cuenta_iva", type="string", length=10, nullable=false)
     */
    private $cuentaIva; 

    /**
     * @ORM\Column(name="cuenta_rtefte", type="string", length=10, nullable=false)
     */
    private $cuentaRteFte;    
    
    /**
     * @ORM\Column(name="cuenta_rteiva", type="string", length=10, nullable=false)
     */
    private $cuentaRteIva;    
    
    /**
     * @ORM\Column(name="cuenta_cartera", type="string", length=10, nullable=false)
     */
    private $cuentaCartera;    

    /**
     * @ORM\Column(name="cuenta_cree", type="string", length=10, nullable=false)
     */
    private $cuentaCREE;    
    
    /**
     * @ORM\Column(name="cuenta_cree_cartera", type="string", length=10, nullable=false)
     */
    private $cuentaCREECartera;    
    
    /**
     * Get codigoConfiguracionPk
     *
     * @return integer 
     */
    public function getCodigoConfiguracionPk()
    {
        return $this->codigoConfiguracionPk;
    }

    /**
     * Set comprobanteFacturas
     *
     * @param string $comprobanteFacturas
     * @return FacConfiguracion
     */
    public function setComprobanteFacturas($comprobanteFacturas)
    {
        $this->comprobanteFacturas = $comprobanteFacturas;

        return $this;
    }

    /**
     * Get comprobanteFacturas
     *
     * @return string 
     */
    public function getComprobanteFacturas()
    {
        return $this->comprobanteFacturas;
    }

    /**
     * Set cuentaIva
     *
     * @param string $cuentaIva
     * @return FacConfiguracion
     */
    public function setCuentaIva($cuentaIva)
    {
        $this->cuentaIva = $cuentaIva;

        return $this;
    }

    /**
     * Get cuentaIva
     *
     * @return string 
     */
    public function getCuentaIva()
    {
        return $this->cuentaIva;
    }

    /**
     * Set cuentaRteFte
     *
     * @param string $cuentaRteFte
     * @return FacConfiguracion
     */
    public function setCuentaRteFte($cuentaRteFte)
    {
        $this->cuentaRteFte = $cuentaRteFte;

        return $this;
    }

    /**
     * Get cuentaRteFte
     *
     * @return string 
     */
    public function getCuentaRteFte()
    {
        return $this->cuentaRteFte;
    }

    /**
     * Set cuentaRteIva
     *
     * @param string $cuentaRteIva
     * @return FacConfiguracion
     */
    public function setCuentaRteIva($cuentaRteIva)
    {
        $this->cuentaRteIva = $cuentaRteIva;

        return $this;
    }

    /**
     * Get cuentaRteIva
     *
     * @return string 
     */
    public function getCuentaRteIva()
    {
        return $this->cuentaRteIva;
    }

    /**
     * Set cuentaCartera
     *
     * @param string $cuentaCartera
     * @return FacConfiguracion
     */
    public function setCuentaCartera($cuentaCartera)
    {
        $this->cuentaCartera = $cuentaCartera;

        return $this;
    }

    /**
     * Get cuentaCartera
     *
     * @return string 
     */
    public function getCuentaCartera()
    {
        return $this->cuentaCartera;
    }

    /**
     * Set cuentaCREE
     *
     * @param string $cuentaCREE
     * @return FacConfiguracion
     */
    public function setCuentaCREE($cuentaCREE)
    {
        $this->cuentaCREE = $cuentaCREE;

        return $this;
    }

    /**
     * Get cuentaCREE
     *
     * @return string 
     */
    public function getCuentaCREE()
    {
        return $this->cuentaCREE;
    }

    /**
     * Set cuentaCREECartera
     *
     * @param string $cuentaCREECartera
     * @return FacConfiguracion
     */
    public function setCuentaCREECartera($cuentaCREECartera)
    {
        $this->cuentaCREECartera = $cuentaCREECartera;

        return $this;
    }

    /**
     * Get cuentaCREECartera
     *
     * @return string 
     */
    public function getCuentaCREECartera()
    {
        return $this->cuentaCREECartera;
    }
}
