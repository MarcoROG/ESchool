<?php

return [

	/*
	|--------------------------------------------------------------------------
	| Validation Language Lines
	|--------------------------------------------------------------------------
	|
	| The following language lines contain the default error messages used by
	| the validator class. Some of these rules have multiple versions such
	| as the size rules. Feel free to tweak each of these messages here.
	|
	*/

	"accepted"             => "È necessario accettare il campo :attribute.",
	"active_url"           => "The :attribute is not a valid URL.",
	"after"                => ":attribute dev'essere una data successiva al :date.",
	"alpha"                => ":attribute può contenere soltanto lettere.",
	"alpha_dash"           => ":attribute può contenere soltanto lettere, numeri e trattini.",
	"alpha_num"            => ":attribute può contenere solo lettere e numeri.",
	"array"                => ":attribute dev'essere un array.",
	"before"               => ":attribute dev'essere una data precedente al :date.",
	"between"              => [
		"numeric" => ":attribute dev'esser compreso tra :min e :max.",
		"file"    => ":attribute dev'esser compreso tra :min e :max kilobytes.",
		"string"  => ":attribute dev'esser compreso tra :min e :max caratteri.",
		"array"   => ":attribute deve avere un numero di elementi compreso tra :min e :max.",
	],
	"boolean"              => ":attribute dev'essere vero o falso.",
	"confirmed"            => ":attribute dev'essere confermato.",
	"date"                 => ":attribute non è una data valida.",
	"date_format"          => ":attribute non rispetta il formato :format.",
	"different"            => ":attribute e :other devono essere diversi.",
	"digits"               => ":attribute deve avere :digits cifre.",
	"digits_between"       => ":attribute deve avere tra :min e :max cifre.",
	"email"                => "Il campo :attribute deve contenere un indirizzo email.",
	"filled"               => "Il campo :attribute è richiesto.",
	"exists"               => ":attribute non è un campo valido.",
	"image"                => ":attribute dev'essere un'immagine.",
	"in"                   => "The selected :attribute is invalid.",
	"integer"              => ":attribute dev'essere un numero intero.",
	"ip"                   => ":attribute dev'essere un indirizzo IP valido.",
	"max"                  => [
		"numeric" => ":attribute non può essere più grande di :max.",
		"file"    => ":attribute non può essere più grande di :max kilobytes.",
		"string"  => ":attribute non può avere più di :max caratteri.",
		"array"   => ":attribute non può avere più di :max elementi.",
	],
	"mimes"                => ":attribute dev'essere un file di tipo: :values.",
	"min"                  => [
		"numeric" => ":attribute non può essere più piccolo di :min.",
		"file"    => ":attribute non può essere più piccolo di :min kilobytes.",
		"string"  => ":attribute non può avere meno di :min caratteri.",
		"array"   => ":attribute non può avere meno di :min elementi.",
	],
	"not_in"               => "The selected :attribute is invalid.",
	"numeric"              => ":attribute dev'essere un numero.",
	"regex"                => "Il formato di :attribute non è valido.",
	"required"             => "Non hai compilato il campo :attribute.",
	"required_if"          => "The :attribute field is required when :other is :value.",
	"required_with"        => "The :attribute field is required when :values is present.",
	"required_with_all"    => "The :attribute field is required when :values is present.",
	"required_without"     => "The :attribute field is required when :values is not present.",
	"required_without_all" => "The :attribute field is required when none of :values are present.",
	"same"                 => ":attribute e :other devono essere uguali.",
	"size"                 => [
		"numeric" => ":attribute deve valere :size.",
		"file"    => ":attribute deve pesare :size kilobytes.",
		"string"  => ":attribute deve avere :size caratteri.",
		"array"   => ":attribute deve contenere :size elementi.",
	],
	"unique"               => ":attribute dev'essere unico ed è già stato utilizzato.",
	"url"                  => "Il formato di :attribute è invalido.",
	"timezone"             => ":attribute dev'essere un fuso orario valido.",

	/*
	|--------------------------------------------------------------------------
	| Custom Validation Language Lines
	|--------------------------------------------------------------------------
	|
	| Here you may specify custom validation messages for attributes using the
	| convention "attribute.rule" to name the lines. This makes it quick to
	| specify a specific custom language line for a given attribute rule.
	|
	*/

	'custom' => [
		'attribute-name' => [
			'rule-name' => 'custom-message',
		],
	],

	/*
	|--------------------------------------------------------------------------
	| Custom Validation Attributes
	|--------------------------------------------------------------------------
	|
	| The following language lines are used to swap attribute place-holders
	| with something more reader friendly such as E-Mail Address instead
	| of "email". This simply helps us make messages a little cleaner.
	|
	*/
//TODO: fill in these fields
	'attributes' => [],

];
