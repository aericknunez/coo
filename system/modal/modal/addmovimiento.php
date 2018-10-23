<div class="modal" id="<? echo $_GET["modal"]; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true"  data-backdrop="false">
  <div class="modal-dialog modal-sm" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">
          Nuevo Movimiento</h5>
      </div>
      <div class="modal-body">


<form class="border border-light p-5" id="form-addmovimiento" name="form-addmovimiento">

    <input type="hidden" id="socio" name="socio" value="<? echo $_REQUEST["iden"]; ?>">

<select class="browser-default custom-select  mb-2 mb-2" id="movimiento" name="movimiento">
  <option selected value="1">Deposito</option>
  <option value="2">Retiro</option>
</select>

    <input type="text" id="cantidad" name="cantidad" class="form-control mb-2" placeholder="Cantidad">
     <textarea id="descripcion" name="descripcion" class="form-control mb-2" placeholder="Descripcion"></textarea>
    <button class="btn btn-info btn-block my-4" id="btn-addmovimiento" name="btn-addmovimiento" type="submit">Agregar</button>
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