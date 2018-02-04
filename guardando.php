<?php
        function InserirBanner(){
                // INCLUDE OK


                session_start();

                if($_SERVER['REQUEST_METHOD'] == 'POST'){
                        $hash = md5( implode($_POST));
                        if (isset($_SESSION['hash']) && $_SESSION['hash'] == $hash) {
                                $aux;

                        } else {
                                $_SESSION['hash'] = $request;

                                $arquivo = file_get_contents('/var/www/portal/sites/all/themes/incra/pages/banner.json');
                                $json = json_decode($arquivo);

                                $ultimo_elemento = end($json);
 if ($ultimo_elemento->imagem != $_POST['arquivo']) {

                                        if (array_key_exists('blank', $_POST)) {
                                                $blank = $_POST['blank'];
                                        }else{
                                                $blank = "";
                                        }

                                        if (array_key_exists('parent', $_POST)) {
                                                $parent = $_POST['parent'];
                                        }else{
                                                $parent = "";
                                        }

                                        $li = array(
                                                "id" => count($json) + 1,
                                                "status" => "ativado",
                                        "href" => $_POST['href'],
                                        "imagem" => $_POST['arquivo'],
                                        "alt" => $_POST['alt'],
                                        "blank" => $_POST['blank'],
                                        "parent" => $_POST['parent']
                                    );

                                    array_push($json, $li);
                                    $json = json_encode($json);

                                    file_put_contents('/var/www/portal/sites/all/themes/incra/pages/banner.json', $json);

                            }


                        }
