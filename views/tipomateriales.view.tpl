<h2>Trabajar con tipomateriales</h2>
<div class="col12 right clean">
  <a href="index.php?page=tipoalmacen&acc=ins">Nuevo</a>
</div>
<div>
  <div class="rowhd">
    <div class="col1 hd">Código</div>
    <div class="col2 hd">tipo material</div>
    <div class="col1 hd">cantidad</div>
    <div class="col2 hd">precio</div>
    <div class="col2 hd">estado</div>
  </div>
  {{foreach tipomateriales}}
  <div class="row">
    <div class="col1">{{tmatid}}</div>
    <div class="col2">{{tmatdes}}</div>
    <div class="col2">{{tmatcant}}</div>
    <div class="col1">{{tmatprec}}</div>
    <div class="col2">{{tmatest}}</div>
    <div class="col2">
      <a href="index.php?page=tipoalmacen&acc=upd&tmatid={{tmatid}}">Update</a>
      <a href="index.php?page=tipoalmacen&acc=dlt&tmatid={{tmatid}}">Delete</a>
    </div>
  </div>
  {{endfor tipomateriales}}
</div>
