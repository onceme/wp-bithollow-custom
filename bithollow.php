<?php
/**
* Plugin Name: BitHollow customize
* Plugin URI: https://github.com/onceme/wp-bithollow-custom
* Description: BitHollow website custom plugin
* Version: 0.1
* Author: Aaron Wang Shi
* Author URI: http://github.com/onceme
**/

function bithollow_video_shortcode($attrs) {
    $user_geo  = geoip_detect2_get_info_from_current_ip();
    $video_geo = shortcode_atts(array('locale' => 'China',
                                       'url'    => null,
                                      ), $attrs, 'bithollow_video');

    if ($video_geo['locale'] == 'China' && $user_geo->country->isoCode == 'CN') {
        return do_shortcode(sprintf(__('[arve url="%s"]'), $video_geo['url']));
    }
    else if ($video_geo['locale'] == 'Global' && $user_geo->country->isoCode != 'CN') {
        return do_shortcode(sprintf(__('[arve url="%s"]'), $video_geo['url']));
    }
}
add_shortcode('bithollow_video', 'bithollow_video_shortcode');

?>
