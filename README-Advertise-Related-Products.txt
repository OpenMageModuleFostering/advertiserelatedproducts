Step 1
======
Find the template file related.phtml used by your theme. You should find it in:
    app/design/frontend/<theme-package>/<theme-name>/template/catalog/product/list

Add these lines at the top of the file:
<div id="advrelated">
<script type="text/javascript">if(adv_reload){loadAdvertiseRelatedProducts();adv_reload=false;}</script>

And add this line at the end of the file:
</div>

Step 2
======
Find the template file head.phtml used by your theme. You should find it in:
    app/design/frontend/<theme-package>/<theme-name>/template/page/html

Add this script tag within the head:
<script type="text/javascript"><?php echo Mage::helper('advertise_retailintelligence')->getAdvertiseHeaderScript(); ?></script>