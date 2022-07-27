<?php
// session_start();
// require_once "partes/conexion/sqlRepor.php";
require_once "../partes/conexion/sqlRepor.php";
require('fpd/fpdf.php');

$procesoDatos= new sqlReg ();

// echo "si llego";

// if(isset($_POST["accion"])){
     
//     if($_POST["accion"]=="reporte_Mov"){
// echo (__DIR__);

        // require('../fpdf/fpdf.php');

        class PDF extends FPDF
        {
        // Cabecera de página
        function Header()
        {
            //
        }
        
        // Pie de página
        function Footer()
        {
            //
        }
        }
        $dato=[
            "tabla"=>"list_movimientos
            INNER JOIN usuario AS user_entrega ON list_movimientos.id_user_entrega = user_entrega.id_user
            INNER JOIN usuario AS user_recibe ON list_movimientos.id_user_recibe = user_recibe.id_user
            INNER JOIN `local` AS local_salida ON list_movimientos.id_local_salida = local_salida.id_local
            INNER JOIN `local` AS local_destino ON list_movimientos.id_local_destino = local_destino.id_local
            INNER JOIN detalle_movimientos ON list_movimientos.id_lis_mov = detalle_movimientos.id_mov
            INNER JOIN tipo_movimiento ON tipo_movimiento.id_mov = list_movimientos.id_tipo_mov",
            "campo"=>"id_lis_mov",
            "id"=>$_GET["ids"],
            "dato"=>"id_lis_mov,user_entrega.nom AS userEntrega,user_recibe.nom AS userRecibe, user_entrega.Centro_costo AS centroCE
            ,user_recibe.Centro_costo AS centroCR,user_recibe.apellidos AS apellidosR,user_entrega.apellidos AS apellidosE,
            local_salida.local_name AS local_s,local_destino.local_name AS local_d,fecha_mov,hora_mov,justi_mov,id_activos,tipo_mov"
        ];
        $res=$procesoDatos->DatosRepor($dato);
        @include 'config.php';
        // $id_mov=$_GET["ids"];  
        
        // Creación del objeto de la clase heredada
        $pdf = new PDF();
        $pdf->AliasNbPages();
        $pdf->AddPage();
        $pdf->SetFont('Arial','B',11);
        
        $pdf->Image('../img/recursos/logoRep.png',25,8,50);
        $pdf->setXY(85,15);
        $pdf->Cell(0,0,'MOVIMIENTO ACTIVO FIJO',0,0,'',0);
        $pdf->setXY(105,20);
        $pdf->Cell(0,0,$_GET["ids"],0,0,'',0);
        $pdf->SetFont('Helvetica','B',8);
        $pdf->setXY(25,25);//(ancho,alto) posición del texto de abajo
        $pdf->Cell(0,0,'FECHA DE TRASLADO: ',0,0,'',0);
        $pdf->SetFont('Helvetica','',8);
        $pdf->setXY(58,25);//(ancho,alto) posición del texto de abajo
        $pdf->Cell(0,0, $res["fecha_mov"],0,0,'',0);
        $pdf->setXY(85,25);
        $pdf->Cell(0,0,'ACTIVO ASIGNADO A: REGIONAL ITCA FEPADE SANTA ANA',0,0,'',0);
        $pdf->SetFont('Helvetica','B',8);
        // $pdf->setXY(25,30);
        // $pdf->Cell(0,0,'USUARIO ENTREGA: ',0,0,'',0);
        // $pdf->setXY(55,30);
        // $pdf->SetFont('Helvetica','',8);
        // $pdf->Cell(0,0,$res["userEntrega"]." ".$res["apellidosE"],0,0,'',0);
        // $pdf->SetFont('Helvetica','B',8);
        // $pdf->setXY(25,35);
        // $pdf->Cell(0,0,'USUARIO RECIBE: ',0,0,'',0);
        // $pdf->SetFont('Helvetica','',8);
        // $pdf->setXY(52,35);
        // $pdf->Cell(0,0,$res["userRecibe"]." ".$res["apellidosR"],0,0,'',0);
        $pdf->SetFont('Helvetica','B',8);
        $pdf->setXY(25,30);
        $pdf->Cell(0,0,'LOCAL SALIDA: ',0,0,'',0);
        $pdf->SetFont('Helvetica','',8);
        $pdf->setXY(48,30);
        $pdf->Cell(0,0,$res["local_s"],0,0,'',0);
        $pdf->setXY(25,35);
        $pdf->SetFont('Helvetica','B',8);
        $pdf->Cell(0,0,'LOCAL DESTINO: ',0,0,'',0);
        $pdf->SetFont('Helvetica','',8);
        $pdf->setXY(50,35);
        $pdf->Cell(0,0,$res["local_d"],0,0,'',0);
        $pdf->SetFont('Helvetica','B',8);
        $pdf->setXY(25,40);
        $pdf->Cell(0,0,'TIPO DE MOVIMIENTO: ',0,0,'',0);
        $pdf->SetFont('Helvetica','',8);
        $pdf->setXY(57,40);
        $pdf->Cell(0,0,$res["tipo_mov"],0,0,'',0);
        $pdf->SetFont('Helvetica','B',8);
        $pdf->setXY(25,45);
        $pdf->Cell(0,0,utf8_decode('IDENTIFICACIÓN DEL ACTIVO FIJO: '),0,0,'',0);
        //lista de activos/ columnas de la tabla
        $pdf->SetFont('Helvetica','B',8);
        $pdf->Ln(5);
        $pdf->setX(25);
        //CELDA (ANCHO, ALTO, ACTIVAR TILDES O SIMBOLOS ("TEXTO"),BORDE, SALTO DE LINEA, JUSTIFICAR, RELLENAR LA CELDA)
        $pdf->Cell(20,8,utf8_decode(' CÓDIGO '),1,0,'C',0);
        $pdf->Cell(27,8,utf8_decode(' CÓDIGO Mined '),1,0,'C',0);
        $pdf->Cell(27,8,utf8_decode(' CÓDIGO Interno'),1,0,'C',0);
        $pdf->Cell(20,8,'NOMBRE',1,0,'C',0);
        $pdf->Cell(20,8,'CANTIDAD',1,0,'C',0);
        // $pdf->Cell(25,8,utf8_decode('DESCRIPCIÓN'),1,0,'C',0);
        $pdf->Cell(25,8,'MARCA/MODELO',1,0,'C',0);
        $pdf->Cell(30,8,'VALOR RAZONABLE',1,0,'C',0);
        $pdf->SetFont('','',8);
        
        $idActivos=explode(',',$res["id_activos"]);
        foreach($idActivos as $key => $value){
               $arrayDatos=[
                "tabla"=>"inventario",
                "campo"=>"id_activo",
                "dato"=>"*",
                "id"=>$value
               ];
            $datoActivo=$procesoDatos->listDeACtivoMov($arrayDatos);
            $pdf->Ln();
            $pdf->setX(25);
            $pdf->Cell(20,8,utf8_decode($datoActivo["id_activo"]),1,0,'C',0);
            $pdf->Cell(27,8,utf8_decode($datoActivo["codigo_mined"]),1,0,'C',0);
            $pdf->Cell(27,8,utf8_decode($datoActivo["codigo_interno"]),1,0,'C',0);
            $pdf->Cell(20,8,$datoActivo["nom_activo"],1,0,'C',0);
            $pdf->Cell(20,8,"1",1,0,'C',0);
            // $pdf->Cell(25,8,utf8_decode($datoActivo["descrip_activo"]),1,0,'C',0);
            $pdf->Cell(25,8,$datoActivo["marca"],1,0,'C',0);
            $pdf->Cell(30,8,$datoActivo["valor_activo"],1,0,'C',0);
        }
        // $pdf->Cell(15,8,utf8_decode(' CÓDIGO '),1,0,'C',0);
        // $pdf->Cell(20,8,'NOMBRE',1,0,'C',0);
        // $pdf->Cell(20,8,'CANTIDAD',1,0,'C',0);
        // $pdf->Cell(25,8,utf8_decode('DESCRIPCIÓN'),1,0,'C',0);
        // $pdf->Cell(25,8,'MARCA/MODELO',1,0,'C',0);
        // $pdf->Cell(30,8,'VALOR RAZONABLE',1,0,'C',0);
        // $pdf->Ln();
        // $pdf->setX(25);
        // $pdf->Cell(15,8,utf8_decode(' CÓDIGO '),1,0,'C',0);
        // $pdf->Cell(20,8,'NOMBRE',1,0,'C',0);
        // $pdf->Cell(20,8,'CANTIDAD',1,0,'C',0);
        // $pdf->Cell(25,8,utf8_decode('DESCRIPCIÓN'),1,0,'C',0);
        // $pdf->Cell(25,8,'MARCA/MODELO',1,0,'C',0);
        // $pdf->Cell(30,8,'VALOR RAZONABLE',1,0,'C',0);
        // $pdf->Ln();
        

        // foreach($)
        //DONDE VA A IR LAS FILAS DE LOS ACTIVOS
        //FOOTER
        $pdf->SetFont('Helvetica','B',8);
        $pdf->Ln(15);
        $pdf->setX(25);
        $pdf->Cell(0,0,utf8_decode('JUSTIFICACIÓN DEL MOVIMIENTO DEL ACTIVO FIJO: '),0,0,'L',0);
        $pdf->SetFont('Helvetica','',8);
        $pdf->Ln(5);
        $pdf->setX(25);
        $pdf->Cell(0,0,utf8_decode($res["justi_mov"]),0,0,'L',0);
        
        //FIRMAS
        $pdf->Ln(15);
        $pdf->setX(25);
        $pdf->Cell(0,0,utf8_decode('ENTREGA'),0,0,'L',0);
        $pdf->setX(100);
        $pdf->Cell(0,0,utf8_decode('RECIBE'),0,0,'L',0);
        
        $pdf->Ln(10);
        $pdf->setX(25);
        $pdf->Cell(0,0,utf8_decode('FIRMA:____________________________'),0,0,'L',0);
        $pdf->setX(100);
        $pdf->Cell(0,0,utf8_decode('FIRMA:____________________________'),0,0,'L',0);
        
        $pdf->Ln(10);
        $pdf->SetFont('Helvetica','B',8);
        $pdf->setX(25);
        $pdf->Cell(0,0,utf8_decode('NOMBRE: '),0,0,'L',0);
        $pdf->SetFont('Helvetica','',8);
        $pdf->setX(40);
        $pdf->Cell(0,0,utf8_decode($res["userEntrega"]." ".$res["apellidosE"]),0,0,'L',0);
        $pdf->SetFont('Helvetica','B',8);
        $pdf->setX(100);
        $pdf->Cell(0,0,utf8_decode('NOMBRE: '),0,0,'L',0);
        $pdf->SetFont('Helvetica','',8);
        $pdf->setX(115);
        $pdf->Cell(0,0,utf8_decode($res["userRecibe"]." ".$res["apellidosR"]),0,0,'L',0);
        $pdf->SetFont('Helvetica','B',8);
        $pdf->Ln(10);
        $pdf->setX(25);
        $pdf->Cell(0,0,utf8_decode('CENTRO DE COSTO: '),0,0,'L',0);
        $pdf->SetFont('Helvetica','',8);
        $pdf->setX(130);
        $pdf->Cell(0,0,utf8_decode($res["centroCR"]),0,0,'L',0);
        $pdf->SetFont('Helvetica','B',8);
        $pdf->setX(100);
        $pdf->Cell(0,0,utf8_decode('CENTRO DE COSTO: '),0,0,'L',0);
        $pdf->SetFont('Helvetica','',8);
        $pdf->setX(55);
        $pdf->Cell(0,0,utf8_decode($res["centroCR"]),0,0,'L',0);

        
        $pdf->Output();
        


    // echo json_encode("reporte");

//     }

// }



    ?>