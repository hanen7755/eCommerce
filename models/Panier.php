<?php

        class Panier{

            private $id_panier;
            private $nom_article;
            private $quantite;
            private $prix_article;
            private $date_created_panier;
            private $id_article;

            /**
             * Get the value of id_panier
             */ 
            public function getId_panier()
            {
                        return $this->id_panier;
            }

            /**
             * Set the value of id_panier
             *
             * @return  self
             */ 
            public function setId_panier($id_panier)
            {
                        $this->id_panier = $id_panier;

                        return $this;
            }

            
           
            /**
             * Get the value of id_article
             */ 
            public function getId_article()
            {
                        return $this->id_article;
            }

            /**
             * Set the value of id_article
             *
             * @return  self
             */ 
            public function setId_article($id_article)
            {
                        $this->id_article = $id_article;

                        return $this;
            }

            /**
             * Get the value of nom_article
             */ 
            public function getNom_article()
            {
                        return $this->nom_article;
            }

            /**
             * Set the value of nom_article
             *
             * @return  self
             */ 
            public function setNom_article($nom_article)
            {
                        $this->nom_article = $nom_article;

                        return $this;
            }

            /**
             * Get the value of quantite
             */ 
            public function getQuantite()
            {
                        return $this->quantite;
            }

            /**
             * Set the value of quantite
             *
             * @return  self
             */ 
            public function setQuantite($quantite)
            {
                        $this->quantite = $quantite;

                        return $this;
            }

            /**
             * Get the value of prix_article
             */ 
            public function getPrix_article()
            {
                        return $this->prix_article;
            }

            /**
             * Set the value of prix_article
             *
             * @return  self
             */ 
            public function setPrix_article($prix_article)
            {
                        $this->prix_article = $prix_article;

                        return $this;
            }

            

            /**
             * Get the value of date_created_panier
             */ 
            public function getDate_created_panier()
            {
                        return $this->date_created_panier;
            }

            /**
             * Set the value of date_created_panier
             *
             * @return  self
             */ 
            public function setDate_created_panier($date_created_panier)
            {
                        $this->date_created_panier = $date_created_panier;

                        return $this;
            }
        }