<?php $x = 5; $y= 2; ?>
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
    <th>Operacion</th>
    <th>Resultado</th>
  </tr>
  <tr>
    <td><?= $x ?> + <?= $y ?></td>
    <td style="text-align: right;"><?= $x + $y ?></td>
  </tr>
  <tr>
    <td><?= $x ?> - <?= $y ?></td>
    <td style="text-align: right;"><?= $x - $y ?></td>
  </tr>
  <tr>
    <td><?= $x ?> * <?= $y ?></td>
    <td style="text-align: right;"><?= $x * $y ?></td>
  </tr>
  <tr>
    <td><?= $x ?> / <?= $y ?></td>
    <td style="text-align: right;"><?= $x / $y ?></td>
  </tr>
  <tr>
    <td><?= $x ?> % <?= $y ?></td>
    <td style="text-align: right;"><?= $x % $y ?></td>
  </tr>
  <tr>
    <td><?= $x ?><?= $y ?></td>
    <td style="text-align: right;"><?= $x ** $y ?></td>
  </tr>
</table> 