<?php

return array(
	'0' => array(
		'type' => CAuthItem::TYPE_ROLE,
		'description' => 'Sales',
		'bizRule' => null,
		'data' => null
	),
	'1' => array(
		'type' => CAuthItem::TYPE_ROLE,
		'description' => 'Admin',
		'children' => array(
			'Sales',         // позволим админу всё, что позволено модератору
		),
		'bizRule' => null,
		'data' => null
	),
);