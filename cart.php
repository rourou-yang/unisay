<?php
/**
 * Created by PhpStorm.
 * User: ying-raylu
 * Date: 26/12/2016
 * Time: 7:05 PM
 */
if (!empty($_SESSION['cart'])) {
    $sids = array_keys($_SESSION['cart']);

//$sql = "SELECT * FROM `products` WHERE `sid` IN (". implode(',', $sids). ") ";
    $sql = sprintf("SELECT * FROM `products` WHERE `sid` IN (%s) ", implode(',', $sids));
//echo $sql;
    $result = $mysqli->query($sql);
    $p_data = array();

    $spec_index = ['iPhone 6','iPhone 6 Plus','iPhone 6s','iPhone 6s Plus','iPhone 7','iPhone 7 Plus'];

    $total_cost = 0;
    $total_qty = 0;

    while ($row = $result->fetch_assoc()) {
        $row['qty'] = $_SESSION['cart'][$row['sid']][0];
        $row['type'] = $_SESSION['cart'][$row['sid']][1];
        $row['spec'] = $spec_index[$_SESSION['cart'][$row['sid']][2] - 1];


        if (!empty($row['type'])) {
            switch ($row['type']) {
                case 1:
                    $row['type_pic'] = "01_cherry.png";
                    $row['type_name'] = "櫻桃木";
                    break;
                case 2:
                    $row['type_pic'] = "02_oak.png";
                    $row['type_name'] = "白橡木";
                    break;
                case 3:
                    $row['type_pic'] = "03_maple.png";
                    $row['type_name'] = "楓木";
                    break;
                case 4:
                    $row['type_pic'] = "04_rose.png";
                    $row['type_name'] = "花梨木";
                    break;
                case 5:
                    $row['type_pic'] = "05_walnut.png";
                    $row['type_name'] = "胡桃木";
                    break;
                default:
                    $row['type_pic'] = "01_cherry.png";
                    $row['type_name'] = "櫻桃木";
                    break;
            }
        } else {
            $row['type_pic'] = "01_cherry.png";
            $row['type_name'] = "櫻桃木";
        }

        $p_data[$row['sid']] = $row;

        $total_cost += $p_data[$row['sid']]['qty'] * $p_data[$row['sid']]['price'];
        $total_qty += isset($p_data[$row['sid']]['qty']) ? $p_data[$row['sid']]['qty'] : 0;
    }
}