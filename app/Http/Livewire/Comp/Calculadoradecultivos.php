<?php

namespace App\Http\Livewire\Comp;

use Livewire\Component;

class Calculadoradecultivos extends Component
{
    //variables de uso general
    public $premium = false, $foco = false, $bono = false, $parcelas;

    //variables de producto
    public $carrotseed, $carrot;
    public $beanseed, $bean;
    public $wheatseed, $wheat;
    public $turnipseed, $turnip;
    public $cabbageseed, $cabbage;
    public $potatoseed, $potato;
    public $cornseed, $corn;
    public $punpkinseed, $punpkin;
  

    public function render()
    {
        if ($this->parcelas == null) {
            $this->parcelas = 1;
        };

        if ($this->carrotseed == null) {
            $this->carrotseed = 0;
        };

        if ($this->carrot == null) {
            $this->carrot = 0;
        };

        if ($this->beanseed == null) {
            $this->beanseed = 0;
        };

        if ($this->bean == null) {
            $this->bean = 0;
        };

        if ($this->wheatseed == null) {
            $this->wheatseed = 0;
        };

        if ($this->wheat == null) {
            $this->wheat = 0;
        };

        if ($this->turnipseed == null) {
            $this->turnipseed = 0;
        };

        if ($this->turnip == null) {
            $this->turnip = 0;
        };

        if ($this->cabbageseed == null) {
            $this->cabbageseed = 0;
        };

        if ($this->cabbage == null) {
            $this->cabbage = 0;
        };

        if ($this->potatoseed == null) {
            $this->potatoseed = 0;
        };

        if ($this->potato == null) {
            $this->potato = 0;
        };

        if ($this->cornseed == null) {
            $this->cornseed = 0;
        };

        if ($this->corn == null) {
            $this->corn = 0;
        };

        if ($this->punpkinseed == null) {
            $this->punpkinseed = 0;
        };

        if ($this->punpkin == null) {
            $this->punpkin = 0;
        };

        //calcular el valor de los impuestos
        $imp = $this->impuestos($this->premium);

        $r_carrot = $this->cal_carrot($this->carrotseed, $this->carrot);

        $r_bean = $this->cal_bean($this->beanseed, $this->bean);

        $r_wheat = $this->cal_wheat($this->wheatseed, $this->wheat);

        $r_turnip = $this->cal_turnip($this->turnipseed, $this->turnip);

        $r_cabbage = $this->cal_cabbage($this->cabbageseed, $this->cabbage);

        $r_potato = $this->cal_potato($this->potatoseed, $this->potato);

        $r_corn = $this->cal_corn($this->cornseed, $this->corn);

        $r_punpkin = $this->cal_punpkin($this->punpkinseed, $this->punpkin);

        return view('livewire.comp.calculadoradecultivos',[            
            'imp' => $imp,
            'r_carrot' => $r_carrot,
            'r_bean' => $r_bean,
            'r_wheat' => $r_wheat,
            'r_turnip' => $r_turnip,
            'r_cabbage' => $r_cabbage,
            'r_potato' => $r_potato,
            'r_corn' => $r_corn,
            'r_punpkin' => $r_punpkin,
        ]);
    }

    /**
     * Función para el cálculo de los Impuestos
     * 
     */
    public function impuestos($premium)
    {
        $this->validate([ 
            'premium' => 'required|boolean'
        ]);

        if ($this->premium == true) {
            $impuesto = 6.5;
        } else {
            $impuesto = 10.5;
        }

        return $impuesto;
        
    }

