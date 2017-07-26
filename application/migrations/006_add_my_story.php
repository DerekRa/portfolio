<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Add_my_story extends CI_Migration {

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
                        'self_introduction' => array(
                                'type' => 'TEXT',
                                'default' => NULL
                        ),
                        'life_adventure' => array(
                                'type' => 'TEXT',
                                'default' => NULL
                        ),
                        'video_file_name' => array(
                                'type' => 'VARCHAR',
                                'constraint' => '128',
                                'default' => NULL
                        ),
                        'video_description' => array(
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
                $this->dbforge->create_table('my_story');
        }

        public function down()
        {
                $this->dbforge->drop_table('my_story');
        }
}