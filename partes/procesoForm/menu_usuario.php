<?php
session_start();
require_once "../conexion/sql.php";
$procesoDatos= new sqlReg ();

$menus=[
    "accion"=>"no",
    "menu"=>"",
];
if(isset($_COOKIE['id']))
{

    if(isset($_SESSION['datos'][$_COOKIE['id']][0])){
        
        
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
    
    if(!($value["registrar_usu"] =="false" && $value["list_usu"] =="false" && $value["conexion"] =="false")){
        
        $menu.="<li class='nav-item dropdown'> 
        <a class='nav-link dropdown-toggle'  id='navbarDropdown' role='button' data-bs-toggle='dropdown' aria-expanded='false'>
        Usuario
        </a>
        <ul class='dropdown-menu' aria-labelledby='navbarDropdown'>";
        if($value["registrar_usu"] =="true"){
            $menu.=" <li><a class='dropdown-item' href='index.php?pagina=registrar_usuario.php'>Registrar</a></li>";
        }
        if($value["list_usu"] =="true"){
            $menu.=" <li><a class='dropdown-item' href='index.php?pagina=list_usuarios.php'>Usuario</a></li>";
        }
        if($value["conexion"] =="true"){
            $menu.=" <li><a class='dropdown-item' href='index.php?pagina=list_conexiones.php'>Conexiones</a></li>";
        }
        $menu.="</ul>
        </li>";
    }
    if(!($value["mover_activos"] =="false" && $value["list_movimiento_activo"] =="false" )){
        
        $menu.="<li class='nav-item dropdown'>
        <a class='nav-link dropdown-toggle'  id='navbarDropdown' role='button' data-bs-toggle='dropdown' aria-expanded='false'>
        Mover
        </a>
        <ul class='dropdown-menu' aria-labelledby='navbarDropdown'>";
        
        if($value["mover_activos"] =="true"){
            $menu.=" <li><a class='dropdown-item' href='index.php?pagina=mover_activo.php'>Mover</a></li>";
        }
        if($value["list_movimiento_activo"] =="true"){
            $menu.=" <li><a class='dropdown-item' href='index.php?pagina=list_movimientos.php'>Lista de Movimiento</a></li>";
        }
        $menu.="</ul>
        </li>";
    }
    if(!($value["regist_producto"] =="false" && $value["mostr_producto"] =="false" )){
        
        $menu.="<li class='nav-item dropdown'>
        <a class='nav-link dropdown-toggle'  id='navbarDropdown' role='button' data-bs-toggle='dropdown' aria-expanded='false'>
        Inventario
        </a>
        <ul class='dropdown-menu' aria-labelledby='navbarDropdown'>";
        
        if($value["regist_producto"] =="true"){
            $menu.=" <li><a class='dropdown-item' href='index.php?pagina=registrar_Activo.php'>Registrar Activos</a></li>";
        }
        if($value["mostr_producto"] =="true"){
            $menu.="<li><a class='dropdown-item' href='index.php?pagina=list_activos.php'>Mostrar Activos</a></li>";
        }
        
        $menu.="</ul>
        </li>";
    }
    if(!($value["regist_local"] =="false" && $value["mostr_local"] =="false" )){
        
        $menu.="<li class='nav-item dropdown'>
        <a class='nav-link dropdown-toggle'  id='navbarDropdown' role='button' data-bs-toggle='dropdown' aria-expanded='false'>
        Local
        </a>
        <ul class='dropdown-menu' aria-labelledby='navbarDropdown'>";
    
    if($value["regist_local"] =="true"){
        $menu.=" <li><a class='dropdown-item' href='index.php?pagina=registrar_local.php'>Registrar Local</a></li>";
    }
    if($value["mostr_local"] =="true"){
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

$menus=[
    "accion"=>"si",
    "menu"=>$menu,
];

}
}
echo json_encode($menus);





?>