    /**
     * Función para el cálculo de zanahorias
     * 
     */
    public function cal_carrot()
    {
        $v = $this->validate([ 
            'premium' => 'required|boolean',
            'foco' => 'required|boolean',
            'bono' => 'required|boolean',
            'parcelas' => 'numeric',
            'carrotseed' => 'numeric|nullable',
            'carrot' => 'numeric|nullable',
        ]);

        //calcular el valor de los impuestos
        $imp = $this->impuestos($this->premium);

        //retorno de semillas
        if ($this->foco == true) {
            //porcentaje de retorno en el caso de las zanahorias es 200%
            $retorno = 200;

            //semillas regresadas
            $r_semillas = $this->parcelas * 9 * $retorno /100; 
        } else {
            //porcentaje de retorno
            $retorno = 0;
            //semillas regresadas
            $r_semillas = $this->parcelas * 9 * $retorno; 
        }

        if ($this->premium == true) {
            if ($this->bono == true) {

                $sec_a = 9.9 * $this->parcelas * 9 * $this->carrot * (1-($imp/100)) + ($this->carrotseed * $r_semillas);
                $sec_b = $this->carrotseed * 9 * $this->parcelas;
                $profit = round($sec_a - $sec_b);
            } else {
                $sec_a = 9 * $this->parcelas * 9 * $this->carrot * (1-($imp/100)) + ($this->carrotseed * $r_semillas);
                $sec_b = $this->carrotseed * 9 * $this->parcelas;
                $profit = round($sec_a - $sec_b);
            }
        } else {
            if ($this->bono == true) {
                $sec_a = (9.9/2) * $this->parcelas * 9 * $this->carrot * (1-($imp/100)) + ($this->carrotseed * $r_semillas);
                $sec_b = $this->carrotseed * 9 * $this->parcelas;
                $profit = round($sec_a - $sec_b);
            } else {
                $sec_a = (9/2) * $this->parcelas * 9 * $this->carrot * (1-($imp/100)) + ($this->carrotseed * $r_semillas);
                $sec_b = $this->carrotseed * 9 * $this->parcelas;
                $profit = round($sec_a - $sec_b);
            }
        }

        $info = [
            'retorno' => $retorno,
            'r_semillas' => $r_semillas,
            'profit' => $profit
        ];

        return $info;
    }

    /**
     * Función para el cálculo de frijol
     * 
     */
    public function cal_bean()
    {
        $v = $this->validate([ 
            'premium' => 'required|boolean',
            'foco' => 'required|boolean',
            'bono' => 'required|boolean',
            'parcelas' => 'numeric',
            'beanseed' => 'numeric|nullable',
            'bean' => 'numeric|nullable',
        ]);

        //calcular el valor de los impuestos
        $imp = $this->impuestos($this->premium);

        //retorno de semillas
        if ($this->foco == true) {
            //porcentaje de retorno en el caso de las frijol es 166.3%
            $retorno = 166.3;

            //semillas regresadas
            $sem = $this->parcelas * 9 * $retorno/100;
            $r_semillas = round($sem); 
        } else {
            //porcentaje de retorno en el caso de las frijol es 33.3%
            $retorno = 33.3;
            //semillas regresadas
            $sem = $this->parcelas * 9 * $retorno/100;
            $r_semillas = round($sem);
        }

        if ($this->premium == true) {
            if ($this->bono == true) {

                $sec_a = 9.9 * $this->parcelas * 9 * $this->bean * (1-($imp/100)) + ($this->beanseed * $sem);
                $sec_b = $this->beanseed * 9 * $this->parcelas;
                $profit = round($sec_a - $sec_b);
            } else {
                $sec_a = 9 * $this->parcelas * 9 * $this->bean * (1-($imp/100)) + ($this->beanseed * $sem);
                $sec_b = $this->beanseed * 9 * $this->parcelas;
                $profit = round($sec_a - $sec_b);
            }
        } else {
            if ($this->bono == true) {
                $sec_a = (9.9/2) * $this->parcelas * 9 * $this->bean * (1-($imp/100)) + ($this->beanseed * $sem);
                $sec_b = $this->beanseed * 9 * $this->parcelas;
                $profit = round($sec_a - $sec_b);
            } else {
                $sec_a = (9/2) * $this->parcelas * 9 * $this->bean * (1-($imp/100)) + ($this->beanseed * $sem);
                $sec_b = $this->beanseed * 9 * $this->parcelas;
                $profit = round($sec_a - $sec_b);
            }
        }

        $info = [
            'retorno' => $retorno,
            'r_semillas' => $r_semillas,
            'profit' => $profit
        ];

        return $info;
    }

