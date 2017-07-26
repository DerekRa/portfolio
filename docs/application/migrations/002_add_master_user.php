<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Add_master_user extends CI_Migration {

        public function up()
        {
                $this->dbforge->add_field(array(
                        'id' => array(
                                'type' => 'INT',
                                'constraint' => 11,
                                'unsigned' => TRUE,
                                'auto_increment' => TRUE
                        ),
                        'username' => array(
                                'type' => 'TEXT',
                                'default' => NULL,
                                'comment' => 'username email saving encrypted'
                        ),
                        'email_address' => array(
                                'type' => 'TEXT',
                                'default' => NULL,
                                'comment' => 'email saving encrypted'
                        ),
                        'password' => array(
                                'type' => 'TEXT',
                                'default' => NULL,
                                'comment' => 'password saving encrypted'
                        ),
                        'created' => array(
                                'type' => 'DATETIME'
                        ),
                        'updated' => array(
                                'type' => 'DATETIME'
                        )
                ));
                $this->dbforge->add_key('id', TRUE);
                $this->dbforge->create_table('master_user');
        }

        public function down()
        {
                $this->dbforge->drop_table('master_user');
        }
}