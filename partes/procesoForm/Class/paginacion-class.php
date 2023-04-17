<?php
function Paginacion($numUser,$indice,$pg) {
    // aqui comienzo a trabjar la paginacion para la tabla locales
    $num_paginas=0;
    // aqui determino si el numero de datos es inferior al numero de datos que quiero mostrar
    if($numUser<20){
      $num_paginas=1;
    }else{
      $num_paginas=ceil($numUser/20);
    }  
    $paginacion ="";
    // aqui creo los registros de paginacion fila por fila siempre y cuando la num pagina sea mayor a 2
    if($num_paginas >1){
    
     
    for($a=0;$a<$num_paginas;$a++){
      $numero=$a+1;
      $g=20*$numero;
      if($a==$pg-1){
        $paginacion.="<li class='page-item active' aria-current='page'>
        <a class='page-link' name='".$g.",".$numero."' id='pagi1'  >".$numero."</a>
        </li>";
      }else{
        $paginacion.="<li class='page-item ' aria-current='page'>
        <a class='page-link' name='".$g.",".$numero."' id='pagi1' >".$numero."</a>
        </li>";
      }
    }

  }
  
  
  
    return $paginacion;
  }


?>