    /**
     * Función para el cálculo de trigo
     * 
     */
    public function cal_wheat()
    {
        $v = $this->validate([ 
            'premium' => 'required|boolean',
            'foco' => 'required|boolean',
            'bono' => 'required|boolean',
            'parcelas' => 'numeric',
            'wheatseed' => 'numeric|nullable',
            'wheat' => 'numeric|nullable',
        ]);

        //calcular el valor de los impuestos
        $imp = $this->impuestos($this->premium);

        //retorno de semillas
        if ($this->foco == true) {
            //porcentaje de retorno en el caso de las trigo es 140%
            $retorno = 140;

            //semillas regresadas
            $sem = $this->parcelas * 9 * $retorno /100;
            $r_semillas = round($sem); 
        } else {
            //porcentaje de retorno en el caso de las trigo es 60%
            $retorno = 60;
            //semillas regresadas
            $sem = $this->parcelas * 9 * $retorno/100;
            $r_semillas = round($sem); 
        }

        if ($this->premium == true) {
            if ($this->bono == true) {

                $sec_a = 9.9 * $this->parcelas * 9 * $this->wheat * (1-($imp/100)) + ($this->wheatseed * $sem);
                $sec_b = $this->wheatseed * 9 * $this->parcelas;
                $profit = round($sec_a - $sec_b);
            } else {
                $sec_a = 9 * $this->parcelas * 9 * $this->wheat * (1-($imp/100)) + ($this->wheatseed * $sem);
                $sec_b = $this->wheatseed * 9 * $this->parcelas;
                $profit = round($sec_a - $sec_b);
            }
        } else {
            if ($this->bono == true) {
                $sec_a = (9.9/2) * $this->parcelas * 9 * $this->wheat * (1-($imp/100)) + ($this->wheatseed * $sem);
                $sec_b = $this->wheatseed * 9 * $this->parcelas;
                $profit = round($sec_a - $sec_b);
            } else {
                $sec_a = (9/2) * $this->parcelas * 9 * $this->wheat * (1-($imp/100)) + ($this->wheatseed * $sem);
                $sec_b = $this->wheatseed * 9 * $this->parcelas;
                $profit = round($sec_a - $sec_b);
            }
        }

        $info = [
            'retorno' => $retorno,
            'r_semillas' => $r_semillas,
            'profit' => $profit
        ];

        return $info;
    }

    /**
     * Función para el cálculo de rábano
     * 
     */
    public function cal_turnip()
    {
        $v = $this->validate([ 
            'premium' => 'required|boolean',
            'foco' => 'required|boolean',
            'bono' => 'required|boolean',
            'parcelas' => 'numeric',
            'turnipseed' => 'numeric|nullable',
            'turnip' => 'numeric|nullable',
        ]);

        //calcular el valor de los impuestos
        $imp = $this->impuestos($this->premium);

        //retorno de semillas
        if ($this->foco == true) {
            //porcentaje de retorno en el caso de las rábano es 126%
            $retorno = 126;

            //semillas regresadas
            $sem = $this->parcelas * 9 * $retorno/100;
            $r_semillas = round($sem);
        } else {
            //porcentaje de retorno en el caso de las rábano es 73.3%
            $retorno = 73.3;
            //semillas regresadas
            $sem = $this->parcelas * 9 * $retorno/100;
            $r_semillas = round($sem);
        }

        if ($this->premium == true) {
            if ($this->bono == true) {

                $sec_a = 9.9 * $this->parcelas * 9 * $this->turnip * (1-($imp/100)) + ($this->turnipseed * $sem);
                $sec_b = $this->turnipseed * 9 * $this->parcelas;
                $profit = round($sec_a - $sec_b);
            } else {
                $sec_a = 9 * $this->parcelas * 9 * $this->turnip * (1-($imp/100)) + ($this->turnipseed * $sem);
                $sec_b = $this->turnipseed * 9 * $this->parcelas;
                $profit = round($sec_a - $sec_b);
            }
        } else {
            if ($this->bono == true) {
                $sec_a = (9.9/2) * $this->parcelas * 9 * $this->turnip * (1-($imp/100)) + ($this->turnipseed * $sem);
                $sec_b = $this->turnipseed * 9 * $this->parcelas;
                $profit = round($sec_a - $sec_b);
            } else {
                $sec_a = (9/2) * $this->parcelas * 9 * $this->turnip * (1-($imp/100)) + ($this->turnipseed * $sem);
                $sec_b = $this->turnipseed * 9 * $this->parcelas;
                $profit = round($sec_a - $sec_b);
            }
        }

        $info = [
            'retorno' => $retorno,
            'r_semillas' => $r_semillas,
            'profit' => $profit
        ];

        return $info;
    }

