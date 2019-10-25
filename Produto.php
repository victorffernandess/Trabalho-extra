<?php

abstract class Produto
{
	private $codigo;
	private $preco;
	
	public function setCodigo($newval)
	{
		$this->codigo = $newval;
	}
	public function getCodigo()
	{
		return $this->codigo."<br />";
	}

	public function setPreco($newval)
	{
		$this->preco = $newval;
	}

	public function getPreco(){
		return $this->preco."<br />";
	}

	
	function __construct($codigo, $preco)
	{
		echo "Codigo do protudo ".$codigo."Preço do produto ".$preco;
	}

}

interface Perecivel
{
	public function estaVencido();
}

public class DVD extends Produto
{
	private $titulo;
	private $ano;

	function __construct($titulo, $ano)
	{
		echo "Titulo do DVD ".$titulo."Ano do DVD ".$ano;
	}

	public function setTitulo($newval)
	{
		$this->titulo = $newval;
	}
	public function getTitulo(){
		return $this->titulo."br /";
	}

	public function setAno($newval)
	{
		$this->ano = $newval;
	}

	public function getAno()
	{
		return $this->ano."br /";
	}

}

public class Leite extends Produto implements Perecivel
{
	private $marca;
	private $volume;
	private $dataValidade;

	function __construct($marca, $volume, $dataValidade)
	{
		echo (
			"Digite a marca do leite ".$marca
			."Digite o volume do leite ".$volume
			."Digite a data de validade do leite ".$dataValidade
		);
	}

	public function setMarca($newval){
		$this->marca = $newval;
	}
	public function getMarca(){
		return $this->marca."br /";
	}

	public function setVolume($newval)
	{
		$this->volume = $newval;
	}

	public function getVolume()
	{
		return $this->volume;
	}

	public function setDataValidade($newval)
	{
		$this->dataValidade = $newval;
	}

	public function getDataValidade()
	{
		return $this->dataValidade;
	}

	public function estaVencido()
	{
		$agora = date('Y-m-d');
		$vencimento = $this->dataValidade;

		$ts_agora = strtotime($agora);
		$ts_vencimento = strtotime($vencimento);
		
		if ($ts_agora > $ts_vencimento) {
			return true;
		} else {
			return false;
		}
	}

}

$lista[] = new DVD('Chama no resque', 2018);
$lista[] = new DVD('Circo de soled', 2017);
$lista[] = new DVD('hiiiihiiiiii', 2019);
$lista[] = new DVD('Só no brelelele', 2018);
$lista[] = new Leite('ceasa', 2, '2019-10-23');
$lista[] = new Leite('piracanjuba', 2, '2019-10-27');
$lista[] = new Leite('ceara', 2, '2019-11-09');
$lista[] = new Leite('maria', 2, '2019-11-23');

echo '<pre>';
print_r($lista);
echo '</pre>';

/*public class Perecivel implements Leite{
	$validade = '2019-10-20';



	public function estaVencido(){
		if(strtotime($vencimento)<time()){
			return false;
		}
			else{
				return true;
			}
		}
		
	}*/

