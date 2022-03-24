@extends('layout.layout')

@section('estilos')
<!-- DataTables CSS -->
<script src={{ URL::asset('bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.css') }}></script>
<!-- DataTables Responsive CSS -->
<script src={{ URL::asset('bower_components/datatables-responsive/css/dataTables.responsive.css') }}></script>
@stop
@section('content')

<div class="row">
	<div class="col-lg-12">
		<h3 class="page-header">NUEVO REGISTRO
			<button type="button" class="btn btn-primary" onclick="location.href='/inventario/create/{{ $id }}/1'"><i class="fa fa-plus" aria-hidden="true"></i> INGRESO</button>
			<button type="button" class="btn btn-danger" onclick="location.href='/inventario/create/{{ $id }}/2'"><i class="fa fa-plus" aria-hidden="true"></i> SALIDA</button>
		</h3>

	</div>
</div>
<!-- /row -->
<div class="row">
	<div class="col-lg-12">
		<div class="panel panel-primary">
			<div class="panel-heading"></div>
		<!-- /.panel-heading -->
			<div class="panel-body">
				<div class="dataTable_wrapper">
					<div class="table-responsive">
						<table class="table table-striped table-bordered table-hover" id="dataTables-example">
						<thead>
							<tr> 
								<th>MODELO</th>
                                <th>CATEGORIA</th>
								<th>TIPO MOVIMIENTO</th>
								<th>CANTIDAD</th>
								<th>STOCK INICIAL</th>
								<th>STOCK FINAL</th>
								<th>PRECIO COMPRA</th>
								<th>OBSERVACIONES</th>
								<th style="width: 100px;">OPERACIONES</th>
							</tr>
						</thead>
						<body>
							@foreach($inventarios as $a)	
                                <tr class="odd gradeA" rol="row">
                                    <td>{{ $a->modelo }}</td>
                                    <td>{{ $a->nom_cat }}</td>
                                    <td>{{ $a->nom_mov }}</td>
                                    <td>{{ $a->cantidad }}</td>
                                    <td>{{ $a->stockInicial }}</td>
                                    @if(@$a->stockInicial < @$a->stockFinal)
                                    <td style="color:green">{{ $a->stockFinal }}</td>
                                    @else
                                    <td style="color:red">{{ $a->stockFinal }}</td>
                                    @endif
									<td>S/. {{ $a->precio_compra }}</td>
                                    <td>{{ $a->observaciones }}</td>
									<td>
										<div class="card">
										    <button type="button" class="btn btn-primary" data-toggle="collapse" data-target=<?php  echo "#demo".$a->id_inventario;?>>Seleccionar</button>
												<div id=<?php  echo "demo".$a->id_inventario;?> class="collapse">
												    <button type="button" onclick="location.href='/inventario-ver-registro/{{ $a->id_inventario }}'" ><i class="fa fa-book" aria-hidden="true"></i> Visualizar
													</button>
												</div>
										</div>
									</td>
								</tr>
								@endforeach	
						</body>
						</table>
						<script type="text/javascript">
					     function deleteData(id)
					     {
					         var id = id;
					         var url = '{{ route("producto.destroy", ":id") }}';
					         url = url.replace(':id', id);
					         $("#deleteForm").attr('action', url);
					     }

					     function formSubmit()
					     {
					         $("#deleteForm").submit();
					     }
					  </script>
				</div>
			<!-- /.table-responsiv -->
			</div>
		</div>
	</div>
</div>

<div id="DeleteModal" class="modal fade text-danger" role="dialog">
   <div class="modal-dialog ">
     <!-- Modal content-->
     <form action="" id="deleteForm" method="post">
         <div class="modal-content">
             <div class="modal-header bg-danger">
                 <button type="button" class="close" data-dismiss="modal">&times;</button>
                 <h4 class="modal-title text-center">Confirmacion de Eliminacion</h4>
             </div>
             <div class="modal-body">
                 {{ csrf_field() }}
                 {{ method_field('DELETE') }}
                 <p class="text-center">Realmente desea eliminar ?</p>
             </div>
             <div class="modal-footer">
                 <center>
                     <button type="button" class="btn btn-success" data-dismiss="modal">Cancelar</button>
                     <button type="submit" name="" class="btn btn-danger" data-dismiss="modal" onclick="formSubmit()">Si, Eliminar</button>
                 </center>
             </div>
         </div>
     </form>
   </div>
  </div>
@stop


@section('js')
<!-- DataTables JavaScript -->
<script src={{ URL::asset('jquery.dataTables.min.js') }}></script>

<script src={{ URL::asset('bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.min.js') }}></script>
@stop

@section('jsope')
<!-- Page-level demo Scripts - tables - Use for reference -->
<script >
	$(document).ready(function () {
		$('#dataTables-example').DataTable({ responsive:true });
		// body...
	});
</script>
@stop