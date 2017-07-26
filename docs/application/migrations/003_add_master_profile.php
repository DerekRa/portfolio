<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Add_master_profile extends CI_Migration {

        public function up(
  )      {
                $this->dbforge->add_field(array(
                        'id' => array(
                                'type' => 'INT',
                                'constraint' => 11,
                                'unsigned' => TRUE,
                                'auto_increment' => TRUE
                        ),
                        'user_id' => array(
                                'type' => 'INT',
                                'constraint' => 11
                        ), 
                        'first_name' => array(
                                'type' => 'VARCHAR',
                                'constraint' => '128',
                                'default' => NULL
                        ),
                        'last_name' => array(
                                'type' => 'VARCHAR',
                                'constraint' => '128',
                                'default' => NULL
                        ),
                        'middle_name' => array(
                                'type' => 'VARCHAR',
                                'constraint' => '128',
                                'default' => NULL
                        ),
                        'date_of_birth' => array(
                                'type' => 'VARCHAR',
                                'constraint' => '128',
                                'default' => NULL
                        ),
                        'gender' => array(
                                'type' => 'VARCHAR',
                                'constraint' => '128',
                                'default' => NULL
                        ),
                        'address' => array(
                                'type' => 'VARCHAR',
                                'constraint' => '128',
                                'default' => NULL
                        ),
                        'provincial_address' => array(
                                'type' => 'VARCHAR',
                                'constraint' => '128',
                                'default' => NULL
                        ),
                        'contact_number' => array(
                                'type' => 'VARCHAR',
                                'constraint' => '100',
                                'default' => NULL
                        ),
                        'username' => array(
                                'type' => 'VARCHAR',
                                'constraint' => '128',
                                'default' => NULL
                        ),
                        'email_address' => array(
                                'type' => 'VARCHAR',
                                'constraint' => '128',
                                'default' => NULL
                        ),
                        'my_schedule' => array(
                                'type' => 'VARCHAR',
                                'constraint' => '250',
                                'default' => NULL
                        ),
                        'citation' => array(
                                'type' => 'TEXT',
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
                $this->dbforge->create_table('master_profile');
        }

        public function down()
        {
                $this->dbforge->drop_table('master_profile');
        }
}