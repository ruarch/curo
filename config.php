<?php
/**********DATABASE*************/

/** MySQL database name */
define('DB_NAME', 'curo');
/** MySQL database username */
define('DB_USER', 'root');
/** MySQL database password */
define('DB_PASSWORD', '');
/** MySQL hostname */
define('DB_HOST', 'localhost');
/** Site name */
define('SITE_NAME', 'CURO');

/******************************/
define('BASE_URL', '/curo');
define('ADMIN_FOLDER', '/admin');
define('INFO_EMAIL', 'info@ruarch.net');


/**********FOLDERS*************/

/** section image folder */
define('SECTION_IMAGES_FOLDER', '../media/sections/');
/** section banners folder */
define('SECTION_BANNERS_FOLDER', '../media/sections/banners/');
/** category image folder */
define('CATEGORY_IMAGES_FOLDER', '../media/categories/');
/** content image folder */
define('CONTENT_IMAGES_FOLDER', '../media/content/images/');
/** content audio folder */
define('CONTENT_AUDIOS_FOLDER', '../media/content/audios/');
/** content image folder */
define('CONTENT_VIDEOS_FOLDER', '../media/content/videos/');
/** slides folder */
define('SLIDES_FOLDER', '../media/slides/');
/** gallery folder */
define('GALLERY_FOLDER', '../media/gallery/');
/** Events folder */
define('EVENTS_FOLDER', '../media/events/');
/** other content file folder */
define('CON_IMAGES_FOLDER', '../media/con_image/');
/** other content file folder */
define('CONTENT_OTHER_FILE_FOLDER', '../media/content/files/');


/******************************/
date_default_timezone_set("GMT");
?>