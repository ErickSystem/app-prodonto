<?php
class ApiProdontoController extends AppController {
	public $uses = array(
        'Usuario'    
    );
	  public function get_usuario() {
        header('Access-Control-Allow-Origin: *');
        header('Access-Control-Allow-Methods: *');
        header('Access-Control-Allow-Headers: aplicativo, codigo_cliente');
        header('Access-Control-Allow-Credential: true');
        header('Content-type: application/json');
        App::import('Component','DbbuonnyGuardian');
        $this->loadModel('Usuario');
        $this->layout     = false;
        $this->autoRender = false;
        
        $cnpj = '';
        $token = '';
        $tipo = '';
        $data = $this->params['url'];
        $raw_post = trim(file_get_contents('php://input'));
        $data = json_decode($raw_post, true);
        if(isset($data['email'])){
            $email = $data['email'];
        }else{
            $erro['erro'] = 'Informe um Usuario valido';
            echo json_encode($erro);
            die;
        }
        if(isset($data['senha'])){
            $senha = $data['senha'];
        }else{
            $erro['erro'] = 'Informe uma senha valida';
            echo json_encode($erro);
            die;
        }


        $conditions['Usuario.senha'] = $senha;
        $conditions['Usuario.email'] = $email;

        $usuario = $this->Usuario->localiza_usuario($conditions);
        if(isset($usuario) && !empty($usuario)){
            if(isset($usuario['Usuario']['senha'])){
                unset($usuario['Usuario']['senha']);
                unset($usuario['Usuario']['endereco']);
            }
        	echo json_encode($usuario);
        	die;
        }else{
        	$erro['erro'] = 'Usuario ou senha invalidos';
        	echo json_encode($erro);
        	die;
        }
    }

}
