<?php

namespace Soga\ContabilidadBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Table(name="banco")
 * @ORM\Entity(repositoryClass="Soga\ContabilidadBundle\Repository\BancosRepository")
 */
class Bancos
{
    /**
     * @ORM\Id
     * @ORM\Column(name="codbanco", type="string", length=10)
     */
    private $codbanco;

    /**
     * @ORM\Column(name="bancos", type="string", length=40, nullable=false)
     */
    private $bancos;

    /**
     * @ORM\Column(name="nomina", type="string", length=2, nullable=false)
     */
    private $nomina;    

    /**
     * @ORM\Column(name="cuenta_ahorro", type="string", length=10, nullable=false)
     */
    private $cuentaAhorro;
    
    /**
     * @ORM\Column(name="cuenta_corriente", type="string", length=10, nullable=false)
     */
    private $cuentaCorriente;    
    
    /**
     * @ORM\Column(name="cuenta_oficina", type="string", length=10, nullable=false)
     */
    private $cuentaOficina;    

    /**
     * Set codbanco
     *
     * @param string $codbanco
     * @return Bancos
     */
    public function setCodbanco($codbanco)
    {
        $this->codbanco = $codbanco;

        return $this;
    }

    /**
     * Get codbanco
     *
     * @return string 
     */
    public function getCodbanco()
    {
        return $this->codbanco;
    }

    /**
     * Set bancos
     *
     * @param string $bancos
     * @return Bancos
     */
    public function setBancos($bancos)
    {
        $this->bancos = $bancos;

        return $this;
    }

    /**
     * Get bancos
     *
     * @return string 
     */
    public function getBancos()
    {
        return $this->bancos;
    }

    /**
     * Set nomina
     *
     * @param string $nomina
     * @return Bancos
     */
    public function setNomina($nomina)
    {
        $this->nomina = $nomina;

        return $this;
    }

    /**
     * Get nomina
     *
     * @return string 
     */
    public function getNomina()
    {
        return $this->nomina;
    }

    /**
     * Set cuentaAhorro
     *
     * @param string $cuentaAhorro
     * @return Bancos
     */
    public function setCuentaAhorro($cuentaAhorro)
    {
        $this->cuentaAhorro = $cuentaAhorro;

        return $this;
    }

    /**
     * Get cuentaAhorro
     *
     * @return string 
     */
    public function getCuentaAhorro()
    {
        return $this->cuentaAhorro;
    }

    /**
     * Set cuentaCorriente
     *
     * @param string $cuentaCorriente
     * @return Bancos
     */
    public function setCuentaCorriente($cuentaCorriente)
    {
        $this->cuentaCorriente = $cuentaCorriente;

        return $this;
    }

    /**
     * Get cuentaCorriente
     *
     * @return string 
     */
    public function getCuentaCorriente()
    {
        return $this->cuentaCorriente;
    }

    /**
     * Set cuentaOficina
     *
     * @param string $cuentaOficina
     * @return Bancos
     */
    public function setCuentaOficina($cuentaOficina)
    {
        $this->cuentaOficina = $cuentaOficina;

        return $this;
    }

    /**
     * Get cuentaOficina
     *
     * @return string 
     */
    public function getCuentaOficina()
    {
        return $this->cuentaOficina;
    }
}
