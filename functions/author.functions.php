<?php 
function getAuthorByBook($ID) {
    $db = Database::getInstance();
    $args = prepareWhere(array('k.id_ksiazka' => $ID));
    $where = 'WHERE ' . $args;
    $sql = "SELECT a.* FROM autor AS a
    INNER JOIN ksiazka_autor AS ka ON a.id_autor = ka.id_autor 
    INNER JOIN ksiazka AS k ON ka.id_ksiazka = k.id_ksiazka " . $where . " ";

    $author = $db->select($sql, 'Author');
    return (isset($author[0])) ? $author : false;
}

function selectAuthor($cols = array()) {
    $db = Database::getInstance();
    $where = '';
    $args = prepareWhere($cols);
    if(!empty($args))
        $where .= 'WHERE ' . $args; 
    $author = $db->select("SELECT * FROM autor " . $where . "", 'Author');
    return (isset($author[0])) ? $author : false;
}

function getAuthor($ID) {
    $cols = array('id_autor' => $ID);
    return selectAuthor($cols)[0];
}