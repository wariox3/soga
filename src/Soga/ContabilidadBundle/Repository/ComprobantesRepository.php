<?php

namespace Soga\ContabilidadBundle\Repository;

use Doctrine\ORM\EntityRepository;

/**
 * NominaRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class ComprobantesRepository extends EntityRepository
{   
    /**
     * Devuelve los registros de los detalles del comprobante
     * @param string $strNumero Consecutivo de la nomina
     * @return type Objeto de tipo query de la clase comprobantes
     */
    public function DevDqlComprobanteDetalle($strNumero) {
        $em = $this->getEntityManager();         
        $dql = "SELECT comprobante FROM SogaContabilidadBundle:Comprobantes comprobante WHERE comprobante.nro = " . $strNumero;
        $objQuery = $em->createQuery($dql);       
        return $objQuery;                
    } 
    
    public function DevDqlComprobantesSinExportar($strDesde = "", $strHasta = "") {
        $em = $this->getEntityManager();         
        $dql = "SELECT comprobante FROM SogaContabilidadBundle:Comprobantes comprobante WHERE comprobante.exportadoContabilidad = 0";
        if($strDesde != "") {
           $dql = $dql . " AND comprobante.fecha >='". $strDesde ."'" ;
        }
        if($strHasta != "") {
           $dql = $dql . " AND comprobante.fecha <='". $strHasta ."'" ;
        }
        $objQuery = $em->createQuery($dql);       
        return $objQuery;                
    }        
}