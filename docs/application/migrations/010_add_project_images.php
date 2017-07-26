<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Add_project_images extends CI_Migration {

        public function up(
  )      {
                $this->dbforge->add_field(array(
                        'id' => array(
                                'type' => 'INT',
                                'constraint' => 11,
                                'unsigned' => TRUE,
                                'auto_increment' => TRUE
                        ),
                        'project_id' => array(
                                'type' => 'INT',
                                'constraint' => 11,
                                'default' => NULL
                        ),
                        'name_of_picture' => array(
                                'type' => 'VARCHAR',
                                'constraint' => '250',
                                'default' => NULL
                        ),
                        'picture_format' => array(
                                'type' => 'VARCHAR',
                                'constraint' => '50',
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
                $this->dbforge->create_table('project_images');
        }

        public function down()
        {
                $this->dbforge->drop_table('project_images');
        }
}