<?php

namespace Soga\NominaBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Table(name="sso_empleado")
 * @ORM\Entity(repositoryClass="Soga\NominaBundle\Repository\SsoEmpleadoRepository")
 */
class SsoEmpleado
{
    /**
     * @ORM\Id
     * @ORM\Column(name="codigo_empleado_pk", type="integer")
     */ 
    private $codigoEmpleadoPk;

    /**
     * @ORM\Column(name="numero_identificacion", type="string", length=15, nullable=false)
     */    
    private $numeroIdentificacion;    

    /**
     * @ORM\Column(name="codigo_tipo_cotizante_fk", type="integer", nullable=true)
     */    
    private $codigoTipoCotizanteFk;

    /**
     * @ORM\Column(name="codigo_subtipo_cotizante_fk", type="integer", nullable=true)
     */    
    private $codigoSubtipoCotizanteFk;    
    
    /**
     * @ORM\Column(name="extranjero_no_obligado_cotizar_pensiones", type="string", length=1)
     */
    private $extranjeroNoObligadoCotizarPensiones;    
    
    /**
     * @ORM\Column(name="colombiano_residente_exterior", type="string", length=1)
     */
    private $colombianoResidenteExterior;    
    
    /**
     * @ORM\ManyToOne(targetEntity="SsoTipoCotizante", inversedBy="empleadosTipoCotizanteRel")
     * @ORM\JoinColumn(name="codigo_tipo_cotizante_fk", referencedColumnName="codigo_tipo_cotizante_pk")
     */
    protected $tipoCotizanteRel;    
    
    /**
     * @ORM\ManyToOne(targetEntity="SsoSubtipoCotizante", inversedBy="empleadosSubtipoCotizanteRel")
     * @ORM\JoinColumn(name="codigo_subtipo_cotizante_fk", referencedColumnName="codigo_subtipo_cotizante_pk")
     */
    protected $subtipoCotizanteRel;     
    
    /**
     * Set codigoEmpleadoPk
     *
     * @param integer $codigoEmpleadoPk
     * @return SsoEmpleado
     */
    public function setCodigoEmpleadoPk($codigoEmpleadoPk)
    {
        $this->codigoEmpleadoPk = $codigoEmpleadoPk;

        return $this;
    }

    /**
     * Get codigoEmpleadoPk
     *
     * @return integer 
     */
    public function getCodigoEmpleadoPk()
    {
        return $this->codigoEmpleadoPk;
    }

    /**
     * Set numeroIdentificacion
     *
     * @param string $numeroIdentificacion
     * @return SsoEmpleado
     */
    public function setNumeroIdentificacion($numeroIdentificacion)
    {
        $this->numeroIdentificacion = $numeroIdentificacion;

        return $this;
    }

    /**
     * Get numeroIdentificacion
     *
     * @return string 
     */
    public function getNumeroIdentificacion()
    {
        return $this->numeroIdentificacion;
    }

    /**
     * Set codigoTipoCotizanteFk
     *
     * @param integer $codigoTipoCotizanteFk
     * @return SsoEmpleado
     */
    public function setCodigoTipoCotizanteFk($codigoTipoCotizanteFk)
    {
        $this->codigoTipoCotizanteFk = $codigoTipoCotizanteFk;

        return $this;
    }

    /**
     * Get codigoTipoCotizanteFk
     *
     * @return integer 
     */
    public function getCodigoTipoCotizanteFk()
    {
        return $this->codigoTipoCotizanteFk;
    }

    /**
     * Set tipoCotizanteRel
     *
     * @param \Soga\NominaBundle\Entity\SsoTipoCotizante $tipoCotizanteRel
     * @return SsoEmpleado
     */
    public function setTipoCotizanteRel(\Soga\NominaBundle\Entity\SsoTipoCotizante $tipoCotizanteRel = null)
    {
        $this->tipoCotizanteRel = $tipoCotizanteRel;

        return $this;
    }

    /**
     * Get tipoCotizanteRel
     *
     * @return \Soga\NominaBundle\Entity\SsoTipoCotizante 
     */
    public function getTipoCotizanteRel()
    {
        return $this->tipoCotizanteRel;
    }

    /**
     * Set codigoSubtipoCotizanteFk
     *
     * @param integer $codigoSubtipoCotizanteFk
     * @return SsoEmpleado
     */
    public function setCodigoSubtipoCotizanteFk($codigoSubtipoCotizanteFk)
    {
        $this->codigoSubtipoCotizanteFk = $codigoSubtipoCotizanteFk;

        return $this;
    }

    /**
     * Get codigoSubtipoCotizanteFk
     *
     * @return integer 
     */
    public function getCodigoSubtipoCotizanteFk()
    {
        return $this->codigoSubtipoCotizanteFk;
    }

    /**
     * Set subtipoCotizanteRel
     *
     * @param \Soga\NominaBundle\Entity\SsoSubtipoCotizante $subtipoCotizanteRel
     * @return SsoEmpleado
     */
    public function setSubtipoCotizanteRel(\Soga\NominaBundle\Entity\SsoSubtipoCotizante $subtipoCotizanteRel = null)
    {
        $this->subtipoCotizanteRel = $subtipoCotizanteRel;

        return $this;
    }

    /**
     * Get subtipoCotizanteRel
     *
     * @return \Soga\NominaBundle\Entity\SsoSubtipoCotizante 
     */
    public function getSubtipoCotizanteRel()
    {
        return $this->subtipoCotizanteRel;
    }

    /**
     * Set extranjeroNoObligadoCotizarPensiones
     *
     * @param string $extranjeroNoObligadoCotizarPensiones
     * @return SsoEmpleado
     */
    public function setExtranjeroNoObligadoCotizarPensiones($extranjeroNoObligadoCotizarPensiones)
    {
        $this->extranjeroNoObligadoCotizarPensiones = $extranjeroNoObligadoCotizarPensiones;

        return $this;
    }

    /**
     * Get extranjeroNoObligadoCotizarPensiones
     *
     * @return string 
     */
    public function getExtranjeroNoObligadoCotizarPensiones()
    {
        return $this->extranjeroNoObligadoCotizarPensiones;
    }

    /**
     * Set colombianoResidenteExterior
     *
     * @param string $colombianoResidenteExterior
     * @return SsoEmpleado
     */
    public function setColombianoResidenteExterior($colombianoResidenteExterior)
    {
        $this->colombianoResidenteExterior = $colombianoResidenteExterior;

        return $this;
    }

    /**
     * Get colombianoResidenteExterior
     *
     * @return string 
     */
    public function getColombianoResidenteExterior()
    {
        return $this->colombianoResidenteExterior;
    }
}
