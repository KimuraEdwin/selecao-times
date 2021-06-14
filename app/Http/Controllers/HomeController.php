<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Jogador;

class HomeController extends Controller
{

    public $jogPresentes = [];
    public $jogNome = [];
    public $jogGoleiro = [];
    public $a = 0;
    public $b = 0;
    public $timeA = [];
    public $timeB = [];

    public function __construct(Jogador $jogador){
        $this->jogador = $jogador;
    }

    public function index(){
        return view('index', ['jogadores' => $this->jogador->all()]);
    }

    public function sorteio(Request $request){
        $jogadores = $request->all();
        $info = array_splice($jogadores,0,2);
        shuffle($jogadores);

        foreach($jogadores as $jogador){
            array_push($this->jogPresentes, $this->jogador->find($jogador));
            array_push($this->jogGoleiro, $this->jogador->find($jogador));
        }
        

        $this->jogGoleiro = array_filter($this->jogPresentes, function($goleiro){
            return $goleiro->goleiro == 1 ;
        });

        $this->jogNome = array_filter($this->jogPresentes, function($goleiro){
            return $goleiro->goleiro == 0 ;
        });

        rsort($this->jogGoleiro);
        rsort($this->jogNome);

        foreach($this->jogGoleiro as $goleiro){
            array_pop($this->jogGoleiro);
            array_unshift($this->jogGoleiro, $goleiro->nome);
        }
        foreach($this->jogNome as $nonGoleiro){
            array_pop($this->jogNome);
            array_unshift($this->jogNome, $nonGoleiro->nome);
        }

        $aux = count($jogadores);

        if($aux/2 >= $info['qtd']){
            $timesCompletos = floor($aux / $info['qtd']);
            $totalTime = floor($aux / $info['qtd']);
            $reserva = $aux % $info['qtd'];
            $times = [];
            $auxJogadores = $timesCompletos*$info['qtd'];
            $aux = $aux-($timesCompletos*$info['qtd']);


            if($reserva > 0){
                $totalTime = $totalTime + 1;
            }

            if(count($this->jogGoleiro) >= $timesCompletos){
                for($i=1 ; $i <= $totalTime; $i++){
                    $times += [ $i-1 => []]; 
                }

                if($totalTime >= $timesCompletos){
                    while($auxJogadores > 0){
                        for($b=1; $b <= $timesCompletos; $b++){
                            if($jogadores != null){
                                if($times[$b-1] == null){
                                    array_push($times[$b-1], array_splice($this->jogGoleiro, 0,1));
                                }
                                else{
                                    array_push($times[$b-1], array_splice($this->jogNome, 0,1));
                                }
                            }
                        }
                    
                        $auxJogadores = $auxJogadores-2;
                    }
                    while($aux > 0){
                        for($c=3; $c <= $totalTime; $c++){
                            
                            if($jogadores != null){
                                if(($times[$c-1] == null) && ($this->jogGoleiro != null)){
                                    array_push($times[$c-1], array_splice($this->jogGoleiro, 0,1));
                                }
                                else{
                                    array_push($times[$c-1], array_splice($this->jogNome, 0,1));
                                }
                            }
                        }
                        $aux = $aux-(count($times)-2);
                    }
                }
            }
            else{
                return redirect()->route('erro', ['msg' => 'Não há goleiros suficientes.']);
            }

            
        }
        else{
           
            return redirect()->route('erro', ['msg' => 'Números de jogadores presentes abaixo do esperado.']);
        }
        return redirect()->route('sorteado', ['times' => json_encode($times)]);    
    }

    public function sorteado($times){
        $parser = json_decode($times,true);
        return view('sorteio', ['times' => $parser]);
    }

    public function sorteioIndefinido($msg){
        return view('sorteio_indefinido', ['msg' => $msg]);
    }
}
