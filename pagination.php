
    <!-- Bootstrap CSS -->
<!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous"> -->

  <?php
 
 class Paginator {
  
     private $_conn;
     private $_limit;
     private $_page;
     private $_query;
     private $_total;
  
 public function __construct( $conn, $query ) {
      
     $this->_conn = $conn;
     $this->_query = $query;
  
     $rs= $this->_conn->query( $this->_query );
     $this->_total = $rs->num_rows;
      
 }
 
 public function getData( $limit = 25, $page = 1 ) {
      
     $this->_limit   = $limit;
     $this->_page    = $page;
  
     if ( $this->_limit == 'all' ) {
         $query      = $this->_query;
     } else {
         $query      = $this->_query . " LIMIT " . ( ( $this->_page - 1 ) * $this->_limit ) . ", $this->_limit";
     }
     $rs             = $this->_conn->query( $query );
  
     while ( $row = $rs->fetch_assoc() ) {
         $results[]  = $row;
     }
  
     $result         = new stdClass();
     $result->page   = $this->_page;
     $result->limit  = $this->_limit;
     $result->total  = $this->_total;
     $result->data   = $results;
  
     return $result;
 }
 
 public function createLinks( $links, $list_class ) {
     if ( $this->_limit == 'all' ) {
         return '';
     }
  
     $last       = ceil( $this->_total / $this->_limit );
  
     $start      = ( ( $this->_page - $links ) > 0 ) ? $this->_page - $links : 1;
     $end        = ( ( $this->_page + $links ) < $last ) ? $this->_page + $links : $last;
  
     $html       = '<ul class="'.$list_class.'">';
  
     $class      = ( $this->_page == 1 ) ? "disabled" : "";
     $html       .= '<li class="' . $class . '"><a href="?limit=' . $this->_limit . '&page=' . ( $this->_page - 1 ) . '">&laquo;</a></li>';
  
     if ( $start > 1 ) {
         $html   .= '<li><a href="?limit='.$this->_limit.'&page=1">1</a></li>';
         $html   .= '<li class="disabled"><span>...</span></li>';
     }
  
     for ( $i = $start ; $i <= $end; $i++ ) {
         $class  = ( $this->_page == $i ) ? "active" : "";
         $html   .= '<li class="' . $class . '"><a href="?limit=' . $this->_limit . '&page=' . $i . '">' . $i . '</a></li>';
     }
  
     if ( $end < $last ) {
         $html   .= '<li class="disabled"><span>...</span></li>';
         $html   .= '<li><a href="?limit=' . $this->_limit . '&page=' . $last . '">' . $last . '</a></li>';
     }
  
     $class      = ( $this->_page == $last ) ? "disabled" : "";
     $html       .= '<li class="' . $class . '"><a href="?limit=' . $this->_limit . '&page=' . ( $this->_page + 1 ) . '">&raquo;</a></li>';
  
     $html       .= '</ul>';
  
     return $html;
 }
 }
 
 ?>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <!-- <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script> -->
