<?php

namespace Soga\FacturacionBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Table(name="item")
 * @ORM\Entity(repositoryClass="Soga\FacturacionBundle\Repository\ItemRepository")
 */
class Item
{
    /**
     * @ORM\Id
     * @ORM\Column(name="codcom", type="string", length=10, nullable=false)
     */ 
    private $codcom;  
    
    /**
     * @ORM\Column(name="concepto", type="string", length=50, nullable=false)
     */    
    private $concepto;
    
    /**
     * @ORM\Column(name="sumar", type="string", length=2, nullable=false)
     */    
    private $sumar;

    /**
     * @ORM\Column(name="basefte", type="float")
     */    
    private $basefte;    

    /**
     * @ORM\Column(name="cuenta_interface", type="string", length=10, nullable=false)
     */    
    private $cuentaInterface;    
    

    /**
     * Set codcom
     *
     * @param string $codcom
     * @return Item
     */
    public function setCodcom($codcom)
    {
        $this->codcom = $codcom;

        return $this;
    }

    /**
     * Get codcom
     *
     * @return string 
     */
    public function getCodcom()
    {
        return $this->codcom;
    }

    /**
     * Set concepto
     *
     * @param string $concepto
     * @return Item
     */
    public function setConcepto($concepto)
    {
        $this->concepto = $concepto;

        return $this;
    }

    /**
     * Get concepto
     *
     * @return string 
     */
    public function getConcepto()
    {
        return $this->concepto;
    }

    /**
     * Set sumar
     *
     * @param string $sumar
     * @return Item
     */
    public function setSumar($sumar)
    {
        $this->sumar = $sumar;

        return $this;
    }

    /**
     * Get sumar
     *
     * @return string 
     */
    public function getSumar()
    {
        return $this->sumar;
    }

    /**
     * Set basefte
     *
     * @param float $basefte
     * @return Item
     */
    public function setBasefte($basefte)
    {
        $this->basefte = $basefte;

        return $this;
    }

    /**
     * Get basefte
     *
     * @return float 
     */
    public function getBasefte()
    {
        return $this->basefte;
    }

    /**
     * Set cuentaInterface
     *
     * @param string $cuentaInterface
     * @return Item
     */
    public function setCuentaInterface($cuentaInterface)
    {
        $this->cuentaInterface = $cuentaInterface;

        return $this;
    }

    /**
     * Get cuentaInterface
     *
     * @return string 
     */
    public function getCuentaInterface()
    {
        return $this->cuentaInterface;
    }
}
