<?php

namespace Soga\NominaBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Table(name="nom_registro_exportacion")
 * @ORM\Entity(repositoryClass="Soga\NominaBundle\Repository\NomRegistroExportacionRepository")
 */
class NomRegistroExportacion {

    /**
     * @ORM\Id
     * @ORM\Column(name="codigo_registro_exportacion_pk", type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $codigoRegistroExportacionPk;

    /**
     * @ORM\Column(name="consecutivo", type="string", length=10, nullable=false)
     */    
    private $consecutivo;      
    
    /**
     * @ORM\Column(name="cuenta", type="string", length=10, nullable=false)
     */
    private $cuenta;

    /**
     * @ORM\Column(name="comprobante", type="string", length=10, nullable=false)
     */
    private $comprobante;

    /**
     * @ORM\Column(name="fecha", type="date", nullable=true)
     */
    private $fecha;

    /**
     * @ORM\Column(name="documento", type="string", length=10, nullable=false)
     */
    private $documento;

    /**
     * @ORM\Column(name="documento_referencia", type="string", length=10, nullable=false)
     */
    private $documentoReferencia;

    /**
     * @ORM\Column(name="nit", type="string", length=11, nullable=false)
     */
    private $nit;

    /**
     * @ORM\Column(name="detalle", type="string", length=80, nullable=false)
     */
    private $detalle;

    /**
     * @ORM\Column(name="tipo", type="integer", nullable=true)
     */
    private $tipo;

    /**
     * @ORM\Column(name="valor", type="float")
     */
    private $valor = 0;

    /**
     * @ORM\Column(name="base", type="float")
     */
    private $base = 0;

    /**
     * @ORM\Column(name="centro_costos", type="integer", nullable=true)
     */
    private $centroCostos;

    /**
     * @ORM\Column(name="transaccion_ext", type="string", length=80, nullable=false)
     */
    private $transaccionExt;

    /**
     * @ORM\Column(name="plazo", type="integer", nullable=true)
     */
    private $plazo;



    /**
     * Get codigoRegistroExportacionPk
     *
     * @return integer 
     */
    public function getCodigoRegistroExportacionPk()
    {
        return $this->codigoRegistroExportacionPk;
    }

    /**
     * Set cuenta
     *
     * @param string $cuenta
     * @return NomRegistroExportacion
     */
    public function setCuenta($cuenta)
    {
        $this->cuenta = $cuenta;

        return $this;
    }

    /**
     * Get cuenta
     *
     * @return string 
     */
    public function getCuenta()
    {
        return $this->cuenta;
    }

    /**
     * Set comprobante
     *
     * @param string $comprobante
     * @return NomRegistroExportacion
     */
    public function setComprobante($comprobante)
    {
        $this->comprobante = $comprobante;

        return $this;
    }

    /**
     * Get comprobante
     *
     * @return string 
     */
    public function getComprobante()
    {
        return $this->comprobante;
    }

    /**
     * Set fecha
     *
     * @param \DateTime $fecha
     * @return NomRegistroExportacion
     */
    public function setFecha($fecha)
    {
        $this->fecha = $fecha;

        return $this;
    }

    /**
     * Get fecha
     *
     * @return \DateTime 
     */
    public function getFecha()
    {
        return $this->fecha;
    }

    /**
     * Set documento
     *
     * @param string $documento
     * @return NomRegistroExportacion
     */
    public function setDocumento($documento)
    {
        $this->documento = $documento;

        return $this;
    }

    /**
     * Get documento
     *
     * @return string 
     */
    public function getDocumento()
    {
        return $this->documento;
    }

    /**
     * Set documentoReferencia
     *
     * @param string $documentoReferencia
     * @return NomRegistroExportacion
     */
    public function setDocumentoReferencia($documentoReferencia)
    {
        $this->documentoReferencia = $documentoReferencia;

        return $this;
    }

    /**
     * Get documentoReferencia
     *
     * @return string 
     */
    public function getDocumentoReferencia()
    {
        return $this->documentoReferencia;
    }

    /**
     * Set nit
     *
     * @param string $nit
     * @return NomRegistroExportacion
     */
    public function setNit($nit)
    {
        $this->nit = $nit;

        return $this;
    }

    /**
     * Get nit
     *
     * @return string 
     */
    public function getNit()
    {
        return $this->nit;
    }

    /**
     * Set detalle
     *
     * @param string $detalle
     * @return NomRegistroExportacion
     */
    public function setDetalle($detalle)
    {
        $this->detalle = $detalle;

        return $this;
    }

    /**
     * Get detalle
     *
     * @return string 
     */
    public function getDetalle()
    {
        return $this->detalle;
    }

    /**
     * Set tipo
     *
     * @param integer $tipo
     * @return NomRegistroExportacion
     */
    public function setTipo($tipo)
    {
        $this->tipo = $tipo;

        return $this;
    }

    /**
     * Get tipo
     *
     * @return integer 
     */
    public function getTipo()
    {
        return $this->tipo;
    }

    /**
     * Set valor
     *
     * @param float $valor
     * @return NomRegistroExportacion
     */
    public function setValor($valor)
    {
        $this->valor = $valor;

        return $this;
    }

    /**
     * Get valor
     *
     * @return float 
     */
    public function getValor()
    {
        return $this->valor;
    }

    /**
     * Set base
     *
     * @param float $base
     * @return NomRegistroExportacion
     */
    public function setBase($base)
    {
        $this->base = $base;

        return $this;
    }

    /**
     * Get base
     *
     * @return float 
     */
    public function getBase()
    {
        return $this->base;
    }

    /**
     * Set centroCostos
     *
     * @param integer $centroCostos
     * @return NomRegistroExportacion
     */
    public function setCentroCostos($centroCostos)
    {
        $this->centroCostos = $centroCostos;

        return $this;
    }

    /**
     * Get centroCostos
     *
     * @return integer 
     */
    public function getCentroCostos()
    {
        return $this->centroCostos;
    }

    /**
     * Set transaccionExt
     *
     * @param string $transaccionExt
     * @return NomRegistroExportacion
     */
    public function setTransaccionExt($transaccionExt)
    {
        $this->transaccionExt = $transaccionExt;

        return $this;
    }

    /**
     * Get transaccionExt
     *
     * @return string 
     */
    public function getTransaccionExt()
    {
        return $this->transaccionExt;
    }

    /**
     * Set plazo
     *
     * @param integer $plazo
     * @return NomRegistroExportacion
     */
    public function setPlazo($plazo)
    {
        $this->plazo = $plazo;

        return $this;
    }

    /**
     * Get plazo
     *
     * @return integer 
     */
    public function getPlazo()
    {
        return $this->plazo;
    }

    /**
     * Set consecutivo
     *
     * @param string $consecutivo
     * @return NomRegistroExportacion
     */
    public function setConsecutivo($consecutivo)
    {
        $this->consecutivo = $consecutivo;

        return $this;
    }

    /**
     * Get consecutivo
     *
     * @return string 
     */
    public function getConsecutivo()
    {
        return $this->consecutivo;
    }
}
