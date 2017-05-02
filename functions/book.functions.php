<?php 

function selectBook($cols = array()) {
    $db = Database::getInstance();
    $where = '';
    $args = prepareWhere($cols); //przygotowanie klauzuli WHERE
    if(!empty($args))
        $where .= 'WHERE ' . $args;
    $book = $db->select("SELECT * FROM ksiazka " . $where . "", 'Book');
    return (isset($book[0])) ? $book : false;
}

function getBookByCategory($ID, $order = 'k.id_ksiazka DESC') {
    $db = Database::getInstance();
    $args = prepareWhere(array('ka.id_kategoria' => $ID));
    $where = 'WHERE ' . $args;
    $orderby = 'ORDER BY ' . addslashes($order);
    $sql = "SELECT k.* FROM ksiazka AS k
    INNER JOIN ksiazka_kategoria AS kk ON k.id_ksiazka = kk.id_ksiazka 	
    INNER JOIN kategoria AS ka ON kk.id_kategoria = ka.id_kategoria " . $where . " " . $orderby;

    $book = $db->select($sql, 'Book');
    return (isset($book[0])) ? $book : false;
}

function getBookByAuthor($ID, $order = 'k.id_ksiazka DESC') {
    $db = Database::getInstance();
    $args = prepareWhere(array('a.id_autor' => $ID));
    $where = 'WHERE ' . $args;
    $orderby = 'ORDER BY ' . addslashes($order);
    $sql = "SELECT k.* FROM ksiazka AS k
    INNER JOIN ksiazka_autor AS ka ON k.id_ksiazka = ka.id_ksiazka 	
    INNER JOIN autor AS a ON ka.id_autor = a.id_autor " . $where . " " . $orderby;

    $book = $db->select($sql, 'Book');
    return (isset($book[0])) ? $book : false;
}

function getBook($ID) {
    $cols = array('id_ksiazka' => $ID);
    return selectBook($cols)[0];
}

function getBookCategory($ID) {
    $cats = getCategoryByBook($ID);
    $output = '';
    $i = false;
    foreach($cats as $cat) {
        $output .= '<a href="' . URL . '/index.php?page=category&id=' . $cat->id_kategoria . '">' . $cat->nazwa . '</a>';
        if($i) {
            $output .= ', ';
            $i = false;
        }
    }
    return $output;
}

function getBookAuthor($ID) {
    $authors = getAuthorByBook($ID);
    $output = '';
    $i = false;
    foreach($authors as $author) {
        $output .= '<a href="' . URL . '/index.php?page=author&id=' . $author->id_autor . '">' . $author->getName() . '</a>';
        if($i) {
            $output .= ', ';
            $i = false;
        }
    }
    return $output;
}