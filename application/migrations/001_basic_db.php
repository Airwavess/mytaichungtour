<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Basic_db extends CI_Migration {

    public function up()
    {   
        /*the end of products table*/

         /**
         * location table
         *  
         * id: primary key, serial number (int)
         *
         * img_path: (text)
         *
         * description: (text)
         */
        $this->dbforge->add_field(array(
            'lc_id' => array(
                'type' => 'INT',
                'unsigned' => TRUE,
                'auto_increment' => TRUE
            ),
            'lc_name' => array(
                'type' => 'TEXT',
            ),
            'img_path' => array(
                'type' => 'TEXT',
            ),
            'description' => array(
                'type' => 'TEXT',
            ),
            'address' => array(
                'type' => 'TEXT',
            ),
            'lat' => array(
                'type' => 'VARCHAR(50)',
            ),
            'lng' => array(
                'type' => 'VARCHAR(50)',
            ),
            
        ));
        $this->dbforge->add_key('lc_id', TRUE);
        $this->dbforge->create_table('location');
        /*the end of location table*/
    }

    public function down()
    {
        $this->dbforge->drop_table('test');
    }
}