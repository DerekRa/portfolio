<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Add_my_messages extends CI_Migration {

        public function up(
  )      {
                $this->dbforge->add_field(array(
                        'id' => array(
                                'type' => 'INT',
                                'constraint' => 11,
                                'unsigned' => TRUE,
                                'auto_increment' => TRUE
                        ),
                        'sender_name' => array(
                                'type' => 'VARCHAR',
                                'constraint' => 150,
                                'default' => NULL
                        ),
                        'sender_email' => array(
                                'type' => 'VARCHAR',
                                'constraint' => 150,
                                'default' => NULL
                        ),
                        'sender_website' => array(
                                'type' => 'VARCHAR',
                                'constraint' => 250,
                                'default' => NULL
                        ),
                        'sender_address' => array(
                                'type' => 'TEXT',
                                'default' => NULL
                        ),
                        'sender_subject' => array(
                                'type' => 'VARCHAR',
                                'constraint' => 250,
                                'default' => NULL
                        ),
                        'sender_message' => array(
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
                $this->dbforge->create_table('my_messages');
        }

        public function down()
        {
                $this->dbforge->drop_table('my_messages');
        }
}