<?php
require_once "../check-login.php";
require_once "../connect-db.php";
class Profile extends Connection{
    public function detail(){
        $sql = "SELECT * FROM customer
        WHERE username = '$_SESSION[username]'";
        $select = $this->prepareSQL($sql);
        $select->execute();
        return $select->fetchAll();
    }
    public function update($data){
        $sql = "UPDATE customer SET `cusName`=:cusName,`cusContact`=:cusContact,`cusPhone`=:cusPhone,`cusAddress`=:cusAddress,`cusGPP`=:cusGPP,`cusGPPDate`=:cusGPPDate,`cusGPPAddr`=:cusGPPAddr
        WHERE username = '$_SESSION[username]'";
        $select = $this->prepareSQL($sql);
        $select->execute($data);
    }
}
?>