<?php
    namespace App;
    class campers extends connect{
        private $queryPost = 'INSERT INTO campers(idCamper, nombreCamper, apellidoCamper, fechaNac, idReg) VALUES(:identificador, :nombre, :apelllido, :fechaNacimiento, :region)';
        
        private $queryGetAll = 'SELECT campers.idCamper AS camper_ID, campers.nombreCamper AS Nombre, campers.apellidoCamper AS Apellido, campers.fechaNac AS fecha_de_Nacimiento, region.nombreReg AS Region FROM campers INNER JOIN region ON campers.idReg = region.idReg';

        private $queryGet = 'SELECT campers.idCamper AS camper_ID, campers.nombreCamper AS Nombre, campers.apellidoCamper AS Apellido, campers.fechaNac AS fecha_de_Nacimiento, region.nombreReg AS Region FROM campers INNER JOIN region ON campers.idReg = region.idReg WHERE idCamper = ?';

        private $queryDelete = 'DELETE FROM campers WHERE idCamper = ?';

        private $queryUpdate = 'UPDATE campers SET nombreCamper = ?, apellidoCamper = ?, fechaNac = ?, idReg = ? WHERE idCamper = ?';

        private $message;
        use getInstance;
        function __construct(private $idCamper = 1, public $nombreCamper = 1, public $apellidoCamper = 1, private $fechaNac = 1, public $idReg = 1){
            parent::__construct();
        }

        public function postCampers(){
            try {
                $res = $this->conx->prepare($this->queryPost);
                $res->bindValue("identificador", $this->idCamper);
                $res->bindValue("nombre", $this->nombreCamper);
                $res->bindValue("apelllido", $this->apellidoCamper);
                $res->bindValue("fechaNacimiento", $this->fechaNac);
                $res->bindValue("region", $this->idReg);
                $res->execute();
                $this->message = ["Code"=> 200+$res->rowCount(), "Message"=> "inserted data"];
            } catch(\PDOException $e) {
                $this->message = ["Code"=> $e->getCode(), "Message"=> $res->errorInfo()[2]];
            }finally{
                print_r($this->message);
            }
        }

        public function getAllcampers(){
            try {
                $res = $this->conx->prepare($this->queryGetAll);
                $res->execute();
                $this->message = ["Code"=> 200, "Message"=> $res->fetchAll(\PDO::FETCH_ASSOC)];
            } catch(\PDOException $e) {
                $this->message = ["Code"=> $e->getCode(), "Message"=> $res->errorInfo()[2]];
            }finally{
                print_r($this->message);
            }
        }
// \
        public function getcampers($idCamper){
            try{
                $res = $this -> conx -> prepare($this -> queryGet);
                $res -> execute([$idCamper]);
                $this -> message = ["Code" => "200", "Message" => $res -> fetch(\PDO::FETCH_ASSOC)];
            }catch(\PDOException $e){
                $this -> message = ["Code" => $e -> getCode(), "Message" => $res -> errorInfo()[2]];
            }finally{
                print_r($this->message);
            }
        }

        public function deletecampers($idCamper){
            try{

                $res = $this -> conx -> prepare($this->queryDelete);
                $res -> execute([$idCamper]);
                $this -> message = ["Code" => 200, "Message" => $res -> fetch(\PDO::FETCH_ASSOC)];

            }catch(\PDOException $e){
                $this -> message = ["Code" => $e -> getCode(), "Message" => $res -> errorInfo()[2]];
            }finally{
                print_r($this->message);
            }
        }

        public function updatecampers($nombreCamper, $apellidoCamper, $fechaNac, $idReg, $idCamper){
            try{
            $res = $this->conx->prepare($this->queryUpdate);
                $res->execute([$nombreCamper, $apellidoCamper, $fechaNac, $idReg, $idCamper]);
                $this->message = ["Code"=> 200+$res->rowCount(), "Message"=> "inserted data"];
            } catch(\PDOException $e) {
                $this->message = ["Code"=> $e->getCode(), "Message"=> $res->errorInfo()[2]];
            }finally{
                print_r($this->message);
            }
        }
    }
?>