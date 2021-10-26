<div>
<b> Detalles:</b><br>
<table>
<tr><td>Longitud:          </td><td><?= strlen(utf8_decode($_REQUEST['comentario'])) ?></td></tr>
<tr><td>Nº de palabras:    </td><td><?= str_word_count_utf8($_REQUEST['comentario']) ?></td></tr>
<tr><td>Letra + repetida:  </td><td><?= letrasMasRepetida($_REQUEST['comentario']) ?></td></tr>
<tr><td>Palabra + repetida:</td><td><?= palabraMasRepetida($_REQUEST['comentario']) ?></td></tr>
</table>
</div>

