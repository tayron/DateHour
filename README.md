## DateHour 1.0

Classe que adiciona mais funcionalidades a classe DateTime para tratamento de data e hora.


## Recursos
  - Todos os recursos da classe DateTime
  - checkdate($year, $day, $month) - Verifica se uma data é válida
  - checkhour($hour, $minute, $second) - Verifica se uma hora é válida
  - sumDayUseful($dayToSum, $date) - Soma uma quantidade de dias a uma data
  - getRecess($year) - Retorna uma lista de recessos de um determinado ano


## Tutorial

**Pegando todos os feriados do ano de 2014.**
```sh
<?php
echo '<pre>';
print_r( DateHour::getRecess(2014) ); 
```

Resultado:
```sh
Array
(
    [0] => 2014-01-01
    [1] => 2014-03-04
    [2] => 2014-04-18
    [3] => 2014-04-20
    [4] => 2014-04-21
    [5] => 2014-05-01
    [6] => 2014-06-19
    [7] => 2014-09-20
    [8] => 2014-10-12
    [9] => 2014-11-02
    [10] => 2014-11-15
    [11] => 2014-12-25
)
```


**Verificando se uma data é válida:**

```sh
<?php
echo (DateHour::checkdate(2014, 01, 12)) ? 'Data válida' : 'Data inválida';
```

Resultado:
```sh
Data válida
```

**Verificando se uma hora é válida:**

```sh
<?php
echo (DateHour::checkhour(23, 59, 59)) ? 'Hora válida' : 'Hora inválida';
```

Resultado:
```sh
Hora válida
```

**Somando 10 dias à data atual:**

```sh
<?php
// A data atual do teste foi 19/12/2015 13:42
echo DateHour::sumDayUseful(10)->format('d/m/Y H:i:s');
```

Resultado:
```sh
29/12/2014 14:13:42
```

**Somando 10 dias à data específica:**

```sh
<?php
echo DateHour::sumDayUseful(10, '2014-12-25')->format('d/m/Y H:i:s');
```

Resultado:
```sh
29/12/2014 14:19:14
```
