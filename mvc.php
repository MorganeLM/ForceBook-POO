<?php

function model() {
	return [
		["name" => "John"],
		["name" => "Jane"],
	];
}

function view(array $datas) {
	foreach($datas as $data) {
		echo $data['name'] . "<br />";
	}
}

function controller() {
	$datas = model();
	view($datas);
}

controller();