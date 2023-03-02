<?php

    class Movie{
        private $id;
        private $title;
        private $description;
        private $image;
        private $duration;
        private $trailer;
        private $category;
        private User $user;
    
        public function build_movie($data){
            $this->setId($data['id']);
            $this->setTitle($data['title']);
            $this->setDescription($data['description']);
            $this->setImage($data['image']);
            $this->setDuration($data['duration']);
            $this->setTrailer($data['trailer']);
            $this->setCategory($data['category']);
            $this->setUser($data['user']);
        }
        public function image_generate_name(){
            return bin2hex(random_bytes(60)) . ".jpg";
        }

        public function getId() {
            return $this->id;
        }
        
        public function setId($id): self {
            $this->id = $id;
            return $this;
        }
        
        
        public function getTitle() {
            return $this->title;
        }
        
        public function setTitle($title): self {
            $this->title = $title;
            return $this;
        }
        
        
        public function getDescription() {
            return $this->description;
        }
        
        public function setDescription($description): self {
            $this->description = $description;
            return $this;
        }
        
        
        public function getImage() {
            return $this->image;
        }
        
        public function setImage($image): self {
            $this->image = $image;
            return $this;
        }
        
        
        public function getDuration() {
            return $this->duration;
        }
        
        public function setDuration($duration): self {
            $this->duration = $duration;
            return $this;
        }
        
        
        public function getTrailer() {
            return $this->trailer;
        }
        
        public function setTrailer($trailer): self {
            $this->trailer = $trailer;
            return $this;
        }
        
        
        public function getCategory() {
            return $this->category;
        }
       
        public function setCategory($category): self {
            $this->category = $category;
            return $this;
        }
        
        public function getUser(): User {
            return $this->user;
        }
        
        public function setUser(User $user): self {
            $this->user = $user;
            return $this;
        }
    }

    interface MovieDAOInterface{

        public function create_movie(Movie $movie);
        public function update_movie(User $user);
        public function delete_movie ($id);
        public function find_all();
        public function find_by_id($id);
        public function find_by_title($title);
        public function get_latest_movies();
        public function get_movie_by_categories($category);
        public function get_movies_by_user_id($id_user);
    }
?>