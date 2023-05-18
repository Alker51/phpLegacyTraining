<?php

class Produits {
    private int $id;
    private string $nom;
    private static PDO $dbh;

    private static string $servname = 'localhost';
    private static string $dbname = 'test-php';
    private static string $user = 'test-php';
    private static string $pass = 'test-php';

    public function __construct(int $id, string $nom)
    {
        $this->id = $id;
        $this->nom = $nom;
    }

    public static function connectDB(): PDO
    {
        if(is_null(self::$dbh))
        {
            try{
                $dbco = new PDO("mysql:host=".self::$servname.";dbname=".self::$dbname, self::$user, self::$pass);

                self::$dbh = $dbco;
            }
            catch(PDOException $e){
                echo "Erreur : " . $e->getMessage();
            }
        }

        return self::$dbh;
    }

    public function getProduitByID(int $id): array | bool
    {
        $this->connectDB();

        $sth = self::$dbh->query('SELECT * FROM produits WHERE id = ' . $id);
        $sth->execute();

        return $sth->fetchAll();
    }


    public function getId(): int 
    {
        return $this->id;
    }

    public function getNom(): string
    {
        return $this->nom;
    }
}