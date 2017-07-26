<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Add_my_services extends CI_Migration {

        public function up(
  )      {
                $this->dbforge->add_field(array(
                        'id' => array(
                                'type' => 'INT',
                                'constraint' => 11,
                                'unsigned' => TRUE,
                                'auto_increment' => TRUE
                        ),
                        'mp_id' => array(
                                'type' => 'INT',
                                'constraint' => 11,
                                'default' => NULL
                        ),
                        'name_of_service' => array(
                                'type' => 'VARCHAR',
                                'constraint' => '250',
                                'default' => NULL
                        ),
                        'created' => array(
                                'type' => 'DATETIME'
                        ),
                        'updated' => array(
                                'type' => 'DATETIME'
                        )
                ));
                $this->dbforge->add_key('id', TRUE);
                $this->dbforge->create_table('my_services');
        }

        public function down()
        {
                $this->dbforge->drop_table('my_services');
        }
}