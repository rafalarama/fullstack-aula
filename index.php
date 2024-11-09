<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Requisição assíncrona</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        body {
            background-color: #e9f6ff;
        }
    </style>
  </head>
  <body>
    <h1>Requisição assíncrona</h1>

    <div class="container">

        <div class="row">
            <div class="col-lg-4 col-md-12 col-sm-12"> 
                <label for="a" class="form-label">a</label>
                <input type="text" class="form-control" name="a" id="a">
            </div>
            
            <div class="col-lg-4 col-md-12 col-sm-12">
                <label for="b" class="form-label">b</label>
                <input type="text" class="form-control" name="b" id="b">
            </div>
            
            <div class="col-lg-4 col-md-12 col-sm-12"> 
                <label for="c" class="form-label">c</label>
                <input type="text" class="form-control" name="c" id="c">
            </div>
        </div>

        <div class="row mt-3">
            <div class="d-grid gap-2 col-6 mx-auto">
                <button onclick="calcularDelta();" class="btn btn-outline-info">Calcular</button>
            </div>
        </div>
       

        <p id="resultado" class="border border-success"></p>

    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script>
        function calcularDelta(){
            const campo = document.getElementById("resultado");

            campo.innerHTML = "";
            campo.innerHTML = "Aguarde... Calculando no servidor ...";
            //obtemos os dados dos campos html
            //armazenamos os valores em variáveis.
            const a = document.getElementById("a").value;
            const b = document.getElementById("b").value;
            const c = document.getElementById("c").value;

            //criamos um objeto com todas as variáveis
            //que o servidor precisa para realizar o calculo
            const payload = {
                a, 
                b, 
                c
            };

            //convertemos o objeto em json
            //para poder trafegar na rede
            const json = JSON.stringify(payload);

            //configuramos a requisição e aguardamos a resposta
            fetch('/processar.php', {
                method: 'POST',
                header: { 'Content-Type': 'application/json'},
                body: json    
            })
            .then(resposta => resposta.json())
            .then(dados => {
                //alert("O resultado do calculo é: " + dados.delta);

                
                campo.innerHTML = "O resultado do calculo é: " + dados.delta;
            });
        }

    </script>

  </body>
</html>