    /**
     * Función para el cálculo de col
     * 
     */
    public function cal_cabbage()
    {
        $v = $this->validate([ 
            'premium' => 'required|boolean',
            'foco' => 'required|boolean',
            'bono' => 'required|boolean',
            'parcelas' => 'numeric',
            'cabbageseed' => 'numeric|nullable',
            'cabbage' => 'numeric|nullable',
        ]);

        //calcular el valor de los impuestos
        $imp = $this->impuestos($this->premium);

        //retorno de semillas
        if ($this->foco == true) {
            //porcentaje de retorno en el caso de las col es 126%
            $retorno = 120;

            //semillas regresadas
            $sem = $this->parcelas * 9 * $retorno/100;
            $r_semillas = round($sem);
        } else {
            //porcentaje de retorno en el caso de las col es 73.3%
            $retorno = 80;
            //semillas regresadas
            $sem = $this->parcelas * 9 * $retorno/100;
            $r_semillas = round($sem);
        }

        if ($this->premium == true) {
            if ($this->bono == true) {

                $sec_a = 9.9 * $this->parcelas * 9 * $this->cabbage * (1-($imp/100)) + ($this->cabbageseed * $sem);
                $sec_b = $this->cabbageseed * 9 * $this->parcelas;
                $profit = round($sec_a - $sec_b);
            } else {
                $sec_a = 9 * $this->parcelas * 9 * $this->cabbage * (1-($imp/100)) + ($this->cabbageseed * $sem);
                $sec_b = $this->cabbageseed * 9 * $this->parcelas;
                $profit = round($sec_a - $sec_b);
            }
        } else {
            if ($this->bono == true) {
                $sec_a = (9.9/2) * $this->parcelas * 9 * $this->cabbage * (1-($imp/100)) + ($this->cabbageseed * $sem);
                $sec_b = $this->cabbageseed * 9 * $this->parcelas;
                $profit = round($sec_a - $sec_b);
            } else {
                $sec_a = (9/2) * $this->parcelas * 9 * $this->cabbage * (1-($imp/100)) + ($this->cabbageseed * $sem);
                $sec_b = $this->cabbageseed * 9 * $this->parcelas;
                $profit = round($sec_a - $sec_b);
            }
        }

        $info = [
            'retorno' => $retorno,
            'r_semillas' => $r_semillas,
            'profit' => $profit
        ];

        return $info;
    }

    /**
     * Función para el cálculo de papa
     * 
     */
    public function cal_potato()
    {
        $v = $this->validate([ 
            'premium' => 'required|boolean',
            'foco' => 'required|boolean',
            'bono' => 'required|boolean',
            'parcelas' => 'numeric',
            'potatoseed' => 'numeric|nullable',
            'potato' => 'numeric|nullable',
        ]);

        //calcular el valor de los impuestos
        $imp = $this->impuestos($this->premium);

        //retorno de semillas
        if ($this->foco == true) {
            //porcentaje de retorno en el caso de las papa es 113.7%
            $retorno = 113.7;

            //semillas regresadas
            $sem = $this->parcelas * 9 * $retorno/100;
            $r_semillas = round($sem);
        } else {
            //porcentaje de retorno en el caso de las papa es 86.7%
            $retorno = 86.7;
            //semillas regresadas
            $sem = $this->parcelas * 9 * $retorno/100;
            $r_semillas = round($sem);
        }

        if ($this->premium == true) {
            if ($this->bono == true) {

                $sec_a = 9.9 * $this->parcelas * 9 * $this->potato * (1-($imp/100)) + ($this->potatoseed * $sem);
                $sec_b = $this->potatoseed * 9 * $this->parcelas;
                $profit = round($sec_a - $sec_b);
            } else {
                $sec_a = 9 * $this->parcelas * 9 * $this->potato * (1-($imp/100)) + ($this->potatoseed * $sem);
                $sec_b = $this->potatoseed * 9 * $this->parcelas;
                $profit = round($sec_a - $sec_b);
            }
        } else {
            if ($this->bono == true) {
                $sec_a = (9.9/2) * $this->parcelas * 9 * $this->potato * (1-($imp/100)) + ($this->potatoseed * $sem);
                $sec_b = $this->potatoseed * 9 * $this->parcelas;
                $profit = round($sec_a - $sec_b);
            } else {
                $sec_a = (9/2) * $this->parcelas * 9 * $this->potato * (1-($imp/100)) + ($this->potatoseed * $sem);
                $sec_b = $this->potatoseed * 9 * $this->parcelas;
                $profit = round($sec_a - $sec_b);
            }
        }

        $info = [
            'retorno' => $retorno,
            'r_semillas' => $r_semillas,
            'profit' => $profit
        ];

        return $info;
    }

