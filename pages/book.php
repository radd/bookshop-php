<?php
if(isset($_GET['id']) && ($book = getBook($_GET['id']))) :
?>
<section id="book_page">
    <h2><?php echo $book->tytul; ?></h2>
    <div class="book_wrap">
        <div class="description">
            <p><?php echo $book->opis; ?></p>
			<div class="book_tableinfo">
                <h4>Informacje o książce</h4>
				<table>
					<tr>
		  				<td>Kategoria:</td>
		 				<td><?php echo getBookCategory($book->id_ksiazka); ?></td>
					</tr>
					<tr>
		  				<td>Autor:</td>
		 				<td><?php echo getBookAuthor($book->id_ksiazka); ?></td>
					</tr>
					<tr>
		  				<td>Rok wydania:</td>
		 				<td><?php echo $book->rok_wydania; ?></td>
					</tr>
                    <tr>
		  				<td>Ilość stron:</td>
		 				<td><?php echo $book->ilosc_stron; ?></td>
					</tr>
                    <tr>
		  				<td>Język:</td>
		 				<td><?php echo $book->jezyk_wydania; ?></td>
					</tr>
                    <tr>
		  				<td>ISBN:</td>
		 				<td><?php echo $book->ISBN; ?></td>
					</tr>
                    <tr>
		  				<td>Wydawnictwo:</td>
		 				<td><?php echo getBookPublisher($book->id_wydawnictwo); ?></td>
					</tr>
					
				</table>
			</div>
        </div>
        <div class="book_right">
            <img class="cover" alt="okladka" src="<?php echo $book->zdjecie_okladki; ?>" />
            <div class="info">
                <div class="price">Cena: <?php echo $book->cena; ?> zł</div>
                <?php if($book->ilosc_sztuk > 0) : ?>
                <form class="cart">
                    <div class="count input-group input-group-sm">
                        <span class="input-group-addon" >Ilość sztuk:</span>
                        <input type="text" class="form-control" value="1" >
                    </div>
                    <br><button type="button" class="btn btn-lg btn-warning">Do koszyka</button>
                </form>
                <?php else : ?>
                <i>Brak książki w magazynie</i>
                <?php endif; ?>
            </div>
        </div>
    </div>

</section>



<?php
else:
    header('Location: ' . URL . '/index.php?page=404');
endif;

?>