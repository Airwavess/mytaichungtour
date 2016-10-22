<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Basic_db extends CI_Migration {

    public function up()
    {   
        /**
         * products table
         *  
         * id: primary key, serial number (int)
         *
         * img_path: (text)
         *
         * description: (text)
         *
         * parent_catelog_id: foreign key (int)
         * 
         * child_catelog_id: foreign key (int)
         */
        $this->dbforge->add_field(array(
            'id' => array(
                'type' => 'INT',
                'unsigned' => TRUE,
                'auto_increment' => TRUE
            ),
            'img_path' => array(
                'type' => 'TEXT',
            ),
            'description' => array(
                'type' => 'TEXT',
            ),
            'carousel' => array(
                'type' => 'BOOLEAN',
            ),
            'recommendation' => array(
                'type' => 'BOOLEAN',
            ),
            'new_arrival' => array(
                'type' => 'BOOLEAN',
            ),
            'parent_catelog_id' => array(
                'type' => 'INT',
            ),
            'child_catelog_id' => array(
                'type' => 'INT',
            ),
        ));
        $this->dbforge->add_key('id', TRUE);
        $this->dbforge->create_table('test');
        /*the end of products table*/
    }

    public function down()
    {
        $this->dbforge->drop_table('test');
    }
}