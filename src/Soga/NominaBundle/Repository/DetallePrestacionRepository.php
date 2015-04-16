<?php

namespace Soga\NominaBundle\Repository;

use Doctrine\ORM\EntityRepository;

/**
 * DenominaRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class DetallePrestacionRepository extends EntityRepository
{   
    /**
     * Devuelve los registros de los detalles de la nomina
     * @param string $strConsecutivo Consecutivo de la nomina
     * @return type Objeto de tipo query de la clase denomina
     */
    public function DevDqlDetallePrestacion($strConsecutivo) {
        $em = $this->getEntityManager();         
        $dql = "SELECT detalleprestacion FROM SogaNominaBundle:DetallePrestacion detalleprestacion WHERE detalleprestacion.nroPresta = " . $strConsecutivo;
        $objQuery = $em->createQuery($dql);       
        return $objQuery;                
    }      
  
}