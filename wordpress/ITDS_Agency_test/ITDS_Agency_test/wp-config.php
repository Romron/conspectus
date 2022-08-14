<?php
/**
 * Основные параметры WordPress.
 *
 * Скрипт для создания wp-config.php использует этот файл в процессе установки.
 * Необязательно использовать веб-интерфейс, можно скопировать файл в "wp-config.php"
 * и заполнить значения вручную.
 *
 * Этот файл содержит следующие параметры:
 *
 * * Настройки базы данных
 * * Секретные ключи
 * * Префикс таблиц базы данных
 * * ABSPATH
 *
 * @link https://ru.wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Параметры базы данных: Эту информацию можно получить у вашего хостинг-провайдера ** //
/** Имя базы данных для WordPress */
define( 'DB_NAME', 'itds_agency_test' );

/** Имя пользователя базы данных */
define( 'DB_USER', 'root' );

/** Пароль к базе данных */
define( 'DB_PASSWORD', '' );

/** Имя сервера базы данных */
define( 'DB_HOST', 'localhost' );

/** Кодировка базы данных для создания таблиц. */
define( 'DB_CHARSET', 'utf8mb4' );

/** Схема сопоставления. Не меняйте, если не уверены. */
define( 'DB_COLLATE', '' );

/**#@+
 * Уникальные ключи и соли для аутентификации.
 *
 * Смените значение каждой константы на уникальную фразу. Можно сгенерировать их с помощью
 * {@link https://api.wordpress.org/secret-key/1.1/salt/ сервиса ключей на WordPress.org}.
 *
 * Можно изменить их, чтобы сделать существующие файлы cookies недействительными.
 * Пользователям потребуется авторизоваться снова.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         'aEx`iC^4y1jS!7O@Cmh6:`%C?-DDqnn0hn$pK>gF`.P?.xlgI[ 6}Uv!n9V+IjE8' );
define( 'SECURE_AUTH_KEY',  'Z!dTG> 2c~T+WZhYZjrt.qZx1VLQu<g_#gP<ML6+rQ9/91nsH}uWvtFqWlW/P[{j' );
define( 'LOGGED_IN_KEY',    'K/KURR ;-h(}%;3BQH^;s}&AdCh$0sWJzscwHC!G0O!+.u&($IF[S>u1C[&}^S{Q' );
define( 'NONCE_KEY',        ':gI,el}uKD+{cs$TPKfYXR[Rr`~v3:1(_6M=32slDQ<x,[i_nm7B(.f0/c9>8@5R' );
define( 'AUTH_SALT',        'xNOmJ*6Ib1DBzOh=WxEAHvJPIx$6NnExXw+^LWZJ0^1zvs7wVmiB<E9qM6 p@<@u' );
define( 'SECURE_AUTH_SALT', 'zh/~Ne$oEj.-S.l7h4_te*/)1Jz6nRq;u2`Y7-jq*%{*n=k70o+hD-aYjp3l?3:A' );
define( 'LOGGED_IN_SALT',   '1Mk~2`P&=2j!{Y;a=]@E-yRjB(<*f^4QlP5QZ&cWk 1^>rhy~mjfIGJY_i&D28bB' );
define( 'NONCE_SALT',       'hO>L;T#gex_G]sMDc|A0kJ(mR>0=H-B!`UF|,fNX8x.Ak,1# 1}HWxx}/;Yv.?lK' );

/**#@-*/

/**
 * Префикс таблиц в базе данных WordPress.
 *
 * Можно установить несколько сайтов в одну базу данных, если использовать
 * разные префиксы. Пожалуйста, указывайте только цифры, буквы и знак подчеркивания.
 */
$table_prefix = 'wp_itds_';

/**
 * Для разработчиков: Режим отладки WordPress.
 *
 * Измените это значение на true, чтобы включить отображение уведомлений при разработке.
 * Разработчикам плагинов и тем настоятельно рекомендуется использовать WP_DEBUG
 * в своём рабочем окружении.
 *
 * Информацию о других отладочных константах можно найти в документации.
 *
 * @link https://ru.wordpress.org/support/article/debugging-in-wordpress/
 */
define( 'WP_DEBUG', false );

/* Произвольные значения добавляйте между этой строкой и надписью "дальше не редактируем". */



/* Это всё, дальше не редактируем. Успехов! */

/** Абсолютный путь к директории WordPress. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Инициализирует переменные WordPress и подключает файлы. */
require_once ABSPATH . 'wp-settings.php';
