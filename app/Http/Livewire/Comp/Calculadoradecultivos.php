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

        //calcular el valor de los impuestos
        $imp = $this->impuestos($this->premium);

        $r_carrot = $this->cal_carrot($this->carrotseed, $this->carrot);

        $r_bean = $this->cal_bean($this->beanseed, $this->bean);

        return view('livewire.comp.calculadoradecultivos',[            
            'imp' => $imp,
            'r_carrot' => $r_carrot,
            'r_bean' => $r_bean,
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
                $profit = ceil($sec_a - $sec_b);
            } else {
                $sec_a = 9 * $this->parcelas * 9 * $this->carrot * (1-($imp/100)) + ($this->carrotseed * $r_semillas);
                $sec_b = $this->carrotseed * 9 * $this->parcelas;
                $profit = ceil($sec_a - $sec_b);
            }
        } else {
            if ($this->bono == true) {
                $sec_a = (9.9/2) * $this->parcelas * 9 * $this->carrot * (1-($imp/100)) + ($this->carrotseed * $r_semillas);
                $sec_b = $this->carrotseed * 9 * $this->parcelas;
                $profit = ceil($sec_a - $sec_b);
            } else {
                $sec_a = (9/2) * $this->parcelas * 9 * $this->carrot * (1-($imp/100)) + ($this->carrotseed * $r_semillas);
                $sec_b = $this->carrotseed * 9 * $this->parcelas;
                $profit = ceil($sec_a - $sec_b);
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
            //porcentaje de retorno en el caso de las frijol es 33.3%
            $retorno = 166.3;

            //semillas regresadas
            $r_semillas = $this->parcelas * 9 * $retorno /100; 
        } else {
            //porcentaje de retorno en el caso de las frijol es 33.3%
            $retorno = 33.3;
            //semillas regresadas
            $r_semillas = $this->parcelas * 9 * $retorno/100; 
        }

        if ($this->premium == true) {
            if ($this->bono == true) {

                $sec_a = 9.9 * $this->parcelas * 9 * $this->bean * (1-($imp/100)) + ($this->beanseed * $r_semillas);
                $sec_b = $this->beanseed * 9 * $this->parcelas;
                $profit = ceil($sec_a - $sec_b);
            } else {
                $sec_a = 9 * $this->parcelas * 9 * $this->bean * (1-($imp/100)) + ($this->beanseed * $r_semillas);
                $sec_b = $this->beanseed * 9 * $this->parcelas;
                $profit = ceil($sec_a - $sec_b);
            }
        } else {
            if ($this->bono == true) {
                $sec_a = (9.9/2) * $this->parcelas * 9 * $this->bean * (1-($imp/100)) + ($this->beanseed * $r_semillas);
                $sec_b = $this->beanseed * 9 * $this->parcelas;
                $profit = ceil($sec_a - $sec_b);
            } else {
                $sec_a = (9/2) * $this->parcelas * 9 * $this->bean * (1-($imp/100)) + ($this->beanseed * $r_semillas);
                $sec_b = $this->beanseed * 9 * $this->parcelas;
                $profit = ceil($sec_a - $sec_b);
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