    /**
     * Función para el cálculo de maiz
     * 
     */
    public function cal_corn()
    {
        $v = $this->validate([ 
            'premium' => 'required|boolean',
            'foco' => 'required|boolean',
            'bono' => 'required|boolean',
            'parcelas' => 'numeric',
            'cornseed' => 'numeric|nullable',
            'corn' => 'numeric|nullable',
        ]);

        //calcular el valor de los impuestos
        $imp = $this->impuestos($this->premium);

        //retorno de semillas
        if ($this->foco == true) {
            //porcentaje de retorno en el caso de las maiz es 109.1%
            $retorno = 109.1;

            //semillas regresadas
            $sem = $this->parcelas * 9 * $retorno/100;
            $r_semillas = round($sem);
        } else {
            //porcentaje de retorno en el caso de las maiz es 91.1%
            $retorno = 91.1;
            //semillas regresadas
            $sem = $this->parcelas * 9 * $retorno/100;
            $r_semillas = round($sem);
        }

        if ($this->premium == true) {
            if ($this->bono == true) {

                $sec_a = 9.9 * $this->parcelas * 9 * $this->corn * (1-($imp/100)) + ($this->cornseed * $sem);
                $sec_b = $this->cornseed * 9 * $this->parcelas;
                $profit = round($sec_a - $sec_b);
            } else {
                $sec_a = 9 * $this->parcelas * 9 * $this->corn * (1-($imp/100)) + ($this->cornseed * $sem);
                $sec_b = $this->cornseed * 9 * $this->parcelas;
                $profit = round($sec_a - $sec_b);
            }
        } else {
            if ($this->bono == true) {
                $sec_a = (9.9/2) * $this->parcelas * 9 * $this->corn * (1-($imp/100)) + ($this->cornseed * $sem);
                $sec_b = $this->cornseed * 9 * $this->parcelas;
                $profit = round($sec_a - $sec_b);
            } else {
                $sec_a = (9/2) * $this->parcelas * 9 * $this->corn * (1-($imp/100)) + ($this->cornseed * $sem);
                $sec_b = $this->cornseed * 9 * $this->parcelas;
                $profit = round($sec_a - $sec_b);
            }
        }

        $info = [
            'retorno' => $retorno,
            'r_semillas' => $r_semillas,
            'profit' => $profit
        ];

        return $info;
    }

    /**
     * Función para el cálculo de calabaza
     * 
     */
    public function cal_punpkin()
    {
        $v = $this->validate([ 
            'premium' => 'required|boolean',
            'foco' => 'required|boolean',
            'bono' => 'required|boolean',
            'parcelas' => 'numeric',
            'punpkinseed' => 'numeric|nullable',
            'punpkin' => 'numeric|nullable',
        ]);

        //calcular el valor de los impuestos
        $imp = $this->impuestos($this->premium);

        //retorno de semillas
        if ($this->foco == true) {
            //porcentaje de retorno en el caso de las calabaza es 106.3%
            $retorno = 106.3;

            //semillas regresadas
            $sem = $this->parcelas * 9 * $retorno/100;
            $r_semillas = round($sem);
        } else {
            //porcentaje de retorno en el caso de las calabaza es 93.3%
            $retorno = 93.3;
            //semillas regresadas
            $sem = $this->parcelas * 9 * $retorno/100;
            $r_semillas = round($sem);
        }

        if ($this->premium == true) {
            if ($this->bono == true) {

                $sec_a = 9.9 * $this->parcelas * 9 * $this->punpkin * (1-($imp/100)) + ($this->punpkinseed * $sem);
                $sec_b = $this->punpkinseed * 9 * $this->parcelas;
                $profit = round($sec_a - $sec_b);
            } else {
                $sec_a = 9 * $this->parcelas * 9 * $this->punpkin * (1-($imp/100)) + ($this->punpkinseed * $sem);
                $sec_b = $this->punpkinseed * 9 * $this->parcelas;
                $profit = round($sec_a - $sec_b);
            }
        } else {
            if ($this->bono == true) {
                $sec_a = (9.9/2) * $this->parcelas * 9 * $this->punpkin * (1-($imp/100)) + ($this->punpkinseed * $sem);
                $sec_b = $this->punpkinseed * 9 * $this->parcelas;
                $profit = round($sec_a - $sec_b);
            } else {
                $sec_a = (9/2) * $this->parcelas * 9 * $this->punpkin * (1-($imp/100)) + ($this->punpkinseed * $sem);
                $sec_b = $this->punpkinseed * 9 * $this->parcelas;
                $profit = round($sec_a - $sec_b);
            }
        }

        $info = [
            'retorno' => $retorno,
            'r_semillas' => $r_semillas,
            'profit' => $profit
        ];

        return $info;
    }
}
