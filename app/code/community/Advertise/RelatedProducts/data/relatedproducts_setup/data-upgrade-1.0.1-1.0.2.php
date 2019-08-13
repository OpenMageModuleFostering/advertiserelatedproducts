<?php
/**
 * Upgrade db
 *
 * @package Advertise_RelatedProducts
 */

$installer = $this;
$installer->startSetup();
$relatedCount = Mage::getStoreConfig('advertise_relatedproducts_options/advertise_related_products/advertise_prod_count');
if ($relatedCount) {
    // Copy old setting to new path
    Mage::getModel('core/config')->saveConfig('advertise_suggestedproducts_options/advertise_suggested_products/advertise_related_prod_count', $relatedCount );
    // Delete old path
    Mage::getModel('core/config')->deleteConfig('advertise_relatedproducts_options/advertise_related_products/advertise_prod_count');
}
$installer->endSetup();
?>