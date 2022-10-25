<?php
// session_start();
// require_once "partes/conexion/sqlRepor.php";
require_once "../partes/conexion/sqlRepor.php";
require('fpd/fpdf.php');

$procesoDatos= new sqlReg ();


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

        $rs=$procesoDatos->sqlGenericaArreglo("SELECT id_activo ,  codigo_mined, codigo_interno  , nom_activo 
        , nom_tipo_activo , descrip_activo , valor_activo , marca , modelo , dimensiones , serie , vida_util , local_name, nom,apellidos , foto , fecha_resg , color  
        FROM  inventario 
        INNER JOIN tipo_activo ON inventario.tipo_activo = tipo_activo.id_tipo_activo
        INNER JOIN `local` ON inventario.`id_local` = `local`.`id_local`
        INNER JOIN usuario ON inventario.`id_reposable` = usuario.`id_user` where id_activo = ".$_GET["url"]."
        ");

       // $res=$procesoDatos->DatosRepor($dato);
        @include 'config.php';
        // $id_mov=$_GET["ids"];  
        
        // Creación del objeto de la clase heredada
        $pdf = new PDF();
        $pdf->AliasNbPages();
        $pdf->AddPage();
        $pdf->SetFont('Arial','B',11);
        
        $pdf->Image('../img/recursos/logoRep.png',25,8,50);
        $pdf->setXY(85,15);
        $pdf->Cell(0,0,'CODIGO DEL ACTIVO',0,0,'',0);
        $pdf->setXY(105,20);
        $pdf->Cell(0,0,$_GET["url"],0,0,'',0);
        $pdf->SetFont('Helvetica','B',8);
        $pdf->setXY(25,25);//(ancho,alto) posición del texto de abajo
        $pdf->Cell(0,0,'FECHA DE INGRESO: ',0,0,'',0);
        $pdf->SetFont('Helvetica','',8);
        $pdf->setXY(58,25);//(ancho,alto) posición del texto de abajo
        $pdf->Cell(0,0, $rs["fecha_resg"],0,0,'',0);
        $pdf->setXY(85,25);
        $pdf->Cell(0,0,'ACTIVO ASIGNADO A: REGIONAL ITCA FEPADE SANTA ANA',0,0,'',0);
        $pdf->SetFont('Helvetica','B',8);

        //especificaciones
        
/*
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

        */

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
       
        /*
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
      */
        //DONDE VA A IR LAS FILAS DE LOS ACTIVOS
        //FOOTER
        $pdf->SetFont('Helvetica','B',8);
        $pdf->Ln(15);
        $pdf->setX(25);
        $pdf->Cell(0,0,utf8_decode('DESCRIPCION: '),0,0,'L',0);
        $pdf->SetFont('Helvetica','',8);
        $pdf->Ln(5);
        $pdf->setX(25);
        $pdf->Cell(0,0,utf8_decode($rs["descrip_activo"]),0,0,'L',0);
        
        //FIRMAS
        $pdf->Ln(15);
        $pdf->setX(25);
        $pdf->Cell(0,0,utf8_decode('RESPONSABLE'),0,0,'L',0);
        //$pdf->setX(100);
       // $pdf->Cell(0,0,utf8_decode('RECIBE'),0,0,'L',0);
        
        $pdf->Ln(10);
        $pdf->setX(25);
        $pdf->Cell(0,0,utf8_decode('FIRMA:____________________________'),0,0,'L',0);
        //$pdf->setX(100);
       // $pdf->Cell(0,0,utf8_decode('FIRMA:____________________________'),0,0,'L',0);
        
        $pdf->Ln(10);
        $pdf->SetFont('Helvetica','B',8);
        $pdf->setX(25);
        $pdf->Cell(0,0,utf8_decode('NOMBRE: '),0,0,'L',0);
        $pdf->SetFont('Helvetica','',8);
        $pdf->setX(40);
        $pdf->Cell(0,0,utf8_decode($rs["nom"]." ".$rs["apellidos"]),0,0,'L',0);
        $pdf->SetFont('Helvetica','B',8);
        
        $pdf->setX(100);
        $pdf->Cell(0,0,utf8_decode('NOMBRE: '),0,0,'L',0);
        $pdf->SetFont('Helvetica','',8);
        $pdf->setX(115);
        $pdf->Cell(0,0,utf8_decode('reslleno'),0,0,'L',0);
        $pdf->SetFont('Helvetica','B',8);
        $pdf->Ln(10);
        $pdf->setX(25);
        
        $pdf->Cell(0,0,utf8_decode('CENTRO DE COSTO: '),0,0,'L',0);
        $pdf->SetFont('Helvetica','',8);
        $pdf->setX(130);
        $pdf->Cell(0,0,utf8_decode($rs["local_name"]),0,0,'L',0);
        $pdf->SetFont('Helvetica','B',8);
        $pdf->setX(100);
        
        $pdf->Cell(0,0,utf8_decode('CENTRO DE COSTO: '),0,0,'L',0);
        $pdf->SetFont('Helvetica','',8);
        $pdf->setX(55);
        $pdf->Cell(0,0,utf8_decode($rs["local_name"]),0,0,'L',0);

        
        $pdf->Output();
        



    ?>