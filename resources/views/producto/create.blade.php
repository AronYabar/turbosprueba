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
				Nueva Variante para <strong>{{ @$x->nombre }}</strong>
			</div>
			<div class="panel-body">
				<div class="row">
					<div class="col-lg-8">
					<div class="register" align="center" >
                        @if(isset($element))
                        <form name="mi_formulario" role="form" method="post" action="/producto/{{@$element->id_producto}}" autocomplete="false" accept-charset="UTF-8" enctype="multipart/form-data">
                        {!! method_field('PUT')!!}
                        @else
						<form name="mi_formulario" role="form" method="post" action="/producto" autocomplete="false" accept-charset="UTF-8" enctype="multipart/form-data">
                        @endif
                        <input type="hidden" name="_token" value="{{  csrf_token()  }}">
                            <input type="hidden" name="id_cat_pro" value="{{@$x->id_cat_pro}}">
							<div align="center">
    		
					    		<table  style="undefined;table-layout: fixed; width: 100%">
									<colgroup>
									<col style="width: 35%">
									<col style="width: 10%">
									<col style="width: 55%">
									</colgroup>
									  <tr>
									    <th  colspan="3" align="center"><h3 align="center">Datos del nuevo Producto</h3></th>
										@if(isset($e))
										<span style="color: red;">Error en registro: Producto ya existente</span>
										@endif  
									</tr>
									  
									  <tr>
										<td class="tg-quj4"><label> Modelo de Turbo :</label></td>
									    <td class="tg-xldj" colspan="2">
										<input type="text" class="typeahead form-control"  name="modelo" id="modelo" value="{{@$element->modelo}}" onchange="loadturbos();" >
									    </td> 
									  </tr>

									  <tr>
									    <td class="tg-quj4"><label>Nro Part :</label> </td>
									    <td class="tg-xldj" colspan="2">
									    	<div class="row">
			                                <div class="col-md-6">
												<input type="text" class="form-control" name="turbo" id="turbo" value="{{@$element->nro_parte}}" onchange="checkInput();">
									    	</div>
			                                <div class="col-md-6">
			                                	<select id="select_aer2" class="form-control" name="turbosall"  onchange="myFunctionsave3()">
											</select></div>
									    	 </div>
									    </td>
									  </tr> 
									 
									  <tr>
									    <td class="tg-quj4"><label> Marca :</label></td>
									    <td class="tg-xldj" colspan="2">
									    	<div class="row">
			                                <div class="col-md-6">
											<input type="text" class="form-control" name="marca"  id="marca" value="{{@$element->marca}}" >
											</div>
			                                <div class="col-md-6">
			                                	<select id="select_aer1" class="form-control" name="marcasall"  onchange="myFunctionsave2()">
											</select></div>
                            				</div>
									    </td>
									  </tr>
									 
									  <tr>
									  <td class="tg-quj4"><label> Motor :</label></td>
									    <td class="tg-xldj" colspan="2">
									    	<div class="row">
			                                <div class="col-md-6">
			                                	<input type="text" class="motortype form-control" id="motor" name="motor"  ></div>
			                                <div class="col-md-6">
			                                	<select id="select_aer" class="form-control" name="turbosall"  onchange="myFunctionsave1()">
											</select></div>
                            				</div>
									    </td>
									  </tr>
									  <tr>
										<td class="tg-quj4"><label> Aplicación :</label></td>
									    <td class="tg-xldj" colspan="2">
										<input type="text" class="form-control"  name="aplicacion" id="aplicacion" value="{{@$element->aplicacion}}">
									    </td> 
									  </tr>
									  <tr>
									  <tr>
									    <td class="tg-quj4"><label>Precio Venta:</label></td>
									    <td class="tg-xldj" colspan="2"  >
									    	<input type="number" step="01.00" class="form-control" style="width: 150px;" name="precio" id="precio" value="{{@$element->precio}}" placeholder="0.00" autocomplete="off">
									    </td>
									  </tr>
									  <tr>
							            <td class="tg-quj4"><label> </label></td>
							            <td class="tg-xldj" colspan="2">
							                <select name="destacado" class="form-control" style="width: 150px;"	>
                                                @if(isset($element))
                                                    @if($element->destacado==1)
                                                    <option value="1"selected>Destacado</option>
                                                    <option value="0">No destacado</option>
                                                    @else
                                                    <option value="1">Destacado</option>
                                                    <option value="0" selected>No destacado</option>
                                                    @endif
                                                @else
                                                <option value="1">Destacado</option>
                                                <option value="0" selected>No destacado</option>
                                                @endif
                                            </select>
							            </td>
							          </tr>
									  <tr>
									  	<td class="tg-quj4"><button type="submit" class="btn btn-success">Guardar</button></td>
									  	<td class="tg-xldj" colspan="2">
									    
										<button type="reset" class="btn btn-warning">Limpiar</button>
										<button type="button" class="btn btn-danger" onclick="location.href='/variantes/{{ $x->id_cat_pro }}'">Volver</button></td>
									  </tr>

								</table>
					    	</div>
							<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
							<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-3-typeahead/4.0.1/bootstrap3-typeahead.min.js"></script>
					    	<script type="text/javascript">
						        var path="{{route('autocomplete')}}";
						        $('input.typeahead').typeahead({
						            source:function (query,process) {
						                return $.get(path,{query:name},function (data) {
						                   return process(data);
						                });
						            }
						        });
						    </script>
						    


						    <script type="text/javascript">
						    	function recuperaname() {
								 	var value = document.getElementById("dni").value;
								 	$.ajax({
					                url  : "{{ route('recuperardni') }}",
					                type : "GET",
					                data : {
					                    'dni' : value,
					                },
					                success:function(data){
					                   console.log(data);
					                   select = document.getElementById("namedni");
									   select.innerHTML = data["name"]; 
			
					                }
					            });
								}
						    </script>

						    <script type="text/javascript">
						    	function loadturbos() {
									console.log("loadturbos");
								 	var value = document.getElementById("modelo").value;
								 	$.ajax({
					                url  : "{{ (route('recuperarturbos')) }}",
					                headers: {
							            'Access-Control-Allow-Origin': '*',
							        },
							        crossDomain: true,
   									
					                type : "GET",
					                data : {
					                    'name' : value,
					                },
					                success:function(data){
					                   console.log(data); 

					                    // for turbos
					                   select = document.getElementById("select_aer2");
									   select.innerHTML = '';

									  z = document.createElement("option");
									  z.setAttribute("value", "");
									  t = document.createTextNode("Elija el turbo ...");
									  z.appendChild(t);
									  select.appendChild(z);
			
									  for (clave in data){
									  z = document.createElement("option");
									  z.setAttribute("value", data[clave]);
									  t = document.createTextNode(data[clave]);
									  z.appendChild(t);
									  select.appendChild(z);}
					                }
					            });
								}
						    </script>


						    <script type="text/javascript">
						    	function checkInput() {
								 	var value = document.getElementById("turbo").value;
								 	$.ajax({
					                url  : "{{ route('recuperarmarca') }}",
					                type : "GET",
					                data : {
					                    'name' : value,
					                },
					                success:function(data){
					                   console.log(data); 
					            
					                   motors = data["motores"];
					                   marcas = data["marcas"];
					                   //turbos = data["turbos"];
					                   console.log(motors)

					                   // for motores
					                   select = document.getElementById("select_aer");
									   select.innerHTML = '';

									  z = document.createElement("option");
									  z.setAttribute("value", "");
									  t = document.createTextNode("Elija una opcion ...");
									  z.appendChild(t);
									  select.appendChild(z);
			
									  for (clave in motors){
									  if (!clave==""){
									  z = document.createElement("option");
									  z.setAttribute("value", clave);
									  t = document.createTextNode(clave);
									  z.appendChild(t);
									  select.appendChild(z);}}

									  // for marcas
									  select = document.getElementById("select_aer1");
									   select.innerHTML = '';

									  z = document.createElement("option");
									  z.setAttribute("value", "");
									  t = document.createTextNode("Elija una opcion ...");
									  z.appendChild(t);
									  select.appendChild(z);
			
									  for (clave in marcas){
									  if (!clave==""){
									  z = document.createElement("option");
									  z.setAttribute("value", clave);
									  t = document.createTextNode(clave);
									  z.appendChild(t);
									  select.appendChild(z);}}
					                   
					                  // for modelos
					                //   select = document.getElementById("select_aer2");
									//   select.innerHTML = '';

									 // z = document.createElement("option");
									 // z.setAttribute("value", "");
									 // t = document.createTextNode("Elija una opcion ...");
									 // z.appendChild(t);
									 // select.appendChild(z);
			
									 // for (clave in modelos){
									  //z = document.createElement("option");
									  //z.setAttribute("value", clave);
									  //t = document.createTextNode(clave);
									  //z.appendChild(t);
									  //select.appendChild(z);}
					                }
					            });
								}
						    </script>

						    <script>
							function myFunctionsave1() {
							  var x = document.getElementById("select_aer").value;
							  document.getElementById('motor').value=x;
							}
							</script>

						    <script>
							function myFunctionsave2() {
							  var x = document.getElementById("select_aer1").value;
							  document.getElementById('marca').value=x;
							}
							</script>

						    <script>
							function myFunctionsave3() {
							  var x = document.getElementById("select_aer2").value;
							  document.getElementById('turbo').value=x;
							  checkInput();
							}
							</script>
						</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@stop