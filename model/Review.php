<?php

    class Review{
        private $rating;
        private $review;
        private User $user;

        public function build_review($data, $user){
            $this->rating = $data['rating'];
            $this->review = $data['review'];
            $this->user = $user;
        }
         
        public function getRating() {
            return $this->rating;
        }
        
        public function setRating($rating): self {
            $this->rating = $rating;
            return $this;
        }
        
        public function getReview() {
            return $this->review;
        }
        
        public function setReview($review): self {
            $this->review = $review;
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

    interface ReviewDAOInterface {
        public function create_review(Review $review, $id_movie);
        public function find_reviews_by_movie($id_movie);
        public function has_already_reviewd($id_movie, $id_user);
        public function get_rating($id_movie);
    }
?>