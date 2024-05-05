</div> <!-- Zamykamy content -->

<footer>
	<p>
		<?php 
		out($page_footer); 
		if (!isset($page_footer)) {  ?> Domyślna zawartość stopki ... <?php } 
		?>
	</p>
	<p>
		Widok oparty na stylach <a href="http://purecss.io/" target="_blank">Pure CSS Yahoo!</a>  (autor pliku: Marlena Gęborska)
	</p>
</footer>
</body>
</html>
