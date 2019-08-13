<?php
class Advertise_RelatedProducts_RelatedProductsController extends Mage_Core_Controller_Front_Action {
    /**
     * Default Action
     * // Path to this method: /relatedproducts/RelatedProducts/index
     */
    public function indexAction()
    {
        $this->loadLayout();
        $this->_title($this->__("Adverti.se Related Products"));

        //$this->_addContent($this->getLayout()->createBlock('relatedproducts'));
        $block = $this->getLayout()->createBlock(
                        'Mage_Core_Block_Template',
                        'relatedproducts',
                        array('template' => 'advertise/relatedproducts.phtml')
        );
        $this->getLayout()->getBlock('content')->append($block);

        $this->renderLayout();
    }

    // Path to this method: /relatedproducts/RelatedProducts/getrp
    public function getrpAction() {
        // Create related products block with IDs in request
        echo $this->getLayout()->createBlock('catalog/product_list_related')->setTemplate('catalog/product/list/related.phtml')->toHtml();
    }

    public function postAction()
    {

    }

}

?>
