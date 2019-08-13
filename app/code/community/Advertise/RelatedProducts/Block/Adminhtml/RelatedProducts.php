<?php
/**
 * RelatedProducts.php
 *
 * Backend block
 * 
 * @package Advertise_RelatedProducts
 */
class Advertise_RelatedProducts_Block_Adminhtml_RelatedProducts extends Mage_Adminhtml_Block_Template
{
    const ADVERTISE_EMAIL = 'advertise_settings/settings/settings_email';

    public function getAdvertiseEmail() {
        return Mage::getStoreConfig(self::ADVERTISE_EMAIL);
    }

    /**
     * Get the base url
     *
     * @return string
     */
    public function getBaseUrl()
    {
        return str_replace('http://', '', Mage::getStoreConfig('web/unsecure/base_url'));
    }

}
?>
