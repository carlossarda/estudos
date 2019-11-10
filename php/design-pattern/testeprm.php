<?php
function isPrm( $nr ){
    $ar_fat_prm = array(2=>'',3=>'',5=>'',7=>'');
    $tot = 0;       //total de divisores
    $tem_div = false;
    foreach($ar_fat_prm as $prm=>$val){
        if( $nr % $prm == 0  && !$tem_div){
            $tem_div = true;
            $quoc = $nr / $prm;
            $tot++;
            $tot += ($quoc > 1)? totFatPrm($quoc) : 0;
        }
    }
    $tot += ( !$tem_div )? $quoc = $nr / $nr : 0;
    $is_prm = ( $tot == 1)? ' <b>Primo</b>' : ' <b>Nao e primo</b>';
    return $is_prm;
}
function totFatPrm( $nr ){
    $ar_fat_prm = array(2=>'',3=>'',5=>'',7=>'');
    $tot = 0;       //total de divisores
    $tem_div = false;
    foreach($ar_fat_prm as $prm=>$val){
        if( $nr % $prm == 0  && !$tem_div){
            $tem_div = true;
            $quoc = $nr / $prm;
            $tot++;
            if($quoc > 1){
                $tot += totFatPrm($quoc);
            }
        }
    }
    if( !$tem_div ){ //nr e primo
        $quoc = $nr / $nr;
        $tot++;
    }
    return $tot;
}
function lstQuoc( $nr ){
    $ar_fat_prm = array(2=>'',3=>'',5=>'',7=>'');
    $lst_quoc = ''; //vai guardar a lista de quocientes
    $tem_div = false;
    foreach($ar_fat_prm as $prm=>$val){
        if( $nr % $prm == 0  && !$tem_div){
            $tem_div = true;
            $quoc = $nr / $prm;
            $lst_quoc .= $quoc.',';
            if($quoc > 1){
                $lst_quoc .= lstQuoc($quoc);
            }
        }
    }
    if( !$tem_div ){ //nr e primo
        $quoc = $nr / $nr;
        $lst_quoc .= $quoc.',';
    }
    return $lst_quoc;
}
function lstFatPrm( $nr ){
    $ar_fat_prm = array(2=>'',3=>'',5=>'',7=>'');
    $lst_fat = '';
    $tem_div = false;
    foreach($ar_fat_prm as $prm=>$val){
        if( $nr % $prm == 0  && !$tem_div){
            $tem_div = true;
            $quoc = $nr / $prm;
            $lst_fat .= $prm.',';
            if($quoc > 1){
                $lst_fat .= lstFatPrm($quoc);
            }
        }
    }
    if( !$tem_div ){ //nr e primo
        $quoc = $nr / $nr;
        $lst_fat .= $nr.',';
    }
    return $lst_fat;
}
function exibFat($nr, $quoc, $fat ){
    $lst_div = $nr.','.preg_replace('/,$/','',$quoc);
    $lst_fat = preg_replace('/,$/','',$fat);
    $ar_div = explode(',',$lst_div);
    $ar_fat = explode(',',$lst_fat);
    $last_key = sizeof($ar_div) - 1;
    $tbl_fat = '<br><table border="0">';
    foreach($ar_div as $key=>$val){
        if( $key != $last_key){
            $tbl_fat .= '<tr><td>'.$val.'</td><td>| '.$ar_fat[$key].'</td></tr>';
        }else{
            $tbl_fat .= '<tr><td>'.$val.'</td><td>|  = '.exibFatExp($ar_fat).'</td></tr>';
        }
    }
    echo $tbl_fat .='</table>';
}
function exibFatExp($ar_fat ){ //Exibe fatores com expoente
    $ar_prm = array();
    $tot = 0;
    foreach($ar_fat as $key=>$val){
        //$ar_prm[$val];
        if($key != 0){
            if($ar_fat[$key-1] == $val){
                $ar_prm[$val] = ++$tot + 1;
            } else {
                $tot = 0;
                $ar_prm[$val] = ++$tot;
            }
        }
    }
    $str_prm = '';
    foreach($ar_prm as $key=>$val){
        $str_prm .= $key.'<sup>'.$val.'</sup> x ';
    }
    return preg_replace('/( x )$/','',$str_prm);
}
/* lista de numeros primos, obtidos do wikipedia.
 2, 3, 5, 7, 11, 13, 17, 19, 23, 29, 31, 37, 41, 43, 47, 53, 59, 61, 67, 71, 73, 79, 83, 89, 97,
 * 101, 103, 107, 109, 113, 127, 131, 137, 139, 149, 151, 157, 163, 167, 173, 179, 181, 191, 193,
 * 197, 199, 211, 223, 227, 229, 233, 239, 241, 251, 257, 263, 269, 271, 277, 281, 283, 293, 307,
 * 311, 313, 317, 331, 337, 347, 349, 353, 359, 367, 373, 379, 383, 389, 397, 401, 409, 419, 421,
 * 431, 433, 439, 443, 449, 457, 461, 463, 467, 479, 487, 491, 499, 503, 509, 521, 523, 541, 547
 */
$nr = 10;
$prm_ = isPrm($nr);
echo $nr.' = '.$prm_.'<br>';
$tot_ = totFatPrm($nr);
echo $nr.' = total de divisores: <b>'.$tot_.'</b><br>';
$quoc_ = lstQuoc($nr);
echo $nr.' = total de quocientes: <b>'.$quoc_ .'</b><br>';
$fat_ = lstFatPrm($nr);
echo $nr.' = total de fatores: <b>'.$fat_.'</b><br>';
echo '<div style="border: 1px dotted blue; width:200;">';
echo '<b>Decomposição</b>';
exibFat($nr,$quoc_, $fat_);
echo '</div>';
?>