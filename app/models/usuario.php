<?php
class Usuario extends AppModel {
	var $name = 'Usuario';
	var $useTable = 'Usuario';
	var $primaryKey = 'idUsuario';

	function localiza_usuario($conditions){
		return $this->find('first', compact('conditions'));
	}
}
