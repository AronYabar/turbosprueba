<!DOCTYPE html>
<html>
<head>
	<title>alv</title>

<style type="text/css">

.Parte1  {
	width:680px;
	border-collapse:collapse;
	border-spacing:0;}
.Parte1 td{
	border-style:solid;
	border-width:1px;
	overflow:hidden;
	border-color:black;}

.Parte1 th{
	border-style:solid;
	border-width:1px;
	overflow:hidden;
	border-color:black;}	

.Parte2  {
  width:640px;
  border-collapse:collapse;
  border-spacing:0;}
.Parte2 td{
  border-style:solid;
  border-width:1px;
  overflow:hidden;
  border-color:black;}

.Parte2 th{
  border-style:solid;
  border-width:1px;
  overflow:hidden;
  border-color:black;}  


  .Parte2 .tg-1wig{font-weight:bold;text-align:left;vertical-align:top}
.Parte2 .tg-5ua9{font-weight:bold;text-align:left}
.Parte2 .tg-0lax{text-align:left;vertical-align:top}
body{
      margin-top:0px;
      margin-bottom: 0px;
    }

 .borderadd
{
  border-radius: 0.7em;
  overflow: hidden;
  box-shadow: 1px 1px 1px black;
  border-spacing:0;
}
.Fechas td
{
	border: 1px solid #9F9E9E;
}
.table8
{
    width:680px;
    overflow: hidden;
    box-shadow: 0px 0px 0px black;
    border-spacing:0;
    margin-top: 25px;
    
}

.table8 td
{
  text-align: center; 
  vertical-align: middle;
  font-size: 12px;
  font-family:Times, sans-serif;
  
}
.table5
{
    width:640px;
    border-radius: 0.3em;
    overflow: hidden;
    box-shadow: 0px 0px 0px black;
    border-collapse:collapse;
    border-spacing:0;
    margin-top: 3px;
    
}

.table5 td
{
  border: 1px solid #9F9E9E;
  
}

.table5-1 td
{
  text-align: center; 
  vertical-align: middle;
  font-size: 15px;
  background-color:#5DADE2 ;

}
.table5-2 td
{
  font-size: 15px;
}

</style>
</head>
<body>
<table class="Parte1" align="center">
 
 <tr>
    <td class="" style="width:30%; border:0px; "><img src="https://i.imgur.com/QhSpF6S.jpg" alt="" width="200" height="100"/></td>
    <td class="" style="width:40%; border:0px; "></td>
    <td class="" align="right" style="width:30%; border:0px;">
      <span style="font-size: 10pt;">RUC 20602362419</span>
        <span style="font-size: 10pt;"><br>Telefono 958556558</span>
        <span style="font-size: 10pt;"><br>988008184</span>
      
    </td>
  </tr>
   
</table>

<table class="Parte1" align="center" style="margin-top: -15px;">
  <tr style="">
    <td class="" colspan="3" align="center" style=" border:0px;">
      <span style="font-size: 11pt; margin-left:  150px;">PROLONGACION AV LA CULTURA L4 SAN SEBASTIAN - CUSCO</span>
      <br>
    </td>

  </tr>
  <tr>
    <th colspan="3" bgcolor="#1d4185" class="" style=""  align="center"   style="border:1px;"></th>
  </tr>
</table>

