<?php
require_once('database.php');

class dash{

    function getSalesToday(){
        global $mydb;
        
        $mydb->setQuery("select sum(order_total) as Sales from orders where date(order_date) = date(now())");
        $cur = $mydb->executeQuery();
        $numrows = $mydb->num_rows($cur);

        if($numrows > 0){
            $found = $mydb->loadSingleResult();
            return $found->Sales;
        }
        return 0;
    }
    function getSalesIncrease(){
        global $mydb;

        $mydb->setQuery("select Year(order_date),Month(order_date),sum(order_total),LAG(sum(order_total)) OVER(order by year(order_date),month(order_date)) as 'lastPercent',round(sum(order_total) - LAG(sum(order_total)) OVER(order by year(order_date),month(order_date))) / LAG(sum(order_total)) OVER(order by year(order_date),month(order_date)) * 100 as 'percent'   from orders group by Year(order_date), month(order_date)");
        $cur = $mydb->executeQuery();
        $numrows = $mydb->num_rows($cur);

        if($numrows > 0){
            $found = $mydb->loadSingleResult();
            return round($found->percent);
        }
        return false;
    }

    function getCountUserThisYear(){
        global $mydb;

        $mydb->setQuery("select count(*) as 'user' from customer where YEAR(date_created) = YEAR(now());");
        $cur = $mydb->executeQuery();
        $numrows = $mydb->num_rows($cur);

        if($numrows > 0 ){
            $found = $mydb->loadSingleResult();
            return $found->user;
        }
        return false;

    }
    function getPercentCustomerCount(){
        global $mydb;
        $mydb->setQuery("select name,date_created,count(*),round(count(*) - LAG(count(*)) OVER(order by YEAR(date_created))) / LAG(count(*)) OVER(order by YEAR(date_created)) * 100 as 'cusPercentage'  from customer group by YEAR(date_created)");
        $cur = $mydb->executeQuery();
        $numrows = $mydb->num_rows($cur);

        if($numrows > 0){
            $found = $mydb->loadSingleResult();
            return round($found->cusPercentage);
        }
        return false;
    }

    function revenueThisMonth(){
        global $mydb;
        $mydb->setQuery("select YEAR(order_date),sum(order_total) as 'revenueThisMonth' from orders where MONTHNAME(order_date) = MONTHNAME(now()) and YEAR(order_date) = YEAR(now())");
        $cur = $mydb->executeQuery();
        $numrows = $mydb->num_rows($cur);

        if($numrows > 0){
            $found = $mydb->loadSingleResult();
            return round($found->revenueThisMonth);
        }
        return false;
    }

    function revenuePercentThisMonth(){
        global $mydb;
        $mydb->setQuery("select  YEAR(order_date),month(order_date),sum(order_total) ,LAG(sum(order_total)) OVER(order by YEAR(order_date),MONTH(order_date)),round(sum(order_total) - LAG(sum(order_total)) OVER(order by YEAR(order_date),MONTH(order_date))) / LAG(sum(order_total)) OVER(order by YEAR(order_date),MONTH(order_date)) * 100 as 'grossPercent' from orders group by YEAR(order_date),Month(order_date)");
        $cur = $mydb->executeQuery();
        $numrows = $mydb->num_rows($cur);

        if($numrows > 0){
            $found = $mydb->loadSingleResult();
            return round($found->grossPercent);
        }
        return false;
    }

    function getSalesIDToday(){
        global $mydb;
        $mydb->setQuery("select * from orders where date(order_date) = date(now())");
        $cur = $mydb->executeQuery();
        $numrows = $mydb->num_rows($cur);

        if($numrows > 0){
            return $cur;
        }
        return false;
    }

