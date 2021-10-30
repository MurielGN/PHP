<h3>REALICE SU COMPRA <?= strtoupper($_SESSION['nombre']) ?></h3>
<form action="lafruteria.php" method="POST">
    <h4>Selecciona la fruta
    <select id="frutas" name="frutas">
        <option value="Naranja">Naranjas</option>
        <option value="Platano">Plátano</option>
        <option value="Manzana">Manzana</option>
        <option value="Limones">Limones</option>
    </select>
    Cantidad
    <input type="number" id="cantidad" name="cantidad" min="0">
    <input type="submit" name="orden" value="Anotar">
    <input type="submit" name="orden" value="Terminar">
    </h4>
</form>