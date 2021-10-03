<?php $x = random_int(1,10);?>
<style>
    th{
        color: blue;
        background-color: grey;
        border: solid black;
        border-collapse: collapse;
    }
    table {
        border: solid black;
        border-collapse: collapse;
    }
    td{
        border: solid black;
        border-collapse: collapse;
    }
</style>
<table>
  <tr>
    <th colspan="2">Tabla de Multiplicar</th>
  </tr>
  <?php for($i = 0; $i<=10; $i++): ?>
    <tr>
        <td><?= "$x x $i"?></td>
        <td style="text-align: right;"><?= $x * $i ?></td>
    </tr>
    <?php endfor ?>

</table> 