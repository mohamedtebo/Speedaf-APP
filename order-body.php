
<?php
/**
 * table list body info
 * 
 */
use Wolf\Speedaf\Helper\SpfHelper;

?>

<?php if($orders && count($orders)) :?>
     
      <?php foreach ($orders as $order):?>
            <?php $billId = $order->get_meta(\Wolf\Speedaf\Helper\Meta_box::SPF_ORDER_TRACKING);  $is_checked_box = isset($box_check) && $box_check === true ?  'checked="checked"' : ($order->get_meta(\Wolf\Speedaf\Helper\Meta_box::SPF_ORDER_TRACKING) ? '' : 'checked="checked"');?>
        <tr class="el-table__row">
            <td class=" spf-table__cell" rowspan="1" colspan="1" >
            <div class="cell"><label class="el-checkbox">
            <input class="el-checkbox__original" type="checkbox" name="order_id" <?php echo esc_attr( $is_checked_box)?>   value="<?php echo esc_attr( $order->get_id())?>"></label></div></td>
            <td class="spf-table__cell" rowspan="1" colspan="1"><div class="cell"><?php echo esc_html($order->get_order_number())?></div></td>
            <td class="spf-table__cell" rowspan="1" colspan="1"><div class="cell"><?php echo SpfHelper::getCOD($order)?></div></td>
            <td class="spf-table__cell" rowspan="1" colspan="1"><div class="cell"><?php echo $order->get_formatted_order_total()?></div></td>
           
            <td class="spf-table__cell" rowspan="1" colspan="1">
            <div class="cell">
            <?php if($billId):?>
                  <?php echo esc_html($order->get_meta(\Wolf\Speedaf\Helper\Meta_box::SPF_PACK_ROW_WEIGHT))?>
            <?else: ?>
                  <input type="text" width="50px" name="row_weight-<?php echo esc_html($order->get_id())?>" value="<?php echo esc_html(SpfHelper::unitWeight($order));?>">
             <?php endif;?>
            </div></td>
            <td class="spf-table__cell" rowspan="1" colspan="1"><div class="cell"><?php echo SpfHelper::trackingField($order->get_meta(\Wolf\Speedaf\Helper\Meta_box::SPF_ORDER_STATUS))?></div></td>

            <td class="spf-table__cell" rowspan="1" colspan="1"><div class="cell">
                  <?php if($billId):?>
                  <a href="<?php echo esc_url($vip_url_path.$billId)?>" target="__blank"><?php echo esc_html( $billId)?></a>
                 <?php endif;?>
            </div></td>
            <td class="spf-table__cell" rowspan="1" colspan="1"><div class="cell"><?php echo esc_html($helper->getProductInfo($order->get_items()))?></div></td>
            <td class="spf-table__cell" rowspan="1" colspan="1"><div class="cell"><?php echo esc_html(SpfHelper::date_format($order->get_date_created()));?></div></td>
            <td class="spf-table__cell" rowspan="1" colspan="1"><div class="cell"><?php echo esc_html($order->get_formatted_shipping_full_name())?></div></td>
            <td class="spf-table__cell" rowspan="1" colspan="1"><div class="cell"><?php echo esc_html( $order->get_shipping_phone())?></div></td>
            <td class="spf-table__cell" rowspan="1" colspan="1"><div class="cell"><?php echo esc_html($order->get_shipping_city())?></div></td>
           
            <td class="spf-table__cell" rowspan="1" colspan="1"><div class="cell">
                  <?php if($billId):?>
                  <img class="print-label-row" data-stack-id="<?php echo esc_html($order->get_meta(\Wolf\Speedaf\Helper\Meta_box::SPF_ORDER_TRACKING))?>" style="width: 32px; cursor: pointer;" src="<?php echo plugin_dir_url( SPF_ROOT_PATH ).'assets/img/pdf.svg'?>"/>
                  <?else :?>
                         <span>-</span>
                  <?php endif;?>
            </div></td>
            
            </tr>
      <?php endforeach;?>           
     
 <?php endif;?>