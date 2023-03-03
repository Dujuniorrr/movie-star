<?php

    require_once("model/Message.php");
    require_once("model/User.php");
    require_once("dao/UserDAO.php");
    require_once("model/Movie.php");

    class MovieDAO implements MovieDAOInterface {
        public $conn;
        public $url;
        public $message;

        public function __construct(PDO $conn, $url){
            $this->conn = $conn;
            $this->url = $url;
            $this->message = new Message($url);
        }

        public function create_movie(Movie $movie){
            $stmt = $this->conn->prepare("INSERT INTO 
                MOVIE (title, category, duration, description, trailer, image, USER_id)
                VALUES (:title, :category, :duration, :description, :trailer, :image, :user_id)");
            $stmt->bindValue(":title", $movie->getTitle() );
            $stmt->bindValue(":category", $movie->getCategory() );
            $stmt->bindValue(":duration", $movie->getDuration());
            $stmt->bindValue(":description", $movie->getDescription());
            $stmt->bindValue(":trailer", $movie->getTrailer());
            $stmt->bindValue(":image", $movie->getImage());
            $stmt->bindValue(":user_id", $movie->getUser()->getId());
            $stmt->execute();

            $this->message->set_message('Filme adicionado com sucesso!', "alert-success", "index.php");
        }
        public function update_movie(User $user){}
        public function delete_movie ($id){}
        public function find_all(){}
        public function find_by_id($id){
            $stmt = $this->conn->prepare("SELECT * FROM MOVIE WHERE id = :id");
            $stmt->bindParam(":id", $id);
            $stmt->execute();
            if($stmt->rowCount() > 0){
                $data = $stmt->fetch();
                $user_dao = new UserDao($this->conn, $this->url);
                $user = $user_dao->find_by_id($data['user_id']);
                $movie = new Movie;
                $movie->build_movie($data, $user);

                return $movie;
            }
            
            return false;
        }
        public function find_by_title($title){}
        public function get_latest_movies(){
            $stmt = $this->conn->query("SELECT * FROM MOVIE ORDER BY id DESC");
            $stmt->execute();
            $data = $stmt->fetchAll();
            $movies = [];
            $user_dao = new UserDao($this->conn, $this->url);
            foreach($data as $row){
                $movie = new Movie;
                $user = $user_dao->find_by_id($row['user_id']);
                $movie->build_movie($row, $user);
                $movies[] = $movie;
            }
            return $movies;
        }
        public function get_movie_by_categories($category){
            $stmt = $this->conn->prepare("SELECT * FROM MOVIE WHERE category = :category ORDER BY id DESC");
            $stmt->bindParam(":category", $category);
            $stmt->execute();
            $data = $stmt->fetchAll();
            $movies = [];
            $user_dao = new UserDao($this->conn, $this->url);
            foreach($data as $row){
                $movie = new Movie;
                $user = $user_dao->find_by_id($row['user_id']);
                $movie->build_movie($row, $user);
                $movies[] = $movie;
            }
            return $movies;
        }
        public function get_movies_by_user_id($user_id){
            $stmt = $this->conn->prepare("SELECT * FROM MOVIE WHERE USER_id = :user_id ORDER BY id DESC");
            $stmt->bindParam(":user_id", $user_id);
            $stmt->execute();
            $data = $stmt->fetchAll();
            $movies = [];
            $user_dao = new UserDao($this->conn, $this->url);
            foreach($data as $row){
                $movie = new Movie;
                $user = $user_dao->find_by_id($user_id);
                $movie->build_movie($row, $user);
                $movies[] = $movie;
            }
            return $movies;
        }
    }

?>