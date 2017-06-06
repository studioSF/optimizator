<?php 

if( !defined( 'ABSPATH' ) )
	die( 'Cheatin\' uh?' );

$opt_gen_ga = get_option('opt_gen_ga');
$opt_gen_ga_cle = get_option('opt_gen_ga_cle');

// On insère Google Analytics avec sa clé
if($opt_gen_ga && $opt_gen_ga_cle){
	add_action( 'wp_head', 'optimizator_google_analytics', 10 );
}


function optimizator_google_analytics() {
	echo '<script>
    (function(i,s,o,g,r,a,m){i[\'GoogleAnalyticsObject\']=r;i[r]=i[r]||function(){
    (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
    m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
    })(window,document,\'script\',\'//www.google-analytics.com/analytics.js\',\'ga\');

	ga(\'create\', \''; ?> <?php $opt_gen_ga_cle = get_option('opt_gen_ga_cle'); echo $opt_gen_ga_cle; ?> <?php echo' \', \'auto\');
    ga(\'send\', \'pageview\');
  </script>';
}


