<?php


class Play_list extends Connection{



    private $id_play_list;
    private $name_paly_list;
    private $desc_play_list;
    private $choice_play_list;
    private $id_play_list_voyage;


    private $id_play_listCol="id_play_list";
    private $name_paly_listCol="name_paly_list";
    private $desc_play_listCol="desc_play_list";
    private $choice_play_listCol="choice_play_list";
    private $id_play_list_voyageCol="id_play_list_voyage";

    private $table="play_list";

    public function __construct($name=NULL,$desc=NULL,$choice=NULL,$list_voyage=NULL){
        $this->name_paly_list=$name;
        $this->desc_play_list=$desc;
        $this->choice_play_list=$choice;
        $this->id_play_list_voyage=$list_voyage;

    }


    #CREATE
    public function savePlay_list(){
        $sql="INSERT INTO {$this->table} VALUES('',
              '{$this->name_paly_list}',
              '{$this->desc_play_list}',
              '{$this->choice_play_list}',
              '{$this->id_play_list_voyage}'";
        $query =$this->getPDO()->query($sql);
        return $query;
    }
    #READ
    public function getPlay_list($id=NULL){
        if($id !=null){
            $sql="SELECT * FROM {$this->table} WHERE {$this->id_play_list}=".$id;
        }else{
            $sql="SELECT * FROM {$this->table}";
        }
        $query=$this->getPDO()->query($sql);
        return $query;
    }
    #DELETE
    public function deletePlay_list($id){
        $sql="DELETE FROM {$this->table} WHERE {$this->id_play_listCol}=".$id;
        $query=$this->getPDO()->query($sql);
        return $query;
    }
    #UPDATE
    public function updatePlay_list($id,$name,$desc,$choice,$list_voyage)
    {

        $sql = "UPDATE {$this->table} SET
                  {$this->name_paly_listCol}='$name'
                  ,{$this->desc_play_listCol}='$desc'
                  ,{$this->choice_play_listCol}='$choice'
                  ,{$this->id_play_list_voyageCol}='$list_voyage'
                  WHERE {$this->id_play_listCol}=".$id;
        $query = $this->getPDO()->query($sql);
        return $query;
    }
}?>

