<?php

namespace Soga\NominaBundle\Repository;

use Doctrine\ORM\EntityRepository;

/**
 * NominaRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class NominaDetalleAuxiliarRepository extends EntityRepository
{   
    public function devIbc($intAnio, $intMes, $strIdentificacion) {
        $em = $this->getEntityManager();         
        $dql   = "SELECT SUM(nomina.ingresoBaseCotizacion) FROM SogaNominaBundle:NominaDetalleAuxiliar nomina "
                . "WHERE nomina.anio = " . $intAnio . " "
                . "AND nomina.mes = " . $intMes .  " "
                . "AND nomina.numeroIdentificacion = '" . $strIdentificacion . "'";
        $query = $em->createQuery($dql);
        $douIBC = $query->getSingleScalarResult();
        return $douIBC;               
    }    
}