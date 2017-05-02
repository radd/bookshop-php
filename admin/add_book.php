<div class="col-lg-12">
    <h2 class="page-header">Nowa książka</h2>
</div>
<?php
$output_msg = '';
?>

<form id="add_book_form" action="<?php echo URL . '/index.php?page=admin&action=add_book' ?>" method="post">
    <div class="col-lg-7">
        <div class="panel panel-default">
			<div class="panel-heading">Wypełnij pola</div>
            <div class="panel-body">
                <label for="title">Tytuł książki:</label>
                <div class="form-group">
                    <input class="form-control" placeholder="" name="title" id="title" type="text">
                </div>
                <label for="desc">Opis książki:</label>
                <div class="form-group">
                    <textarea class="form-control" rows="10" name="desc" id="desc"></textarea>
                </div>
               
                <label for="isbn">ISBN:</label>
                <div class="form-group">
                    <input class="form-control" placeholder="" name="isbn" id="isbn" type="text">
                </div>
                <label for="pages">Ilość stron:</label>
                <div class="form-group">
                    <input class="form-control" placeholder="" name="pages" id="pages" type="text">
                </div>
                <label for="year">Rok wydania:</label>
                <div class="form-group">
                    <input class="form-control" placeholder="" name="year" id="year" type="text">
                </div>
                <label for="lang">Język wydania:</label>
                <div class="form-group">
                    <input class="form-control" placeholder="" name="lang" id="lang" type="text">
                </div>
                
                <label for="price">Cena*:</label>
                <div class="form-group">
                    <input class="form-control" placeholder="" name="price" id="price" type="text">
                </div>
                <label for="count">Ilość sztuk*:</label>
                <div class="form-group">
                    <input class="form-control" placeholder="" name="count" id="count" type="text">
                </div>
                <br>
                <button class="btn btn-md btn-success btn-block">Dodaj</button>
        
	        </div>
        </div>
    </div>
    <div class="col-lg-5">
	    <div class="panel panel-default"> <!-- okładka -->
            <div class="panel-heading">Okładka</div>
            <div class="panel-body">
                <div class="form-group">
                    <input class="form-control" placeholder="url do zdjęcia" name="img" id="img" type="text">
                </div>
	        </div>
        </div>
        <div class="panel panel-default"> <!-- autor -->
            <div class="panel-heading">Autor</div>
            <div class="panel-body">
                <div class="list_option">

<?php
$authors = selectAuthor();
if($authors) {
	foreach($authors as $author) {
		echo "<label><input name='author[]' value='" . $author->id_autor . "' type='checkbox'> " . $author->getName() . "</label>";
	}
}
?>
                    <div id="add_new_author_div"></div>
                </div>
                <div class="input-group">
                    <input type="text" class="form-control" id="add_new_author_name" placeholder="imię">               
                    <input type="text" class="form-control" id="add_new_author_lastname" placeholder="nazwisko">       
                    <button id="add_new_author" class="btn btn-default" type="button">Dodaj nowego autora</button>
                </div>

	        </div>
        </div>
       <div class="panel panel-default"> <!-- kategoria -->
            <div class="panel-heading">Kategoria</div>
            <div class="panel-body">
                <div class="list_option">

<?php
$cats = selectCategory();
if($cats) {
	foreach($cats as $cat) {
		echo "<label><input name='cat[]' value='" . $cat->id_kategoria . "' type='checkbox'> " . $cat->nazwa . "</label>";
	}
}
?>
                    <div id="add_new_cat_div"></div>
                </div>
                <div class="input-group">
                    <input type="text" class="form-control" id="add_new_cat_name" placeholder="nowa kategoria">   
                    <span class="input-group-btn">
                        <button id="add_new_cat" class="btn btn-default" type="button">Dodaj</button>
                    </span>
                </div>

	        </div>
        </div>
        <div class="panel panel-default"> <!-- wydawnictwo -->
            <div class="panel-heading">Wydawnictwo</div>
            <div class="panel-body">
                <div class="list_option">

<?php
$cats = selectCategory();
if($cats) {
	foreach($cats as $cat) {
		echo "<label><input name='pub' value='" . $cat->id_kategoria . "' type='radio'> " . $cat->nazwa . "</label>";
	}
}
?>
                    <div id="add_new_pub_div"></div>
                </div>
                <div class="input-group">
                    <input type="text" class="form-control" id="add_new_pub_name" placeholder="nowe wydawnictwo">   
                    <span class="input-group-btn">
                        <button id="add_new_pub" class="btn btn-default" type="button">Dodaj</button>
                    </span>
                </div>

	        </div>
        </div>

    </div>	
</form>
<div id="msg_form"><?php echo $output_msg; ?> </div>


