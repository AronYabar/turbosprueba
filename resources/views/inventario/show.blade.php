@extends('layout.layout')

@section('content')

<?php header("Access-Control-Allow-Origin: *"); ?>
<style type="">
	.register {
   width: 100%;
   margin: 10px auto;
   padding: 10px;
   border: 7px solid $green-border;
   border-radius: 10px; 
   font-family: "Helvetica Neue", Helvetica, 
   Arial, sans-serif;
     color: #444;
   background-color: #E7F2FB  ;
   box-shadow: 0 0 20px 0 #000000;
   float:left;
   }

#horizontal3 { zoom: 1; vertical-align: top; font-size: 15px;width: 450px; text-align: center;}
.tg  {border-collapse:collapse;border-spacing:0;}
.tg td{font-family:Arial, sans-serif;font-size:14px;padding:10px 5px;border-style:solid;border-width:1px;overflow:hidden;word-break:normal;border-color:black;}
.tg th{font-family:Arial, sans-serif;font-size:14px;font-weight:normal;padding:10px 5px;border-style:solid;border-width:1px;overflow:hidden;word-break:normal;border-color:black;}
.tg .tg-0x09{background-color:#9b9b9b;text-align:left;vertical-align:top}
.tg .tg-yhdn{background-color:#9698ed;border-color:inherit;text-align:left}
input {
  width: 40%;
}
.tg-quj4{border-color:inherit;text-align:right}
.tg-xldj{border-color:inherit;text-align:left}
body:after {
  content: ""; 
  font-size: 15em;  
  color: rgba(52, 166, 214, 0.4);
  z-index: 9999;
 
  display: flex;
  align-items: center;
  justify-content: center;
  position: fixed;
  top: 0;
  right: 0;
  bottom: 0;
  left: 0;
    
  -webkit-pointer-events: none;
  -moz-pointer-events: none;
  -ms-pointer-events: none;
  -o-pointer-events: none;
  pointer-events: none;

  -webkit-user-select: none;
  -moz-user-select: none;
  -ms-user-select: none;
  -o-user-select: none;
  user-select: none;
}
</style>

<div class="row">
	<div class="col-lg-12">
	</div>
	<!-- /.col-lg-12 -->
</div>
<!-- /.row -->
<div class="row">
	<div class="col-lg-12">
		<div class="panel panel-info">
			<div class="panel-heading" >
                
			</div>
			<div class="panel-body">
				<div class="row">
					<div class="col-lg-8">
					<div class="register" align="center" >
                     		<div align="center">
    		
					    		<table  style="undefined;table-layout: fixed; width: 100%">
									<colgroup>
									<col style="width: 35%">
									<col style="width: 10%">
									<col style="width: 55%">
									</colgroup>
									  <tr>
									    <th  colspan="3" align="center"><h3 align="center">
                                        @if(@$element->id_movimiento == 1)
                                        <h3>Registro de Ingreso para Modelo <strong>{{ @$element->modelo }}</strong></h3>
                                        @else
                                        <h3>Registro de Salida para Modelo <strong>{{ @$element->modelo }}</strong></h3>
                                        @endif
                                        </th>
									  </tr>
                                      <tr>
									    <td class="tg-quj4"><label>Categoría:</label></td>
									    <td class="tg-xldj" colspan="2" >
									    	<input type="text" class="form-control" value="{{@$element->nom_cat}}" readonly>
									    </td>
									  </tr>
                                      <tr>
									    <td class="tg-quj4"><label>Tipo Movimiento:</label></td>
									    <td class="tg-xldj" colspan="2" >
									    	<input type="text" class="form-control" value="{{@$element->nom_mov}}" readonly>
									    </td>
									  </tr>
									  <tr>
									    <td class="tg-quj4"><label>Cantidad:</label></td>
									    <td class="tg-xldj" colspan="2" >
									    	<input type="number" step="1"class="form-control"  value="{{@$element->cantidad}}" readonly>
									    </td>
									  </tr>
									  <tr>
									    <td class="tg-quj4"><label>Stock Inicial:</label></td>
									    <td class="tg-xldj" colspan="2"  >
									    	<div id=""></div>
                                            <input id="sti" type="text" style="width: 150px;" class="form-control"  value="{{@$element->stockInicial}}" readonly>
                                            
									    </td>
									  </tr>
									   <tr>
							            <td class="tg-quj4"><label>Stock Final :</label></td>
							            <td class="tg-xldj" colspan="2"  >
							              <input type="text" style="width: 150px;"class="form-control" value="{{@$element->stockFinal}}" readonly>
							            </td>
							          </tr>
							          <tr>
							            <td class="tg-quj4"><label>Observaciones :</label></td>
							            <td class="tg-xldj" colspan="2"  >
							              <input type="text" class="form-control" value="{{@$element->observaciones}}" readonly>
							            </td>
							          </tr>
                                      <tr>
							            <td class="tg-quj4"><label>Imagen :</label></td>
							            <td class="tg-xldj" colspan="2"  >
							              <img style="margin-top: 10px;" width="80%"  src="{{ $element->img }}" alt="" class="responsive-img materialboxed">
                                        </td>
							          </tr>
                                      
									  <tr>
									  	<td class="tg-quj4"></td>
									  	<td class="tg-xldj" colspan="2">   
										    <button type="button" class="btn btn-danger" onclick="history.back()">Volver</button>
                                        </td>
									  </tr>

								</table>
					    	</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@stop