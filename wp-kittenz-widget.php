<?php
/*
Plugin Name: Kitten of the day widget!
Plugin URI: http://dailywidget.com/cute-kitten-of-the-day-widget/
Description: OMG cute kittens every day for your widget bar!
Author: Daily Widget
Version: 0.62
Author URI: http://dailywidget.com
*/

class KittenzOfTheDay extends WP_Widget {
    function KittenzOfTheDay() {
        $widget_ops = array('classname' => 'kittenz_widget', 'description' => 'Display a widget with a picture of cute kittens of the day.');
        $control_ops = array('width' => 200, 'height' => 120);
        $this->WP_Widget('kittenz_widget', 'KITTENZ!', $widget_ops, $control_ops);
    }

    function widget($args, $instance) {     

		$link = htmlspecialchars($instance['link'], ENT_QUOTES);

		$body2 = '<div style="border-radius:5px;width:175px;border:1px solid black;background-color:#FFFFFF;padding:0px;margin-left:auto;margin-right:auto;margin-top:10px;margin-bottom:20px;"><div style="font-weight:bold;border-radius:0px;text-align:center;background-color:#000000;color:#FFFFFF;text-decoration:none;text-transform:uppercase;font-family:verdana,helvetica,arial,sans-serif;font-size:15px;padding:0px 5px 0px 5px;line-height:19px;">CUTE KITTEN OF THE DAY!</div><div style="border-radius:0px;width:173px;padding:3px 0px 0px 0px;text-align:center;margin-left:auto;margin-right:auto;margin-bottom:auto;display:absolute;position:static;"><img style="border-radius:5px; border:1px solid black;float:center;padding:0px;margin-top:0px;margin-bottom:3px;display:inherit;position:static;margin-left:auto;margin-right:auto;" width="165" src="http://kittens.dailywidget.com/kitten.jpg" /></div>';

		$body3 = '<div style="width:170px;text-align:right;padding:0px 5px 5px 0px;margin:0px;border:0px;"><a href="http://goo.gl/OAATx" style="font-weight:normal;text-decoration:none;color:#FF0000;font-family:verdana,helvetica,arial,sans-serif;font-size:8px;padding:0px;margin:0px;line-height:8px;display:inherit;position:static;">(get widget)</a></div>';

		$body4 = '</div>';

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
