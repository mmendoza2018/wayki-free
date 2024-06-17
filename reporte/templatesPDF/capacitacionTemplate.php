<body>
  <header>
    <img src="./logo.png" alt="" width="180px">
  </header>
  <div class="text-center title_page mt-4">
    RESRVACIÓN : 
    <?=  $data["tituloSubCategoria"] ?> 
    <?=  $data["tituloCategoria"] ?> 
  </div>
  <hr>

  <div class="container_section mb-3">
    detalle
  </div>

  <table class="table_b_bottom">
    <tr>
      <td class="" style="width:160px;"> Cliente </td>
      <td colspan="3"> : <?= $data["nombres"] ?></td>
    </tr>
    <tr>
      <td class="" style="width:160px;"> Correo </td>
      <td colspan="3"> : <?= $data["correo"] ?> </td>
    </tr>
    <tr>
      <td class="" style="width:160px;"> Telefono </td>
      <td colspan="3"> : <?= $data["celular"] ?> </td>
    </tr>
    <tr>
      <td class="" style="width:140px;"> Num. de reservaciones </td>
      <td colspan="3"> : <?= $data["num_personas"] ?> </td>
    </tr>
    <tr>
      <td class="" style="width:160px;"> Fecha de reserva </td>
      <td colspan="3">
        : <?= $data["fecha_reserva"] ?>
      </td>
    </tr>
  </table>

  <div class="my-3">
    <img src="welcome.jpg" style="width: 100%;" alt="">
  </div>

</body>