<tr>
	<td>Nome:</td>
	<td><input class="form-control" type="text" name="nome" value="<?=$produto->getNome()?>"></td>
</tr>
<tr>
	<td>Preço:</td>
	<td>
		<input class="form-control" type="number" step="0.01" name="preco" value="<?=$produto->getPreco()?>">
	</td>
</tr>
<tr>
	<td>Descrição:</td>
	<td>
		<textarea name="descricao" class="form-control" ><?=$produto->getDescricao()?></textarea>
	</td>
</tr>
<tr>
	<td></td>
	<td><input type="checkbox" name="usado" <?=$produto->getUsado()?> value="true" > Usado</td>
</tr>
<tr>
	<td>ISBN:</td>
	<td>
		<input type="text" name="isbn" class="form-control" value="<?php
			if($produto->temIsbn()){
				echo $produto->getIsbn();
			}
			
		?>">
	</td>
</tr>

<tr>
	<td>Tipo do Produto:</td>
	
	<td>
		<select name="tipoProduto" class="form-control">
			<optgroup label="Livros">
				<?php 
			
				$tipos = array("Livro Fisico", "Ebook");

				foreach($tipos as $tipo) :	
				
					$tipoSemEspaco = str_replace(" ", "", $tipo);

					$realTipo = get_class($produto) == $tipoSemEspaco;
					
					$selecao = $realTipo ? "selected='selected'" : "" ;
					
				?>
				<option value="<?= $tipoSemEspaco ?>" <?=$selecao?> >
						<?= $tipo ?>
				</option>
			<?php 
				endforeach
			?>
			</optgroup>
		</select>
	</td>
</tr>

<tr>
	<td>Taxa de Impressão:</td>
	<td>
		<input type="text" name="taxaImpressao" class="form-control" value="<?php
			if($produto->temTaxaImpressao()){
				echo $produto->getTaxaImpressao();
			}
			
		?>">
	</td>
</tr>

<tr>
	<td>Watermark:</td>
	<td>
		<input type="text" name="waterMark" class="form-control" value="<?php
			if($produto->temWaterMark()){
				echo $produto->getWatermark();
			}
			
		?>">
	</td>
</tr>




<tr>
	<td>Categoria:</td>
	<td>
		<select name="categoria_id" class="form-control" value="<?=$produto->getCategoria()->getId()?>">
			<?php 
			
			foreach($categorias as $categoria) :	
			
			$realCategoria = $produto->getCategoria()->getId() == $categoria->getId();
			
			$selecao = $realCategoria ? "selected='selected'" : "" ;
			
			?>
			
			<option value="<?= $categoria->getId()?>" <?=$selecao?> >
					<?= $categoria->getNome() ?>
			</option>
					
			<?php 
	
				endforeach
			
			
			?>
		</select>
	</td>
</tr>























<?php /*

<tr>
<td>Nome:</td>
<td><input class="form-control" type="text" name="nome"></td>
</tr>
<tr>
<td>Preço:</td>
<td>
<input class="form-control" type="float" name="preco">
</td>
</tr>
<tr>
<td>Descrição:</td>
<td>
<textarea name="descricao" class="form-control"></textarea>
</td>
</tr>
<td></td>
<td><input type="checkbox" name="usado" value="true"> Usado</td>
<tr>

</tr>

<tr>
<td>Categoria:</td>
<td>
<select name="categoria_id" class="form-control">
<?php foreach($categorias as $categoria) :	?>

<option value="<?= $categoria['id'] ?>">
	<?= $categoria['nome'] ?>
</option>

<?php endforeach	?>
</select>
</td>
</tr>
*/?>