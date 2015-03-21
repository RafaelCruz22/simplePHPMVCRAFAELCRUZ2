<h2>{{tipoalmacenTitle}}</h2>
<a href="index.php?page=tipoalmacenes">Listado de tipoalmacenes</a>
<form action="index.php?page=tipoalmacen&acc={{tipoalmacenMode}}" method="post">
  <div>
    <label class="col4" for="talid">Código</label>
    <input class="col8" type="text" disabled="disabled" value="{{talid}}"/>
    <input type="hidden" id="talid" name="talid" value="{{talid}}"/>
  </div>
  <div>
    <label class="col4" for="taldsc">tipoalmacen</label>
    <input class="col8" type="text" id="taldsc" name="taldsc" value="{{taldsc}}" {{disabled}}/>
  </div>
  <div>
    <label class="col4" for="taldir">tipoalmacen</label>
    <input class="col8" type="text" id="taldir" name="taldir" value="{{taldir}}" {{disabled}}/>
  </div>
  <div>
    <label class="col4" for="taltel">tipoalmacen</label>
    <input class="col8" type="text" id="taltel" name="taltel" value="{{taltel}}" {{disabled}}/>
  </div>
  <div>

  <div>
    <label class="col4" for="talest">Estado</label>
    <select class="col8" id="talest" name="talest" {{disabled}}>
      <option value="ACT" {{actSelected}}>Activo</option>
      <option value="INA" {{inaSelected}}>Inactivo</option>
      <option value="DES" {{desSelected}}>Descontinuado</option>
    </select>
  </div>

  <div class="right col12">
    <input type="hidden" id="btnacc" name="btnacc" value="{{tipoalmacenMode}}"/>
    <input type="button" name="btnGuardar" value="Confirmar" onclick="document.forms[0].submit();"/>
  </div>
</form>
