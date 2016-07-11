<?php
class TesteClass{
	//Verifica a data em que o arquivo foi inserido no servidor
	public function dateInternalContent($file){
		if (file_exists($file)) {
			return [
			"timestamp"	=> filemtime($file),
			"datetime"	=> date("Y-m-d H:i:s", filemtime($file))
			];
		}else{
			throw new Exception("siw_nao_encontrado_arquivo", 55555);
			exit;
		}
	}

	//Caso haja uma alteração no servidor e a imagem seja a mesma, então, a imagem tera uma data superior ao do arquivo colocado
	//assim, será feita a substituição do arquivo.
	public function dateExternalContent($file){
		
		$contents = $this->fileGetContents($file);
		
		foreach($contents as $key => $content){
			if(strpos($content, "Last-Modified:") !== false){
				$lastmodified = $content;
			}
		}

		if($lastmodified){
			$time = explode(",", $lastmodified);
		}else{
			throw new Exception("siw_nao_encontrado_data_de_modificacao", 55555);
			exit;
		}

		return [
			"timestamp"	=> strtotime($time[1]),
			"datetime"	=> date("Y-m-d H:i:s", strtotime($time[1]))
		];
	}

	//Retorna todo o header encontrado do arquivo externo.
	private function fileGetContents($img) {
		//verifica se a url existe
		$file_headers = @get_headers($img);
		if($file_headers[0] == 'HTTP/1.1 404 Not Found') {
			$exists = false;
		}
		else {
			$exists = true;
		}
		
		if(!$exists){
			throw new Exception("siw_nao_encontrado_url", 55555);
			exit;
		}
		
		file_get_contents($img);
		return $http_response_header;
	}
	
	//verifica se o arquivo existe no diretorio,
	//caso nao exista ele faz o download da URL e coloca no diretorio informado
	public function checarImagemRepositorio($img, $dir){
		//$dir = "apps" . DS . "SuperIngresso" . DS . "TemplatesWallet" . DS . "imgs" . DS . $arquivo;
		
		$url = explode("/", $img);
		foreach($url as $key => $separador){
			if(strstr($separador, ".png") or strstr($separador, ".jpg") or strstr($separador, ".jpeg")){
				$arquivo = $separador; 
			}
		}
		
				
		if(!file_exists(BASE_DIR . $caminho)){
			$url = "{$img}";
			$img = "{$caminho}";
			file_put_contents($img, file_get_contents($url));
		}
		
		return $caminho;
		
	}
}