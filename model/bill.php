<?php 
class Bill{

    private $conn;
    //bill properties
    public $ProductID;
    public $ProductName;
    public $Manufacture;
    public $ProductType;
    public $ProductImage;
    public $Price;
    public $NumberCart;
    
    public function __construct($db)
    {
        $this->conn = $db;
    }

    //read data
    public function read(){
        $query = "SELECT * FROM hoadon";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt;
    }
     //show data
     public function show(){
        $query = "SELECT * FROM hoadon WHERE ProductID = ? LIMIT 1";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(1,$this->ProductID);
        $stmt->execute();

        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        $this->ProductName = $row['ProductName'];
        $this->Manufacture = $row['Manufacture'];
        $this->ProductType = $row['ProductType'];
        $this->ProductImage = $row['ProductImage'];
        $this->Price = $row['Price'];
        $this->NumberCart = $row['NumberCart'];
    }
    //create data
    public function create(){
        $query = "INSERT INTO hoadon SET ProductID =:ProductID,ProductName=:ProductName,Manufacture=:Manufacture, ProductType=:ProductType, ProductImage=:ProductImage
        ,Price=:Price,NumberCart=:NumberCart";
        $stmt = $this->conn->prepare($query);
        //clean data
        $this->ProductID = htmlspecialchars(strip_tags($this->ProductID));
        $this->ProductName = htmlspecialchars(strip_tags($this->ProductName));
        $this->Manufacture = htmlspecialchars(strip_tags($this->Manufacture));
        $this->ProductType = htmlspecialchars(strip_tags($this->ProductType));
        $this->ProductImage = htmlspecialchars(strip_tags($this->ProductImage));

        $stmt->bindParam(':ProductID',$this->ProductID);
        $stmt->bindParam(':ProductName',$this->ProductName);
        $stmt->bindParam(':Manufacture',$this->Manufacture);
        $stmt->bindParam(':ProductType',$this->ProductType);
        $stmt->bindParam(':ProductImage',$this->ProductImage);
        $stmt->bindParam(':Price',$this->Price,\PDO::PARAM_INT);
        $stmt->bindParam(':NumberCart',$this->NumberCart,\PDO::PARAM_INT);

        if($stmt->execute()){
            return true;
        }
        printf('Error %s.\n', $stmt->error);
        return false;

    }

     //update data
     public function update(){
        $query = "UPDATE hoadon SET ProductName=:ProductName, Manufacture=:Manufacture, ProductType=:ProductType, ProductImage=:ProductImage
        ,Price=:Price,NumberCart=:NumberCart WHERE ProductID=:ProductID";
        $stmt = $this->conn->prepare($query);
        ///clean data
        $this->ProductID = htmlspecialchars(strip_tags($this->ProductID));
        $this->ProductName = htmlspecialchars(strip_tags($this->ProductName));
        $this->Manufacture = htmlspecialchars(strip_tags($this->Manufacture));
        $this->ProductType = htmlspecialchars(strip_tags($this->ProductType));
        $this->ProductImage = htmlspecialchars(strip_tags($this->ProductImage));
        $this->Price = htmlspecialchars(strip_tags($this->Price));
        $this->NumberCart = htmlspecialchars(strip_tags($this->NumberCart));
        

        $stmt->bindParam(':ProductID',$this->ProductID);
        $stmt->bindParam(':ProductName',$this->ProductName);
        $stmt->bindParam(':Manufacture',$this->Manufacture);
        $stmt->bindParam(':ProductType',$this->ProductType);
        $stmt->bindParam(':ProductImage',$this->ProductImage);
        $stmt->bindParam(':Price',$this->Price);
        $stmt->bindParam(':NumberCart',$this->NumberCart);

        if($stmt->execute()){
            return true;
        }
        printf('Error %s.\n', $stmt->error);
        return false;

    }
     //delete data
     public function delete(){
        $query = "DELETE FROM hoadon WHERE ProductID =:ProductID";
        $stmt = $this->conn->prepare($query);
        //clean data
        $this->ProductID = htmlspecialchars(strip_tags($this->ProductID));     

        $stmt->bindParam(':ProductID',$this->ProductID);

        if($stmt->execute()){
            return true;
        }
        printf('Error %s.\n', $stmt->error);
        return false;

    }
}
