<?php
defined('BASEPATH') OR exit('No direct script access allowed');
    $this->load->model('usuario');
    $this->load->library('session');
    $obj_usuario = $this->session->userdata('usuario');
?>


            <div class="container-center-big">
            <table class="table table-hover table-responsive-auto ">
                <thead>
                <tr class="table-active">
                <th scope="col">#</th>
                <th scope="col">Modelo</th>
                <th scope="col">Ano</th>
                <th scope="col">Placa</th>
                <th scope="col">Cor</th>
                <?php
                    if($obj_usuario){
                        echo '<th scope="col">Quer Devolver seu carro?</th>';
                    }
                ?>
                
                </tr>
                </thead>
                <tbody>
                <?php
                $counterCars = 0;
                $couterColumns = 0;
                if(!(is_null($carros_array) && $car_array !== '')){
                    foreach ($carros_array as $carro) {
                        echo '<form action="'. base_url('index.php/controller_primario/devolver_carro') .'" method="post" ><tr name = "car_'. (++$counterCars) .'">';
                        echo '<td "> <input type="hidden" name = "column_'. (++$couterColumns) .'" value="' . $carro ->get_id() . '">' . $carro ->get_id() . '</td>';
                        echo '<td "> <input type="hidden" name = "column_'. (++$couterColumns) .'" value="' . $carro ->get_modelo() . '">' . $carro ->get_modelo() . '</td>';
                        echo '<td "> <input type="hidden" name = "column_'. (++$couterColumns) .'" value="' . $carro ->get_ano() . '">' . $carro ->get_ano() . '</td>';
                        echo '<td "> <input type="hidden" name = "column_'. (++$couterColumns) .'" value="' . $carro ->get_placa() . '">' . $carro ->get_placa() . '</td>';
                        echo '<td "> <input type="hidden" name = "column_'. (++$couterColumns) .'" value="' . $carro ->get_cor() . '">' . $carro ->get_cor() . '</td>';
                        echo '<input type="hidden" name = "column_'. (++$couterColumns) .'" value="' . $carro ->get_locatario() . '">';
                        echo '<input type="hidden" name = "column_'. (++$couterColumns) .'" value="' . $carro ->get_locacao() . '">';
                        if($obj_usuario){
                            echo '<td> <button type="submit" class="btn btn-success  ">Devolver</button> </td>';
                        }
                        
                        $couterColumns = 0;
                    }
                }
                ?>
                </tbody>
            </table>
            </div>