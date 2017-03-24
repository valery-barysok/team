<?php
	$jsonFile = file_get_contents('./SUBMODULE_PATH/common_strings_ru.json');
	$json = json_decode($jsonFile);
	
	$ios_strings = "";
	foreach ($json as $key=>$value)
	{
		$ios_strings.='"'.$key.'" = "'.str_replace('%s', '%@', str_replace('"','\"', str_replace("\n", '\n', $value))).'";'.PHP_EOL;
	}
	$ios_strings = preg_replace('/(\\\\)(u)(\d{4})/', '$1U$3', $ios_strings);
	file_put_contents('./YOUR_PROJECT_NAME/Resources/Base.lproj/Localizable.strings', $ios_strings);

	$ios_swift_strings = 'import Foundation'.PHP_EOL.PHP_EOL.'extension String {'.PHP_EOL;
	foreach ($json as $key=>$value)
	{
		$value_without_linefeed = preg_replace("/\r|\n/", " ", $value);
		$ios_swift_strings .= "\t/// ".$value_without_linefeed."\n\t".'static let '.preg_replace_callback('/_(.?)/', function ($m) { return strtoupper($m[1]); }, $key).' = "'.$key.'".localized()'."\n".PHP_EOL;
	}
	$ios_swift_strings .= '}'.PHP_EOL;
	file_put_contents('./YOUR_PROJECT_NAME/Resources/String+Localization.swift', $ios_swift_strings);
?>
