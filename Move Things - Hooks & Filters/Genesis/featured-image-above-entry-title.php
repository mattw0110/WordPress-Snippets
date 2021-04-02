<?php
// Genesis Sample Theme
// Featured Image Above Entry Title
remove_action( 'genesis_entry_content', 'genesis_do_singular_image', 8 );
add_action( 'genesis_entry_header', 'genesis_do_singular_image', 1 );