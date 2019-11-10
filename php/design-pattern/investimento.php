<!DOCTYPE html>
<html>
<head>
	<title>Investimento</title>
</head>
<body>

	<form method="post" action="investimento-post.php">
		<tr>
			<td>Valor Investimento:</td>
			<input type="number" step="0.01" min="0" name="valor">
		</tr>
		<select name="investimento">
			<option value="Conservador" selected="selected">CONSERVADOR</option>
			<option value="Moderado">MODERADO</option>
			<option value="Arrojado">ARROJADO</option>
		</select>
		<button type="submit">Testar</button>

	</form>

</body>
</html>