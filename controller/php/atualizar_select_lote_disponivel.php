<?php
require 'function.php';

$quadra=$_POST['quadra'];
$class="select-quadra";
$html=htmlSelectArray(loteDisponivelArray($quadra), $class);


return $html;

