<?php
session_start();
require_once "../conexion/sql.php";
require('../fpdf/fpdf.php');
$procesoDatos= new sqlReg ();

echo "si llego";

if(isset($_POST["accion"])){
     
    if($_POST["accion"]=="reporte_Mov"){


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
        
        @include 'config.php';
        // $id_mov=$_GET["movement"];   
        
        // Creación del objeto de la clase heredada
        $pdf = new PDF();
        $pdf->AliasNbPages();
        $pdf->AddPage();
        $pdf->SetFont('Arial','B',11);
        
        $pdf->Image('../../img/recursos/logoRep.png',25,8,50);
        $pdf->setXY(85,15);
        $pdf->Cell(0,0,'MOVIMIENTO ACTIVO FIJO',0,0,'',0);
        $pdf->setXY(105,20);
        $pdf->Cell(0,0,767,0,0,'',0);
        $pdf->SetFont('Helvetica','',8);
        $pdf->setXY(25,25);//(ancho,alto) posición del texto de abajo
        $pdf->Cell(0,0,'FECHA DE TRASLADO: ',0,0,'',0);
        $pdf->setXY(85,25);
        $pdf->Cell(0,0,'ACTIVO ASIGNADO A: REGIONAL ITCA FEPADE SANTA ANA',0,0,'',0);
        $pdf->setXY(25,30);
        $pdf->Cell(0,0,'DESTINO: ',0,0,'',0);
        
        $pdf->setXY(25,35);
        $pdf->Cell(0,0,'TIPO DE MOVIMIENTO: ',0,0,'',0);
        
        $pdf->setXY(25,40);
        $pdf->Cell(0,0,utf8_decode('IDENTIFICACIÓN DEL ACTIVO FIJO: '),0,0,'',0);
        //lista de activos/ columnas de la tabla
        $pdf->SetFont('Helvetica','B',8);
        $pdf->Ln(5);
        $pdf->setX(25);
        //CELDA (ANCHO, ALTO, ACTIVAR TILDES O SIMBOLOS ("TEXTO"),BORDE, SALTO DE LINEA, JUSTIFICAR, RELLENAR LA CELDA)
        $pdf->Cell(15,8,utf8_decode('CÓDIGO'),1,0,'C',0);
        $pdf->Cell(20,8,'CANTIDAD',1,0,'C',0);
        $pdf->Cell(25,8,utf8_decode('DESCRIPCIÓN'),1,0,'C',0);
        $pdf->Cell(25,8,'MARCA/MODELO',1,0,'C',0);
        $pdf->Cell(30,8,'VALOR RAZONABLE',1,0,'C',0);
        //DONDE VA A IR LAS FILAS DE LOS ACTIVOS
        //FOOTER
        $pdf->SetFont('Helvetica','',8);
        $pdf->Ln(15);
        $pdf->setX(25);
        $pdf->Cell(0,0,utf8_decode('JUSTIFICACIÓN DEL MOVIMIENTO DEL ACTIVO FIJO: '),0,0,'L',0);
        
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
        $pdf->setX(25);
        $pdf->Cell(0,0,utf8_decode('CENTRO DE COSTO: '),0,0,'L',0);
        $pdf->setX(100);
        $pdf->Cell(0,0,utf8_decode('CENTRO DE COSTO: '),0,0,'L',0);
        
        $pdf->Ln(10);
        $pdf->setX(25);
        $pdf->Cell(0,0,utf8_decode('NOMBRE: '),0,0,'L',0);
        $pdf->setX(100);
        $pdf->Cell(0,0,utf8_decode('NOMBRE: '),0,0,'L',0);
        
        $pdf->Output();
        


    echo json_encode("reporte");

    }

}



    ?>