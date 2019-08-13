<?php
/**
 * Data.php
 *
 * Advertise RelatedProducts Helper
 *
 * @package Advertise_RelatedProducts
 */
class Advertise_RelatedProducts_Helper_Data extends Mage_Core_Helper_Abstract
{

    public function getAdvertiseHeaderScript()
    {
        if(Mage::registry('current_product')) {
            $prodid = Mage::registry('current_product')->getId();
        } else {
            $prodid = '';
        }
        if(Mage::getModel('dataexport/config')->isHeadProductIdsEnabled()) {
            $basket=$this->getProductDataString();
        } else {
            $basket = '';
        }

        $jsoutput = "
            var adv_store_base_url = '".Mage::getBaseUrl()."';
            var adv_reload = true;
            var adv_productid = '".$prodid."';
            var adv_bsk = '".$basket."';
            ";
            // var cartcount = '".Mage::helper('checkout/cart')->getCart()->getItemsCount()."';

        return $jsoutput;
    }

    /**
     * Get the product IDs to output, but first check we want to show them
     * just a shortcut for displaying inside template files
     *
     * @return  string
     */
    public function getHeaderProductIds()
    {
        if(Mage::getModel('dataexport/config')->isHeadProductIdsEnabled()) {
            return $this->getProductDataString();
        }

        return "";
    }

    /**
     * Get product data as a string
     *
     * @return string|FALSE
     */
    public function getProductDataString()
    {
        if(Mage::helper('checkout/cart')->getCart()->getItemsCount() < 1) {
            return FALSE;
        }

        //$cartHelper = Mage::helper('checkout/cart');
        //$items = $cartHelper->getCart()->getItems();
        //$cart = Mage::helper('checkout/cart')->getCart()->getItemsCount();
        $session = Mage::getSingleton('checkout/session');
        $products = array();
        //$productIds = Mage::getModel('checkout/cart')->getProductIds();
        //return implode(',', $productIds);

        // getAllItems OR getAllVisibleItems()
        foreach ($session->getQuote()->getAllVisibleItems() as $item) {
            $products[] = $item->getProductId();
        }

        if( ! empty($products)) {
            //return Mage::helper('core')->encrypt(implode(',', $products));
            return implode(',', $products);
        }

        return FALSE;
    }

    /**
     * Get product ids from encrypted string
     *
     * @param   string
     * @return  array|FALSE
     */
    // NOT CURRENTLY USED AS NO ENCRYPTION DONE
    public function getProductIdsFromString($dataString)
    {
        $return = array();
        $productString = Mage::helper('core')->decrypt($dataString);

        if( ! empty($productString)) {
            $return = explode(',', $productString);
        }

        return $return;
    }
}

?>
