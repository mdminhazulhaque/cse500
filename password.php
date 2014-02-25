<?
function rand_pass() 
{ 
    $word = "A,B,C,D,E,F,G,H,I,J,K,L,M,1,2,3,4,5,6,7,8,9,0"; 
    $array=explode(",",$word); 
    shuffle($array); 
    $newstring = implode($array,""); 
    return substr($newstring, 0, 6); 
}
?>
