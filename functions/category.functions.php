<?php 

function selectCategory($cols = array()) {
    $db = Database::getInstance();
    $where = '';
    $args = prepareWhere($cols);
    if(!empty($args))
        $where .= 'WHERE ' . $args; 
    $orderby = 'ORDER BY nazwa ASC';
    $cat = $db->select("SELECT * FROM kategoria " . $where . " " . $orderby . "", 'Category');
    return (isset($cat[0])) ? $cat : false;
}

function getCategoryByBook($ID) {
    $db = Database::getInstance();
    $args = prepareWhere(array('k.id_ksiazka' => $ID));
    $where = 'WHERE ' . $args;
    $sql = "SELECT ka.* FROM kategoria AS ka
    INNER JOIN ksiazka_kategoria AS kk ON ka.id_kategoria = kk.id_kategoria 	
    INNER JOIN ksiazka AS k ON kk.id_ksiazka = k.id_ksiazka " . $where . " ";

    $cat = $db->select($sql, 'Category');
    return (isset($cat[0])) ? $cat : false;
}

function getCategory($ID) {
    $cols = array('id_kategoria' => $ID);
    return selectCategory($cols)[0];
}

function getCategoryByName($name) {
    $cols = array('nazwa' => $name);
    return selectCategory($cols)[0];
}

function addCategory($name) {
    $db = Database::getInstance();
    $newCat = false;

    if($name != '') {
        $cols = array('nazwa' => $name);
        $value = prepareInsert($cols);
        $newCat = $db->insert("INSERT INTO kategoria " . $value . "");
    }

    return ($newCat) ? $db->insertID : false;
}