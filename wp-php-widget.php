<?php
/*
Plugin Name: Kitten of the day widget!
Plugin URI: http://www.dailywidget.com/wp-php-widget
Description: OMG cute kittens every day for your widget bar!
Author: Daily Widget
Version: 0.5beta
Author URI: http://www.dailywidget.com
*/

class KittenzOfTheDay extends WP_Widget {
    function KittenzOfTheDay() {
        $widget_ops = array('classname' => 'kittenz_widget', 'description' => 'Display a widget with a picture of cute kittens of the day.');
        $control_ops = array('width' => 200, 'height' => 120);
        $this->WP_Widget('kittenz_widget', 'KITTENZ!', $widget_ops, $control_ops);
    }

    function widget($args, $instance) {     

		$link = htmlspecialchars($instance['link'], ENT_QUOTES);

		$body2 = '<center><br /><div style="width:175px; border:1px solid black; margin:2px; background-color:#FFFFFF; padding:0px 0px 0px 0px;">
			<div style="text-align:center; background-color:#000000; color:#FFFFFF; text-decoration:none; text-transform:uppercase; color:#FFFFFF; font-family:verdana,helvetica,arial,sans-serif; font-size:15px; padding:0px 0px 0px 0px; line-height:18px;">
			<strong>
			CUTE KITTEN OF THE DAY!
			</strong>
			</div>
			<div style="padding:3px 3px;"><center><img style="border:1px solid black;" width="165" src="http://kittens.dailywidget.com/kitten.jpg"></center>
			</div>';

		$body3 = '<div style="text-align:right; padding:0px 0px 4px 0px;"><a style="text-decoration:none; text-transform:lowercase; color:red; font-family:Arial,Helvetica,sans-serif; font-size:10px; padding:5px 5px 0px 0px;" href="http://goo.gl/OAATx">(get widget)</a></div>';

		$body4 = '</div></center>';

		$title2 = "Kitten Widget";
		
		echo $before_widget;
		echo $body2;

		if ($link == "1") echo $body3;

		echo $body4;

		echo $after_widget;	
    }


    function update($new_instance, $old_instance) {             

		$instance = $old_instance;

		$link = strip_tags(stripslashes($old_instance['link']));

		$instance['link'] = strip_tags(stripslashes($new_instance['link']));

		return $instance;

    }
    function form($instance) {              
	  $default = array('link' => '1');
	  if (!isset($instance['link']))
		$instance = $default;

  	  $link = htmlspecialchars($instance['link'], ENT_QUOTES);

	  $link_checked = "";
	  if ($link == "1") $link_checked = "CHECKED";


		echo '<p><label for="' .$this->get_field_id('link'). '">Allow (get widget) link? <input type="checkbox" id="' .$this->get_field_id('link'). '" name="' .$this->get_field_name('link'). 
		'" value=1 '.$link_checked.' />';

?>
<p>It is greatly appreciated if you allow a return link back to our widget site - please!</p>
<p>This adorable widget displays a cute kitten picture each day!</p>
<p><a href="http://dailywidget.com">Get more widgets here!</a></p>

<?php 
    }


}


add_action('widgets_init', create_function('', 'return register_widget("KittenzOfTheDay");'));
