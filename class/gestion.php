<?php
require_once 'Connection.php';

class Gestion extends Connection {

    public function getBrands() {
        $conn = $this->getConn();
        
        
        $sql = "SELECT brandId, brandName FROM brands ORDER BY brandName ASC";
        $result = $conn->query($sql);
        
        $brands = array();
        
        if ($result->num_rows > 0) {
            
            while ($row = $result->fetch_assoc()) {
                $brands[] = $row;
            }
        }
        
        return $brands;
    }

}
?>