    function getRecentActivity($id){
        global $mydb;
            $mydb->setQuery("select o.order_id,c.name,p.prod_name,od.qty,count(o.order_id) as counter,timestampdiff(minute,o.order_date,now()) as time from orders o,order_details od,product p,customer c where o.order_id = od.order_id and o.customer_id = c.customer_id and od.prod_id = p.prod_id and o.order_id = '$id' limit 1");
            $cur = $mydb->executeQuery();
            $numrows = $mydb->num_rows($cur);

        if($numrows > 0){
            $found = $mydb->loadSingleResult();
            return $found;
        }
        return false;
    }
    function getAllRecentActivity(){
            global $mydb;
            $mydb->setQuery("select o.order_id,c.name,p.prod_name,o.order_date from orders o,order_details od,product p,customer c where o.order_id = od.order_id and o.customer_id = c.customer_id and od.prod_id = p.prod_id and date(o.order_date) = date(now()) group by c.name order by o.order_id desc limit 5");
            $cur = $mydb->executeQuery();
            $numrows = $mydb->num_rows($cur);

            if($numrows > 0){
                return $cur;
            }
            return false;
    }

    function getTimeOrdered($order_id,$time){
        global $mydb;
        $mydb->setQuery("select timestampdiff($time,o.order_date,now()) as time from orders o,order_details od,product p,customer c where o.order_id = od.order_id and o.customer_id = c.customer_id and od.prod_id = p.prod_id and o.order_id = '$order_id' limit 1");
        $cur = $mydb->executeQuery();
        $numrows = $mydb->num_rows($cur);

        if($numrows > 0){
            $found = $mydb->loadSingleResult();
            return $found->time;
        }
        return false;
    }

function recentSalesProdToday(){
    global $mydb;
    $mydb->setQuery("select o.order_code, c.name,p.prod_name,od.qty as 'qty',o.order_total,o.`status`,p.prod_price from customer c,product p,orders o,order_details od where c.customer_id = o.customer_id and o.order_id = od.order_id and p.prod_id = od.prod_id and date(o.order_date) = date(now())");
    $cur = $mydb->executeQuery();
    $numrows = $mydb->num_rows($cur);

    if($numrows > 0){
        //true
        return $cur;
    }
    return false;
}

function topSellingToday(){
    global $mydb;
    $mydb->setQuery("SELECT p.avatar,p.prod_name,p.prod_price,sum(od.qty) as 'sold',sum(p.prod_price * od.qty) as 'revenue'
FROM orders o,order_details od,product p where o.order_id = od.order_id and od.prod_id = p.prod_id and date(o.order_date) = date(now()) GROUP BY p.prod_name order by sum(od.qty) desc");
    $cur = $mydb->executeQuery();
    $numrows = $mydb->num_rows($cur);
    if($numrows > 0){
        //true
        return $cur;
    }
    return false;

}

}
class DataGraph{
     function graphSalesThisYear(){
        global $mydb;
        
        $mydb->setQuery("select sum(order_total) as Sales from orders where date(order_date) = date(now())");
        $cur = $mydb->executeQuery();
        $numrows = $mydb->num_rows($cur);

        if($numrows > 0){
            $found = $mydb->loadSingleResult();
            return $found->Sales;
        }
        return 0;
    }

    function revenueThisYear(){
        global $mydb;
        $mydb->setQuery("select YEAR(order_date),sum(order_total) as 'revenueThisMonth' from orders where MONTHNAME(order_date) = MONTHNAME(now()) and YEAR(order_date) = YEAR(now())");
        $cur = $mydb->executeQuery();
        $numrows = $mydb->num_rows($cur);

        if($numrows > 0){
            $found = $mydb->loadSingleResult();
            return round($found->revenueThisMonth);
        }
        return false;
    }
     function getCountUserThisYear(){
        global $mydb;

        $mydb->setQuery("select count(DISTINCT c.customer_id) as 'customer' from customer c,orders o where c.customer_id = o.customer_id and MONTHNAME(o.order_date) = MONTHNAME(now()) and YEAR(o.order_date) = YEAR(now());");
        $cur = $mydb->executeQuery();
        $numrows = $mydb->num_rows($cur);

        if($numrows > 0 ){
            $found = $mydb->loadSingleResult();
            return $found->user;
        }
        return false;

    }
}

?>