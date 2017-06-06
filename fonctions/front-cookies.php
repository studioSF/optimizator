<?php 

if( !defined( 'ABSPATH' ) )
	die( 'Cheatin\' uh?' );

	/*----------------------------
    Cookies Choice
    https://cookieconsent.insites.com/download/
    -------------------------------*/
    $opt_uti_cookies = get_option('opt_uti_cookies');

    if($opt_uti_cookies){
        add_action('wp_head', 'cookieschoice');
    }

    function cookieschoice($opt_uti_cookies_btn) { ?>
            <link rel="stylesheet" type="text/css" href="//cdnjs.cloudflare.com/ajax/libs/cookieconsent2/3.0.3/cookieconsent.min.css" />
            <script src="//cdnjs.cloudflare.com/ajax/libs/cookieconsent2/3.0.3/cookieconsent.min.js"></script>
            <?php

            // On liste ici les variables utilisées pour pouvoir les afficher dans le plugin
            $opt_uti_cookies_pos = get_option('opt_uti_cookies_pos');
            $opt_uti_cookies_txt = get_option('opt_uti_cookies_txt');
            $opt_uti_cookies_btn = get_option('opt_uti_cookies_btn');
            $opt_uti_cookies_lien = get_option('opt_uti_cookies_lien');
            $opt_uti_cookies_url = get_option('opt_uti_cookies_url');
            $opt_uti_cookies_bgcolor = get_option('opt_uti_cookies_bgcolor');
            $opt_uti_cookies_btcolor = get_option('opt_uti_cookies_btcolor');
            $opt_uti_cookies_bgtxtcolor = get_option('opt_uti_cookies_bgtxtcolor');
            $opt_uti_cookies_bttxtcolor = get_option('opt_uti_cookies_bttxtcolor');
            
            if($opt_uti_cookies_pos == 'push'){
                $opt_uti_cookies_pos2 = '"static": true';
                $opt_uti_cookies_pos = "top";
            }

            // Insertion du script personnalisé
            echo '<script>
                window.addEventListener("load", function(){
                    window.cookieconsent.initialise({
                        "palette": {
                            "popup": {
                                "background": "'. $opt_uti_cookies_bgcolor .'",
                                "text": "'. $opt_uti_cookies_bgtxtcolor .'"
                            },
                            "button": {
                                "background": "'. $opt_uti_cookies_btcolor .'",
                                "text": "'. $opt_uti_cookies_bttxtcolor .'"
                            }
                        },
                        "position": "'. $opt_uti_cookies_pos .'",
                        '. $opt_uti_cookies_pos2 .'
                        "content": {
                            "message": "'. $opt_uti_cookies_txt .'",
                            "dismiss": "'. $opt_uti_cookies_btn .'",
                            "link": "'. $opt_uti_cookies_lien .'",
                            "href": "'. $opt_uti_cookies_url .'"
                        }
                    })
                });
            </script>';
        }

