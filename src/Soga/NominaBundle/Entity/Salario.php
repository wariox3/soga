<?php

namespace Soga\NominaBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Table(name="salario")
 * @ORM\Entity(repositoryClass="Soga\NominaBundle\Repository\SalarioRepository")
 */
class Salario
{
    /**
     * @ORM\Id
     * @ORM\Column(name="codsala", type="string", length=15)
     */ 
    private $codsala;  
    
    /**
     * @ORM\Column(name="desala", type="string", length=45, nullable=false)
     */
    private $desala;        
    
    /**
     * @ORM\Column(name="cuenta", type="string", length=10, nullable=false)
     */
    private $cuenta;    

    /**
     * @ORM\Column(name="cuenta2", type="string", length=10, nullable=false)
     */
    private $cuenta2;    

    /**
     * @ORM\Column(name="cuenta3", type="string", length=10, nullable=false)
     */
    private $cuenta3;    
    
    /**
     * @ORM\Column(name="tipo_asiento", type="integer")
     */
    private $tipo_asiento;        

    /**
     * @ORM\Column(name="nit_fijo", type="integer")
     */
    private $nitFijo;
    
    /**
     * @ORM\Column(name="nit", type="string", length=10, nullable=false)
     */
    private $nit;    
    
    /**
     * @ORM\Column(name="nit_empleado", type="integer")
     */
    private $nitEmpleado;    
    
    /**
     * @ORM\Column(name="nit_empresa_usuaria", type="integer")
     */
    private $nitEmpresaUsuaria;    
    
    /**
     * Set codsala
     *
     * @param string $codsala
     * @return Salario
     */
    public function setCodsala($codsala)
    {
        $this->codsala = $codsala;

        return $this;
    }

    /**
     * Get codsala
     *
     * @return string 
     */
    public function getCodsala()
    {
        return $this->codsala;
    }

    /**
     * Set cuenta
     *
     * @param string $cuenta
     * @return Salario
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
     * Set tipo_asiento
     *
     * @param integer $tipoAsiento
     * @return Salario
     */
    public function setTipoAsiento($tipoAsiento)
    {
        $this->tipo_asiento = $tipoAsiento;

        return $this;
    }

    /**
     * Get tipo_asiento
     *
     * @return integer 
     */
    public function getTipoAsiento()
    {
        return $this->tipo_asiento;
    }

    /**
     * Set desala
     *
     * @param string $desala
     * @return Salario
     */
    public function setDesala($desala)
    {
        $this->desala = $desala;

        return $this;
    }

    /**
     * Get desala
     *
     * @return string 
     */
    public function getDesala()
    {
        return $this->desala;
    }

    /**
     * Set nitFijo
     *
     * @param integer $nitFijo
     * @return Salario
     */
    public function setNitFijo($nitFijo)
    {
        $this->nitFijo = $nitFijo;

        return $this;
    }

    /**
     * Get nitFijo
     *
     * @return integer 
     */
    public function getNitFijo()
    {
        return $this->nitFijo;
    }

    /**
     * Set nit
     *
     * @param string $nit
     * @return Salario
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
     * Set nitEmpleado
     *
     * @param integer $nitEmpleado
     * @return Salario
     */
    public function setNitEmpleado($nitEmpleado)
    {
        $this->nitEmpleado = $nitEmpleado;

        return $this;
    }

    /**
     * Get nitEmpleado
     *
     * @return integer 
     */
    public function getNitEmpleado()
    {
        return $this->nitEmpleado;
    }

    /**
     * Set nitEmpresaUsuaria
     *
     * @param integer $nitEmpresaUsuaria
     * @return Salario
     */
    public function setNitEmpresaUsuaria($nitEmpresaUsuaria)
    {
        $this->nitEmpresaUsuaria = $nitEmpresaUsuaria;

        return $this;
    }

    /**
     * Get nitEmpresaUsuaria
     *
     * @return integer 
     */
    public function getNitEmpresaUsuaria()
    {
        return $this->nitEmpresaUsuaria;
    }

    /**
     * Set cuenta2
     *
     * @param string $cuenta2
     * @return Salario
     */
    public function setCuenta2($cuenta2)
    {
        $this->cuenta2 = $cuenta2;

        return $this;
    }

    /**
     * Get cuenta2
     *
     * @return string 
     */
    public function getCuenta2()
    {
        return $this->cuenta2;
    }

    /**
     * Set cuenta3
     *
     * @param string $cuenta3
     * @return Salario
     */
    public function setCuenta3($cuenta3)
    {
        $this->cuenta3 = $cuenta3;

        return $this;
    }

    /**
     * Get cuenta3
     *
     * @return string 
     */
    public function getCuenta3()
    {
        return $this->cuenta3;
    }
}
