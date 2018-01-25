<?php

/* mCMS
 * A first CMS by Micki 
 * -------------------------
 * Copyright (C) by Micki
 * Copyright reserved!
 *
 */

$configtable = dbSelect('*','cms_config');
while($config = $configtable->fetch_assoc()){
	$array = explode('-', $config['config']);
	$_CONFIG[$array[0]][$array[1]] = $config['option'];
}

// Housekeeping
$_CONFIG['housekeeping']['rank'] = '6';
$_CONFIG['housekeeping']['url'] = '/intern/housekeeping';
$_CONFIG['housekeeping']['name'] = $_CONFIG['website']['name'].' Housekeeping';
$_CONFIG['housekeeping']['footer'] = 'Housekeeping by Hobba - Version 1.0.0<br/><i>Template: AdminLTE</i>';
// Housekeeping - Rights - ab welchen Rank
$_CONFIG['housekeeping']['right']['dashboard'] = '6'; // Dashboard
$_CONFIG['housekeeping']['right']['dashboard.delalltask'] = '10'; // Dashboard: alle Aufgaben löschbar
$_CONFIG['housekeeping']['right']['dashboard.delallchat'] = '10'; // Dashboard: alle Chatsverlauf löschbar
$_CONFIG['housekeeping']['right']['dashboard.calendar'] = '7'; // Dashboard: Kalender
$_CONFIG['housekeeping']['right']['dashboard.calendar.changeall'] = '9'; // Dashboard: Kalender - alles änderbar
$_CONFIG['housekeeping']['right']['rules'] = '7'; // Regeln
$_CONFIG['housekeeping']['right']['timeline'] = '10'; // Timeline
$_CONFIG['housekeeping']['right']['commands'] = '7'; // Commandliste
$_CONFIG['housekeeping']['right']['statistik'] = '7'; // Statistik: User, Räume & Online
$_CONFIG['housekeeping']['right']['system'] = '10'; // System
$_CONFIG['housekeeping']['right']['system.config'] = '14'; // System: Config
$_CONFIG['housekeeping']['right']['system.server'] = '14'; // System: Server
$_CONFIG['housekeeping']['right']['system.datenbank'] = '14'; // System: Datenbank
$_CONFIG['housekeeping']['right']['system.clean'] = '14'; // System: Datensätze leeren
$_CONFIG['housekeeping']['right']['events'] = '7'; // Eventkalender
$_CONFIG['housekeeping']['right']['events.change'] = '9'; // Eventkalender: Änderungen
$_CONFIG['housekeeping']['right']['homepage'] = '6'; // Homepage
$_CONFIG['housekeeping']['right']['homepage.support'] = '6'; // Homepage: Support
$_CONFIG['housekeeping']['right']['homepage.support.del'] = '10'; // Homepage: Support löschen
$_CONFIG['housekeeping']['right']['homepage.lotto'] = '10'; // Homepage: Lotto
$_CONFIG['housekeeping']['right']['homepage.badgeshop'] = '9'; // Homepage: Badgeshop
$_CONFIG['housekeeping']['right']['homepage.shop'] = '10'; // Homepage: Shop Bearbeitung
$_CONFIG['housekeeping']['right']['homepage.shoppurchase'] = '10'; // Homepage: Shop Bestellungen
$_CONFIG['housekeeping']['right']['news'] = '7'; // News
$_CONFIG['housekeeping']['right']['news.delall'] = '10'; // Alle News löschen
$_CONFIG['housekeeping']['right']['news.editall'] = '7'; // Alle News bearbeiten
$_CONFIG['housekeeping']['right']['news.survey'] = '7'; // News Umfrage
$_CONFIG['housekeeping']['right']['news.survey.editall'] = '9'; // News Umfrage Bearbeitung
$_CONFIG['housekeeping']['right']['client'] = '6'; // Client
$_CONFIG['housekeeping']['right']['client.config'] = '14'; // Client: Config
$_CONFIG['housekeeping']['right']['client.furni'] = '6'; // Client: Möbel
$_CONFIG['housekeeping']['right']['client.rooms'] = '8'; // Client: Räume
$_CONFIG['housekeeping']['right']['client.rooms.edit'] = '10'; // Client: Räume bearbeiten
$_CONFIG['housekeeping']['right']['client.bot'] = '7'; // Client: Bot
$_CONFIG['housekeeping']['right']['client.code'] = '7'; // Client: Vouchercode
$_CONFIG['housekeeping']['right']['client.code.dias'] = '9'; // Client: Vouchercode - Dias
$_CONFIG['housekeeping']['right']['client.survey'] = '8'; // Client: Umfragen
$_CONFIG['housekeeping']['right']['client.filter'] = '10'; // Client: Wordfilter
$_CONFIG['housekeeping']['right']['client.filter.antiwerber'] = '10'; // Client: Wordfilter - AntiWerber
$_CONFIG['housekeeping']['right']['client.badges'] = '7'; // Client: Badgebeschriftungen
$_CONFIG['housekeeping']['right']['client.emutask'] = '10'; // Client: Emulator Commands
$_CONFIG['housekeeping']['right']['client.autorare'] = '10'; // Client: Automatische Rareänderung
$_CONFIG['housekeeping']['right']['user'] = '6'; // User
$_CONFIG['housekeeping']['right']['user.list'] = '6'; // User: Liste
$_CONFIG['housekeeping']['right']['user.edit'] = '6'; // User: Bearbeitung
$_CONFIG['housekeeping']['right']['user.edit.disconnect'] = '9'; // User: Bearbeitung: Disconnect
$_CONFIG['housekeeping']['right']['user.info'] = '6'; // User: Informationen
$_CONFIG['housekeeping']['right']['user.ban'] = '6'; // User: Bann
$_CONFIG['housekeeping']['right']['user.clon'] = '6'; // User: Klon
$_CONFIG['housekeeping']['right']['user.badgetool'] = '7'; // User: Badgetool
$_CONFIG['housekeeping']['right']['user.mass'] = '9'; // User: Massensenden
$_CONFIG['housekeeping']['right']['user.currency'] = '7'; // User: Währungen
$_CONFIG['housekeeping']['right']['user.currency.credits'] = '7'; // User: Währungen: Taler
$_CONFIG['housekeeping']['right']['user.currency.pixels'] = '7'; // User: Währungen: Duckets/Pixel
$_CONFIG['housekeeping']['right']['user.currency.dias'] = '8'; // User: Währungen: Diamanten
$_CONFIG['housekeeping']['right']['user.vip'] = '9'; // User: VIP
$_CONFIG['housekeeping']['right']['user.change.name'] = '9'; // User: Name ändern
$_CONFIG['housekeeping']['right']['user.change.password'] = '10'; // User: Passwort ändern
$_CONFIG['housekeeping']['right']['logs'] = '7'; // Logs
$_CONFIG['housekeeping']['right']['logs.login'] = '7'; // Logs: Login
$_CONFIG['housekeeping']['right']['logs.ban'] = '7'; // Logs: Bann
$_CONFIG['housekeeping']['right']['logs.chat'] = '6'; // Logs: Chat
$_CONFIG['housekeeping']['right']['logs.commands'] = '8'; // Logs: Commands
$_CONFIG['housekeeping']['right']['logs.rooms'] = '7'; // Logs: Räume
$_CONFIG['housekeeping']['right']['logs.housekeeping'] = '10'; // Logs: Housekeeping

// System
$_CONFIG['system']['hash_secret'] = 'xCg532%@%gdvf^5DGaa10&*rFTfg^FD4\$OIFThrR_gh(ugf*/';
$_CONFIG['system']['debug'] = false;

?>