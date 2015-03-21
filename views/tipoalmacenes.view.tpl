<h2>Trabajar con tipoalmacenes</h2>
<div class="col12 right clean">
  <a href="index.php?page=tipoalmacen&acc=ins">Nuevo</a>
</div>
<div>
  <div class="rowhd">
    <div class="col1 hd">Código</div>
    <div class="col2 hd">almacen</div>
    <div class="col1 hd">telefono</div>
    <div class="col2 hd">Estado</div>
    <div class="col2 hd">Acciones</div>
  </div>
  {{foreach tipoalmacenes}}
  <div class="row">
    <div class="col1">{{talid}}</div>
    <div class="col2">{{taldes}}</div>
    <div class="col2">{{taldir}}</div>
    <div class="col1">{{taltel}}</div>
    <div class="col2">{{talest}}</div>
    <div class="col2">
      <a href="index.php?page=tipoalmacen&acc=upd&talid={{talid}}">Update</a> |
      <a href="index.php?page=tipoalmacen&acc=dlt&talid={{talid}}">Delete</a>
    </div>
  </div>
  {{endfor tipoalmacenes}}
</div>
