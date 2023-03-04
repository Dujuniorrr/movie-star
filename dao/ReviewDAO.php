<?php

    require_once("model/User.php");
    require_once("dao/UserDAO.php");
    require_once("model/Review.php");

    class ReviewDAO implements ReviewDAOInterface{
        public PDO $conn;
        public $url;
        public $message;

        public function __construct($conn, $url){
            $this->conn = $conn;
            $this->url = $url;
            $this->message = new Message($url);
        }

        public function create_review(Review $review, $id_movie){
            $stmt = $this->conn->prepare("INSERT INTO REVIEW(review, rating, USER_id, MOVIE_id) VALUES (:review, :rating, :id_user, :id_movie)");
            $stmt->bindValue(":review", $review->getReview());
            $stmt->bindValue(":rating", $review->getRating());
            $stmt->bindValue(":id_user", $review->getUser()->getId());
            $stmt->bindValue(":id_movie", $id_movie);
            $stmt->execute();

            $this->message->set_message("Avaliação enviada com sucesso!", "alert-success", "back");
        }

        public function find_reviews_by_movie($id_movie){
            $stmt = $this->conn->prepare("SELECT * FROM REVIEW WHERE MOVIE_id = :id_movie");
            $stmt->bindParam(":id_movie", $id_movie);
            $stmt->execute();
            $data = $stmt->fetchAll();
            $reviews = [];
            foreach($data as $row){
                $review = new Review;
                $user_dao = new UserDAO($this->conn, $this->url);
                $user = $user_dao->find_by_id($row['user_id']);
                $review->build_review($row, $user);
                $reviews[] = $review;
            }
            return $reviews;
        }

        public function has_already_reviewd($id_movie, $id_user){
            $stmt = $this->conn->prepare("SELECT id FROM REVIEW WHERE USER_id = :id_user AND MOVIE_id = :id_movie");
            $stmt->bindParam(':id_user', $id_user);
            $stmt->bindParam(":id_movie", $id_movie);
            $stmt->execute();
            $data = $stmt->fetchAll();
            if(count($data) > 0){
                return true;
            }
            
            return false;
        }

        public function get_rating($id_movie){
            $stmt = $this->conn->prepare("SELECT rating FROM REVIEW WHERE MOVIE_id = :id_movie");
            $stmt->bindParam(":id_movie", $id_movie);
            $stmt->execute();
            $data = $stmt->fetchAll();
            $count = 0;
            $sum = 0;
            if($data){
                foreach($data as $row){
                    $sum += $row['rating'];
                    $count++;
                }

                return  number_format($sum / $count, "1", ".", " ");
            }

            return "Nenhuma avalição";
           
        }
        
    }

?>