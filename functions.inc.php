<?php
function pr($arr){
echo'<prer>';
print_r($arr);
}
function prex($arr){
echo'<prer>';
print_r($arr);
die();
}
function get_safe_value($con,$str){
if (($str!='')){
		
return mysqli_real_escape_string($con,$str);
}
}
?>