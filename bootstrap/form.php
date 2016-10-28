<html lang="pt">
  <head>
    <meta charset="utf-8">
    <title>Formulário</title>
    <link type='text/css' rel='stylesheet' href='formOp.css'/>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="css/bootstrap.min.css" rel="stylesheet">
    
    </style>
  </head>
  <body>
        <form action="sucesso.php" method="get" method="post">

            <header>
              <h2>Formulário</h2>
            </header>
            <!-- Nome e E-mail -->
             <legend id="title5" class="desc">
                  Dados pessoais
                </legend>
            <div>
              <label class="desc" id="title1" for="Field1">Nome completo</label>
              <div>
                <input id="Field1" name="campo1" type="text" class="field text fn" value="" size="8" tabindex="1">
              </div>
            </div>

            <div>
              <label class="desc" id="title1" for="Field1">Idade</label>
              <div>
                <input id="Field1" name="campo1" type="number" class="field text fn" value="" size="8" tabindex="1">
              </div>
            </div>
              
            <div>
              <label class="desc" id="title3" for="Field3">
                E-mail
              </label>
              <div>
                <input id="Field3" name="Field3" type="email" spellcheck="false" value="" maxlength="255" tabindex="3"> 
             </div>
            </div>
              <!-- Escolaridade -->
            <div>
              <fieldset>
              
                <legend id="title5" class="desc">
                  Escolaridade
                </legend>
                
                <div>
                  <input id="radioDefault_5" name="Field5" type="hidden" value="">
                  <div>
                    <input id="Field5_0" name="Field5" type="radio" value="1C" tabindex="5" checked="checked">
                    <label class="choice" for="Field5_0">1º Ciclo</label>
                  </div>
                  <div>
                    <input id="Field5_1" name="Field5" type="radio" value="2C" tabindex="6">
                    <label class="choice" for="Field5_1">2º Ciclo</label>
                  </div>
                  <div>
                    <input id="Field5_2" name="Field5" type="radio" value="3C" tabindex="7">
                    <label class="choice" for="Field5_2">3º Ciclo</label>
                  </div>
                  <div>
                    <input id="Field5_3" name="Field5" type="radio" value="Sec" tabindex="7">
                    <label class="choice" for="Field5_3">Secundário</label>
                  </div>
                </div>
              </fieldset>
            </div>

            <div>
              <label class="desc" id="title106" for="Field106">
                Tipo de Curso
              </label>
              <div>
              <select id="Field106" name="Field106" class="field select medium" tabindex="11"> 
                <option value="First Choice">Ciêntifico-Tecnológico</option>
                <option value="Second Choice">Ciêntifico-Humanístico</option>
                <option value="Third Choice">Atividade-Física</option>
              </select>
              </div>
            </div>
            

            <div>
              <fieldset>
                <legend id="title6" class="desc">
                  Disciplinas Preferidas
                </legend>
                <div>
                <div>
                  <input id="Field6" name="Field6" type="checkbox" value="mat" tabindex="8">
                  <label class="choice" for="Field6">Matemática</label>
                </div>
                <div>
                  <input id="Field7" name="Field7" type="checkbox" value="fq" tabindex="9">
                  <label class="choice" for="Field7">Física-Quimíca</label>
                </div>
                <div>
                  <input id="Field8" name="Field8" type="checkbox" value="in" tabindex="10">
                  <label class="choice" for="Field8">Inglês</label>
                </span>
                </div>
                <div>
                  <input id="Field9" name="Field9" type="checkbox" value="pt" tabindex="10">
                  <label class="choice" for="Field9">Português</label>
                </span>
                </div>
                <div>
                  <input id="Field10" name="Field10" type="checkbox" value="in" tabindex="10">
                  <label class="choice" for="Field10">Educação Física</label>
                </span>
                </div>
              </fieldset>
            </div>
            
            

            <div>
              <label class="desc" id="title4" for="Field4">
                Currículo
              </label>
            
              <div>
                <textarea id="Field4" name="Field4" spellcheck="true" rows="10" cols="50" tabindex="4"></textarea>
              </div>
            </div>
            
            <div>
              <div>
                <input id="saveForm" name="saveForm" type="submit" value="Enviar">
                <input id="cleanForm" name="cleanForm" type ="reset" value="Limpar">
              </div>
            </div>

            
          </form>
          <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
      <script src="js/bootstrap.min.js"></script>
  </body>
</html>

