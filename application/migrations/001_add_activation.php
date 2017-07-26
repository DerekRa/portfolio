<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Add_activation extends CI_Migration {

        public function up()
        {
                $this->dbforge->add_field(array(
                        'id' => array(
                                'type' => 'INT',
                                'constraint' => 11,
                                'unsigned' => TRUE,
                                'auto_increment' => TRUE
                        ),
                        'email_temp' => array(
                                'type' => 'TEXT',
                                'default' => NULL,
                                'comment' => 'temporation email saving encrypted'
                        ),
                        'password_temp' => array(
                                'type' => 'VARCHAR',
                                'constraint' => 150,
                                'comment' => 'temporary password saving'
                        ),
                        'created' => array(
                                'type' => 'datetime'
                        ),
                        'updated' => array(
                                'type' => 'datetime'
                        )
                ));
                $this->dbforge->add_key('id', TRUE);
                $this->dbforge->create_table('activation');
        }

        public function down()
        {
                $this->dbforge->drop_table('activation');
        }
}