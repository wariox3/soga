<?php

namespace Soga\NominaBundle\Repository;

use Doctrine\ORM\EntityRepository;

/**
 * NominaRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class PrestacionRepository extends EntityRepository
{   
    /**
     * Devuelve los registros de nomina sin exportar
     * @return type Objeto de tipo query de la clase nomina
     */
    public function DevDqlPrestacionSinExportar($strDesde = "", $strHasta = "") {
        $em = $this->getEntityManager();         
        $dql = "SELECT prestacion FROM SogaNominaBundle:Prestacion prestacion WHERE prestacion.exportadoContabilidad = 0";
        if($strDesde != "") {
           $dql = $dql . " AND prestacion.fechaPro >='". $strDesde ."'" ;
        }
        if($strHasta != "") {
           $dql = $dql . " AND prestacion.fechaPro <='". $strHasta ."'" ;
        }
        $objQuery = $em->createQuery($dql);       
        return $objQuery;                
    }    
}