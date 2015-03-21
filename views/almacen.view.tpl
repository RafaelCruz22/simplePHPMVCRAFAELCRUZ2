<h2>{{almacenTitle}}</h2>
<a href="index.php?page=almacenes">Listado de almacenes</a>
<form action="index.php?page=almacen&acc={{almacenMode}}" method="post">
  <div>
    <label class="col4" for="almid">Código</label>
    <input class="col8" type="text" disabled="disabled" value="{{almid}}"/>
    <input type="hidden" id="almid" name="almid" value="{{almid}}"/>
  </div>
  <div>
    <label class="col4" for="almrzs">razon social</label>
    <input class="col8" type="text" id="almrzs" name="almrzs" value="{{almrzs}}" {{disabled}}/>
  </div>
  <div>
    <label class="col4" for="almnombre">nombre</label>
    <input class="col8" type="text" id="almnombre" name="almnombre" value="{{almnombre}}" {{disabled}}/>
  </div>
  <div>
    <label class="col4" for="almtmat">tipo de material</label>
    <input class="col8" type="text" id="almtmat" name="almtmat" value="{{almtmat}}" {{disabled}}/>
  </div>
  <div>
    <label class="col4" for="almsubalm">sub almacen</label>
    <input class="col8" type="text" id="almsubalm" name="almsubalm" value="{{almsubalm}}" {{disabled}}/>
  </div>
  <div>
    <label class="col4" for="almtel">telefono</label>
    <input class="col8" type="text" id="almtel" name="almtel" value="{{almtel}}" {{disabled}}/>
  </div>
  <div>
    <label class="col4" for="almtel2">telefono 2</label>
    <input class="col8" type="text" id="almtel2" name="almtel2" value="{{almtel2}}" {{disabled}}/>
  </div>
  <div>
    <label class="col4" for="almidsalm">id sub almacen</label>
    <input class="col8" type="text" id="almidsalm" name="almidsalm" value="{{almidsalm}}" {{disabled}}/>
  </div>
  <div>
    <label class="col4" for="empid">id empresa</label>
    <input class="col8" type="text" id="empid" name="empid" value="{{empid}}" {{disabled}}/>
  </div>
  <div class="right col12">
    <input type="hidden" id="btnacc" name="btnacc" value="{{almacenMode}}"/>
    <input type="button" name="btnGuardar" value="Confirmar" onclick="document.forms[0].submit();"/>
  </div>
</form>
