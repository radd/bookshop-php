
<?php

?>
 
 <section id="cart">
    <h2>Koszyk</h2>
    <div class="book_list">

<?php 
$books = $currUser->getCart()->getBook();


if($books) :
	foreach($books as $book) : 
        $count = $currUser->getCart()->getCount($book->id_ksiazka);
    ?>
        <div class="book">
            <div class="cover"><a href="<?php echo URL . "/index.php?page=book&id=" . $book->id_ksiazka; ?>"><img src="<?php echo $book->zdjecie_okladki; ?>" alt="okladka" /></a></div>
            <div class="title"><a href="<?php echo URL . "/index.php?page=book&id=" . $book->id_ksiazka; ?>"><?php echo $book->tytul; ?></a></div>
            <div class="count">

<div class="count_width input-group input-group-sm">
                        <span class="input-group-addon" >Ilość sztuk:</span>
                        <input type="text" class="form-control" value="<?php echo $count; ?>" >
                        <span class="input-group-btn">
                        <button id="add_new_cat" class="btn btn-default" type="button">Zmień</button>
                    </span>
                    </div>
                
            </div>
            <div class="price"><?php echo number_format($book->cena * $count, 2, ',', ' '); ?> zł</div>
        </div>
<?php
	endforeach;
?>

<div class="sum">
    <div class="cost">Koszt: <?php echo number_format($currUser->getCart()->getCost(), 2, ',', ' '); ?> zł</div>
    <br><button type="button" class="btn btn-lg btn-warning">Zapłać</button>
</div>

<?php   
else :
    echo 'Koszyk jest pusty';
endif;
?>
        
    </div>


 </section>


