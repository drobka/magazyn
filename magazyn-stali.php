<?php
/**
 * Plugin Name:       System K-ERP
 * Description:       System K-ERP – ERP zakładu: magazyn stali, blach i kręgów, dokumenty PZ/WZ, przesyłki, produkcja (zlecenia, paletówki, notatki), magazyn BHP i narzędziownia. Karta zlecenia, historia zmian, import i eksport Excel. Dostęp tylko dla zalogowanych (role: Magazyn – administrator / Magazyn – przeglądający).
 * Version:     2.11.2
 * Requires at least: 6.0
 * Requires PHP:      7.4
 * Author:            Michał Drobka
 * License:           GPL-2.0-or-later
 * Text Domain:       magazyn-stali
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

define( 'MSM_VERSION', '2.11.2' );
define( 'MSM_DB_VERSION', '56' );
define( 'MSM_FILE', __FILE__ );
define( 'MSM_DIR', plugin_dir_path( __FILE__ ) );
define( 'MSM_URL', plugin_dir_url( __FILE__ ) );
// Minimalna wersja wtyczki „Magazyn OCR (biblioteki)”, z którą współpracuje ta wersja magazynu.
define( 'MSM_OCR_MIN', '1.1.0' );

/*
 * Lista plików składowych wtyczki. Ładujemy je w pętli z kontrolą obecności,
 * aby brak pojedynczego pliku (np. po przerwanym rozpakowaniu na serwerze)
 * nie wywalał całej witryny białym ekranem, tylko pokazał czytelny komunikat.
 */
$msm_includes = array(
	'includes/schema.php',
	'includes/class-msm-calc.php',
	'includes/class-msm-repo.php',
	'includes/class-msm-xlsx.php',
	'includes/class-msm-import.php',
	'includes/class-msm-wnioski.php',
	'includes/class-msm-mail.php',
	'includes/class-msm-profile.php',
	'includes/class-msm-print.php',
	'includes/class-msm-wz.php',
	'includes/class-msm-bhp.php',
	'includes/class-msm-bhp-util.php',
	'includes/class-msm-slowniki.php',
	'includes/class-msm-inwentarz.php',
	'includes/class-msm-pz.php',
	'includes/class-msm-rezerwacje.php',
	'includes/class-msm-reports.php',
	'includes/class-msm-logins.php',
	'includes/class-msm-backup.php',
	'includes/class-msm-perms.php',
	'includes/class-msm-settings.php',
	'includes/class-msm-users.php',
	'includes/class-msm-install.php',
	'includes/class-msm-access.php',
	'includes/class-msm-rest.php',
	'includes/class-msm-front.php',
	'includes/class-msm-loginpage.php',
	'includes/class-msm-pwa.php',
	'includes/class-msm-changelog.php',
	'includes/class-msm-prod.php',
	'includes/class-msm-rich.php',
	'includes/class-msm-karta.php',
	'includes/class-msm-tablica.php',
	'includes/class-msm-prod-narz.php',
	'includes/class-msm-prod-pal.php',
	'includes/class-msm-prod-import.php',
	'includes/class-msm-prod-notes.php',
	'includes/class-msm-przesylki.php',
	'includes/class-msm-elektro.php',
	'includes/class-msm-pomiar.php',
	'includes/class-msm-pdf.php',
	'includes/class-msm-zam.php',
	'includes/class-msm-karta-pdf.php',
	'includes/class-msm-ocr-wzory.php',
	'includes/class-msm-karty-zmian.php',
);

$msm_missing = array();
foreach ( $msm_includes as $msm_rel ) {
	$msm_path = MSM_DIR . $msm_rel;
	if ( is_readable( $msm_path ) ) {
		require_once $msm_path;
	} else {
		$msm_missing[] = $msm_rel;
	}
}

// Któregoś pliku brakuje – nie uruchamiamy wtyczki, pokazujemy komunikat w panelu.
if ( ! empty( $msm_missing ) ) {
	add_action( 'admin_notices', function () use ( $msm_missing ) {
		$list = implode( ', ', array_map( 'esc_html', $msm_missing ) );
		echo '<div class="notice notice-error"><p><strong>System K-ERP:</strong> '
			. 'wtyczka nie została uruchomiona, ponieważ brakuje plików: <code>' . $list . '</code>. '
			. 'Najprawdopodobniej wgrywanie na serwer było niekompletne. '
			. 'Wgraj całą wtyczkę ponownie (najlepiej przez FTP / File Manager).</p></div>';
	} );
	return; // Przerywamy ładowanie – reszta WordPressa działa normalnie.
}

register_activation_hook( __FILE__, array( 'MSM_Install', 'activate' ) );
register_deactivation_hook( __FILE__, array( 'MSM_Backup', 'unschedule' ) );

add_action( 'plugins_loaded', array( 'MSM_Install', 'maybe_upgrade' ) );
add_action( 'admin_notices', array( 'MSM_Install', 'dupes_notice' ) );

/** Wersja wtyczki OCR, gdy jest starsza niż wymagana (inaczej false). */
function msm_ocr_outdated() {
	if ( ! has_filter( 'msm_ocr_vendor_url' ) ) {
		return false;
	}
	$v = (string) apply_filters( 'msm_ocr_version', '0' );
	return version_compare( $v, MSM_OCR_MIN, '<' ) ? $v : false;
}

add_action( 'admin_notices', function () {
	$old = msm_ocr_outdated();
	if ( false === $old || ! current_user_can( 'activate_plugins' ) ) {
		return;
	}
	echo '<div class="notice notice-warning"><p><strong>System K-ERP:</strong> '
		. esc_html( sprintf( 'wtyczka „Magazyn OCR (biblioteki)” ma wersję %1$s, a ta wersja System K-ERP wymaga co najmniej %2$s. Wgraj nowszy magazyn-ocr.zip – rozpoznawanie skanów może działać niepoprawnie.', $old, MSM_OCR_MIN ) )
		. '</p></div>';
} );
MSM_Access::init();
MSM_Rest::init();
MSM_Front::init();
MSM_Loginpage::init();
MSM_Pwa::init();
MSM_Changelog::init();
MSM_Prod::init();
MSM_Karta::init();
MSM_Tablica::init();
MSM_Prod_Narz::init();
MSM_Prod_Pal::init();
MSM_Prod_Import::init();
MSM_Prod_Notes::init();
MSM_Przesylki::init();
MSM_Elektro::init();
MSM_Pomiar::init();
MSM_Zam::init();
MSM_Karta_Pdf::init();
MSM_Ocr_Wzory::init();
MSM_Karty_Zmian::init();
MSM_Print::init();
MSM_WZ::init();
MSM_Bhp::init();
MSM_Bhp_Util::init();
MSM_Slowniki::init();
MSM_Inwentarz::init();
MSM_PZ::init();
MSM_Rezerwacje::init();
MSM_Logins::init();
MSM_Backup::init();