<table class="Parte1" align="center" style="margin-top: 40px;">
  <tr style=" border:0px;">
    <th align="center" class="" style=" border:0px;">
       <span  style="font-size: 15pt;">INFORME TECNICO</span>
    </th>
  </tr>
  <tr>
    <td class="" style=" border:0px;">
      <table class="Parte2" align="center" style="margin-top: 30px;">
  <tr>
    <td class="tg-5ua9" bgcolor="#8FD2FA">CLIENTE:</td>
    <td class="tg-0lax" colspan="3"><?php print_r(@$ide->nombre)?></td>
  </tr>
  <tr>
    <td class="tg-5ua9" bgcolor="#8FD2FA">ATENCION:</td>
    <td class="tg-0lax" colspan="3"><?php print_r(@$ide->nombre)?></td>
  </tr>
  <tr>
    <td class="tg-1wig" bgcolor="#8FD2FA">TELEFONO:</td>
    <td class="tg-0lax" colspan="3"><?php print_r(@$ide->nro_celular)?></td>
  </tr>
  <tr>
    <td class="tg-1wig" bgcolor="#8FD2FA">E-MAIL:</td>
    <td class="tg-0lax" colspan="3"></td>
  </tr>
  <tr>
    <td class="tg-1wig" bgcolor="#8FD2FA">CONCEPTO:</td>
    <td class="tg-0lax" colspan="3">
      <?php 
        $var=json_decode(@$ide->descripcion);
        if (isset($var)) {
          for ($i=0; $i <count($var) ; $i++) { 
          print_r($var[$i].PHP_EOL);
          print_r("<br>");         
          }    
        }
               
      ?>
      
      </td>
  </tr>
  <tr>
    <td class="tg-1wig" bgcolor="#8FD2FA">FECHA:</td>
    <td class="tg-0lax" colspan="3"><?php print_r(@$ide->fecha)?></td>
  </tr>
  <tr>
    <td class="tg-1wig" bgcolor="#8FD2FA">TURBO:</td>
    <td class="tg-0lax"><?php print_r(@$ide->marca)?></td>
    <td class="tg-1wig" >MODELO:</td>
    <td class="tg-0lax"><?php print_r(@$ide->modelo)?></td>
  </tr>
</table>
    </td>
  </tr>
</table>

<table class="Parte2" align="center" style="margin-top: 30px;">
  <tr>
    <th class="" align="left" height="15" style="border: 0px;">SEÑORES:</th>
  </tr>
  <tr>
    <td class="" style="border: 0px;">Tenemos el agrado de hacerles llegar el informe tecnico respecto a la evaluacion del<br> turbo cargador de la marca <?php print_r(@$ide->marca)?>, modelo <?php print_r(@$ide->modelo)?>, que detallamos a continuacion.</td>
  </tr>
</table>

<table  class="table5" align="center" style="margin-top: 20px;">
    <tbody>
      <tr class="table5-1">
        
        <td style="width: 25%;" align="center"><font color="#000"><span style="font-weight:bold">DESCRIPCION</span></font></td>
        <td style="width: 30%;" align="center"><font color="#000"><span style="font-weight:bold">OPERACION</span></font></td>
        <td style="width: 45%;" align="center"><font color="#000"><span style="font-weight:bold">COMENTARIOS TECNICOS</span></font></td>
      </tr>
    </tbody>
    <tr class="table5-2">
        <?php 
        $var1=json_decode(@$info->descripcion); 
        $var2=json_decode(@$info->operacion);        
        $var3=json_decode(@$info->comentario); 
                 
      ?>
      @if(isset($var1))
      @for ($i = 0; $i < count($var1); $i++)
        <td style="width: 25%;" align="center"><?php print_r(@$var1[$i])?></td>
        <td style="width: 30%;" align="center"><?php print_r(@$var2[$i])?></td>
        <td style="width: 45%;" align="center"><?php print_r(@$var3[$i])?></td>
      </tr>
      @endfor
      @endif
</table>
<table class="Parte2" align="center" style="margin-top: 30px;">
  <tr>
    <th class="" align="left" height="15" style="border: 0px;">RESULTADOS:</th>

  </tr>
  <?php 
        $var4=json_decode(@$info->resultado);     
  ?>
  @if(isset($var4))
  @for ($i = 0; $i < count($var4); $i++)
  <tr>

    <td class="" style="border: 0px;"><?php print_r(" - ".@$var4[$i])?></td>
  </tr>
  @endfor
  @endif
</table>

<table class="Parte2" align="center" style="margin-top: 30px;">
  <tr>
    <th class="" align="left" height="15" style="border: 0px;">RECOMENDACIONES:</th>
  </tr>
  <tr>

    <td class="" style=" border: 0px;"><?php print_r(@$info->recomendaciones)?></td>
  </tr>
</table>

<table class="Parte2" align="center" style="margin-top: 30px;">
  <tr>
    <th class="" align="left" height="15" style="border: 0px;"></th>
  </tr>
  <tr>
    <td class="" style="border: 0px;">Sin otro particular quedamos a su entera disposición.</td>
  </tr>
</table>

</body>
</html>
