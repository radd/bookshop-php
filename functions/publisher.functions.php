<?php 

function selectPublisher($cols = array()) {
    $db = Database::getInstance();
    $where = '';
    $args = prepareWhere($cols);
    if(!empty($args))
        $where .= 'WHERE ' . $args; 
    $pub = $db->select("SELECT * FROM wydawnictwo " . $where . "", 'Publisher');
    return (isset($pub[0])) ? $pub : false;
}

function getPublisher($ID) {
    $cols = array('id_wydawnictwo' => $ID);
    return selectPublisher($cols)[0];
}