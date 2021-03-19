<?php
    require_once "config.php";
?>
<!DOCTYPE html>
<html lang="pt-BR">

    <head>

        <link rel="stylesheet" type="text/css" href="css/bootstrap-select.min.css">
        <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">

    </head>

    <body>

        <section>
            <div class="container">
                <div class="row">

                    <div class="col-md-6 col-lg-6">

                        
                        <h2>Cadastrar</h2>
                        <form> 
                            <div class="row input-group">
                                <div class="col-sm-6">
                                    <div style="color: red; display: none;" id="alerta_nome">*Nome Obrigatório</div>
                                    <input type="text" class="form-control"  name="nome" id="nome" placeholder="Nome">
                                </div>
                                <div class="col-sm-6">
                                    <div style="color: red; display: none;" id="alerta_cpf">*CPF Obrigatório</div>
                                    <div style="color: red; display: none;" id="alerta_cpf2">*Digite um CPF válido</div>
                                    <input type="text" class="form-control"  name="cpf" id="cpf" placeholder="CPF">
                                </div>
                                <div class="col-sm-12"><br>
                                </div>
                                <div class="col-sm-12">
                                    <div style="color: red; display: none;" id="alerta_email">*E-mail Obrigatório</div>
                                    <input type="email" class="form-control" name="email" id="email" placeholder="Email">
                                </div>
                                <div class="col-sm-12"><br>
                                </div>
                                <div class="col-sm-6">
                                    <div style="color: red; display: none;" id="alerta_senha">*Senha Obrigatório</div>
                                    <input type="password" class="form-control"  name="senha" id="senha" placeholder="Senha">
                                </div>
                                <div class="col-sm-6">
                                    <div style="color: red; display: none;" id="alerta_senha2">*Confirmação de senha Obrigatório</div>
                                    <input type="password" class="form-control" name="senha2" id="senha2" placeholder="Confirmação de Senha" onfocusout="validarSenha(this)">
                                </div>
                                <div class="col-sm-12"><br>
                                </div>
                                <div class="col-sm-6">
                                </div>
                                <div class="col-sm-6">
                                    <button type="button" class="btn btn-primary" id="botao" onclick="enviar(this)" style="float: right;width: 100%;">Enviar</button>
                                </div>
                            </div>
                        </form>
                        

                    </div>

                    <div class="col-md-6 col-lg-6">
                        <div class="col-sm-12"><br>
                        </div>
                        <h2>Cadastros</h2>
                        <table class="table table-bordered table-hover" id="tabela">
                             <thead>
                                <tr>
                                    <th>Código</th>
                                    <th>Nome</th>
                                    <th>CPF</th>
                                    <th>E-mail</th>
                                </tr>
                              </thead>
                              <tbody>

                            <?php

                            $sql = "SELECT codigo,nome,cpf,email FROM cadastro";

                            $query = mysqli_query($conn, $sql);

                            $condicao = mysqli_num_rows($query);

                            while ($dados = mysqli_fetch_assoc($query)) {

                                $codigo = $dados['codigo'];
                                $nome = $dados['nome'];
                                $cpf = $dados['cpf'];
                                $email = $dados['email'];

                            ?>

                            <tr>
                                <td class="center">#<?=$codigo;?></td>
                                <td class="center"><?=$nome;?></td>
                                <td class="center"><?=$cpf;?></td>
                                <td class="center"><?=$email;?></td>
                            </tr>

                            <?php
                                }?>

                            </tbody>
                        </table>
                    </div>

                </div>  
            </div>
        </section>

        
        
        <script src="js/jquery-2.2.4.min.js"></script>
        <script  src="js/sb-admin-2.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.8/css/select2.min.css" rel="stylesheet" />
        <script src="https://code.jquery.com/jquery-3.4.1.js" integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU=" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.8/js/select2.min.js"></script>
        <script src="js/sb-admin-2.js"></script>
        <script  src="js/jquery.mask.min.js"></script>


        <script>
            $("#cpf").mask("000.000.000-09");
        </script>

        <script type="text/javascript">

            function validarSenha(input){

                var senha = document.getElementById("senha").value;
                var senha2 = document.getElementById("senha2").value;

                if(senha != senha2 && senha2 != ""){
                    alert('Senhas não são iguais, favor repita!');
                    document.getElementById("senha2").value = "";
                    document.getElementById("senha2").focus();
                }
                
            }

            function enviar(input){

                var nome = document.getElementById("nome").value;
                var email = document.getElementById("email").value;
                var cpf = document.getElementById("cpf").value;
                var senha = document.getElementById("senha").value;
                var senha2 = document.getElementById("senha2").value;


                if (nome == ""){document.getElementById("alerta_nome").style.display = 'block';}
                else{
                    document.getElementById("alerta_nome").style.display = 'none';
                }

                if (email == ""){document.getElementById("alerta_email").style.display = 'block';}
                else{document.getElementById("alerta_email").style.display = 'none';}

                if (cpf == ""){document.getElementById("alerta_cpf").style.display = 'block';}
                else{document.getElementById("alerta_cpf").style.display = 'none';}

                if (cpf != "" && cpf.length < 14){document.getElementById("alerta_cpf2").style.display = 'block';}
                else{document.getElementById("alerta_cpf2").style.display = 'none';}

            
                if (senha == ""){document.getElementById("alerta_senha").style.display = 'block';}
                else{document.getElementById("alerta_senha").style.display = 'none';}

                if (senha2 == ""){document.getElementById("alerta_senha2").style.display = 'block';}
                else{document.getElementById("alerta_senha2").style.display = 'none';}

                if (nome != "" && email != "" && cpf != "" && senha != "" && senha2 != "" && cpf.length == 14) {

                    document.getElementById("botao").disabled = true;

                    $.ajax({
                        url: "cadastro.php",
                        type: 'post',
                        data:{
                                nome:nome,
                                cpf:cpf,
                                email:email,
                                senha:senha
                        },
                        dataType: 'json',
                        success: function(result){ 
                            alert(result);

                            document.location.reload(true);
  
                        }
                        
                    });

                }

            }

        </script>

    </body>
</html>