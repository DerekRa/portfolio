<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Add_subscribers extends CI_Migration {

        public function up()
        {
                $this->dbforge->add_field(array(
                        'id' => array(
                                'type' => 'INT',
                                'constraint' => 11,
                                'unsigned' => TRUE,
                                'auto_increment' => TRUE
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
                        'email_address' => array(
                                'type' => 'VARCHAR',
                                'constraint' => '128',
                                'default' => NULL
                        ),
                        'validate' => array(
                                'type' => 'VARCHAR',
                                'constraint' => '128',
                                'default' => 0,
                                'comment' => '0 for not validate on email and 1 for validation'
                        ),
                        'created' => array(
                                'type' => 'DATETIME'
                        ),
                        'updated' => array(
                                'type' => 'DATETIME'
                        )
                ));
                $this->dbforge->add_key('id', TRUE);
                $this->dbforge->create_table('subscribers');
        }

        public function down()
        {
                $this->dbforge->drop_table('subscribers');
        }
}