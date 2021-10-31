<form action="casino.php" method="POST">
    <p>Dispone de <?= $bankroll ?> para jugar <br>
    <!-- añadir max que lo quito para hacer pruebas -->
        Cantidad a apostar: <input type="number" name="apuesta" min="0" max="" value="<?= $bankroll ?>" step="5">
        <br>
        Tipo de apuesta:
        <input type="radio" id="par" name="tipoApuesta" value="par" checked><label for="par">PAR</label>
        <input type="radio" id="impar" name="tipoApuesta" value="impar"><label for="par">IMPAR</label>
        <br>
        <input type="submit" name="accion" value="Apostar cantidad">
        <input type="submit" name="accion" value="Abandonar Casino">
    </p>
</form>