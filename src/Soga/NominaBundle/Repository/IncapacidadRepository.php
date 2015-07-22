<?php

namespace Soga\NominaBundle\Repository;

use Doctrine\ORM\EntityRepository;

/**
 * EmpleadoRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class IncapacidadRepository extends EntityRepository
{       
    public function devDqlIncapacidadesGeneralesPeriodoEmpleado($fechaDesde = "", $fechaHasta = "", $strNumeroIdentificacion) {
        $em = $this->getEntityManager();         
        $dql = "SELECT incapacidad FROM SogaNominaBundle:Incapacidad incapacidad "
                . "WHERE (incapacidad.fechater >= '" . $fechaDesde . "' OR incapacidad.fechater = '0000-00-00') AND incapacidad.fechaini <='" . $fechaHasta . "' "
                . "AND incapacidad.cedemple = '" . $strNumeroIdentificacion . "' "
                . "AND (incapacidad.tipoinca = 1020 OR incapacidad.tipoinca = 1030)";       
        $objQuery = $em->createQuery($dql);  
        $arIncapacidades = $objQuery->getResult();
        return $arIncapacidades;                
    }         
    
    public function devDqlIncapacidadesLaboralesPeriodoEmpleado($fechaDesde = "", $fechaHasta = "", $strNumeroIdentificacion) {
        $em = $this->getEntityManager();         
        $dql = "SELECT incapacidad FROM SogaNominaBundle:Incapacidad incapacidad "
                . "WHERE (incapacidad.fechater >= '" . $fechaDesde . "' OR incapacidad.fechater = '0000-00-00') AND incapacidad.fechaini <='" . $fechaHasta . "' "
                . "AND incapacidad.cedemple = '" . $strNumeroIdentificacion . "' "
                . "AND (incapacidad.tipoinca = 1010)";       
        $objQuery = $em->createQuery($dql);  
        $arIncapacidades = $objQuery->getResult();
        return $arIncapacidades;                
    }             
}