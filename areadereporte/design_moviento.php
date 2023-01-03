<style type="text/css">


table{
    width: 90%;
    margin-left: 5%;
    margin-top: 10px;
    font-size: 10pt;
}


div.parrafo{
width: 90%;
margin-top: 10px;
text-align: left;
margin-left: 5%;
font-size: 10pt;
}

</style>
<page backcolor="#FEFEFE"  backimgx="center" backimgy="bottom" backimgw="100%" backtop="0" backbottom="30mm
" footer="page" style="font-size: 12pt">

    <table cellspacing="0">
        <tr>
           
            <td style="width: 35%;  font-size: 10px; color: #444444; text-align:center;">
                <img style="width: 100%; height:45px;" src="../img/recursos/logo.png" alt="Logo"><br>
                REGIONAL ITCA FEPADE SANTA ANA
               <!-- RELATION CLIENT -->
            </td>
             <td style="width:50%; text-align: left;  font-size: 15px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;MOVIMIENTO ACTIVO FIJO <?php
            //Esta session contiene el id para la busqueda
              echo $_SESSION['url_pdf']; ?></td>
           
        </tr>
    </table>
    <br>
    <br>
 <table cellspacing="0">
        <tr>
           
            <td style="width:25%; ">Fecha de traslado :</td>
            <td style="width:35%">2022-07-20</td>
             <td style="width:43%;"></td>
        </tr>
        <tr>
           
            <td>Local de salida :</td>
            <td>cafetin</td>
             <td></td>
        </tr>
        <tr>
      
            <td>Local de destino :</td>
            <td>Computo 2</td>
             <td></td>
        </tr>
        <tr>
           
            <td >Tipo de movimiento :</td>
            <td >Traslado</td>
             <td></td>
        </tr>
        <tr>
           
            <td ><br>Identificación del activo fijo :</td>
            <td ></td>
            <td></td>
        </tr>

       
    </table>


    <br>
    <br>

         <table cellspacing="0">
        <colgroup>
            <col style="width: 10%; text-align: center; padding: 5px;">
             <col style="width: 12%; text-align: center; padding: 5px;">
            <col style="width: 12%; text-align:  center; padding: 5px;">
           
            <col style="width: 12%; text-align: center;">
            <col style="width: 20%; text-align: center;">
            <col style="width: 20%; text-align: center">
           
        </colgroup>
        <thead>
            <tr style="background: #E7E7E7;">
                <th style="border: solid 1px black;">Cantidad</th>
                <th style="border: solid 1px black;">Codigo</th>
                <th style="border: solid 1px black;">Codigo Mined</th>
                <th style="border: solid 1px black;">Codigo interno</th>
                <th style="border: solid 1px black;">Nombre</th>
                <th style="border: solid 1px black;">Marca/Modelo</th>
            </tr>
        </thead>
        <tbody>

<tr >
    <td style="border: solid 1px #000;">1 </td>
    <td style="border: solid 1px #000;">453233456</td>
<td style="border: solid 1px #000;">76868665</td>
<td style="border: solid 1px #000;">9885</td>
<td style="border: solid 1px #000;">PC</td>
<td style="border: solid 1px #000;">Lorem ipsum, dolor, sit amet consectetur adipisicing elit. Accusantium, dolorem.</td>
</tr>
            <tr style="background: #E7E7E7;">
                <th colspan="5" style="border-top: solid 1px black; text-align: right;">Valor razonable : </th>
                <th style="border-top: solid 1px black;">$ 500</th>
            </tr>
        </tbody>
    </table> 

<div class="parrafo">
  <p style="margin-bottom:4px;">Justificacion del activo:</p>
<label>Lorem ipsum dolor sit amet consectetur adipisicing elit. Sit maxime recusandae atque ullam architecto perferendis deleniti, nihil at voluptates hic praesentium porro fugiat molestiae.</label>  

</div> 


<br>
<br>


<table>
    <tr>
        <td style="width:50%;">
          <p style="color:red;">Entrega</p>
          <br>
          Firma : ___________________
           <br>
           Nombre:
           <br>
           Centro de costo:
        </td>

         <td style="width:50%;">
            <p style="color:red;">Resibe</p><br>
           Firma : ___________________
           <br>
           Nombre:
           <br>
           Centro de costo:
        </td>
    </tr>
</table>
          </page>

