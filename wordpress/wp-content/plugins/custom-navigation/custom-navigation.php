<?php
/*
Plugin Name: custom-navigation
Description: widget pentru a naviga catre diferite facultati
*/
/* Start Adding Functions Below this Line */


// Register and load the widget
function wpb_load_widget() {
    register_widget( 'wpb_widget' );
}
add_action( 'widgets_init', 'wpb_load_widget' );
 
// Creating the widget 
class wpb_widget extends WP_Widget {
 
function __construct() {
    parent::__construct( 
        // Base ID of your widget
        'wpb_widget',  
        // Widget name will appear in UI
        __('WPBeginner Widget', 'wpb_widget_domain'), 
        // Widget description
        array( 'description' => __( 'Sample widget based on WPBeginner Tutorial', 'wpb_widget_domain' ), ) 
    );
}
 
// Creating widget front-end
 
public function widget( $args, $instance ) {
    $title = apply_filters( 'widget_title', $instance['title'] );
    echo $instance['test'][0];
    echo $args['before_widget'];// before and after widget arguments are defined by themes
    if ( ! empty( $title ) )
        echo $args['before_title'] . $title . $args['after_title'];

    // This is where you run the code and display the output
    echo ('
    <div style="position: relative;">
        <img src="http://localhost/testsite/wordpress/wp-content/uploads/2017/08/temporary image.jpg" 
            style="width:100%;height:100%;z-index=-1">
        <div style="position:absolute; margin-top:-100% ;left:20% ;z-index: 1; width:13%">
            <div style="
                position:absolute; margin-top:40% ;left:20%; z-index: 2
                ">
            <p>Facultate 1</p>
            </div>
            <img src="http://localhost/testsite/wordpress/wp-content/uploads/2017/08/stockBook.png"
                style="width:100%;position:absolute; z-index: 1"
                onmouseover="this.src=\'http://localhost/testsite/wordpress/wp-content/uploads/2017/08/stockBookopened.png\';" 
                onmouseout= "this.src=\'http://localhost/testsite/wordpress/wp-content/uploads/2017/08/stockBook.png\';">
        </div>
        <div style="position:absolute; margin-top:-100% ;left:40% ;z-index: 1; width:13%">
            <div style="
                position:absolute; margin-top:40% ;left:20%; z-index: 2
                ">
            <p>Facultate 2</p>
            </div>
            <img src="http://localhost/testsite/wordpress/wp-content/uploads/2017/08/stockBook.png"
                style="width:100%;position:absolute; z-index: 1"
                onmouseover="this.src=\'http://localhost/testsite/wordpress/wp-content/uploads/2017/08/stockBookopened.png\';" 
                onmouseout= "this.src=\'http://localhost/testsite/wordpress/wp-content/uploads/2017/08/stockBook.png\';">
        </div>
        <div style="position:absolute; margin-top:-80% ;left:30% ;z-index: 1; width:13%">
            <div style="
                position:absolute; margin-top:40% ;left:20%; z-index: 2
                ">
            <p>Facultate 3</p>
            </div>
            <img src="http://localhost/testsite/wordpress/wp-content/uploads/2017/08/stockBook.png"
                style="width:100%;position:absolute; z-index: 1"
                onmouseover="this.src=\'http://localhost/testsite/wordpress/wp-content/uploads/2017/08/stockBookopened.png\';" 
                onmouseout= "this.src=\'http://localhost/testsite/wordpress/wp-content/uploads/2017/08/stockBook.png\';">
        </div>
        <div style="position:absolute; margin-top:-70% ;left:60% ;z-index: 1; width:13%">
            <div style="
                position:absolute; margin-top:40% ;left:20%; z-index: 2
                ">
            <p>Facultate 4</p>
            </div>
            <img src="http://localhost/testsite/wordpress/wp-content/uploads/2017/08/stockBook.png"
                style="width:100%;position:absolute; z-index: 1"
                onmouseover="this.src=\'http://localhost/testsite/wordpress/wp-content/uploads/2017/08/stockBookopened.png\';" 
                onmouseout= "this.src=\'http://localhost/testsite/wordpress/wp-content/uploads/2017/08/stockBook.png\';">
        </div>
        <div style="position:absolute; margin-top:-50% ;left:80% ;z-index: 1; width:13%">
            <div style="
                position:absolute; margin-top:40% ;left:20%; z-index: 2
                ">
            <p>Facultate 5</p>
            </div>
            <img src="http://localhost/testsite/wordpress/wp-content/uploads/2017/08/stockBook.png"
                style="width:100%;position:absolute; z-index: 1"
                onmouseover="this.src=\'http://localhost/testsite/wordpress/wp-content/uploads/2017/08/stockBookopened.png\';" 
                onmouseout= "this.src=\'http://localhost/testsite/wordpress/wp-content/uploads/2017/08/stockBook.png\';">
        </div>
    </div>
    
    ');

    echo $args['after_widget'];

}
         
// Widget Backend 
public function form( $instance ) {
if ( isset( $instance[ 'title' ] ) ) {
    $title = $instance[ 'title' ];
}
else {
    $title = __( 'New title', 'wpb_widget_domain' );
}

// Widget admin form
$get_field_id1=$this->get_field_id( 'title' );
$get_field_name1=$this->get_field_name( 'title' );
$label_text="Title";
$value=$title;
echo ("<p>");
echo("<label for=$get_field_id1>$label_text</label>");
echo(" <input class=\"widefat\" id=$get_field_id1 name=$get_field_name1 type=\"text\" value=$value  /></p>");


}
     
// Updating widget replacing old instances with new
public function update( $new_instance, $old_instance ) {
$instance = array();
$instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
$instance['test']=[1,2,3];
return $instance;
}
} // Class wpb_widget ends here
 
/* Stop Adding Functions Below this Line */
?>