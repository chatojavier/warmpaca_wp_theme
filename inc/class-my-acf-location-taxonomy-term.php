<?php 

if( ! defined( 'ABSPATH' ) ) exit;

class My_ACF_Location_Taxonomy_Term extends ACF_Location {

    public function initialize() {
        $this->name = 'taxonomy_term';
        $this->label = __( "Taxonomy Term", 'acf' );
        $this->category = 'forms';
        $this->object_type = 'term';
    }

    public function get_values( $rule ) {
        $choices = array();
    
        // Load all terms, loop over them and append to chcoices.
        $terms = get_terms();
        if( $terms ) {
            foreach( $terms as $term ) {
                $choices[ $term->term_id ] = $term->name;
            }
        }
        return $choices;
    }

    public function match( $rule, $screen, $field_group ) {

        // Check screen args for "term_id" which will exist when editing a term.
        // Return false for all other edit screens.
        if( isset($screen['term_id']) ) {
            $term_id = $screen['term_id'];
        } else {
            return false;
        }

        // Load the post object for this edit screen.
        $term = get_term( $term_id );
        if( !$term ) {
            return false;
        }

        // Compare the Post's author attribute to rule value.
        $result = ( $term->name == $rule['value'] );

        // Return result taking into account the operator type.
        if( $rule['operator'] == '!=' ) {
            return !$result;
        }
        return $result;
    }
}