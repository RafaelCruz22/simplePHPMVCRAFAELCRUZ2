<h2>Trabajar con almacenes</h2>
<div class="col12 right clean">
  <a href="index.php?page=almacen&acc=ins">Nuevo</a>
</div>
<div>
  <div class="rowhd">
    <div class="col1 hd">Código</div>
    <div class="col2 hd">razon social</div>
    <div class="col2 hd">nombre</div>
    <div class="col1 hd">tipo material</div>
    <div class="col2 hd">sub almacen</div>
    <div class="col2 hd">telefono</div>
    <div class="col2 hd">telefono 2</div>
    <div class="col2 hd">id de sub almacen</div>
    <div class="col2 hd">id empresa</div>
  </div>
  {{foreach almacenes}}
  <div class="row">
    <div class="col1">{{almid}}</div>
    <div class="col2">{{almrzs}}</div>
    <div class="col2">{{almnombre}}</div>
    <div class="col1 right">{{almtmat}}</div>
    <div class="col2">{{almsubalm}}</div>
    <div class="col2">{{almtel}}</div>
    <div class="col2">{{almtel2}}</div>
    <div class="col2">{{almidsalm}}</div>
    <div class="col2">{{empid}}</div>
    <div class="col2">
      <a href="index.php?page=almacen&acc=upd&almid={{almid}}">Update</a> |
      <a href="index.php?page=almacen&acc=dlt&almid={{almid}}">Delete</a>
    </div>
  </div>
  {{endfor almacenes}}
</div>
