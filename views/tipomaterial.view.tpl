<h2>{{tipomaterialTitle}}</h2>
<a href="index.php?page=tipomateriales">Listado de tipomateriales</a>
<form action="index.php?page=tipomaterial&acc={{tipomaterialMode}}" method="post">
  <div>
    <label class="col4" for="tmatid">Código</label>
    <input class="col8" type="text" disabled="disabled" value="{{tmatid}}"/>
    <input type="hidden" id="tmatid" name="tmatid" value="{{tmatid}}"/>
  </div>
  <div>
    <label class="col4" for="tmatdsc">tipo de material</label>
    <input class="col8" type="text" id="tmatdsc" name="tmatdsc" value="{{tmatdsc}}" {{disabled}}/>
  </div>
  <div>
    <label class="col4" for="tmatcant">direccion</label>
    <input class="col8" type="text" id="tmatcant" name="tmatcant" value="{{tmatcant}}" {{disabled}}/>
  </div>
  <div>
    <label class="col4" for="tmatprec">telefono</label>
    <input class="col8" type="text" id="tmatprec" name="tmatprec" value="{{tmatprec}}" {{disabled}}/>
  </div>
  <div>

  <div>
    <label class="col4" for="tmatest">Estado</label>
    <select class="col8" id="tmatest" name="tmatest" {{disabled}}>
      <option value="ACT" {{actSelected}}>Activo</option>
      <option value="INA" {{inaSelected}}>Inactivo</option>
      <option value="DES" {{desSelected}}>Descontinuado</option>
    </select>
  </div>

  <div class="right col12">
    <input type="hidden" id="btnacc" name="btnacc" value="{{tipomaterialMode}}"/>
    <input type="button" name="btnGuardar" value="Confirmar" onclick="document.forms[0].submit();"/>
  </div>
</form>
