<?php
App::uses('Model', 'Model');

class AppModel extends Model {

    public function formatacaoMascaraDinheiroDecimal($tamanho, $valorParaFormatar) {
        if ($tamanho <= 6) {
            $dados = str_replace(',', '.', $valorParaFormatar);
        } else {
            if ($tamanho >= 8 && $tamanho <= 10) {
                $retiraVirgulaPorPonto = str_replace(',', '.',   $valorParaFormatar);
                $separaPorIndice  = explode('.',  $retiraVirgulaPorPonto);
                $dados  =  $separaPorIndice[0] . $separaPorIndice[1];
            }
        }

        return $dados;
    }

    public function sqlDate($userDate) {
        $date = $userDate;   
        if (strlen($userDate) == 10) {
            $year = substr($userDate, 6, 4);
            $month = substr($userDate, 3, 2);
            $day = substr($userDate, 0, 2);
            $date = $year . '-' . $month . '-' . $day;
        }
     
        return $date;
    }

}
