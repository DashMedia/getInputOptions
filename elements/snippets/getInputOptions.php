<?php
/**
 * @name getInputOptions
 * @description Example Snippet
 *
 * USAGE
 *
 *  [[getInputOptions? &id=`30`]]
 *
 * Always include an example!
 *
 * Copyright 2014 by You <you@email.com>
 * Created on 10-31-2014
 *
 *
 * Variables
 * ---------
 * @var $modx modX
 * @var $scriptProperties array
 *
 * @package yourpackage
 */

$id = $modx->getOption('id', $scriptProperties, false);
$name = $modx->getOption('name', $scriptProperties, '');
$tpl = $modx->getOption('tpl', $scriptProperties, false);
$toPlaceholder = $modx->getOption('toPlaceholder', $scriptProperties, false);

$output = "";
$tv = null;

if($id){
	$tv = $modx->getObject('modTemplateVar',$id);
} elseif(!empty($name)){
	$tv = $modx->getObject('modTemplateVar', array('name'=>$name));
}

if(empty($tv)){
	return "No template variable found";
}

$optionValuesRaw = $tv->get('elements');

$options = explode('||',$optionValuesRaw);

if($tpl){ //we have an output template
	foreach ($options as $index => $option) {
		$tempOptions = explode('==',$option);
		$tempOptions['label'] = trim($tempOptions[0]);
		$tempOptions['value'] = trim($tempOptions[1]);
		$output .= $modx->getChunk($tpl, $tempOptions);
	}
} else {
	$output = $optionValuesRaw;
}


if($toPlaceholder){
	$modx->toPlaceholder($toPlaceholder, $output);
	return "";
}

return $output;