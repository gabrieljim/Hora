<div id="datos">
    <html>
        <head>
            <link rel="stylesheet" type="text/css" href="style.css">
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
            <script type="text/javascript" src="script.js"></script>
        </head>
        <body style="background-color:darkcyan">
            <div class="container" style="background-color:white; padding:20px;">
                <?php
                    date_default_timezone_set('America/New_York');
                    class Hora {
                        function __construct() {
                            $this -> horas = '00';
                            $this -> minutos = '00';
                            $this -> segundos = '00';
                            $this -> currentHoras = date('H');
                            $this -> currentMinutos = date('i');
                            $this -> currentSegundos = date('s');
                            $this -> current = date('H:i:s');
                        }

                        private function validar() {
                            if ((strval($this->currentHoras) != $this->horas) &&
                                (strval($this->currentMinutos) != $this->minutos) &&
                                (strval($this->currentSegundos) != $this->segundos)
                            ){
                                return true;
                            }
                            return false;
                        }

                        public function leer($horas, $minutos, $segundos) {
                            $this -> horas = $horas; 
                            $this -> minutos = $minutos; 
                            $this -> segundos = $segundos; 
                            $diferentes = $this->validar();
                            if ($diferentes){
                                $this -> horas = $this -> currentHoras;
                                $this -> minutos = $this -> currentMinutos;
                                $this -> segundos = $this -> currentSegundos;
                                echo "<script type='text/javascript'>alert('Hora incorrecta, ajustando a hora actual')</script>";
                            }
                        }

                        public function print() {
                            $tiempoUsuario = $this->horas . ":" . $this->minutos . ":" . $this->segundos;
                            echo $tiempoUsuario;
                        }
                        public function aSegundos(){
                            $horasASegundos = (int)$this->horas * 3600;
                            $minutosASegundos = (int)$this->minutos * 60;
                            $segundosDesdeMedianoche = $horasASegundos + $minutosASegundos + (int)$this->segundos;
                            return $segundosDesdeMedianoche;
                        }
                    }
                    $hora = new Hora();
                    echo "Son las " . $hora->current . "<br><br>";
                ?>
                <button name="leer" type="button" id="leer">Leer</button>
                <form id="paraLeer">
                    <h3>Inserte la hora en formato militar con numeros de dos digitos</h3>
                    <p>Por ejemplo: 20:03:14</p>
                    <input class="botonHora" type="number" min="0" max="23" name="horas" placeholder="Hora">
                    <input class="botonHora" type="number" min="0" max="59" name="minutos" placeholder="Minutos">
                    <input class="botonHora" type="number" min="0" max="59" name="segundos" placeholder="Segundos">
                    <input type="submit">
                </form>
                <button name="print" type="button" id="print">Print</button>
                <div id="mostrar" style="display:none;">
                    <h3>
                        <span id="leer" style="display:none;">
                            <?php
                                if ($_POST["horas"]){
                                    $hora->leer($_POST["horas"],$_POST["minutos"],$_POST["segundos"]);
                                }
                            ?>
                        </span>
                        <?php 
                            $hora->print();
                            $segundosPasados = $hora->aSegundos();
                            echo "<br><br>Han pasado " . $segundosPasados . " segundos desde la medianoche";
                        ?>                                                                 
                    </h3>
                </div>
            </div>     
        </body>
    </html>
</div>
