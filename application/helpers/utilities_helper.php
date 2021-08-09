<?php 
function datify($date) {    
    return date('F d, Y', strtotime($date));
} 
?>