<?php
        $dia = intval($_POST["dia"]); // Variável que vai armazenar o dia da data digitada no formulário
        $mes = intval($_POST["mes"]); // Variável que vai armazenar o número correspondente ao mês da data digitada no formulário
        $ano = intval($_POST["ano"]); // Variável que vai armazenar o ano da data digitada no formulário

        $diasDoMes = cal_days_in_month (CAL_GREGORIAN, $mes, $ano); // Variável $diasDoMes que vai armazenar a quantidade de dias do mês digitado que foi fornecido pela função cal_days_in_month
         
        // O echo vai imprimir a tabela, a tag <table> vai apenas fazer um espaço para linha e coluna em forma de tabela, e dentro da tag tem a estilização da tabela (Não consegui estilizar no css)
        echo "<table style= 
        'text-align: center;
        margin: 170px auto;
        '
        >"; 

        // O echo vai imprimir (<tr>) linhas com os textos das colunas (<td>) que estão dentro da linha
        echo "<tr style=
        'font-size: 45px;
        font-family: Arial, Helvetica, sans-serif;
        padding: 25px 20px;
        margin:25px;
        background-color: rgb(246, 232, 255);
        color: #8b74c2;'>

        <td>Seg</td>
        <td>Ter</td>
        <td>Qua</td>
        <td>Qui</td>
        <td>Sex</td>
        <td>Sáb</td>
        <td>Dom</td>

        </tr>"; // tr definiu uma linha na tabela e td é a célula da tabela que está dentro de tr

        echo "<tr>";


      /* A função strtotime vai transformar a data "$ano-$mes-01" em um timestamp Unix para o php entender mais facilmente, 
      por exemplo, se o ano digitado for 2024 e o mes for 6, logo ficará 2024-06-01, vai gerar um timestamp como 1º de Junho de 2024*/

      // A função date vai transformar o timestamp em um número que será o dia da semana, o 'N" retorna o dia da semana em um número de 1 ( segunda ) até 7 ( domngo )
      
      // A variável $primeiroDia vai armazenar o primeiro dia da semana do primeiro dia do mês como um número de 1 a 7 ( Se referindo a quantidade de dias da semana )
       
        $primeiroDia = date('N', strtotime("$ano-$mes-01"));

        for ($i = 1; $i < $primeiroDia; $i++) {  /* Aqui vai ocorrer um loop for para a criação de colunas que estarão vazias para inserir os dias.  
            Enquanto $i for menor que o $primeiroDia, vai adicionar +1 no $i até ele não ser menor que o $primeiroDia */
            echo "<td></td>"; 

        } 

        for ($dataDia = 1; $dataDia <= $diasDoMes; $dataDia++) {  /*Aqui vai ocorrer um loop for onde vai aparecer os números dos dias no calendário. 
            Enquanto $dataDia for menor ou igual ao valor do $diasDoMes, vai adicionar +1 no $dataDia e vai imprimi-lo,*/
            echo "<td style=
           'font-family: Arial, Helvetica, sans-serif;
            font-size: 35px;
            color:#8b74c2;
            height:20px;
            widght:20px;
           '>
            $dataDia
            
            </td>"; 

        if (($primeiroDia - 1 + $dataDia) % 7 == 0) { /* Inicia o Se. Porém, se  $primeiroDia + o $dataDia - 1 dividido por 7 e o resto for 0,
             adiciona uma nova linha (<tr>) após cada semana completa */
                echo  "<tr> </tr>"; 
            } 


        }     
        echo '</tr>'; 
        echo "</table>"; 
    