<?php
/**
 * 支付方式选择页面
 * ============================================================================
 * 版权所有 2015-2016 风影随行，并保留所有权利。
 * 网站地址: http://www.haoshu888.com；
 * ----------------------------------------------------------------------------
 * 这不是一个自由软件！已购买用户允许对程序代码进行修改和使用，但是不允许对
 * 程序代码以任何形式任何目的的再发布，作者将保留追究法律责任的权力和最终解
 * 释权。
 * ============================================================================
 */

 if($_GPC['ptype']=='recharge'){
	$orderid = intval($_GPC['orderid']);
	$order = pdo_fetch("SELECT * FROM " . tablename($this->table_credit_order) . " WHERE id = :id", array(':id' => $orderid));
	if ($order['status'] != '0') {
		message('Sorry, your order has been paid or closed, please re-enter the payment', $this->createMobileUrl('credit'), 'error');
	}

	$params['tid']     = $orderid;
	$params['user']    = $order['openid'];
	$params['fee']     = $order['total_amount'];
	$params['title']   = 'Recharge['.$order['credit_number'].']credits';
	$params['ordersn'] = $order['ordersn'];
	$params['virtual'] = false;
 }

include $this->template('pay');

?>