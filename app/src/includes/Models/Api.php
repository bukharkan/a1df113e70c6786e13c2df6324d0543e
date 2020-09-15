<?php
require_once('includes/smtp/classes/class.phpmailer.php');
    class Api{
        
        private $db;

        public function __construct(){
            $this->db = new Database;
        }

        public function findBySql($query){
            $this->db->query($query);
            $set = $this->db->resultSet();
            return $set;
        }

        public function addQueue($to, $from, $subject, $body){
            $this->db->query('INSERT into queue(mail_to, mail_from, subject, body, created) VALUES (:to,:from,:subject,:body, now())');
            $this->db->bind(':to',$to);
            $this->db->bind(':from',$from);
            $this->db->bind(':subject',$subject);
            $this->db->bind(':body',$body);


            if($this->db->execute()){
                return true;
            }else{
                return false;
            }
        }

        public function getAllQueue(){
            $query = "SELECT * FROM queue";
            return $this->findBySql($query);
        }

        public function getAllQueueSentNull(){
            $query = "SELECT * FROM queue where sent IS NULL";
            return $this->findBySql($query);
        }
        
        public function getQueueById($id){
            $this->db->query('SELECT * FROM queue WHERE id =:id');
            $this->db->bind(':id',$id);
            $row = $this->db->resultSet();
            return $row;
        }

        public function updateQueue($id){
            $queue = $this->getQueueById($id);
            if($queue){
                foreach($queue as $value){
                    $mail_to = $value->mail_to;
                    $mail_from = $value->mail_from;
                    $subject = $value->subject;
                    $body = $value->body;
                }
                    $mail = new PHPMailer; 
                    $mail->IsSMTP();
                    $mail->SMTPSecure = 'none'; 
                    $mail->Host = "smtp.elasticemail.com"; //host masing2 provider email
                    $mail->SMTPDebug = 2;
                    $mail->Port = 2525;
                    $mail->SMTPAuth = true;
                    $mail->Username = "bukharkan@hotmail.com"; //user email
                    $mail->Password = "0A93BF9C44542829168426A257186D461215"; //password email 
                    $mail->SetFrom("bukharkan@hotmail.com",$mail_from); //set email pengirim
                    $mail->Subject = $subject; //subyek email
                    $mail->AddAddress($mail_to, $mail_to);  //tujuan email
                    $mail->MsgHTML($body);
                    if($mail->Send()){
                        $this->db->query('UPDATE queue SET sent = now() WHERE id = :id');
                        $this->db->bind(':id',$id);
                        if($this->db->execute()){
                            return true;
                        }
                    }
            }
            return false;
        }
    }
    $api = new Api();

?>