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
            'n_id' => array(
                'type' => 'INT',
                'unsigned' => TRUE,
                'auto_increment' => TRUE
            ),
            'n_character' => array(
                'type' => 'VARCHAR(1)',
            ),
            'n_location' => array(
                'type' => 'TEXT'
            )
        ));
        $this->dbforge->add_key('n_id', TRUE);
        $this->dbforge->create_table('name');
        /*the end of products table*/
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
            'st_ch' => array(
                'type' => 'VARCHAR(1)',
            ),
            'st_call' => array(
                'type' => 'TEXT'
            ),
            'st_assist' => array(
                'type' => 'TEXT'
            ),
            'st_leave' => array(
                'type' => 'TEXT'
            ),
            'st_test' => array(
                'type' => 'TEXT'
            ),
            'st_crisis' => array(
                'type' => 'TEXT'
            ),
            'st_treasure' => array(
                'type' => 'TEXT'
            )
        ));
        $this->dbforge->add_key('st_ch', TRUE);
        $this->dbforge->create_table('story');
        /*the end of products table*/
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
            'stf_id' => array(
               'type' => 'INT',
                'unsigned' => TRUE,
                'auto_increment' => TRUE
            ),
            'stf_begin' => array(
                'type' => 'TEXT'
            ),
            'stf_end' => array(
                'type' => 'TEXT'
            ),
        ));
        $this->dbforge->add_key('stf_id', TRUE);
        $this->dbforge->create_table('story_fixed');
        /*the end of products table*/
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
            'stl_id' => array(
                'type' => 'INT',
                'unsigned' => TRUE,
                'auto_increment' => TRUE
            ),
            'stl_character' => array(
                'type' => 'VARCHAR(5)',
            ),
            'stl_location' => array(
                'type' => 'VARCHAR(20)'
            )
        ));
        $this->dbforge->add_key('stl_id', TRUE);
        $this->dbforge->create_table('story_location');
        /*the end of products table*/
    }

    public function down()
    {
        $this->dbforge->drop_table('location');
        $this->dbforge->drop_table('migrations');
        $this->dbforge->drop_table('name');
        $this->dbforge->drop_table('story');
    }
}