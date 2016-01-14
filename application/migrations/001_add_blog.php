<?php

class Migration_Add_Blog extends CI_Migration {

    public function up() {


        $sql = "CREATE TABLE `bloginfo` (
              `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
              `created_date` date DEFAULT NULL,
              `title` varchar(100) NOT NULL,
              `description` text NOT NULL,
              `image` varchar(150) DEFAULT NULL,
              PRIMARY KEY (`id`)
            ) ENGINE=InnoDB DEFAULT CHARSET=utf8;";
        $this->db->query($sql);


    }

    public function down() {
        $this->dbforge->drop_table('bloginfo');
    }
}

?>
