<?php // Modified for Arabic by Rasheed Bydousi

/** إعدادات برنامج ووردبريس المعرب **/

// ** إعدادات قاعدة البيانات - ينمكنك الحصول على هذه المعلومات من مستضيفك ** //
/** اسم قاعدة بيانات ووردبريس */
define('DB_NAME', 'psd4web_islamic');

/** اسم المستخدم لقاعدة البيانات */
define('DB_USER', 'psd4web_islamic');

/** كلمة المرور لقاعدة البيانات */
define('DB_PASSWORD', 'Fs$Dxw3+dG[T');

/** عنوان خادم قاعدة البيانات */
define('DB_HOST', 'localhost');

/** ترميز قاعدة البيانات */
define('DB_CHARSET', 'utf8');

/** مقارنات قاعدة الببيانات (Collation).
* إذا كنت غير متأكّد أتركها فارغة */
define('DB_COLLATE', '');

/**#@+
 * مفاتيح الأمان.
 * استخدم الرابط التالي لتوليد المفتايح {@link https://api.wordpress.org/secret-key/1.1/salt/}
 * @منذ 2.6.0
 */
define('AUTH_KEY',         ' |RX1 UT#MvUD+LT>#,eUi-p2&nH*!4c^.iO&;txg5z<6//-B`yP]@2kFW@-+p{H');
define('SECURE_AUTH_KEY',  '5F?3b61^?Hvf.VE(rF+g:M#D_GzG+@y,^6}-63v.0/a|lPA@X}[|g_PX%yk>:?(P');
define('LOGGED_IN_KEY',    'HS4WK0[A5whU;$!Q7/!y{16T*Pm:AtUL-,+l?Y*yA!}K]6-5.M>Wc]5-MbO7l.w3');
define('NONCE_KEY',        'euV{5#Q+8O@_wZ::Wn=AY/A(/-s- /#+0(xN~+Pe| -V=je%1ef0D%4aPB+|cD1(');
define('AUTH_SALT',        'Sykn*IsxmkQZ*jvxi-tfn$q%MDN*mL(th+4GI5Y_-izQE-G,HZ^(JnX]*dcP(``?');
define('SECURE_AUTH_SALT', '#X/JxR@l||M;G<|,hJev.Zm6kI.XZ[DF#) m.8gpb4)4ZQ@8Q2fDSad$*x5=27D.');
define('LOGGED_IN_SALT',   'PNDo?m++^* $/D)b/0_6H^$=4 I%+WdFbkPKShi9vNt(A|20tdLK>;Wlgi(w]U;#');
define('NONCE_SALT',       'J=+$Q-b`~ew+ku8,9(?+wntpHgXFyF79Le>+df]>?3t:U7c+S.a841#R~xe]j[]^');


/**#@-*/

/**
 * بادئة الجداول في قاعدة البيانات.
 * تستطيع تركيب أكثر من مدونة على نفس قاعدة البيانات إذا أعطيت لكل قاعدة بادئة جداول مختلفة
 * استخدم فقط حروف, أرقام وخطوط سفلية!
 */
$table_prefix  = 'wp_';

/**
 * للمطورين: نظام تشخيص الأخطاء
 * قم بتغيير flase إلى true لتمكين عرض الملاحظات أثناء التطوير
 */
define('WP_DEBUG', false);

/* هذا هو المطلوب! توقف عن التعديل. نتمنى لك التوفيق في موقعك! */

/** المسار المطلق لمجلد ووردبريس. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');