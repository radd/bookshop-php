<?php 
class ShoppingCart {
    
    public $currUser,
            $sessionCart = array(),
            $order;

    public function __construct($currUser) {
        $this->currUser = $currUser;
        if($this->currUser->isLoggedIn()) {
            $this->order = getNewOrder($this->currUser->getUser()->id_czytelnik);
        }
        
        $_SESSION['session_cart'] = (isset($_SESSION['session_cart'])) ? $_SESSION['session_cart'] : array();
        $this->sessionCart = $_SESSION['session_cart'];

    }

    public function addBook($bookID, $count) {
        $add = false;
        if($this->currUser->isLoggedIn())
           $add = addOrderBook($this->order->id_zamowienie, $bookID, $count);
        else {
            $this->addSessionCart($bookID, $count);
            $add = true;
        }
        return $add;
    }

    public function getBook() {
        $books = array();
        if($this->currUser->isLoggedIn())
            $books = getBookByOrder($this->order->id_zamowienie);
        else
            foreach($this->sessionCart as $bookCart) {
                $book = getBook($bookCart['book_id']);
                if($book)
                    $books[] = $book;
            }
        return $books;
    }

    public function getCount($bookID) {
        $count = 1;
        if($this->currUser->isLoggedIn())
            $count = getOrderBook($this->order->id_zamowienie, $bookID)->ilosc_sztuk;
        else
            foreach($this->sessionCart as $bookCart) {
                if($bookCart['book_id'] == $bookID) {
                    $count = $bookCart['count'];
                    break;
                }
            }
        return $count;
    }

    public function getCost() {
        $cost = 0;
        if($this->currUser->isLoggedIn())
            $cost = getOrderCost($this->order->id_zamowienie);
        else
            foreach($this->sessionCart as $bookCart) {
                $book = getBook($bookCart['book_id']);
                if($book)
                    $cost += $bookCart['count'] * $book->cena;         
            }

        if(!$cost)
            $cost = '0.00';
        return $cost;
    }


    private function addSessionCart($bookID, $count) {
        $add = false;
        $i = 0;
        $book = getBook($bookID);
        if($book && $book->ilosc_sztuk >= $count) {
            foreach($_SESSION['session_cart'] as $bookCart) {
                if($bookCart['book_id'] == $bookID) {
                    $add = true;
                    $_SESSION['session_cart'][$i]['count'] = $count;
                    break;
                }
                $i++;
            }

            if(!$add) {
                $_SESSION['session_cart'][] = array(
                    'book_id' => $bookID,
                    'count' => $count
                );
            }
            $this->sessionCart = $_SESSION['session_cart'];
        }
        
    }

}