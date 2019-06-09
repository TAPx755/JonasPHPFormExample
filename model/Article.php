<?php
/**
 * Created by PhpStorm.
 * User: paddy.
 * Date: 2019-06-09
 * Time: 20:10
 */

require ("Database.php");

class Article
{
    private $artNr;
    private $artBez;
    private $ek;
    private $vk;
    private $artGrp;
    private $lagerBest;

    private $bookingAmount;
    private $bookingDate;

    /**
     * Article constructor.
     * @param $artNr
     * @param $artBez
     * @param $ek
     * @param $vk
     * @param $artGrp
     * @param $lagerBest
     */
    public function __construct($artNr, $artBez, $ek, $vk, $artGrp, $lagerBest, $bookingAmount)
    {
        $this->artNr = $artNr;
        $this->artBez = $artBez;
        $this->ek = $ek;
        $this->vk = $vk;
        $this->artGrp = $artGrp;
        $this->lagerBest = $lagerBest;
        $this->bookingAmount = $bookingAmount;
    }

    public function handleReq()
    {
        if($this->checkArticleExistence() != false)
        {
            $this->update();
        }
        else
        {
            $this->create();
        }
    }


    public function create()
    {
        $db = Database::connect();
        $sql = 'INSERT INTO tbl_article (art_nr, art_grp, art_bez, art_vk, art_ek, art_quantityAv) values (?,?,?,?,?,?)';
        $stmt = $db->prepare($sql);
        $stmt->execute(array($this->artNr, $this->artGrp, $this->artBez, $this->vk, $this->ek, $this->lagerBest));


        $this->bookingDate = date("Y-m-d H:i:s");

        $sql = 'INSERT INTO tbl_booking (art_nr, booking_amount, booking_date) values (?,?,?)';
        $stmt = $db->prepare($sql);
        $stmt->execute(array($this->artNr, $this->bookingAmount, $this->bookingDate));

        Database::disconnect();
    }
    public function update()
    {
        $db = Database::connect();
        $sql = 'UPDATE tbl_article SET art_grp = ?,  art_bez = ?, art_vk = ?, art_ek = ?, art_quantityAv = ? WHERE art_nr = ?';
        $stmt = $db->prepare($sql);
        $stmt->execute(array($this->artGrp, $this->artBez, $this->vk, $this->ek, $this->lagerBest, $this->artNr));


        $this->bookingDate = date("Y-m-d H:i:s");

        $sql = 'INSERT INTO tbl_booking (art_nr, booking_amount, booking_date) values (?,?,?)';
        $stmt = $db->prepare($sql);
        $stmt->execute(array($this->artNr, $this->bookingAmount, $this->bookingDate));

        Database::disconnect();
    }

    /*public function get($filter = null)
    {
        $articlesList = [];
        $db = Database::connect();
        $sql = 'SELECT * FROM tbl_booking';
        $stmt = $db->prepare($sql);
        $stmt->execute(array());
        $articles = $stmt->fetchAll(PDO::FETCH_ASSOC);


        if($articles == null)
        {
            return false;
        }
        else
        {
            foreach($articles as $article)
            {
                $articlesList = new Article($article['art_nr'], null,null,null,$article['art_grp'], $art)
            }
        }



    }*/ //FOR THE BOOKINGS LIST

    public function checkArticleExistence()
    {
        $db = Database::connect();
        $sql = 'SELECT * FROM tbl_article WHERE art_nr = ?';
        $stmt = $db->prepare($sql);
        $stmt->execute(array($this->artNr));
        $article = $stmt->fetch(PDO::FETCH_ASSOC);

        if($article  == null)
        {
            return false;
        }
        else
        {
            return true;
        }
        Database::disconnect();
    }


    /**
     * @return mixed
     */
    public function getArtNr()
    {
        return $this->artNr;
    }

    /**
     * @param mixed $artNr
     */
    public function setArtNr($artNr)
    {
        $this->artNr = $artNr;
    }

    /**
     * @return mixed
     */
    public function getArtBez()
    {
        return $this->artBez;
    }

    /**
     * @param mixed $artBez
     */
    public function setArtBez($artBez)
    {
        $this->artBez = $artBez;
    }

    /**
     * @return mixed
     */
    public function getEk()
    {
        return $this->ek;
    }

    /**
     * @param mixed $ek
     */
    public function setEk($ek)
    {
        $this->ek = $ek;
    }

    /**
     * @return mixed
     */
    public function getVk()
    {
        return $this->vk;
    }

    /**
     * @param mixed $vk
     */
    public function setVk($vk)
    {
        $this->vk = $vk;
    }

    /**
     * @return mixed
     */
    public function getArtGrp()
    {
        return $this->artGrp;
    }

    /**
     * @param mixed $artGrp
     */
    public function setArtGrp($artGrp)
    {
        $this->artGrp = $artGrp;
    }

    /**
     * @return mixed
     */
    public function getLagerBest()
    {
        return $this->lagerBest;
    }

    /**
     * @param mixed $lagerBest
     */
    public function setLagerBest($lagerBest)
    {
        $this->lagerBest = $lagerBest;
    }




}


