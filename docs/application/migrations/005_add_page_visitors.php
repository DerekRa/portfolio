<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Add_page_visitors extends CI_Migration {

        public function up(
  )      {
                $this->dbforge->add_field(array(
                        'id' => array(
                                'type' => 'INT',
                                'constraint' => 11,
                                'unsigned' => TRUE,
                                'auto_increment' => TRUE
                        ),
                        'ip_address' => array(
                                'type' => 'VARCHAR',
                                'constraint' => '100',
                                'default' => NULL
                        ),
                        'ip_address_ipinfo' => array(
                                'type' => 'VARCHAR',
                                'constraint' => '100',
                                'default' => NULL
                        ),
                        'location' => array(
                                'type' => 'VARCHAR',
                                'constraint' => '100',
                                'default' => NULL
                        ),
                        'latitude' => array(
                                'type' => 'VARCHAR',
                                'constraint' => '100',
                                'default' => NULL
                        ),
                        'latitude' => array(
                                'type' => 'VARCHAR',
                                'constraint' => '100',
                                'default' => NULL
                        ),
                        'city' => array(
                                'type' => 'VARCHAR',
                                'constraint' => '128',
                                'default' => NULL
                        ),
                        'region' => array(
                                'type' => 'VARCHAR',
                                'constraint' => '128',
                                'default' => NULL
                        ),
                        'postal' => array(
                                'type' => 'VARCHAR',
                                'constraint' => '100',
                                'default' => NULL
                        ),
                        'country' => array(
                                'type' => 'VARCHAR',
                                'constraint' => '128',
                                'default' => NULL
                        ),
                        'org' => array(
                                'type' => 'TEXT'
                        ),
                        'page_visited' => array(
                                'type' => 'VARCHAR',
                                'constraint' => '500',
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
                $this->dbforge->create_table('page_visitors');
        }

        public function down()
        {
                $this->dbforge->drop_table('page_visitors');
        }
}