<?php
/**
 * WordPress の基本設定
 *
 * このファイルは、インストール時に wp-config.php 作成ウィザードが利用します。
 * ウィザードを介さずにこのファイルを "wp-config.php" という名前でコピーして
 * 直接編集して値を入力してもかまいません。
 *
 * このファイルは、以下の設定を含みます。
 *
 * * MySQL 設定
 * * 秘密鍵
 * * データベーステーブル接頭辞
 * * ABSPATH
 *
 * @link http://wpdocs.osdn.jp/wp-config.php_%E3%81%AE%E7%B7%A8%E9%9B%86
 *
 * @package WordPress
 */

// 注意:
// Windows の "メモ帳" でこのファイルを編集しないでください !
// 問題なく使えるテキストエディタ
// (http://wpdocs.osdn.jp/%E7%94%A8%E8%AA%9E%E9%9B%86#.E3.83.86.E3.82.AD.E3.82.B9.E3.83.88.E3.82.A8.E3.83.87.E3.82.A3.E3.82.BF 参照)
// を使用し、必ず UTF-8 の BOM なし (UTF-8N) で保存してください。

// ** MySQL 設定 - この情報はホスティング先から入手してください。 ** //
/** WordPress のためのデータベース名 */
define( 'DB_NAME', 'ec_sozai' );

/** MySQL データベースのユーザー名 */
define( 'DB_USER', 'root' );

/** MySQL データベースのパスワード */
define( 'DB_PASSWORD', 'root' );

/** MySQL のホスト名 */
define( 'DB_HOST', 'localhost' );

/** データベースのテーブルを作成する際のデータベースの文字セット */
define( 'DB_CHARSET', 'utf8mb4' );

/** データベースの照合順序 (ほとんどの場合変更する必要はありません) */
define('DB_COLLATE', '');

/**#@+
 * 認証用ユニークキー
 *
 * それぞれを異なるユニーク (一意) な文字列に変更してください。
 * {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org の秘密鍵サービス} で自動生成することもできます。
 * 後でいつでも変更して、既存のすべての cookie を無効にできます。これにより、すべてのユーザーを強制的に再ログインさせることになります。
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         '%7R1?jRbHtQ&g.6c5AC,l>|:^Ed$O?`y54UTr.CT8zQ^?7#Yrlpo5|f.tv5|+b)X' );
define( 'SECURE_AUTH_KEY',  '#T*oty=.4#>o3]f]TQ1Wz6o|6AlSM%M6H?wokrp>`UB*?~L,7% w[7^b&;-[ERyO' );
define( 'LOGGED_IN_KEY',    'W1S;ak5pmmy>:^Jp{b(e#(z*eAi$wta*WoLFNx*D>ve_.jO_6|<G4X5psF5,%zn&' );
define( 'NONCE_KEY',        'L%4W>Nfkl9z`g<)[YFk>9]Q6D0+f)S@ok2xeOT_(o`pfaEB-$Ocg2h_S?WY%HXsi' );
define( 'AUTH_SALT',        'i`o3KhbqZK#>a^eiulK4@pCP)mm{2BAbGl9FJ`;;?hX?7*1.HOLYHgmwvf,0?|XF' );
define( 'SECURE_AUTH_SALT', '4lXx:,ur27_ON:>&MSMWrGN@RCUtCU3~c}+IEnq2EpJBvE(i<-KmVQ/TI13^}4U;' );
define( 'LOGGED_IN_SALT',   'qR;pI}dJK|ypF{`3BKR6K^sg {S[eH]8iV`&AO2Wl)DVGo5p6noL`lQY{pP-G[P}' );
define( 'NONCE_SALT',       'u~T^Po,2Rk>[d+hw=@#/Icx`@ia=Z)3U=JkG6F2*l6pp=?(?D4~q0:5Xb?2a(!cX' );

/**#@-*/

/**
 * WordPress データベーステーブルの接頭辞
 *
 * それぞれにユニーク (一意) な接頭辞を与えることで一つのデータベースに複数の WordPress を
 * インストールすることができます。半角英数字と下線のみを使用してください。
 */
$table_prefix  = 'wp_';

/**
 * 開発者へ: WordPress デバッグモード
 *
 * この値を true にすると、開発中に注意 (notice) を表示します。
 * テーマおよびプラグインの開発者には、その開発環境においてこの WP_DEBUG を使用することを強く推奨します。
 *
 * その他のデバッグに利用できる定数については Codex をご覧ください。
 *
 * @link http://wpdocs.osdn.jp/WordPress%E3%81%A7%E3%81%AE%E3%83%87%E3%83%90%E3%83%83%E3%82%B0
 */
define('WP_DEBUG', true);

/* 編集が必要なのはここまでです ! WordPress でのパブリッシングをお楽しみください。 */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
