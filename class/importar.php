<?php
require_once 'Connection.php';

class Importar extends Connection {

    function customers(){
        $conn = new Connection;
        $dataBase= $this->getConn();
        $gestor = fopen('customers.csv', "r");

        $query = "UPDATE customers SET customerName=? WHERE customerId = ?";
        
        while (($element = fgetcsv($gestor, 0, "#")) !== false) {
            $id = $element[0];
            $name = $element[1];
            $ready = $conn->prepare($query);
            $ready->bind_param("ss", $name, $id);
            $ready->execute();
            $result = $ready->get_result();
            $ready->close();
        }
        fclose($gestor);
}
    
    
    
    public function getBrandId($marca) {
        $conn = new Connection;
        $dataBase= $this->getConn();
        $gestor = fopen('customers.csv', "r");
        
    
        $data = "SELECT brandId FROM brands WHERE brandName = ?";
    
        $stmt = $dataBase->prepare($data);
    
        if ($stmt) {
            $stmt->bind_param("s", $marca);
            $stmt->execute();
            $stmt->bind_result($brandId);
            $stmt->fetch();
            $stmt->close();
    
            return $brandId;
        } else {
            return null;
        }
    }

    function brandCustomer() {
        $conn = new Connection;
        $dataBase= $this->getConn();
        $gestor = fopen('customers.csv', "r");

        $query = "INSERT INTO brandCustomer(customerId, brandId) VALUES (?, ?)";

        while (($element = fgetcsv($gestor, 0, "#")) !== false) {
            $idCustomer = $element[0];
            $favourite = explode(", ", $element[2]);
                foreach ($favourite as $brand) {
                    $marca = $this->getBrandId($brand);
                    foreach ($favourite as $brand) {

                    $brandId = $this->getBrandId($brand);
                    
                    if ($brandId !== null) {

                        $stmt->bind_param("ss", $idCustomer, $brandId);
                        $stmt->execute();
                    } 
                }
            }
        fclose($gestor);
        $stmt->close();
        } 
    }
}