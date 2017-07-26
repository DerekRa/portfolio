<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Add_admin_restrictions extends CI_Migration {

        public function up(
  )      {
                $this->dbforge->add_field(array(
                        'id' => array(
                                'type' => 'INT',
                                'constraint' => 11,
                                'unsigned' => TRUE,
                                'auto_increment' => TRUE
                        ),
                        'master_admin' => array(
                                'type' => 'TINYINT',
                                'constraint' => 3,
                                'comment' => '0 for member admin and 1 for master admin'
                        ),
                        'user_id' => array(
                                'type' => 'INT',
                                'constraint' => 11,
                                'default' => NULL
                        ),
                        'admin_limit' => array(
                                'type' => 'INT',
                                'constraint' => 11,
                                'default' => NULL,
                                'comment' => 'only master admin is capable of settings'
                        ),
                        'created' => array(
                                'type' => 'DATETIME'
                        ),
                        'updated' => array(
                                'type' => 'DATETIME'
                        )
                ));
                $this->dbforge->add_key('id', TRUE);
                $this->dbforge->create_table('admin_restrictions');
        }

        public function down()
        {
                $this->dbforge->drop_table('admin_restrictions');
        }
}