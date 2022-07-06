<?php
session_start();
require_once "../conexion/sql.php";
$procesoDatos= new sqlReg ();

@$rol=$_SESSION["datos"][$_COOKIE["id"]][0];

$dato=[
    'tabla'=>"permisos",
    'id'=>$rol, 
];
$permiso=$procesoDatos->List($dato);
// var_dump($_SESSION["datos"][]);
//  echo json_encode($_POST["accion"]);
$menu="<ul class='navbar-nav mx-auto' id='menu'>";
foreach($permiso as  $key => $value){

    if(!($value["registrar_usu"] =="off" && $value["list_usu"] =="off" && $value["conexion"] =="off")){

        $menu.="<li class='nav-item dropdown'> 
        <a class='nav-link dropdown-toggle'  id='navbarDropdown' role='button' data-bs-toggle='dropdown' aria-expanded='false'>
        Usuario
        </a>
        <ul class='dropdown-menu' aria-labelledby='navbarDropdown'>";
        if($value["registrar_usu"] =="on"){
            $menu.=" <li><a class='dropdown-item' href='index.php?pagina=registrar_usuario.php'>Registrar</a></li>";
        }
        if($value["list_usu"] =="on"){
            $menu.=" <li><a class='dropdown-item' href='index.php?pagina=list_usuarios.php'>Usuario</a></li>";
        }
        if($value["conexion"] =="on"){
            $menu.=" <li><a class='dropdown-item' href='index.php?pagina=list_conexiones.php'>Conexiones</a></li>";
        }
        $menu.="</ul>
        </li>";
    }
    if(!($value["mover_activos"] =="off" && $value["list_movimiento_activo"] =="off" )){

        $menu.="<li class='nav-item dropdown'>
        <a class='nav-link dropdown-toggle'  id='navbarDropdown' role='button' data-bs-toggle='dropdown' aria-expanded='false'>
        Mover
    </a>
    <ul class='dropdown-menu' aria-labelledby='navbarDropdown'>";

    if($value["mover_activos"] =="on"){
        $menu.=" <li><a class='dropdown-item' href='index.php?pagina=mover_activo.php'>Mover</a></li>";
    }
    if($value["list_movimiento_activo"] =="on"){
        $menu.=" <li><a class='dropdown-item' href='index.php?pagina=list_movimientos.php'>Lista de Movimiento</a></li>";
    }
    $menu.="</ul>
  </li>";
    }
    if(!($value["regist_producto"] =="off" && $value["mostr_producto"] =="off" )){

        $menu.="<li class='nav-item dropdown'>
        <a class='nav-link dropdown-toggle'  id='navbarDropdown' role='button' data-bs-toggle='dropdown' aria-expanded='false'>
        Inventario
    </a>
    <ul class='dropdown-menu' aria-labelledby='navbarDropdown'>";

    if($value["regist_producto"] =="on"){
        $menu.=" <li><a class='dropdown-item' href='index.php?pagina=registrar_Activo.php'>Registrar Producto</a></li>";
    }
    if($value["mostr_producto"] =="on"){
        $menu.="<li><a class='dropdown-item' href='index.php?pagina=list_productos.php'>Mostrar Producto</a></li>";
    }
   
    $menu.="</ul>
  </li>";
    }
    if(!($value["regist_local"] =="off" && $value["mostr_local"] =="off" )){

        $menu.="<li class='nav-item dropdown'>
        <a class='nav-link dropdown-toggle'  id='navbarDropdown' role='button' data-bs-toggle='dropdown' aria-expanded='false'>
        Local
    </a>
    <ul class='dropdown-menu' aria-labelledby='navbarDropdown'>";

    if($value["regist_local"] =="on"){
        $menu.=" <li><a class='dropdown-item' href='index.php?pagina=registrar_local.php'>Registrar Local</a></li>";
    }
    if($value["mostr_local"] =="on"){
        $menu.="<li><a class='dropdown-item' href='index.php?pagina=list_local.php'>Mostrar Local</a></li>";
    }
   
    $menu.="</ul>
  </li>";
    }

}

if(isset($_COOKIE["id"])){

    $menu.=" <div class='dropdown offset-2' >
        <button class='btn btn-danger dropdown-toggle' type='button' id='dropdownMenuButton1' data-bs-toggle='dropdown' aria-expanded='false'>
            Perfil
        </button>
        <ul class='dropdown-menu' aria-labelledby='dropdownMenuButton1'>
            <li><a class='dropdown-item' href='index.php?pagina=pefilDatos.php'>Datos Perfil</a></li>
            <li><a class='dropdown-item' id='btn-session' >Logout </a></li>
        </ul>
    </div>";
}
$menu.="</ul>";

echo json_encode($menu);





?>
