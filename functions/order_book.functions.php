<?php
function addOrderBook($orderID, $bookID, $count) { // jeszcze sprawdzic czy juz jest w koszyku
    $db = Database::getInstance();
    $new = false;

    if($orderID != '' && $bookID != '' && $count > 0) {
        if(getOrder($orderID) && ($book = getBook($bookID))) {
            if($book->ilosc_sztuk >= $count) {
                $orderBook = getOrderBook($orderID, $bookID);
                if($orderBook === false) {
                    $cols = array('id_zamowienie' => $orderID, 'id_ksiazka' => $bookID, 'ilosc_sztuk' => $count);
                    $value = prepareInsert($cols);
                    $new = $db->insert("INSERT INTO zamowienie_ksiazka " . $value . "");
                }
                else {
                    //update row;
                }
            }
        }
    }
    return ($new) ? true : false;
}

function selectOrderBook($cols = array()) {
    $db = Database::getInstance();
    $where = '';
    $args = prepareWhere($cols);
    if(!empty($args))
        $where .= 'WHERE ' . $args; 
    $orderBook = $db->select("SELECT * FROM zamowienie_ksiazka " . $where . "", 'OrderBook');
    return (isset($orderBook[0])) ? $orderBook : false;
}

function getOrderBook($orderID, $bookID) {
    $cols = array('id_zamowienie' => $orderID, 'id_ksiazka' => $bookID);
    $orderBook = selectOrderBook($cols);
    return (isset($orderBook[0])) ? $orderBook[0] : false;
}
