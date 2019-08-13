<?php
/**
 * RelatedProductsController.php
 *
 * Backend controller
 *
 * @package Advertise_RelatedProducts
 */
class Advertise_Importer_Adminhtml_RelatedProductsController extends Mage_Adminhtml_Controller_Action
{
    /**
     * Default Action
     */
	public function indexAction()
    {
       $this->loadLayout();
	   $this->_title($this->__("Related Products"));
	   $this->renderLayout();
    }
    
    public function postAction()
    {
    }
}