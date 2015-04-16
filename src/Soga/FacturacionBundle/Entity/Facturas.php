<?php

namespace Soga\FacturacionBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Table(name="factura")
 * @ORM\Entity(repositoryClass="Soga\FacturacionBundle\Repository\FacturasRepository")
 */
class Facturas
{
    /**
     * @ORM\Id
     * @ORM\Column(name="nrofactura", type="string", length=4)
     */ 
    private $nrofactura;  
    
    /**
     * @ORM\Column(name="codigo", type="string", length=7, nullable=false)
     */    
    private $codigo;
    
    /**
     * @ORM\Column(name="codzona", type="string", length=3, nullable=false)
     */    
    private $codzona;
    
    /**
     * @ORM\Column(name="fechaini", type="date", nullable=true)
     */    
    private $fechaini;
    
    /**
     * @ORM\Column(name="grantotal", type="integer", nullable=false)
     */    
    private $grantotal;    
    
    /**
     * @ORM\Column(name="exportado_contabilidad", type="integer", nullable=true)
     */    
    private $exportadoContabilidad;     
    
    /**
     * @ORM\Column(name="rfte", type="integer", nullable=false)
     */    
    private $rfte;     
    
    /**
     * @ORM\Column(name="rteiva", type="integer", nullable=false)
     */    
    private $rteiva;     

    /**
     * @ORM\Column(name="iva", type="integer", nullable=false)
     */    
    private $iva;     

    /**
     * @ORM\Column(name="subtotal", type="integer", nullable=false)
     */    
    private $subtotal;    
    
    /**
     * @ORM\Column(name="vlrcre", type="integer", nullable=false)
     */    
    private $vlrcre;     
    
    /**
     * @ORM\Column(name="nroservicio", type="integer", nullable=false)
     */    
    private $nroservicio;     
    
    /**
     * Set nrofactura
     *
     * @param string $nrofactura
     * @return Facturas
     */
    public function setNrofactura($nrofactura)
    {
        $this->nrofactura = $nrofactura;

        return $this;
    }

    /**
     * Get nrofactura
     *
     * @return string 
     */
    public function getNrofactura()
    {
        return $this->nrofactura;
    }

    /**
     * Set codigo
     *
     * @param string $codigo
     * @return Facturas
     */
    public function setCodigo($codigo)
    {
        $this->codigo = $codigo;

        return $this;
    }

    /**
     * Get codigo
     *
     * @return string 
     */
    public function getCodigo()
    {
        return $this->codigo;
    }

    /**
     * Set codzona
     *
     * @param string $codzona
     * @return Facturas
     */
    public function setCodzona($codzona)
    {
        $this->codzona = $codzona;

        return $this;
    }

    /**
     * Get codzona
     *
     * @return string 
     */
    public function getCodzona()
    {
        return $this->codzona;
    }

    /**
     * Set fechaini
     *
     * @param \DateTime $fechaini
     * @return Facturas
     */
    public function setFechaini($fechaini)
    {
        $this->fechaini = $fechaini;

        return $this;
    }

    /**
     * Get fechaini
     *
     * @return \DateTime 
     */
    public function getFechaini()
    {
        return $this->fechaini;
    }

    /**
     * Set grantotal
     *
     * @param integer $grantotal
     * @return Facturas
     */
    public function setGrantotal($grantotal)
    {
        $this->grantotal = $grantotal;

        return $this;
    }

    /**
     * Get grantotal
     *
     * @return integer 
     */
    public function getGrantotal()
    {
        return $this->grantotal;
    }

    /**
     * Set exportadoContabilidad
     *
     * @param integer $exportadoContabilidad
     * @return Facturas
     */
    public function setExportadoContabilidad($exportadoContabilidad)
    {
        $this->exportadoContabilidad = $exportadoContabilidad;

        return $this;
    }

    /**
     * Get exportadoContabilidad
     *
     * @return integer 
     */
    public function getExportadoContabilidad()
    {
        return $this->exportadoContabilidad;
    }

    /**
     * Set rfte
     *
     * @param integer $rfte
     * @return Facturas
     */
    public function setRfte($rfte)
    {
        $this->rfte = $rfte;

        return $this;
    }

    /**
     * Get rfte
     *
     * @return integer 
     */
    public function getRfte()
    {
        return $this->rfte;
    }

    /**
     * Set rteiva
     *
     * @param integer $rteiva
     * @return Facturas
     */
    public function setRteiva($rteiva)
    {
        $this->rteiva = $rteiva;

        return $this;
    }

    /**
     * Get rteiva
     *
     * @return integer 
     */
    public function getRteiva()
    {
        return $this->rteiva;
    }

    /**
     * Set iva
     *
     * @param integer $iva
     * @return Facturas
     */
    public function setIva($iva)
    {
        $this->iva = $iva;

        return $this;
    }

    /**
     * Get iva
     *
     * @return integer 
     */
    public function getIva()
    {
        return $this->iva;
    }

    /**
     * Set subtotal
     *
     * @param integer $subtotal
     * @return Facturas
     */
    public function setSubtotal($subtotal)
    {
        $this->subtotal = $subtotal;

        return $this;
    }

    /**
     * Get subtotal
     *
     * @return integer 
     */
    public function getSubtotal()
    {
        return $this->subtotal;
    }

    /**
     * Set vlrcre
     *
     * @param integer $vlrcre
     * @return Facturas
     */
    public function setVlrcre($vlrcre)
    {
        $this->vlrcre = $vlrcre;

        return $this;
    }

    /**
     * Get vlrcre
     *
     * @return integer 
     */
    public function getVlrcre()
    {
        return $this->vlrcre;
    }

    /**
     * Set nroservicio
     *
     * @param integer $nroservicio
     * @return Facturas
     */
    public function setNroservicio($nroservicio)
    {
        $this->nroservicio = $nroservicio;

        return $this;
    }

    /**
     * Get nroservicio
     *
     * @return integer 
     */
    public function getNroservicio()
    {
        return $this->nroservicio;
    }
}
