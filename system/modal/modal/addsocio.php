<div class="modal" id="<? echo $_GET["modal"]; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true"  data-backdrop="false">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">
          Nuevo Socio</h5>
      </div>
      <div class="modal-body">


<form class="border border-light p-5" id="form-addsocio" name="form-addsocio">

    <input type="text" id="nombre" name="nombre" class="form-control mb-4" placeholder="Nombre Completo">

     <textarea id="direccion" name="direccion" class="form-control mb-4" placeholder="Direccion"></textarea>

  <input type="text" id="telefono" name="telefono" class="form-control mb-4" placeholder="Telefono">

  <input type="text" id="dui" name="dui" class="form-control mb-4" placeholder="DUI">


    <input type="text" id="nit" name="nit" class="form-control mb-4" placeholder="NIT">

    <button class="btn btn-info btn-block my-4" id="btn-addsocio" name="btn-addsocio" type="submit">Agregar</button>
</form>
<div id="resultado"></div>



      </div>
      <div class="modal-footer">

          <a href="?socio" class="btn blue-gradient btn-rounded">Regresar</a>
    
      </div>
    </div>
  </div>
</div>
<!-- ./  Modal -->